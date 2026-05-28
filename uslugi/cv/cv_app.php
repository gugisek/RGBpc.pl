<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generator CV — Social Media & Dziennikarstwo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=DM+Serif+Display:ital@0;1&family=Playfair+Display:wght@900&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
    <style>
        *{box-sizing:border-box;margin:0;padding:0}
        body{font-family:'Inter',sans-serif;display:flex;flex-direction:column;height:100vh;overflow:hidden;background:#0d0d10}

        /* ---- Layout ---- */
        .app{display:flex;flex:1;overflow:hidden;height:calc(100vh - 52px)}

        /* ---- Editor panel — dark base so cards float ---- */
        .editor{
            width:380px;min-width:380px;height:100%;overflow-y:auto;
            background:#0d0d10;
            padding:8px 10px 32px;
        }

        /* ---- Preview area — dot-grid background ---- */
        .preview-wrap{
            flex:1;height:100%;overflow-y:auto;
            background:#0d0d10;
            background-image:
                radial-gradient(circle, rgba(255,255,255,.055) 1px, transparent 1px);
            background-size:22px 22px;
            display:flex;flex-direction:column;align-items:center;
            padding:2.5rem 1.5rem;
        }

        /* ---- Topbar ---- */
        .topbar{
            height:52px;display:flex;align-items:center;
            padding:0 1rem;gap:10px;
            background:rgba(13,13,16,.92);
            backdrop-filter:blur(28px);-webkit-backdrop-filter:blur(28px);
            border-bottom:1px solid rgba(255,255,255,.06);
            z-index:10;flex-shrink:0;
        }
        .topbar-title{font-weight:700;color:#fff;font-size:13.5px;letter-spacing:-0.03em;flex:1}
        .topbar-title span{
            background:linear-gradient(90deg,#a78bfa,#f472b6);
            -webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;
        }

        /* ---- Theme swatches ---- */
        .swatch{
            width:19px;height:19px;border-radius:50%;cursor:pointer;
            transition:all .2s;flex-shrink:0;
            outline:2px solid transparent;outline-offset:3px;
        }
        .swatch.sel{outline-color:rgba(255,255,255,.55);transform:scale(1.15)}
        .swatch:hover:not(.sel){transform:scale(1.1)}

        /* ---- Topbar buttons ---- */
        .tbtn{
            display:flex;align-items:center;gap:5px;
            padding:7px 15px;border-radius:20px;
            font-size:12px;font-weight:600;cursor:pointer;border:none;
            transition:all .18s;letter-spacing:0.01em;font-family:inherit;white-space:nowrap;
        }
        .tbtn-print{
            background:linear-gradient(135deg,#a855f7,#ec4899);color:#fff;
            box-shadow:0 2px 14px rgba(168,85,247,.45);
        }
        .tbtn-print:hover{box-shadow:0 4px 22px rgba(168,85,247,.65);transform:translateY(-1px)}
        .tbtn-print:active{transform:none;box-shadow:0 1px 8px rgba(168,85,247,.3)}
        .tbtn-reset{
            background:rgba(255,255,255,.06);
            color:rgba(255,255,255,.4);
            border:1px solid rgba(255,255,255,.07);
        }
        .tbtn-reset:hover{color:rgba(255,255,255,.75);background:rgba(255,255,255,.09)}

        /* ============================================================
           EDITOR — floating card sections (Apple/iOS Settings style)
           ============================================================ */

        /* Group label above a card */
        .esec-group-label{
            font-size:10px;font-weight:700;letter-spacing:.09em;
            text-transform:uppercase;color:rgba(255,255,255,.2);
            padding:14px 6px 5px;
        }
        .esec-group-label:first-child{padding-top:6px}

        /* Card container */
        .esec{
            background:rgba(255,255,255,.055);
            border-radius:16px;
            margin-bottom:6px;
            overflow:hidden;
            box-shadow:
                0 1px 0 rgba(255,255,255,.06) inset,
                0 6px 24px rgba(0,0,0,.3),
                0 0 0 1px rgba(255,255,255,.05);
            transition:box-shadow .2s;
        }
        .esec:hover{
            box-shadow:
                0 1px 0 rgba(255,255,255,.07) inset,
                0 8px 32px rgba(0,0,0,.35),
                0 0 0 1px rgba(255,255,255,.07);
        }

        /* Card header */
        .esec-hdr{
            display:flex;align-items:center;gap:10px;
            padding:13px 16px;
            cursor:pointer;user-select:none;
            transition:background .15s;
        }
        .esec-hdr:hover{background:rgba(255,255,255,.03)}
        .esec-hdr .icon{
            font-size:15px;flex-shrink:0;
            width:28px;height:28px;
            display:flex;align-items:center;justify-content:center;
            background:rgba(255,255,255,.06);
            border-radius:8px;
        }
        .esec-hdr .label{font-size:12px;font-weight:600;color:rgba(255,255,255,.72);flex:1}
        .esec-hdr .arrow{
            font-size:8px;color:rgba(255,255,255,.2);
            transition:transform .22s cubic-bezier(.4,0,.2,1);flex-shrink:0;
        }
        .esec-hdr.open .arrow{transform:rotate(90deg)}

        /* Card body */
        .esec-body{
            display:none;
            padding:12px 14px 14px;
            border-top:1px solid rgba(255,255,255,.05);
        }
        .esec-body.open{display:block}

        /* ---- Form inputs ---- */
        .flabel{
            display:block;color:rgba(255,255,255,.28);
            font-size:10px;font-weight:700;letter-spacing:.07em;text-transform:uppercase;
            margin:12px 0 4px;
        }
        .flabel:first-child{margin-top:4px}
        .fin{
            width:100%;
            background:rgba(255,255,255,.06);
            border:1px solid rgba(255,255,255,.09);
            border-radius:10px;padding:8px 11px;
            color:rgba(255,255,255,.88);font-size:12.5px;font-family:inherit;
            transition:all .18s;
        }
        .fin:focus{
            outline:none;
            border-color:rgba(168,85,247,.55);
            background:rgba(168,85,247,.07);
            box-shadow:0 0 0 3px rgba(168,85,247,.14);
        }
        .fin::placeholder{color:rgba(255,255,255,.17)}
        textarea.fin{resize:vertical;min-height:72px}
        select.fin{
            appearance:none;-webkit-appearance:none;
            background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8' fill='none'%3E%3Cpath d='M1 1l5 5 5-5' stroke='rgba(255,255,255,0.3)' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'/%3E%3C/svg%3E");
            background-repeat:no-repeat;background-position:right 10px center;padding-right:28px;
        }
        select.fin option{background:#1e1e24;color:#fff}

        /* ---- Entry sub-cards inside a section ---- */
        .entry{
            background:rgba(0,0,0,.25);
            border:1px solid rgba(255,255,255,.06);
            border-radius:12px;padding:12px;margin-bottom:8px;
        }
        .entry-row{display:grid;grid-template-columns:1fr 1fr;gap:8px}

        /* ---- Add / Delete buttons ---- */
        .btn-add{
            display:flex;align-items:center;justify-content:center;gap:5px;
            background:rgba(255,255,255,.04);
            border:1px dashed rgba(255,255,255,.1);
            color:rgba(255,255,255,.28);
            border-radius:10px;padding:9px 10px;font-size:11px;font-weight:600;
            cursor:pointer;width:100%;margin-top:6px;transition:all .18s;font-family:inherit;
        }
        .btn-add:hover{border-color:#a855f7;color:#a855f7;background:rgba(168,85,247,.06)}
        .btn-del{
            background:none;border:none;color:#f87171;cursor:pointer;
            font-size:16px;float:right;opacity:.3;padding:0;line-height:1;
            font-family:inherit;transition:opacity .18s;
        }
        .btn-del:hover{opacity:1}
        .vis-toggle{
            background:none;border:none;cursor:pointer;
            font-size:13px;padding:0 2px;opacity:.35;
            transition:opacity .18s;line-height:1;flex-shrink:0;
        }
        .vis-toggle:hover{opacity:1}

        /* ---- Block order draggable items ---- */
        .block-item{
            display:flex;align-items:center;gap:9px;
            padding:10px 12px;
            background:rgba(255,255,255,.04);
            border:1px solid rgba(255,255,255,.07);
            border-radius:12px;margin-bottom:5px;
            cursor:grab;user-select:none;
            transition:all .15s;
            box-shadow:0 2px 8px rgba(0,0,0,.2);
        }
        .block-item:hover{
            background:rgba(255,255,255,.07);
            border-color:rgba(255,255,255,.12);
            box-shadow:0 4px 14px rgba(0,0,0,.3);
            transform:translateY(-1px);
        }
        .block-item:active{cursor:grabbing;transform:none}
        .block-item .blabel{font-size:12px;color:rgba(255,255,255,.52);flex:1}
        .sortable-ghost{opacity:.15!important}
        .sortable-chosen{opacity:.92;box-shadow:0 12px 36px rgba(0,0,0,.5)!important;transform:scale(1.01)}

        /* ---- CV Paper ---- */
        .cv-paper{
            width:794px;
            background:#fff;
            box-shadow:0 50px 140px rgba(0,0,0,.75),0 0 0 1px rgba(255,255,255,.05);
            border-radius:8px;
            overflow:hidden;
            flex-shrink:0;
            font-size:13px;
            line-height:1.55;
            color:#18181b;
            -webkit-print-color-adjust:exact;
            print-color-adjust:exact;
            color-adjust:exact;
        }

        /* ---- CV Header ---- */
        .cv-header{
            padding:2.5rem 2.75rem;
            position:relative;
            overflow:hidden;
            -webkit-print-color-adjust:exact;
            print-color-adjust:exact;
        }
        .cv-header::after{
            content:'';position:absolute;
            top:-80px;right:-80px;
            width:320px;height:320px;
            border-radius:50%;
            background:rgba(255,255,255,.07);
            pointer-events:none;
        }
        .cv-header::before{
            content:'';position:absolute;
            bottom:-100px;left:140px;
            width:240px;height:240px;
            border-radius:50%;
            background:rgba(0,0,0,.1);
            pointer-events:none;
        }
        .cv-hdr-inner{position:relative;z-index:1;display:flex;align-items:center;gap:2rem}
        .cv-photo{width:100px;height:100px;border-radius:50%;border:3px solid rgba(255,255,255,.55);object-fit:cover;flex-shrink:0;box-shadow:0 8px 24px rgba(0,0,0,.25)}
        .cv-photo-placeholder{
            width:100px;height:100px;border-radius:50%;
            border:3px solid rgba(255,255,255,.3);
            background:rgba(255,255,255,.12);
            display:flex;align-items:center;justify-content:center;
            font-size:34px;flex-shrink:0;
            -webkit-print-color-adjust:exact;print-color-adjust:exact;
        }
        .cv-hdr-info{flex:1}
        .cv-name{
            font-family:'DM Serif Display',serif;
            font-size:2.4rem;
            font-weight:400;
            font-style:italic;
            color:#fff;
            line-height:1.05;
            letter-spacing:-.01em;
        }
        .cv-title{
            font-size:.67rem;font-weight:700;
            color:rgba(255,255,255,.65);
            margin-top:.5rem;
            letter-spacing:.14em;
            text-transform:uppercase;
        }
        .cv-contacts{display:flex;flex-wrap:wrap;gap:.6rem;margin-top:.9rem}
        .cv-contact{
            display:flex;align-items:center;gap:4px;
            font-size:.67rem;color:rgba(255,255,255,.7);
            font-weight:500;
            background:rgba(255,255,255,.1);
            padding:3px 8px;border-radius:20px;
            -webkit-print-color-adjust:exact;print-color-adjust:exact;
        }
        .cv-contact svg{width:10px;height:10px;flex-shrink:0}

        /* ---- CV Body ---- */
        .cv-body{
            display:grid;grid-template-columns:1fr 215px;
            -webkit-print-color-adjust:exact;print-color-adjust:exact;
        }
        .cv-main{padding:1.75rem 2rem 2.5rem}
        .cv-sidebar{
            padding:1.75rem 1.25rem 2.5rem;
            background:#f7f7fb;
            border-left:1px solid #ededf4;
            -webkit-print-color-adjust:exact;print-color-adjust:exact;
        }

        /* ---- CV Section titles — pill-badge + fading line (rendered inline in JS) ---- */

        /* ---- Experience / Education ---- */
        .cv-exp{display:flex;gap:11px;margin-bottom:16px;padding-bottom:16px;border-bottom:1px solid #f4f4f8}
        .cv-exp:last-child{border-bottom:none;margin-bottom:0;padding-bottom:0}
        .cv-exp-accent{width:3px;min-height:100%;border-radius:3px;flex-shrink:0;align-self:stretch;-webkit-print-color-adjust:exact;print-color-adjust:exact}
        .cv-exp-inner{flex:1;min-width:0}
        .cv-exp-header{display:flex;justify-content:space-between;align-items:flex-start;gap:8px}
        .cv-exp-role{font-weight:700;font-size:.8rem;color:#18181b;letter-spacing:-.01em}
        .cv-exp-company{font-size:.72rem;font-weight:600;margin-top:2px}
        .cv-exp-date{font-size:.61rem;font-weight:700;color:#fff;white-space:nowrap;flex-shrink:0;padding:2px 9px;border-radius:20px;-webkit-print-color-adjust:exact;print-color-adjust:exact}
        .cv-exp-desc{font-size:.71rem;color:#52525b;margin-top:8px;line-height:1.65}

        /* ---- Portfolio grid ---- */
        .portfolio-grid{display:grid;grid-template-columns:repeat(2,1fr);gap:8px;margin-top:6px}

        /* ---- Empty state ---- */
        .cv-empty{color:#d4d4d8;font-size:.7rem;font-style:italic;padding:8px 0}

        /* ---- Empty state ---- */
        .cv-empty{color:#d4d4d8;font-size:.7rem;font-style:italic;padding:8px 0}

        /* ---- Scrollbars ---- */
        .editor::-webkit-scrollbar{width:3px}
        .editor::-webkit-scrollbar-thumb{background:rgba(255,255,255,.08);border-radius:4px}
        .preview-wrap::-webkit-scrollbar{width:5px}
        .preview-wrap::-webkit-scrollbar-thumb{background:rgba(255,255,255,.08);border-radius:4px}

        /* ---- Print ---- */
        @media print{
            *{-webkit-print-color-adjust:exact!important;print-color-adjust:exact!important;color-adjust:exact!important}
            .topbar,.editor{display:none!important}
            body,html{height:auto!important;overflow:visible!important;background:#fff!important}
            .app{height:auto!important;overflow:visible!important;display:block!important}
            .preview-wrap{height:auto!important;overflow:visible!important;padding:0!important;background:#fff!important;display:block!important;align-items:unset!important}
            .cv-paper{width:100%!important;box-shadow:none!important;border-radius:0!important;margin:0!important}
        }
    </style>
</head>
<body>

<!-- TOPBAR -->
<div class="topbar">
    <div class="topbar-title">
        <span style="color:rgba(255,255,255,.25);font-weight:400;margin-right:6px">✦</span>Generator <span>CV</span>
    </div>
    <div style="display:flex;align-items:center;gap:7px">
        <span style="font-size:10px;color:rgba(255,255,255,.2);font-weight:600;letter-spacing:.06em;text-transform:uppercase;margin-right:3px">Styl</span>
        <div class="swatch sel" style="background:linear-gradient(135deg,#a855f7,#ec4899)" data-theme="purple" onclick="setTheme('purple',this)" title="Fioletowy"></div>
        <div class="swatch" style="background:linear-gradient(135deg,#06b6d4,#3b82f6)" data-theme="cyan" onclick="setTheme('cyan',this)" title="Niebieski"></div>
        <div class="swatch" style="background:linear-gradient(135deg,#f59e0b,#ef4444)" data-theme="amber" onclick="setTheme('amber',this)" title="Złoty"></div>
        <div class="swatch" style="background:linear-gradient(135deg,#10b981,#06b6d4)" data-theme="emerald" onclick="setTheme('emerald',this)" title="Zielony"></div>
        <div class="swatch" style="background:linear-gradient(135deg,#f43f5e,#f97316)" data-theme="rose" onclick="setTheme('rose',this)" title="Różowy"></div>
    </div>
    <div style="width:1px;height:22px;background:rgba(255,255,255,.08)"></div>
    <button class="tbtn tbtn-print" onclick="window.print()">
        <svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/></svg>
        Drukuj / PDF
    </button>
    <button class="tbtn tbtn-reset" onclick="resetData()">Reset</button>
    <span id="save-status" style="font-size:11px;font-weight:600;opacity:0;transition:opacity .4s;white-space:nowrap"></span>
</div>

<div class="app">

<!-- EDITOR PANEL -->
<div class="editor" id="editor">

    <!-- Top info card -->
    <div style="background:rgba(255,255,255,.04);border-radius:16px;padding:14px 16px;margin-bottom:6px;margin-top:2px;border:1px solid rgba(255,255,255,.05);box-shadow:0 4px 20px rgba(0,0,0,.25)">
        <div style="font-size:12px;font-weight:700;color:rgba(255,255,255,.6);letter-spacing:-.01em">Edytor CV</div>
        <div style="font-size:10.5px;color:rgba(255,255,255,.22);margin-top:3px;line-height:1.45">Zmiany zapisują się automatycznie w przeglądarce</div>
    </div>

    <div class="esec-group-label">Układ i wygląd</div>

    <!-- Block Order -->
    <div class="esec">
        <div class="esec-hdr open" onclick="toggleSection(this)">
            <span class="icon">⠿</span>
            <span class="label">Kolejność sekcji</span>
            <span class="arrow">▶</span>
        </div>
        <div class="esec-body open">
            <div id="block-order-list"></div>
        </div>
    </div>

    <!-- Skills display mode inside layout group -->
    <div class="esec">
        <div class="esec-hdr" onclick="toggleSection(this)">
            <span class="icon">🎨</span>
            <span class="label">Wygląd umiejętności</span>
            <span class="arrow">▶</span>
        </div>
        <div class="esec-body">
            <div style="font-size:10px;color:rgba(255,255,255,.25);margin-bottom:8px;font-weight:600;letter-spacing:.05em;text-transform:uppercase">Tryb wyświetlania</div>
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:6px">
                <button onclick="setSkillMode('chips')" id="sm-chips" class="tbtn" style="flex:1;justify-content:center;font-size:11px;padding:7px 0;border-radius:10px;background:rgba(255,255,255,.05);color:rgba(255,255,255,.4);border:1px solid rgba(255,255,255,.08)">Tagi</button>
                <button onclick="setSkillMode('bars')" id="sm-bars" class="tbtn" style="flex:1;justify-content:center;font-size:11px;padding:7px 0;border-radius:10px;background:rgba(255,255,255,.05);color:rgba(255,255,255,.4);border:1px solid rgba(255,255,255,.08)">Paski</button>
            </div>
        </div>
    </div>

    <div class="esec-group-label">Dane osobiste</div>

    <!-- Personal Info -->
    <div class="esec">
        <div class="esec-hdr open" onclick="toggleSection(this)">
            <span class="icon">👤</span>
            <span class="label">Profil</span>
            <span class="arrow">▶</span>
        </div>
        <div class="esec-body open">
            <label class="flabel">Imię i nazwisko</label>
            <input class="fin" type="text" id="p_name" placeholder="np. Anna Kowalska" oninput="save()">
            <label class="flabel">Stanowisko / Tytuł zawodowy</label>
            <input class="fin" type="text" id="p_title" placeholder="np. Social Media Manager & Content Creator" oninput="save()">
            <label class="flabel">Zdjęcie profilowe</label>
            <div style="display:flex;align-items:center;gap:12px;margin-bottom:8px">
                <div id="photo-preview"
                     onclick="document.getElementById('photo-file').click()"
                     style="width:64px;height:64px;border-radius:50%;cursor:pointer;
                            border:2px dashed rgba(255,255,255,.18);
                            background:rgba(255,255,255,.05);
                            display:flex;align-items:center;justify-content:center;
                            overflow:hidden;flex-shrink:0;transition:border-color .2s"
                     onmouseenter="this.style.borderColor='#a855f7'"
                     onmouseleave="this.style.borderColor='rgba(255,255,255,.18)'">
                    <img id="photo-img-prev" src="" style="width:100%;height:100%;object-fit:cover;display:none" alt="">
                    <span id="photo-placeholder" style="font-size:22px;opacity:.35">👤</span>
                </div>
                <div style="flex:1">
                    <input type="file" id="photo-file" accept="image/*" style="display:none"
                           onchange="uploadPhoto(this)">
                    <button onclick="document.getElementById('photo-file').click()" class="btn-add" style="margin-top:0;margin-bottom:6px">
                        <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg>
                        Wgraj zdjęcie
                    </button>
                    <input class="fin" type="text" id="p_photo_url" placeholder="lub wklej URL..." oninput="state.personal.photo=this.value;refreshPhotoPreview(this.value);save()" style="font-size:11px"></div>
            </div>
        </div>
    </div>

    <!-- Contact -->
    <div class="esec">
        <div class="esec-hdr" onclick="toggleSection(this)">
            <span class="icon">📬</span>
            <span class="label">Kontakt</span>
            <span class="arrow">▶</span>
        </div>
        <div class="esec-body">
            <label class="flabel">Email</label>
            <input class="fin" type="email" id="p_email" placeholder="anna@example.com" oninput="save()">
            <label class="flabel">Telefon</label>
            <input class="fin" type="text" id="p_phone" placeholder="+48 000 000 000" oninput="save()">
            <label class="flabel">Lokalizacja</label>
            <input class="fin" type="text" id="p_location" placeholder="Warszawa, Polska" oninput="save()">
            <label class="flabel">Strona / Portfolio</label>
            <input class="fin" type="text" id="p_website" placeholder="www.anna-kowalska.pl" oninput="save()">
            <label class="flabel">LinkedIn</label>
            <input class="fin" type="text" id="p_linkedin" placeholder="linkedin.com/in/anna-kowalska" oninput="save()">
        </div>
    </div>

    <!-- About -->
    <div class="esec">
        <div class="esec-hdr" onclick="toggleSection(this)">
            <span class="icon">📝</span>
            <span class="label">O mnie</span>
            <span class="arrow">▶</span>
        </div>
        <div class="esec-body">
            <textarea class="fin" id="about_text" placeholder="Krótki opis — kim jesteś, w czym się specjalizujesz, co Cię wyróżnia..." oninput="save()"></textarea>
        </div>
    </div>

    <div class="esec-group-label">Zawodowe</div>

    <!-- Experience -->
    <div class="esec">
        <div class="esec-hdr" onclick="toggleSection(this)">
            <span class="icon">💼</span>
            <span class="label">Doświadczenie</span>
            <span class="arrow">▶</span>
        </div>
        <div class="esec-body">
            <div id="exp-list"></div>
            <button class="btn-add" onclick="addExp()">
                <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
                Dodaj pozycję
            </button>
        </div>
    </div>

    <!-- Education -->
    <div class="esec">
        <div class="esec-hdr" onclick="toggleSection(this)">
            <span class="icon">🎓</span>
            <span class="label">Edukacja</span>
            <span class="arrow">▶</span>
        </div>
        <div class="esec-body">
            <div id="edu-list"></div>
            <button class="btn-add" onclick="addEdu()">
                <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
                Dodaj uczelnię
            </button>
        </div>
    </div>

    <!-- Skills -->
    <div class="esec">
        <div class="esec-hdr" onclick="toggleSection(this)">
            <span class="icon">⚡</span>
            <span class="label">Umiejętności</span>
            <span class="arrow">▶</span>
        </div>
        <div class="esec-body">
            <div id="skills-list"></div>
            <button class="btn-add" onclick="addSkill()">
                <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
                Dodaj umiejętność
            </button>
        </div>
    </div>

    <div class="esec-group-label">Obecność online</div>

    <!-- Social Media -->
    <div class="esec">
        <div class="esec-hdr" onclick="toggleSection(this)">
            <span class="icon">📲</span>
            <span class="label">Social Media</span>
            <span class="arrow">▶</span>
        </div>
        <div class="esec-body">
            <div id="social-list"></div>
            <button class="btn-add" onclick="addSocial()">
                <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
                Dodaj profil
            </button>
        </div>
    </div>

    <!-- Portfolio -->
    <div class="esec">
        <div class="esec-hdr" onclick="toggleSection(this)">
            <span class="icon">🖼️</span>
            <span class="label">Portfolio</span>
            <span class="arrow">▶</span>
        </div>
        <div class="esec-body">
            <div id="portfolio-list"></div>
            <button class="btn-add" onclick="addPortfolio()">
                <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
                Dodaj projekt
            </button>
        </div>
    </div>

    <div class="esec-group-label">Dodatkowe</div>

    <!-- Languages -->
    <div class="esec">
        <div class="esec-hdr" onclick="toggleSection(this)">
            <span class="icon">🌍</span>
            <span class="label">Języki</span>
            <span class="arrow">▶</span>
        </div>
        <div class="esec-body">
            <div id="lang-list"></div>
            <button class="btn-add" onclick="addLang()">
                <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
                Dodaj język
            </button>
        </div>
    </div>

    <!-- Certifications -->
    <div class="esec">
        <div class="esec-hdr" onclick="toggleSection(this)">
            <span class="icon">🏅</span>
            <span class="label">Certyfikaty</span>
            <span class="arrow">▶</span>
        </div>
        <div class="esec-body">
            <div id="cert-list"></div>
            <button class="btn-add" onclick="addCert()">
                <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
                Dodaj certyfikat
            </button>
        </div>
    </div>

</div><!-- /editor -->

<!-- PREVIEW -->
<div class="preview-wrap" id="preview-wrap">
    <div class="cv-paper" id="cv-paper">
        <!-- rendered by JS -->
    </div>
    <div style="height:2rem"></div>
</div>

</div><!-- /app -->

<script>
// ============================================================
// DATA & CONFIG
// ============================================================
const THEMES = {
    purple: { from: '#a855f7', to: '#ec4899' },
    cyan:   { from: '#06b6d4', to: '#3b82f6' },
    amber:  { from: '#f59e0b', to: '#ef4444' },
    emerald:{ from: '#10b981', to: '#06b6d4' },
    rose:   { from: '#f43f5e', to: '#f97316' },
};

const BLOCK_DEFS = [
    { id: 'experience',  label: '💼 Doświadczenie' },
    { id: 'education',   label: '🎓 Edukacja' },
    { id: 'skills',      label: '⚡ Umiejętności' },
    { id: 'social',      label: '📲 Social Media' },
    { id: 'portfolio',   label: '🖼️ Portfolio' },
    { id: 'languages',   label: '🌍 Języki' },
    { id: 'certifications', label: '🏅 Certyfikaty' },
];

const SOCIAL_COLORS = {
    instagram:'#e1306c', tiktok:'#010101', youtube:'#ff0000',
    facebook:'#1877f2', twitter:'#1da1f2', linkedin:'#0a66c2',
    snapchat:'#fffc00', pinterest:'#e60023', inne:'#6b7280',
};
// Proper SVG brand icons (white, fill="currentColor", viewBox 0 0 24 24)
const SOCIAL_SVG = {
    instagram: `<svg viewBox="0 0 24 24" fill="currentColor" width="15" height="15"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>`,
    tiktok:    `<svg viewBox="0 0 24 24" fill="currentColor" width="15" height="15"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/></svg>`,
    youtube:   `<svg viewBox="0 0 24 24" fill="currentColor" width="15" height="15"><path d="M23.495 6.205a3.007 3.007 0 0 0-2.088-2.088c-1.87-.501-9.396-.501-9.396-.501s-7.507-.01-9.396.501A3.007 3.007 0 0 0 .527 6.205a31.247 31.247 0 0 0-.522 5.805 31.247 31.247 0 0 0 .522 5.783 3.007 3.007 0 0 0 2.088 2.088c1.868.502 9.396.502 9.396.502s7.506 0 9.396-.502a3.007 3.007 0 0 0 2.088-2.088 31.247 31.247 0 0 0 .5-5.783 31.247 31.247 0 0 0-.5-5.805zM9.609 15.601V8.408l6.264 3.602z"/></svg>`,
    facebook:  `<svg viewBox="0 0 24 24" fill="currentColor" width="15" height="15"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>`,
    twitter:   `<svg viewBox="0 0 24 24" fill="currentColor" width="15" height="15"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>`,
    linkedin:  `<svg viewBox="0 0 24 24" fill="currentColor" width="15" height="15"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 0 1-2.063-2.065 2.064 2.064 0 1 1 2.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>`,
    snapchat:  `<svg viewBox="0 0 24 24" fill="currentColor" width="15" height="15"><path d="M12.065.2C8.782.2 5.967 1.812 4.498 4.434c-.697 1.243-.862 2.658-.862 3.87 0 .546.043 1.087.1 1.623l-.02.012c-.285.163-.614.254-.957.254-.374 0-.738-.11-1.054-.317a.523.523 0 0 0-.289-.087c-.27 0-.514.2-.514.488 0 .548.874.936 1.645 1.106.055.012.097.022.134.032a3.84 3.84 0 0 1-.105.686c-.08.327-.38.554-.718.554-.164 0-.333-.046-.5-.137a.518.518 0 0 0-.254-.066c-.373 0-.67.3-.67.672 0 .312.208.582.505.66C2.53 13.76 4.024 14.7 4.34 16.344c.006.03.014.06.022.088.112.42.473.695.907.695.163 0 .327-.041.476-.122.466-.252 1.01-.4 1.563-.4.479 0 .944.117 1.341.338-.044.127-.07.26-.07.398 0 .785.638 1.425 1.422 1.425a1.42 1.42 0 0 0 1.21-.673c.273.04.548.062.822.062.275 0 .55-.022.822-.062.276.428.749.673 1.211.673.784 0 1.421-.64 1.421-1.425 0-.138-.025-.271-.069-.398.397-.221.862-.338 1.341-.338.553 0 1.097.148 1.563.4.149.081.313.122.476.122.434 0 .795-.275.907-.695.008-.028.016-.058.022-.088.316-1.644 1.81-2.583 3.393-2.653.297-.078.505-.348.505-.66 0-.372-.297-.672-.67-.672a.518.518 0 0 0-.254.066c-.167.091-.336.137-.5.137-.338 0-.638-.227-.718-.554a3.84 3.84 0 0 1-.105-.686c.037-.01.079-.02.134-.032.771-.17 1.645-.558 1.645-1.106 0-.288-.244-.488-.514-.488a.523.523 0 0 0-.289.087 1.856 1.856 0 0 1-1.054.317c-.343 0-.672-.091-.957-.254l-.02-.012c.057-.536.1-1.077.1-1.623 0-1.212-.165-2.627-.862-3.87C18.033 1.812 15.218.2 11.935.2h.13z"/></svg>`,
    pinterest: `<svg viewBox="0 0 24 24" fill="currentColor" width="15" height="15"><path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.162-.105-.949-.2-2.405.042-3.441.218-.937 1.407-5.965 1.407-5.965s-.359-.719-.359-1.782c0-1.668.967-2.914 2.171-2.914 1.023 0 1.518.769 1.518 1.69 0 1.029-.655 2.568-.994 3.995-.283 1.194.599 2.169 1.777 2.169 2.133 0 3.772-2.249 3.772-5.495 0-2.873-2.064-4.882-5.012-4.882-3.414 0-5.418 2.561-5.418 5.207 0 1.031.397 2.138.893 2.738a.36.36 0 0 1 .083.345l-.333 1.36c-.053.22-.174.267-.402.161-1.499-.698-2.436-2.889-2.436-4.649 0-3.785 2.75-7.262 7.929-7.262 4.163 0 7.398 2.967 7.398 6.931 0 4.136-2.607 7.464-6.227 7.464-1.216 0-2.359-.632-2.75-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24 12.017 24c6.624 0 11.99-5.367 11.99-11.986C24.007 5.367 18.641 0 12.017 0z"/></svg>`,
    inne:      `<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="15" height="15"><path stroke-linecap="round" stroke-linejoin="round" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/></svg>`,
};

let state = defaultState();

function defaultState() {
    return {
        theme: 'purple',
        skillMode: 'chips',
        blockOrder: BLOCK_DEFS.map(b => b.id),
        blockVisible: Object.fromEntries(BLOCK_DEFS.map(b => [b.id, true])),
        personal: { name:'', title:'', email:'', phone:'', location:'', website:'', linkedin:'', photo:'' },
        about: '',
        skills: [],
        experience: [],
        education: [],
        social: [],
        portfolio: [],
        languages: [],
        certifications: [],
    };
}

function mergeState(parsed) {
    const def = defaultState();
    return {
        ...def, ...parsed,
        personal:     { ...def.personal,     ...(parsed.personal     || {}) },
        blockOrder:   parsed.blockOrder   || def.blockOrder,
        blockVisible: { ...def.blockVisible, ...(parsed.blockVisible || {}) },
    };
}

function loadStateLocal() {
    try {
        const raw = localStorage.getItem('cv_state_v2');
        if (raw) return mergeState(JSON.parse(raw));
    } catch(e) {}
    return null;
}

async function loadStateServer() {
    try {
        const r = await fetch('load.php');
        if (!r.ok) return null;
        const text = await r.text();
        if (!text || text === 'null' || text === '{}') return null;
        return mergeState(JSON.parse(text));
    } catch(e) { return null; }
}

function showSaveStatus(msg, ok = true) {
    const el = document.getElementById('save-status');
    if (!el) return;
    el.textContent = msg;
    el.style.color = ok ? '#4ade80' : '#f87171';
    el.style.opacity = '1';
    clearTimeout(el._t);
    el._t = setTimeout(() => { el.style.opacity = '0'; }, 2200);
}

function save() {
    collectFromForm();
    localStorage.setItem('cv_state_v2', JSON.stringify(state));
    renderCV();
    clearTimeout(window._saveTimer);
    window._saveTimer = setTimeout(saveToServer, 700);
}

async function saveToServer() {
    try {
        const r = await fetch('save.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(state),
        });
        if (r.ok) showSaveStatus('Zapisano ✓');
        else       showSaveStatus('Błąd zapisu ✗', false);
    } catch(e) {
        showSaveStatus('Błąd ✗', false);
    }
}

async function resetData() {
    if (!confirm('Wyczyścić wszystkie dane CV?')) return;
    state = defaultState();
    localStorage.removeItem('cv_state_v2');
    initForm();
    renderCV();
    await saveToServer();
}

// ============================================================
// IMAGE UPLOAD
// ============================================================
async function uploadImage(inputEl, onSuccess) {
    const file = inputEl.files[0];
    if (!file) return;
    const fd = new FormData();
    fd.append('img', file);
    showSaveStatus('Przesyłam...');
    try {
        const r = await fetch('upload.php', { method: 'POST', body: fd });
        const data = await r.json();
        if (data.url) {
            onSuccess(data.url);
            showSaveStatus('Przesłano ✓');
        } else {
            showSaveStatus('Błąd: ' + (data.error || '?'), false);
        }
    } catch(e) { showSaveStatus('Błąd przesyłania ✗', false); }
}

function uploadPhoto(inputEl) {
    uploadImage(inputEl, url => {
        state.personal.photo = url;
        document.getElementById('p_photo_url').value = url;
        refreshPhotoPreview(url);
        save();
    });
}

function uploadPortfolioImg(inputEl, idx) {
    uploadImage(inputEl, url => {
        state.portfolio[idx].img = url;
        const urlIn = document.getElementById('port-url-' + idx);
        const prev  = document.getElementById('port-prev-' + idx);
        if (urlIn) urlIn.value = url;
        if (prev)  { prev.src = url; prev.style.display = 'block'; }
        save();
    });
}

function refreshPhotoPreview(url) {
    const img = document.getElementById('photo-img-prev');
    const ph  = document.getElementById('photo-placeholder');
    if (!img) return;
    if (url) {
        img.src = url;
        img.style.display = 'block';
        if (ph) ph.style.display = 'none';
    } else {
        img.style.display = 'none';
        if (ph) ph.style.display = 'flex';
    }
}

// ============================================================
// THEME
// ============================================================
function setTheme(name, el) {
    state.theme = name;
    document.querySelectorAll('.swatch').forEach(s => s.classList.remove('sel'));
    el.classList.add('sel');
    save();
}

// ============================================================
// EDITOR SECTIONS TOGGLE
// ============================================================
function toggleSection(hdr) {
    hdr.classList.toggle('open');
    const body = hdr.nextElementSibling;
    body.classList.toggle('open');
}

// ============================================================
// SKILL MODE
// ============================================================
function setSkillMode(mode) {
    state.skillMode = mode;
    const activeStyle = 'background:linear-gradient(135deg,#a855f7,#ec4899);color:#fff;border-color:transparent;box-shadow:0 2px 12px rgba(168,85,247,.4)';
    const inactiveStyle = 'background:rgba(255,255,255,.05);color:rgba(255,255,255,.4);border:1px solid rgba(255,255,255,.08)';
    document.getElementById('sm-chips').style.cssText += ';' + (mode === 'chips' ? activeStyle : inactiveStyle);
    document.getElementById('sm-bars').style.cssText  += ';' + (mode === 'bars'  ? activeStyle : inactiveStyle);
    save();
}

// ============================================================
// BLOCK ORDER & VISIBILITY
// ============================================================
function renderBlockOrder() {
    const list = document.getElementById('block-order-list');
    list.innerHTML = '';
    state.blockOrder.forEach(id => {
        const def = BLOCK_DEFS.find(b => b.id === id);
        if (!def) return;
        const vis = state.blockVisible[id] !== false;
        const div = document.createElement('div');
        div.className = 'block-item';
        div.dataset.id = id;
        div.innerHTML = `
            <svg width="14" height="14" fill="currentColor" viewBox="0 0 24 24" style="color:#444;flex-shrink:0"><path d="M3 8h18M3 16h18" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" fill="none"/></svg>
            <span class="blabel">${def.label}</span>
            <button class="vis-toggle" onclick="toggleBlock('${id}',this)" title="${vis ? 'Ukryj' : 'Pokaż'}">${vis ? '👁️' : '🙈'}</button>
        `;
        list.appendChild(div);
    });

    if (window._sortableBlocks) window._sortableBlocks.destroy();
    window._sortableBlocks = Sortable.create(list, {
        animation: 150,
        ghostClass: 'sortable-ghost',
        chosenClass: 'sortable-chosen',
        handle: 'svg',
        onEnd() {
            const items = list.querySelectorAll('.block-item');
            state.blockOrder = Array.from(items).map(el => el.dataset.id);
            save();
        }
    });
}

function toggleBlock(id, btn) {
    state.blockVisible[id] = !state.blockVisible[id];
    btn.textContent = state.blockVisible[id] ? '👁️' : '🙈';
    save();
}

// ============================================================
// DYNAMIC ENTRY LISTS — Skills
// ============================================================
function renderSkillsList() {
    const list = document.getElementById('skills-list');
    list.innerHTML = '';
    state.skills.forEach((s, i) => {
        const d = document.createElement('div');
        d.className = 'entry';
        d.style.display = 'flex'; d.style.gap = '8px'; d.style.alignItems = 'center';
        d.innerHTML = `
            <input class="fin" type="text" placeholder="Umiejętność" value="${esc(s.name)}" oninput="state.skills[${i}].name=this.value;save()" style="flex:1">
            <select class="fin" onchange="state.skills[${i}].level=+this.value;save()" style="width:80px">
                ${[1,2,3,4,5].map(n=>`<option value="${n}" ${s.level===n?'selected':''}>${n}/5</option>`).join('')}
            </select>
            <button class="btn-del" onclick="state.skills.splice(${i},1);renderSkillsList();save()">×</button>
        `;
        list.appendChild(d);
    });
}

function addSkill() {
    state.skills.push({ name: '', level: 3 });
    renderSkillsList();
    save();
}

// ============================================================
// Experience
// ============================================================
function renderExpList() {
    const list = document.getElementById('exp-list');
    list.innerHTML = '';
    state.experience.forEach((e, i) => {
        const d = document.createElement('div');
        d.className = 'entry';
        d.innerHTML = `
            <button class="btn-del" onclick="state.experience.splice(${i},1);renderExpList();save()">×</button>
            <label class="flabel">Stanowisko</label>
            <input class="fin" type="text" placeholder="np. Social Media Manager" value="${esc(e.role)}" oninput="state.experience[${i}].role=this.value;save()">
            <label class="flabel">Firma / Marka</label>
            <input class="fin" type="text" placeholder="np. Agencja XYZ" value="${esc(e.company)}" oninput="state.experience[${i}].company=this.value;save()">
            <div class="entry-row" style="margin-top:6px">
                <div><label class="flabel" style="margin-top:0">Od</label><input class="fin" type="text" placeholder="01/2023" value="${esc(e.from)}" oninput="state.experience[${i}].from=this.value;save()"></div>
                <div><label class="flabel" style="margin-top:0">Do</label><input class="fin" type="text" placeholder="Obecnie" value="${esc(e.to)}" oninput="state.experience[${i}].to=this.value;save()"></div>
            </div>
            <label class="flabel">Opis / Osiągnięcia</label>
            <textarea class="fin" placeholder="Co robiłaś? Jakie osiągnięcia? Liczby, efekty..." oninput="state.experience[${i}].desc=this.value;save()" style="min-height:60px">${esc(e.desc)}</textarea>
        `;
        list.appendChild(d);
    });
}

function addExp() {
    state.experience.push({ role:'', company:'', from:'', to:'', desc:'' });
    renderExpList();
    save();
}

// ============================================================
// Education
// ============================================================
function renderEduList() {
    const list = document.getElementById('edu-list');
    list.innerHTML = '';
    state.education.forEach((e, i) => {
        const d = document.createElement('div');
        d.className = 'entry';
        d.innerHTML = `
            <button class="btn-del" onclick="state.education.splice(${i},1);renderEduList();save()">×</button>
            <label class="flabel">Uczelnia / Szkoła</label>
            <input class="fin" type="text" placeholder="np. Uniwersytet Warszawski" value="${esc(e.school)}" oninput="state.education[${i}].school=this.value;save()">
            <label class="flabel">Kierunek / Tytuł</label>
            <input class="fin" type="text" placeholder="np. Dziennikarstwo i Social Media" value="${esc(e.degree)}" oninput="state.education[${i}].degree=this.value;save()">
            <div class="entry-row" style="margin-top:6px">
                <div><label class="flabel" style="margin-top:0">Od</label><input class="fin" type="text" placeholder="2020" value="${esc(e.from)}" oninput="state.education[${i}].from=this.value;save()"></div>
                <div><label class="flabel" style="margin-top:0">Do</label><input class="fin" type="text" placeholder="2024" value="${esc(e.to)}" oninput="state.education[${i}].to=this.value;save()"></div>
            </div>
            <label class="flabel">Dodatkowe info</label>
            <input class="fin" type="text" placeholder="np. Specjalizacja w marketingu cyfrowym" value="${esc(e.extra)}" oninput="state.education[${i}].extra=this.value;save()">
        `;
        list.appendChild(d);
    });
}

function addEdu() {
    state.education.push({ school:'', degree:'', from:'', to:'', extra:'' });
    renderEduList();
    save();
}

// ============================================================
// Social Media
// ============================================================
function renderSocialList() {
    const list = document.getElementById('social-list');
    list.innerHTML = '';
    state.social.forEach((s, i) => {
        const d = document.createElement('div');
        d.className = 'entry';
        const platforms = ['instagram','tiktok','youtube','facebook','twitter','linkedin','snapchat','pinterest','inne'];
        d.innerHTML = `
            <button class="btn-del" onclick="state.social.splice(${i},1);renderSocialList();save()">×</button>
            <label class="flabel">Platforma</label>
            <select class="fin" onchange="state.social[${i}].platform=this.value;save()">
                ${platforms.map(p=>`<option value="${p}" ${s.platform===p?'selected':''}>${p.charAt(0).toUpperCase()+p.slice(1)}</option>`).join('')}
            </select>
            <label class="flabel">Nazwa profilu / @handle</label>
            <input class="fin" type="text" placeholder="@twojnick" value="${esc(s.handle)}" oninput="state.social[${i}].handle=this.value;save()">
            <label class="flabel">Liczba obserwujących (opcjonalne)</label>
            <input class="fin" type="text" placeholder="np. 12 500" value="${esc(s.followers)}" oninput="state.social[${i}].followers=this.value;save()">
        `;
        list.appendChild(d);
    });
}

function addSocial() {
    state.social.push({ platform:'instagram', handle:'', followers:'' });
    renderSocialList();
    save();
}

// ============================================================
// Portfolio
// ============================================================
function renderPortfolioList() {
    const list = document.getElementById('portfolio-list');
    list.innerHTML = '';
    state.portfolio.forEach((p, i) => {
        const d = document.createElement('div');
        d.className = 'entry';
        d.innerHTML = `
            <button class="btn-del" onclick="state.portfolio.splice(${i},1);renderPortfolioList();save()">×</button>
            <label class="flabel">Nazwa projektu</label>
            <input class="fin" type="text" placeholder="np. Kampania influencer dla XYZ" value="${esc(p.name)}" oninput="state.portfolio[${i}].name=this.value;save()">
            <label class="flabel">Obraz projektu</label>
            <div style="display:flex;gap:8px;align-items:center;margin-bottom:6px">
                ${p.img ? `<img id="port-prev-${i}" src="${esc(p.img)}" style="width:56px;height:40px;object-fit:cover;border-radius:6px;flex-shrink:0;border:1px solid rgba(255,255,255,.08)" onerror="this.style.display='none'">` : `<div id="port-prev-${i}" style="width:56px;height:40px;border-radius:6px;background:rgba(255,255,255,.05);border:1px dashed rgba(255,255,255,.1);display:flex;align-items:center;justify-content:center;font-size:16px;flex-shrink:0">🎨</div>`}
                <div style="flex:1">
                    <input type="file" id="port-file-${i}" accept="image/*" style="display:none" onchange="uploadPortfolioImg(this,${i})">
                    <button onclick="document.getElementById('port-file-${i}').click()" class="btn-add" style="margin-top:0;margin-bottom:5px;padding:5px 8px;font-size:10px">
                        <svg width="10" height="10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg>
                        Wgraj
                    </button>
                    <input class="fin" id="port-url-${i}" type="text" placeholder="lub wklej URL..." value="${esc(p.img)}" oninput="state.portfolio[${i}].img=this.value;save()" style="font-size:11px">
                </div>
            </div>
            <label class="flabel">Krótki opis</label>
            <input class="fin" type="text" placeholder="np. Wzrost zasięgu o 300%" value="${esc(p.desc)}" oninput="state.portfolio[${i}].desc=this.value;save()">
            <label class="flabel">Link (opcjonalne)</label>
            <input class="fin" type="text" placeholder="https://..." value="${esc(p.url)}" oninput="state.portfolio[${i}].url=this.value;save()">
        `;
        list.appendChild(d);
    });
}

function addPortfolio() {
    state.portfolio.push({ name:'', img:'', desc:'', url:'' });
    renderPortfolioList();
    save();
}

// ============================================================
// Languages
// ============================================================
function renderLangList() {
    const list = document.getElementById('lang-list');
    list.innerHTML = '';
    const levels = ['A1','A2','B1','B2','C1','C2','Native / Ojczysty'];
    state.languages.forEach((l, i) => {
        const d = document.createElement('div');
        d.className = 'entry';
        d.style.display = 'flex'; d.style.gap = '8px'; d.style.alignItems = 'center';
        d.innerHTML = `
            <input class="fin" type="text" placeholder="Język" value="${esc(l.lang)}" oninput="state.languages[${i}].lang=this.value;save()" style="flex:1">
            <select class="fin" onchange="state.languages[${i}].level=this.value;save()" style="width:120px">
                ${levels.map(lv=>`<option value="${lv}" ${l.level===lv?'selected':''}>${lv}</option>`).join('')}
            </select>
            <button class="btn-del" onclick="state.languages.splice(${i},1);renderLangList();save()">×</button>
        `;
        list.appendChild(d);
    });
}

function addLang() {
    state.languages.push({ lang:'', level:'B2' });
    renderLangList();
    save();
}

// ============================================================
// Certifications
// ============================================================
function renderCertList() {
    const list = document.getElementById('cert-list');
    list.innerHTML = '';
    state.certifications.forEach((c, i) => {
        const d = document.createElement('div');
        d.className = 'entry';
        d.innerHTML = `
            <button class="btn-del" onclick="state.certifications.splice(${i},1);renderCertList();save()">×</button>
            <label class="flabel">Nazwa certyfikatu</label>
            <input class="fin" type="text" placeholder="np. Meta Blueprint Social Media" value="${esc(c.name)}" oninput="state.certifications[${i}].name=this.value;save()">
            <div class="entry-row" style="margin-top:6px">
                <div><label class="flabel" style="margin-top:0">Wydawca</label><input class="fin" type="text" placeholder="np. Google" value="${esc(c.issuer)}" oninput="state.certifications[${i}].issuer=this.value;save()"></div>
                <div><label class="flabel" style="margin-top:0">Data</label><input class="fin" type="text" placeholder="2024" value="${esc(c.date)}" oninput="state.certifications[${i}].date=this.value;save()"></div>
            </div>
        `;
        list.appendChild(d);
    });
}

function addCert() {
    state.certifications.push({ name:'', issuer:'', date:'' });
    renderCertList();
    save();
}

// ============================================================
// COLLECT FORM → STATE
// ============================================================
function collectFromForm() {
    const p = state.personal;
    p.name     = document.getElementById('p_name')?.value || '';
    p.title    = document.getElementById('p_title')?.value || '';
    p.email    = document.getElementById('p_email')?.value || '';
    p.phone    = document.getElementById('p_phone')?.value || '';
    p.location = document.getElementById('p_location')?.value || '';
    p.website  = document.getElementById('p_website')?.value || '';
    p.linkedin = document.getElementById('p_linkedin')?.value || '';
    p.photo    = document.getElementById('p_photo_url')?.value || '';
    state.about = document.getElementById('about_text')?.value || '';
}

// ============================================================
// FILL FORM FROM STATE
// ============================================================
function fillForm() {
    const p = state.personal;
    document.getElementById('p_name').value     = p.name;
    document.getElementById('p_title').value    = p.title;
    document.getElementById('p_email').value    = p.email;
    document.getElementById('p_phone').value    = p.phone;
    document.getElementById('p_location').value = p.location;
    document.getElementById('p_website').value  = p.website;
    document.getElementById('p_linkedin').value = p.linkedin;
    const urlEl = document.getElementById('p_photo_url');
    if (urlEl) urlEl.value = p.photo;
    refreshPhotoPreview(p.photo);
    document.getElementById('about_text').value = state.about;
}

// ============================================================
// RENDER CV
// ============================================================
function renderCV() {
    const theme = THEMES[state.theme] || THEMES.purple;
    const p = state.personal;

    // Header
    const photo = p.photo
        ? `<img src="${esc(p.photo)}" class="cv-photo" alt="foto" onerror="this.style.display='none'">`
        : `<div class="cv-photo-placeholder">✨</div>`;

    const contacts = [
        p.email    && `<span class="cv-contact"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>${esc(p.email)}</span>`,
        p.phone    && `<span class="cv-contact"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>${esc(p.phone)}</span>`,
        p.location && `<span class="cv-contact"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>${esc(p.location)}</span>`,
        p.website  && `<span class="cv-contact"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/></svg>${esc(p.website)}</span>`,
        p.linkedin && `<span class="cv-contact"><svg fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>${esc(p.linkedin)}</span>`,
    ].filter(Boolean).join('');

    // Build ordered sections
    const sectionRenderers = {
        experience:     renderExpSection,
        education:      renderEduSection,
        skills:         renderSkillsSection,
        social:         renderSocialSection,
        portfolio:      renderPortfolioSection,
        languages:      renderLangSection,
        certifications: renderCertSection,
    };

    // Split blocks: main (left) vs sidebar (right)
    // Social, Languages, Certifications → sidebar; rest → main
    const sidebarBlocks = new Set(['social','languages','certifications','skills']);
    let mainHTML = '';
    let sidebarHTML = '';

    // About always first in sidebar
    if (state.about && state.about.trim()) {
        sidebarHTML += renderAbout(theme);
    }

    state.blockOrder.forEach(id => {
        if (!state.blockVisible[id]) return;
        const fn = sectionRenderers[id];
        if (!fn) return;
        const html = fn(theme);
        if (!html) return;
        if (sidebarBlocks.has(id)) {
            sidebarHTML += html;
        } else {
            mainHTML += html;
        }
    });

    const cvHTML = `
        <div class="cv-header" style="background:linear-gradient(135deg,${theme.from},${theme.to});padding-bottom:3.25rem">
            <div class="cv-hdr-inner">
                ${photo}
                <div class="cv-hdr-info">
                    <div class="cv-name">${esc(p.name) || '<span style="opacity:.35">Twoje Imię i Nazwisko</span>'}</div>
                    <div class="cv-title">${esc(p.title) || '<span style="opacity:.3">Stanowisko / Specjalizacja</span>'}</div>
                    ${contacts ? `<div class="cv-contacts">${contacts}</div>` : ''}
                </div>
            </div>
            <svg viewBox="0 0 794 48" preserveAspectRatio="none"
                 style="position:absolute;bottom:0;left:0;width:100%;height:48px;display:block;-webkit-print-color-adjust:exact;print-color-adjust:exact"
                 xmlns="http://www.w3.org/2000/svg">
                <path d="M0,16 C160,52 320,0 480,24 C600,44 700,8 794,28 L794,48 L0,48 Z" fill="#ffffff"/>
            </svg>
        </div>
        <div class="cv-body">
            <div class="cv-main">${mainHTML || '<p class="cv-empty" style="margin-top:1rem">Dodaj doświadczenie i edukację w panelu po lewej.</p>'}</div>
            <div class="cv-sidebar">${sidebarHTML || '<p class="cv-empty">Dodaj umiejętności, języki i social media.</p>'}</div>
        </div>
    `;

    document.getElementById('cv-paper').innerHTML = cvHTML;
}

// ============================================================
// SECTION TITLE — pill badge + fading gradient line
// ============================================================
function secTitle(label, theme, mt = '20px') {
    const pca = '-webkit-print-color-adjust:exact;print-color-adjust:exact';
    return `
        <div style="display:flex;align-items:center;gap:8px;margin-top:${mt};margin-bottom:13px;${pca}">
            <span style="
                background:linear-gradient(135deg,${theme.from},${theme.to});
                color:#fff;border-radius:30px;
                padding:3px 13px;
                font-size:.54rem;font-weight:800;letter-spacing:.12em;text-transform:uppercase;
                white-space:nowrap;flex-shrink:0;
                box-shadow:0 2px 10px ${theme.from}40;
                ${pca}
            ">${label}</span>
            <div style="flex:1;height:1px;background:linear-gradient(90deg,${theme.from}45,transparent);${pca}"></div>
        </div>`;
}

// ============================================================
// RENDER FUNCTIONS
// ============================================================
function renderAbout(theme) {
    return secTitle('O mnie', theme, '0')
        + `<p style="font-size:.71rem;color:#52525b;line-height:1.7">${esc(state.about).replace(/\n/g,'<br>')}</p>`;
}

function renderExpSection(theme) {
    if (!state.experience.length) return '';
    const pca = '-webkit-print-color-adjust:exact;print-color-adjust:exact';
    const items = state.experience.map(e => `
        <div class="cv-exp">
            <div class="cv-exp-accent" style="background:linear-gradient(to bottom,${theme.from},${theme.to}50);${pca}"></div>
            <div class="cv-exp-inner">
                <div class="cv-exp-header">
                    <div>
                        <div class="cv-exp-role">${esc(e.role) || '—'}</div>
                        <div class="cv-exp-company" style="color:${theme.from}">${esc(e.company)}</div>
                    </div>
                    ${e.from||e.to ? `<div class="cv-exp-date" style="background:linear-gradient(135deg,${theme.from},${theme.to});${pca}">${esc(e.from)}${e.from||e.to?' – ':''}${esc(e.to)}</div>` : ''}
                </div>
                ${e.desc ? `<div class="cv-exp-desc">${esc(e.desc).replace(/\n/g,'<br>')}</div>` : ''}
            </div>
        </div>`).join('');
    return secTitle('Doświadczenie', theme) + items;
}

function renderEduSection(theme) {
    if (!state.education.length) return '';
    const pca = '-webkit-print-color-adjust:exact;print-color-adjust:exact';
    const items = state.education.map(e => `
        <div class="cv-exp">
            <div class="cv-exp-accent" style="background:linear-gradient(to bottom,${theme.from},${theme.to}50);${pca}"></div>
            <div class="cv-exp-inner">
                <div class="cv-exp-header">
                    <div>
                        <div class="cv-exp-role">${esc(e.degree) || '—'}</div>
                        <div class="cv-exp-company" style="color:${theme.from}">${esc(e.school)}</div>
                        ${e.extra ? `<div style="font-size:.65rem;color:#a1a1aa;margin-top:2px">${esc(e.extra)}</div>` : ''}
                    </div>
                    ${e.from||e.to ? `<div class="cv-exp-date" style="background:linear-gradient(135deg,${theme.from},${theme.to});${pca}">${esc(e.from)}${e.from||e.to?' – ':''}${esc(e.to)}</div>` : ''}
                </div>
            </div>
        </div>`).join('');
    return secTitle('Edukacja', theme) + items;
}

function renderSkillsSection(theme) {
    if (!state.skills.length) return '';
    const pca = '-webkit-print-color-adjust:exact;print-color-adjust:exact';
    let content = '';
    if (state.skillMode === 'chips') {
        content = `<div style="display:flex;flex-wrap:wrap;gap:4px;margin-top:2px">${state.skills.map(s =>
            `<span style="
                background:linear-gradient(135deg,${theme.from}18,${theme.to}10);
                color:${theme.from};
                border:1px solid ${theme.from}35;
                border-radius:20px;padding:3px 11px;
                font-size:.63rem;font-weight:700;
                ${pca}
            ">${esc(s.name)}</span>`
        ).join('')}</div>`;
    } else {
        const dots = n => '●'.repeat(n) + '<span style="opacity:.2">' + '●'.repeat(5-n) + '</span>';
        content = state.skills.map(s => `
            <div style="margin-bottom:9px">
                <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:5px">
                    <span style="font-size:.69rem;font-weight:600;color:#18181b">${esc(s.name)}</span>
                    <span style="font-size:.6rem;letter-spacing:2px;color:${theme.from};${pca}">${dots(s.level)}</span>
                </div>
                <div style="height:5px;background:#ebebf0;border-radius:10px;overflow:hidden;${pca}">
                    <div style="height:100%;width:${s.level*20}%;background:linear-gradient(90deg,${theme.from},${theme.to});border-radius:10px;${pca}"></div>
                </div>
            </div>`).join('');
    }
    return secTitle('Umiejętności', theme) + content;
}

function renderSocialSection(theme) {
    if (!state.social.length) return '';
    const pca = '-webkit-print-color-adjust:exact;print-color-adjust:exact';
    const items = state.social.map(s => {
        const color = SOCIAL_COLORS[s.platform] || '#6b7280';
        const svg   = SOCIAL_SVG[s.platform]    || SOCIAL_SVG.inne;
        return `
            <div style="
                display:flex;align-items:center;gap:9px;
                background:${color}12;
                border:1px solid ${color}28;
                border-radius:11px;padding:8px 11px;
                margin-bottom:5px;
                ${pca}
            ">
                <div style="
                    width:30px;height:30px;border-radius:8px;flex-shrink:0;
                    background:${color};
                    display:flex;align-items:center;justify-content:center;
                    color:#fff;
                    box-shadow:0 2px 8px ${color}55;
                    ${pca}
                ">${svg}</div>
                <div style="min-width:0;flex:1">
                    <div style="font-weight:700;font-size:.7rem;color:#18181b;overflow:hidden;text-overflow:ellipsis;white-space:nowrap">
                        ${esc(s.handle) || s.platform}
                    </div>
                    <div style="font-size:.6rem;margin-top:1px;${s.followers ? `color:${color};font-weight:700;${pca}` : 'color:#aaa;text-transform:capitalize'}">
                        ${s.followers ? esc(s.followers) + ' obserwujących' : s.platform}
                    </div>
                </div>
            </div>`;
    }).join('');
    return secTitle('Social Media', theme) + `<div style="margin-top:2px">${items}</div>`;
}

function renderPortfolioSection(theme) {
    if (!state.portfolio.length) return '';
    const pca = '-webkit-print-color-adjust:exact;print-color-adjust:exact';
    const cards = state.portfolio.map(p => `
        <div style="border-radius:12px;overflow:hidden;border:1px solid #eeeef5;box-shadow:0 2px 10px rgba(0,0,0,.06);${pca}">
            ${p.img
                ? `<img src="${esc(p.img)}" style="width:100%;height:76px;object-fit:cover;display:block;${pca}" alt="${esc(p.name)}" onerror="this.style.display='none'">`
                : `<div style="width:100%;height:76px;background:linear-gradient(135deg,${theme.from}18,${theme.to}10);display:flex;align-items:center;justify-content:center;font-size:26px;${pca}">🎨</div>`
            }
            <div style="padding:8px 10px;background:#fff;${pca}">
                <div style="font-weight:700;font-size:.68rem;color:#18181b">${esc(p.name) || 'Projekt'}</div>
                ${p.desc ? `<div style="font-size:.61rem;color:#a1a1aa;margin-top:2px;line-height:1.4">${esc(p.desc)}</div>` : ''}
            </div>
        </div>`).join('');
    return secTitle('Portfolio', theme) + `<div class="portfolio-grid">${cards}</div>`;
}

function renderLangSection(theme) {
    if (!state.languages.length) return '';
    const pca = '-webkit-print-color-adjust:exact;print-color-adjust:exact';
    const LC = { 'C2':'#10b981','C1':'#3b82f6','B2':'#a855f7','B1':'#f59e0b','A2':'#f97316','A1':'#ef4444','Native / Ojczysty':'#ec4899' };
    const items = state.languages.map(l => {
        const c = LC[l.level] || '#888';
        return `
            <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:7px">
                <span style="font-size:.72rem;font-weight:600;color:#18181b">${esc(l.lang)}</span>
                <span style="font-size:.6rem;font-weight:800;padding:2px 10px;border-radius:20px;background:${c}18;color:${c};letter-spacing:.04em;${pca}">${esc(l.level)}</span>
            </div>`;
    }).join('');
    return secTitle('Języki', theme) + items;
}

function renderCertSection(theme) {
    if (!state.certifications.length) return '';
    const pca = '-webkit-print-color-adjust:exact;print-color-adjust:exact';
    const items = state.certifications.map(c => `
        <div style="display:flex;gap:9px;align-items:flex-start;margin-bottom:9px;padding-bottom:9px;border-bottom:1px solid #f4f4f8;${pca}">
            <div style="
                width:28px;height:28px;border-radius:8px;flex-shrink:0;
                background:linear-gradient(135deg,${theme.from}22,${theme.to}14);
                display:flex;align-items:center;justify-content:center;
                font-size:13px;${pca}
            ">🏅</div>
            <div>
                <div style="font-size:.71rem;font-weight:700;color:#18181b;line-height:1.3">${esc(c.name) || '—'}</div>
                <div style="font-size:.62rem;color:#a1a1aa;margin-top:2px">${esc(c.issuer)}${c.issuer&&c.date?' · ':''}${esc(c.date)}</div>
            </div>
        </div>`).join('');
    return secTitle('Certyfikaty', theme) + items;
}

// ============================================================
// HELPERS
// ============================================================
function esc(str) {
    if (!str) return '';
    return String(str)
        .replace(/&/g,'&amp;')
        .replace(/</g,'&lt;')
        .replace(/>/g,'&gt;')
        .replace(/"/g,'&quot;');
}

// ============================================================
// INIT
// ============================================================
function initForm() {
    fillForm();
    renderSkillsList();
    renderExpList();
    renderEduList();
    renderSocialList();
    renderPortfolioList();
    renderLangList();
    renderCertList();
    renderBlockOrder();
    setSkillMode(state.skillMode || 'chips');
    // set active swatch
    document.querySelectorAll('.swatch').forEach(s => {
        s.classList.toggle('sel', s.dataset.theme === state.theme);
    });
}

// Boot — try server first, fall back to localStorage
(async () => {
    const fromServer = await loadStateServer();
    if (fromServer) {
        state = fromServer;
        localStorage.setItem('cv_state_v2', JSON.stringify(state));
    } else {
        const fromLocal = loadStateLocal();
        state = fromLocal || defaultState();
    }
    initForm();
    renderCV();
})();
</script>
</body>
</html>
