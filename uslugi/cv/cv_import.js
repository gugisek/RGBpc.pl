/* ============================================================
   Import danych z PDF-a wygenerowanego przez Generator CV.

   PDF z drukarki przeglądarki nie zawiera "danych" — tylko tekst
   z pozycjami i krojami pisma. Parser odtwarza strukturę CV
   na podstawie układu strony (nagłówek / kolumna główna / sidebar),
   etykiet sekcji ("DOŚWIADCZENIE", "JĘZYKI"…) i grubości fontów.
   Kolory (motyw, platformy social media, poziom pasków umiejętności)
   są odczytywane z wyrenderowanej strony.
   ============================================================ */
(function (root) {
'use strict';

const PDFJS_BASE = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/';

const HEADINGS = {
    'DOŚWIADCZENIE': 'experience',
    'EDUKACJA':      'education',
    'UMIEJĘTNOŚCI':  'skills',
    'SOCIALMEDIA':   'social',
    'PORTFOLIO':     'portfolio',
    'JĘZYKI':        'languages',
    'CERTYFIKATY':   'certifications',
    'OMNIE':         'about',
};
const SIDEBAR_SECTIONS = new Set(['about', 'skills', 'social', 'languages', 'certifications']);
const LANG_LEVELS = ['A1', 'A2', 'B1', 'B2', 'C1', 'C2', 'Native / Ojczysty'];
const PLATFORMS = ['instagram', 'tiktok', 'youtube', 'facebook', 'twitter', 'linkedin', 'snapchat', 'pinterest', 'inne'];

// ------------------------------------------------------------
// Helpers
// ------------------------------------------------------------
function weightOf(fontName) {
    const n = String(fontName || '').replace(/^[A-Z]{6}\+/, '');
    if (/Black|Heavy/i.test(n))                return 900;
    if (/Extra-?Bold|Ultra-?Bold/i.test(n))    return 800;
    if (/Semi-?Bold|Demi-?Bold/i.test(n))      return 600;
    if (/Bold/i.test(n))                       return 700;
    if (/Medium/i.test(n))                     return 500;
    if (/Light|Thin/i.test(n))                 return 300;
    return 400;
}

const EMOJI_RE = /[\p{Extended_Pictographic}️‍]/gu;
const isEmojiOnly = s => !s.replace(EMOJI_RE, '').trim();

function hexToRgb(hex) {
    const h = hex.replace('#', '');
    return [parseInt(h.slice(0, 2), 16), parseInt(h.slice(2, 4), 16), parseInt(h.slice(4, 6), 16)];
}
const dist = (a, b) => Math.hypot(a[0] - b[0], a[1] - b[1], a[2] - b[2]);
const sat  = c => Math.max(c[0], c[1], c[2]) - Math.min(c[0], c[1], c[2]);

function nearestKey(rgb, map) {
    let best = null, bestD = Infinity;
    for (const [k, hex] of Object.entries(map)) {
        const d = dist(rgb, hexToRgb(hex));
        if (d < bestD) { bestD = d; best = k; }
    }
    return { key: best, d: bestD };
}

// Tekst z rozstrzelonymi literami ("C O N T E N T  C R E AT O R") → "CONTENT CREATOR".
// Odstępy między literami są wewnątrz fragmentów lub są wąskimi spacjami,
// odstęp między słowami to osobna, szersza spacja.
function collapseLetterSpaced(seg) {
    const out = seg.parts.map(p => {
        if (p.space) return p.w > 0.45 * p.h ? '\u0001' : '';
        return p.str.replace(/ {2,}/g, '\u0001').replace(/ /g, '');
    }).join('');
    return out.replace(/\u0001+/g, ' ').trim();
}
function looksLetterSpaced(text) {
    const toks = text.split(/\s+/).filter(Boolean);
    return toks.length >= 3 && toks.filter(t => t.length <= 2).length / toks.length >= 0.6;
}

// ------------------------------------------------------------
// Extraction (pdf.js) — działa w przeglądarce i w Node
// ------------------------------------------------------------
function objGet(store, id, timeout = 4000) {
    return new Promise(resolve => {
        let done = false;
        const fin = v => { if (!done) { done = true; resolve(v); } };
        try { store.get(id, fin); } catch (e) { fin(null); }
        setTimeout(() => fin(null), timeout);
    });
}

async function extractPdf(pdfjsLib, data, { render = false, scale = 2, maxPages = 4 } = {}) {
    const doc = await pdfjsLib.getDocument({ data }).promise;
    const pages = [];
    const OPS = pdfjsLib.OPS;
    const n = Math.min(doc.numPages, maxPages);

    for (let p = 1; p <= n; p++) {
        const page = await doc.getPage(p);
        const vp = page.getViewport({ scale: 1 });
        const ops = await page.getOperatorList();
        const tc = await page.getTextContent();

        // Real font names (np. "AAAAAA+Inter-SemiBold")
        const fontNames = {};
        for (const it of tc.items) {
            if (it.fontName && !(it.fontName in fontNames)) {
                const f = await objGet(page.commonObjs, it.fontName, 2000);
                fontNames[it.fontName] = (f && (f.name || f.loadedName)) || '';
            }
        }

        const items = tc.items.filter(it => typeof it.str === 'string' && it.str !== '').map(it => {
            const t = it.transform;
            const [x, y] = vp.convertToViewportPoint(t[4], t[5]);
            const font = fontNames[it.fontName] || '';
            return {
                str: it.str, x, y,
                w: it.width, h: Math.hypot(t[2], t[3]) || it.height || 1,
                font, weight: weightOf(font), page: p - 1,
            };
        });

        // Image placements: follow the CTM through the operator list
        const images = [];
        let ctm = [1, 0, 0, 1, 0, 0];
        const stack = [];
        const mul = (a, b) => [
            a[0] * b[0] + a[2] * b[1], a[1] * b[0] + a[3] * b[1],
            a[0] * b[2] + a[2] * b[3], a[1] * b[2] + a[3] * b[3],
            a[0] * b[4] + a[2] * b[5] + a[4], a[1] * b[4] + a[3] * b[5] + a[5],
        ];
        ops.fnArray.forEach((fn, i) => {
            const a = ops.argsArray[i];
            if (fn === OPS.save) stack.push(ctm.slice());
            else if (fn === OPS.restore) ctm = stack.pop() || ctm;
            else if (fn === OPS.transform) ctm = mul(ctm, a);
            else if (fn === OPS.paintFormXObjectBegin) { stack.push(ctm.slice()); if (a && a[0]) ctm = mul(ctm, a[0]); }
            else if (fn === OPS.paintFormXObjectEnd) ctm = stack.pop() || ctm;
            else if (fn === OPS.paintImageXObject && a && typeof a[0] === 'string') {
                const pts = [[0, 0], [1, 0], [0, 1], [1, 1]].map(([u, v]) =>
                    vp.convertToViewportPoint(ctm[0] * u + ctm[2] * v + ctm[4], ctm[1] * u + ctm[3] * v + ctm[5]));
                const xs = pts.map(q => q[0]), ys = pts.map(q => q[1]);
                const x0 = Math.min(...xs), y0 = Math.min(...ys);
                images.push({ id: a[0], x: x0, y: y0, w: Math.max(...xs) - x0, h: Math.max(...ys) - y0, page: p - 1, pxW: a[1], pxH: a[2] });
            }
        });

        let canvas = null;
        if (render && typeof document !== 'undefined') {
            const rvp = page.getViewport({ scale });
            canvas = document.createElement('canvas');
            canvas.width = Math.ceil(rvp.width);
            canvas.height = Math.ceil(rvp.height);
            const ctx = canvas.getContext('2d', { willReadFrequently: true });
            ctx.fillStyle = '#fff';
            ctx.fillRect(0, 0, canvas.width, canvas.height);
            await page.render({ canvasContext: ctx, viewport: rvp }).promise;
        }

        pages.push({ index: p - 1, width: vp.width, height: vp.height, items, images, canvas, scale, pdfPage: page });
    }
    return { doc, pages };
}

// Color sampler on rendered pages (PDF points → pixel)
function makeSampler(pages) {
    const cache = {};
    return function sample(pageIdx, x, y) {
        const pg = pages[pageIdx];
        if (!pg || !pg.canvas) return null;
        if (!cache[pageIdx]) {
            const c = pg.canvas;
            cache[pageIdx] = c.getContext('2d', { willReadFrequently: true }).getImageData(0, 0, c.width, c.height);
        }
        const img = cache[pageIdx];
        const px = Math.round(x * pg.scale), py = Math.round(y * pg.scale);
        if (px < 0 || py < 0 || px >= img.width || py >= img.height) return null;
        const o = (py * img.width + px) * 4;
        return [img.data[o], img.data[o + 1], img.data[o + 2]];
    };
}

// ------------------------------------------------------------
// Layout: lines → segments
// ------------------------------------------------------------
function buildSegments(items) {
    const sorted = items.slice().sort((a, b) => a.y - b.y || a.x - b.x);
    const lines = [];
    for (const it of sorted) {
        let line = null;
        for (let k = lines.length - 1; k >= Math.max(0, lines.length - 3); k--) {
            const l = lines[k];
            if (Math.abs(l.y - it.y) < 0.45 * Math.min(l.h, it.h)) { line = l; break; }
        }
        if (!line) { line = { y: it.y, h: it.h, items: [] }; lines.push(line); }
        line.items.push(it);
        if (it.str.trim()) line.h = Math.max(line.h, it.h);
    }

    const segs = [];
    for (const line of lines) {
        line.items.sort((a, b) => a.x - b.x);
        let cur = null;
        for (const it of line.items) {
            const blank = !it.str.trim();
            if (blank) {
                if (cur && it.w > 1.2 * it.h) cur = null;          // szeroka "spacja" = przerwa między elementami
                else if (cur) cur.parts.push({ ...it, space: true });
                continue;
            }
            if (cur) {
                const last = cur.parts[cur.parts.length - 1];
                if (it.x - (last.x + last.w) > 1.0 * Math.max(it.h, last.h)) cur = null;
            }
            if (!cur) { cur = { parts: [], page: it.page }; segs.push(cur); }
            cur.parts.push(it);
        }
    }

    for (const s of segs) {
        while (s.parts.length && s.parts[s.parts.length - 1].space) s.parts.pop();
        const txt = s.parts.filter(p => !p.space);
        const main = txt.reduce((a, b) => (b.str.length > a.str.length ? b : a), txt[0]);
        s.x = txt[0].x;
        s.y = Math.max(...txt.map(p => p.y));
        s.h = Math.max(...txt.map(p => p.h));
        s.weight = main.weight;
        s.font = main.font;
        const last = s.parts[s.parts.length - 1];
        s.right = last.x + last.w;

        let text = '', prev = null;
        for (const p of s.parts) {
            if (p.space) { text += ' '; prev = p; continue; }
            if (prev && !prev.space && p.x - (prev.x + prev.w) > 0.25 * p.h && !/\s$/.test(text) && !/^\s/.test(p.str)) text += ' ';
            text += p.str;
            prev = p;
        }
        s.raw = text;
        s.text = text.replace(/\s+/g, ' ').trim();

        // width of the first word (for detecting soft line wraps)
        let fw = 0;
        for (const p of s.parts) {
            if (p.space) break;
            const i = p.str.indexOf(' ');
            if (i === 0) break;
            if (i > 0) { fw += p.w * (i / p.str.length); break; }
            fw += p.w;
        }
        s.firstWordW = fw;
    }
    return segs.filter(s => s.text && !isEmojiOnly(s.text));
}

function groupLines(segs) {
    const sorted = segs.slice().sort((a, b) => a.gy - b.gy || a.x - b.x);
    const lines = [];
    for (const s of sorted) {
        const l = lines[lines.length - 1];
        if (l && Math.abs(l.gy - s.gy) < 0.6 * Math.min(l.h, s.h)) { l.segs.push(s); l.h = Math.max(l.h, s.h); }
        else lines.push({ gy: s.gy, h: s.h, segs: [s] });
    }
    lines.forEach(l => l.segs.sort((a, b) => a.x - b.x));
    return lines;
}

// Was the break between two lines a soft wrap (the next word didn't fit)?
// Koniec zdania + wielka litera traktujemy jako enter (wygląd CV jest i tak identyczny).
function isSoftWrap(prev, next, colRight) {
    if (/[.!?:]$/.test(prev.text) && /^\p{Lu}/u.test(next.text)) return false;
    return prev.right + 0.3 * next.h + next.firstWordW > colRight - 1.5;
}

// ------------------------------------------------------------
// Section parsers
// ------------------------------------------------------------
function parseEntries(segs, kind, ctx) {
    if (!segs.length) return [];
    const colLeft = Math.min(...segs.map(s => s.x));
    const colRight = ctx.mainRight;
    const mid = colLeft + (colRight - colLeft) * 0.55;
    const left = segs.filter(s => s.x < mid);
    const roleCandidates = ctx.weightsKnown ? left.filter(s => s.weight >= 700) : left;
    const roleH = Math.max(...(roleCandidates.length ? roleCandidates : left).map(s => s.h));

    const entries = [];
    let cur = null, last = null, lastSeg = null;

    for (const line of groupLines(segs)) {
        const lineLeft = line.segs.filter(s => s.x < mid);
        const lineRight = line.segs.filter(s => s.x >= mid);
        let startedHere = false;

        for (const s of lineLeft) {
            const isRole = s.h >= roleH * 0.95 && (!ctx.weightsKnown || s.weight >= 700);
            // Bez nazw krojów: firma ma .72rem, opis .71rem, rola .8rem → proporcja 0.9 vs 0.8875
            const ratio = s.h / roleH;
            const isCompany = ctx.weightsKnown
                ? (s.weight >= 500 && s.weight < 700)
                : (ratio > 0.894 && ratio < 0.93 && s.gy - lastSeg.gy < 1.9 * roleH);

            if (isRole) {
                if (cur && last === 'role' && s.gy - lastSeg.gy < 1.9 * s.h && !lineRight.length) {
                    cur.role += ' ' + s.text;
                } else {
                    cur = { role: s.text, company: '', from: '', to: '', more: '' };
                    entries.push(cur);
                    startedHere = true;
                }
                last = 'role';
            } else if (cur && isCompany && (last === 'role' || last === 'company') && !cur.more) {
                cur.company += (cur.company ? ' ' : '') + s.text;
                last = 'company';
            } else {
                if (!cur) { cur = { role: '', company: '', from: '', to: '', more: '' }; entries.push(cur); }
                if (!cur.more) cur.more = s.text;
                else if (kind === 'experience') cur.more += (isSoftWrap(lastSeg, s, colRight) ? ' ' : '\n') + s.text;
                else cur.more += ' ' + s.text;
                last = 'more';
            }
            lastSeg = s;
        }

        for (const s of lineRight) {
            if (!cur || (!startedHere && (cur.from || cur.to))) continue;
            const m = s.text.split(/\s*[–—]\s*/);
            cur.from = (m[0] || '').trim();
            cur.to = (m.slice(1).join(' – ') || '').trim();
        }
    }

    return entries.map(e => {
        const role = e.role === '—' ? '' : e.role;
        return kind === 'experience'
            ? { role, company: e.company, from: e.from, to: e.to, desc: e.more }
            : { school: e.company, degree: role, from: e.from, to: e.to, extra: e.more };
    });
}

function parseAbout(segs, ctx) {
    let out = '', prev = null;
    for (const line of groupLines(segs)) {
        for (const s of line.segs) {
            out += prev ? (isSoftWrap(prev, s, ctx.sideRight) ? ' ' : '\n') + s.text : s.text;
            prev = s;
        }
    }
    return out;
}

function parseSkills(segs, ctx) {
    const isDots = s => /^[●•\s]+$/.test(s.text);
    const bars = segs.some(isDots);
    const sorted = segs.filter(s => !isDots(s)).sort((a, b) => a.gy - b.gy || a.x - b.x);

    if (bars) {
        return {
            mode: 'bars',
            skills: sorted.map(s => ({ name: s.text, level: barLevel(s, ctx) || 3 })),
        };
    }

    const skills = [];
    let prev = null;
    for (const s of sorted) {
        if (prev && Math.abs(s.x - prev.x) < 1.5 && s.gy - prev.gy > 0.5 && s.gy - prev.gy < 1.9 * s.h) {
            skills[skills.length - 1].name += ' ' + s.text;   // chip zawinięty na 2 linie
        } else {
            skills.push({ name: s.text, level: 3 });
        }
        prev = s;
    }
    return { mode: 'chips', skills };
}

// Poziom umiejętności z długości kolorowego paska pod nazwą
function barLevel(seg, ctx) {
    if (!ctx.sample) return null;
    const x0 = ctx.splitX, x1 = ctx.sideRight + 2;
    let best = null;
    for (let dy = 2; dy <= 16; dy += 0.5) {
        let colored = 0, track = 0;
        for (let x = x0; x <= x1; x += 0.5) {
            const c = ctx.sample(seg.page, x, seg.y + dy);
            if (!c) continue;
            if (sat(c) > 50) colored++;
            else if (c[0] < 245 && c[0] > 200 && sat(c) < 25) track++;
        }
        if (colored + track > 20 && (!best || colored + track > best.colored + best.track)) best = { colored, track };
    }
    if (!best) return null;
    return Math.min(5, Math.max(1, Math.round(best.colored / (best.colored + best.track) * 5)));
}

function parseSocial(segs, ctx) {
    const sorted = segs.slice().sort((a, b) => a.gy - b.gy || a.x - b.x);
    const maxH = Math.max(...sorted.map(s => s.h));
    const out = [];
    let cur = null;
    for (const s of sorted) {
        if (s.h >= maxH * 0.95 && (!ctx.weightsKnown || s.weight >= 600)) {
            cur = { seg: s, handle: s.text, sub: null };
            out.push(cur);
        } else if (cur && !cur.sub) {
            cur.sub = s;
        }
    }
    return out.map(e => {
        let platform = '', followers = '';
        const subText = e.sub ? e.sub.text : '';
        const m = subText.match(/^(.*?)\s*obserwujących$/i);
        if (m) followers = m[1].trim();
        else if (PLATFORMS.includes(subText.toLowerCase())) platform = subText.toLowerCase();

        if (!platform) platform = iconPlatform(e, ctx) || 'inne';

        let handle = e.handle;
        if (handle.toLowerCase() === platform) handle = '';
        return { platform, handle, followers };
    });
}

function iconPlatform(e, ctx) {
    if (!ctx.sample) return null;
    const s = e.seg;
    const k = s.h / 11.2;                        // pt na 1px CSS (handle = .7rem = 11.2px)
    const cx = s.x - 24 * k;                      // gap 9px + połowa ikony 15px
    const top = s.y - s.h * 0.8;
    const bottom = e.sub ? e.sub.y + e.sub.h * 0.25 : s.y + s.h * 0.25;
    const cy = (top + bottom) / 2;
    const pts = [[-11, 0], [11, 0], [0, -11], [0, 11], [-10, -10], [10, 10]];
    let best = null;
    for (const [dx, dy] of pts) {
        const c = ctx.sample(s.page, cx + dx * k, cy + dy * k);
        if (c && (!best || dist(c, [255, 255, 255]) > dist(best, [255, 255, 255]))) best = c;
    }
    if (!best || dist(best, [255, 255, 255]) < 60) return null;
    return nearestKey(best, ctx.socialColors).key;
}

function parseLanguages(segs) {
    const out = [];
    for (const line of groupLines(segs)) {
        const [a, b] = line.segs;
        if (!a) continue;
        let level = b ? b.text : '';
        const norm = level.replace(/\s+/g, '').toLowerCase();
        const match = LANG_LEVELS.find(l => l.replace(/\s+/g, '').toLowerCase() === norm);
        if (match) level = match;
        out.push({ lang: a.text, level: level || 'B2' });
    }
    return out;
}

function parseCerts(segs, ctx) {
    const out = [];
    let cur = null, last = null, lastSeg = null;
    const maxH = Math.max(...segs.map(s => s.h));
    for (const line of groupLines(segs)) {
        for (const s of line.segs) {
            const isName = ctx.weightsKnown ? s.weight >= 700 : s.h >= maxH * 0.95;
            if (isName) {
                if (cur && last === 'name' && s.gy - lastSeg.gy < 1.9 * s.h) cur.name += ' ' + s.text;
                else { cur = { name: s.text, issuer: '', date: '' }; out.push(cur); }
                last = 'name';
            } else if (cur) {
                const parts = s.text.split(/\s*·\s*/);
                if (parts.length >= 2) { cur.issuer = parts[0]; cur.date = parts.slice(1).join(' · '); }
                else if (/\d{4}/.test(s.text) && !cur.issuer) cur.date = s.text;
                else cur.issuer = s.text;
                last = 'meta';
            }
            lastSeg = s;
        }
    }
    return out.map(c => ({ ...c, name: c.name === '—' ? '' : c.name }));
}

function parsePortfolio(segs, ctx, images) {
    const sorted = segs.slice().sort((a, b) => a.gy - b.gy || a.x - b.x);
    const maxH = sorted.length ? Math.max(...sorted.map(s => s.h)) : 0;
    const cards = [];
    for (const s of sorted) {
        const isName = ctx.weightsKnown ? s.weight >= 700 : s.h >= maxH * 0.95;
        const col = cards.filter(c => Math.abs(c.x - s.x) < 3 && c.lastGy < s.gy);
        const owner = col.length ? col[col.length - 1] : null;
        if (isName && !(owner && owner.lastKind === 'name' && s.gy - owner.lastGy < 1.9 * s.h)) {
            cards.push({ x: s.x, nameSeg: s, name: s.text, desc: '', lastGy: s.gy, lastKind: 'name' });
        } else if (owner) {
            if (isName) owner.name += ' ' + s.text;
            else owner.desc += (owner.desc ? ' ' : '') + s.text;
            owner.lastGy = s.gy;
            owner.lastKind = isName ? 'name' : 'desc';
        }
    }
    return cards.map(c => {
        const n = c.nameSeg;
        const top = n.y - n.h;
        const img = images
            .filter(im => im.page === n.page && im.w >= 30 && im.h >= 25
                && im.y + im.h <= top + 1 && im.y + im.h > top - 30
                && im.x - 12 < n.x && im.x + im.w > n.x + 5)
            .sort((a, b) => b.w * b.h - a.w * a.h)[0] || null;
        return { name: c.name === 'Projekt' ? '' : c.name, img: '', desc: c.desc, url: '', _img: img };
    });
}

function parseHeader(segs, images) {
    const res = { name: '', title: '', contacts: {}, photo: null };
    if (!segs.length) return res;
    const nameSeg = segs.reduce((a, b) => (b.h > a.h ? b : a));
    res.name = nameSeg.text === 'Twoje Imię i Nazwisko' ? '' : nameSeg.text;

    const below = segs.filter(s => s !== nameSeg && s.gy > nameSeg.gy && s.x >= nameSeg.x - 5)
                      .sort((a, b) => a.gy - b.gy || a.x - b.x);
    if (below.length) {
        const t = below[0];
        const title = looksLetterSpaced(t.raw) ? collapseLetterSpaced(t) : t.text;
        res.title = /^STANOWISKO\s*\/\s*SPECJALIZACJA$/i.test(title) ? '' : title;
        const unknown = [];
        for (const c of below.slice(1)) {
            const v = c.text;
            if (/linkedin\./i.test(v))                                       res.contacts.linkedin = v;
            else if (/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v))                   res.contacts.email = v;
            else if (/^\+?[\d\s()./-]{6,}$/.test(v) && /\d{5,}|\d{3}\s?\d{3}/.test(v)) res.contacts.phone = v;
            else if (/^(https?:\/\/|www\.)\S+$/i.test(v) || /^[\w-]+(\.[\w-]+)+(\/\S*)?$/.test(v)) res.contacts.website = v;
            else unknown.push(v);
        }
        if (unknown.length) res.contacts.location = unknown.join(', ');
    }

    // Zdjęcie: najmniejszy kwadratowy obraz w nagłówku, na lewo od imienia
    // (większe obrazy w tym miejscu to rozmyty cień zdjęcia)
    const headerBottom = Math.max(...segs.map(s => s.y)) + 20;
    res.photo = images
        .filter(im => im.page === 0 && im.y + im.h < headerBottom + 40 && im.x + im.w / 2 < nameSeg.x
            && im.w >= 36 && im.w / im.h > 0.75 && im.w / im.h < 1.33)
        .sort((a, b) => a.w * a.h - b.w * b.h)[0] || null;
    return res;
}

function detectTheme(ctx, themes) {
    if (!ctx.sample) return null;
    for (let i = 0; i < 60; i++) {
        const c = ctx.sample(0, 2 + i, 2 + i);
        if (c && dist(c, [255, 255, 255]) > 80) {
            const map = Object.fromEntries(Object.entries(themes).map(([k, v]) => [k, v.from]));
            const r = nearestKey(c, map);
            return r.d < 90 ? r.key : null;
        }
    }
    return null;
}

// ------------------------------------------------------------
// Main parser
// ------------------------------------------------------------
function parseCv(pages, opts = {}) {
    const { themes = {}, socialColors = {}, blockIds = [] } = opts;
    const sample = pages.some(p => p.canvas) ? makeSampler(pages) : null;

    let offset = 0;
    const segs = [];
    const images = [];
    for (const pg of pages) {
        for (const s of buildSegments(pg.items)) { s.gy = offset + s.y; segs.push(s); }
        for (const im of pg.images) images.push({ ...im, gy: offset + im.y });
        offset += pg.height + 50;
    }

    const weightsKnown = segs.some(s => s.weight !== 400);

    // Section headings
    const headings = segs.filter(s => {
        const norm = s.text.replace(/\s+/g, '').toUpperCase();
        if (!HEADINGS[norm]) return false;
        const spaced = (s.raw.match(/ /g) || []).length >= 2;
        return s.raw === s.raw.toUpperCase() && (spaced || s.weight >= 800 || norm.length <= 6);
    }).map(s => ({ seg: s, id: HEADINGS[s.text.replace(/\s+/g, '').toUpperCase()] }));

    if (!headings.length) throw new Error('Nie rozpoznano sekcji CV — czy to na pewno plik z tego generatora?');

    const p0 = headings.filter(h => h.seg.page === 0);
    const headerLimit = p0.length ? Math.min(...p0.map(h => h.seg.y)) - 10 : -Infinity;
    const headerSegs = segs.filter(s => s.page === 0 && s.y < headerLimit);

    const sideHead = headings.filter(h => SIDEBAR_SECTIONS.has(h.id));
    const pageW = pages[0].width;
    const splitX = sideHead.length ? Math.min(...sideHead.map(h => h.seg.x)) - 12 : pageW * 0.72;

    const headingSet = new Set(headings.map(h => h.seg));
    const body = segs.filter(s => !headingSet.has(s) && !headerSegs.includes(s));
    const mainSegs = body.filter(s => s.x < splitX);
    const sideSegs = body.filter(s => s.x >= splitX);

    const ctx = {
        weightsKnown, sample, splitX,
        mainRight: mainSegs.length ? Math.max(...mainSegs.map(s => s.right)) : splitX,
        sideRight: sideSegs.length ? Math.max(...sideSegs.map(s => s.right)) : pageW,
        socialColors,
    };

    // Assign each segment to the closest heading above it in the same column
    const sections = {};
    const byColumn = (side) => headings.filter(h => (h.seg.x >= splitX) === side).sort((a, b) => a.seg.gy - b.seg.gy);
    for (const [side, list] of [[false, mainSegs], [true, sideSegs]]) {
        const hs = byColumn(side);
        for (const s of list) {
            let sec = null;
            for (const h of hs) if (h.seg.gy < s.gy + 1) sec = h.id;
            if (sec) (sections[sec] = sections[sec] || []).push(s);
        }
    }

    const header = parseHeader(headerSegs, images);
    const skills = parseSkills(sections.skills || [], ctx);
    const portfolio = parsePortfolio(sections.portfolio || [], ctx, images);

    const state = {
        theme: detectTheme(ctx, themes) || undefined,
        skillMode: skills.mode,
        personal: {
            name: header.name, title: header.title,
            email: header.contacts.email || '', phone: header.contacts.phone || '',
            location: header.contacts.location || '', website: header.contacts.website || '',
            linkedin: header.contacts.linkedin || '', photo: '',
        },
        about: parseAbout(sections.about || [], ctx),
        skills: skills.skills,
        experience: parseEntries(sections.experience || [], 'experience', ctx),
        education: parseEntries(sections.education || [], 'education', ctx),
        social: parseSocial(sections.social || [], ctx),
        portfolio: portfolio.map(({ _img, ...p }) => p),
        languages: parseLanguages(sections.languages || []),
        certifications: parseCerts(sections.certifications || [], ctx),
    };
    if (!state.theme) delete state.theme;

    // Kolejność bloków: kolejność w każdej kolumnie z PDF-a, wstawiona w miejsca tej kolumny
    if (blockIds.length) {
        const found = headings.filter(h => h.id !== 'about').sort((a, b) => a.seg.gy - b.seg.gy);
        const order = blockIds.slice();
        for (const side of [false, true]) {
            const slots = order.map((id, i) => [id, i]).filter(([id]) => SIDEBAR_SECTIONS.has(id) === side);
            const seen = found.filter(h => (h.seg.x >= splitX) === side).map(h => h.id);
            const ids = [...new Set(seen), ...slots.map(([id]) => id).filter(id => !seen.includes(id))];
            slots.forEach(([, i], k) => { order[i] = ids[k]; });
        }
        state.blockOrder = order;
        state.blockVisible = Object.fromEntries(blockIds.map(id => [id, true]));
    }

    return {
        state,
        images: {
            photo: header.photo,
            portfolio: portfolio.map(p => p._img),
        },
    };
}

// ------------------------------------------------------------
// Images → Blob (browser)
// ------------------------------------------------------------
async function imageToBlob(pages, ref) {
    const pg = pages[ref.page];
    let canvas = null;
    try {
        const store = ref.id.startsWith('g_') ? pg.pdfPage.commonObjs : pg.pdfPage.objs;
        const obj = await objGet(store, ref.id, 3000);
        if (obj && obj.width && obj.height) {
            canvas = document.createElement('canvas');
            canvas.width = obj.width; canvas.height = obj.height;
            const c = canvas.getContext('2d');
            c.fillStyle = '#fff'; c.fillRect(0, 0, obj.width, obj.height);
            if (obj.bitmap) {
                c.drawImage(obj.bitmap, 0, 0);
            } else if (obj.data && (obj.kind === 2 || obj.kind === 3)) {
                const id = c.createImageData(obj.width, obj.height);
                const src = obj.data, dst = id.data, n = obj.width * obj.height;
                if (obj.kind === 3) dst.set(src.subarray(0, n * 4));
                else for (let i = 0, j = 0; i < n; i++, j += 3) { dst[i * 4] = src[j]; dst[i * 4 + 1] = src[j + 1]; dst[i * 4 + 2] = src[j + 2]; dst[i * 4 + 3] = 255; }
                c.putImageData(id, 0, 0);
            } else canvas = null;
        }
    } catch (e) { canvas = null; }

    // Fallback: wytnij fragment z wyrenderowanej strony
    if (!canvas && pg.canvas) {
        const s = pg.scale;
        canvas = document.createElement('canvas');
        canvas.width = Math.round(ref.w * s); canvas.height = Math.round(ref.h * s);
        canvas.getContext('2d').drawImage(pg.canvas, ref.x * s, ref.y * s, ref.w * s, ref.h * s, 0, 0, canvas.width, canvas.height);
    }
    if (!canvas) return null;
    return new Promise(res => canvas.toBlob(res, 'image/jpeg', 0.92));
}

// ------------------------------------------------------------
// Browser entry point
// ------------------------------------------------------------
let pdfjsPromise = null;
function loadPdfJs() {
    if (root.pdfjsLib) return Promise.resolve(root.pdfjsLib);
    if (!pdfjsPromise) {
        pdfjsPromise = new Promise((resolve, reject) => {
            const s = document.createElement('script');
            s.src = PDFJS_BASE + 'pdf.min.js';
            s.onload = () => {
                root.pdfjsLib.GlobalWorkerOptions.workerSrc = PDFJS_BASE + 'pdf.worker.min.js';
                resolve(root.pdfjsLib);
            };
            s.onerror = () => { pdfjsPromise = null; reject(new Error('Nie udało się wczytać biblioteki PDF')); };
            document.head.appendChild(s);
        });
    }
    return pdfjsPromise;
}

async function readFile(file, opts) {
    const pdfjsLib = await loadPdfJs();
    const data = new Uint8Array(await file.arrayBuffer());
    const { doc, pages } = await extractPdf(pdfjsLib, data, { render: true, scale: 2 });
    const result = parseCv(pages, opts);
    result.imageBlob = ref => (ref ? imageToBlob(pages, ref) : Promise.resolve(null));
    result.dispose = () => { try { doc.destroy(); } catch (e) {} };
    return result;
}

const api = { readFile, extractPdf, parseCv };
if (typeof module !== 'undefined' && module.exports) module.exports = api;
else root.CvImport = api;

})(typeof window !== 'undefined' ? window : globalThis);
