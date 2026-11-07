<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generator CV — Social Media & Dziennikarstwo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=DM+Serif+Display:ital@0;1&family=Playfair+Display:wght@900&family=Fraunces:ital,opsz,wght@0,9..144,300..800;1,9..144,300..800&family=Inter+Tight:wght@300..800&family=Space+Grotesk:wght@400..700&family=JetBrains+Mono:wght@400;500;700&family=Instrument+Serif:ital@0;1&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
    <script src="cv_import.js?v=<?= @filemtime(__DIR__ . '/cv_import.js') ?>"></script>
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

        /* ---- Layout picker (editor) ---- */
        .lay-grid{display:grid;grid-template-columns:1fr 1fr;gap:7px}
        .lay{
            background:rgba(255,255,255,.035);border:1px solid rgba(255,255,255,.07);
            border-radius:12px;padding:5px 5px 7px;cursor:pointer;text-align:left;
            font-family:inherit;transition:border-color .15s,background .15s;
        }
        .lay:hover{background:rgba(255,255,255,.06);border-color:rgba(255,255,255,.14)}
        .lay.sel{border-color:rgba(255,255,255,.6);background:rgba(255,255,255,.07)}
        .lay-th{height:74px;border-radius:7px;background:#fff;overflow:hidden;position:relative}
        .lay-th > *{position:absolute;display:block;font-style:normal}
        .lay-nm{font-size:11px;font-weight:600;color:rgba(255,255,255,.75);padding:6px 3px 0}
        .lay-ds{font-size:9.5px;color:rgba(255,255,255,.28);padding:1px 3px 0;line-height:1.3}

        /* ============================================================
           SZABLONY (wspólny semantyczny HTML, różny CSS)
           ============================================================ */
        .L{--ink:#141414;line-height:1.5}
        .L ul{list-style:none}
        .L h1,.L h2,.L h3{font-weight:inherit;font-size:inherit}
        .L img{display:block}
        .L .tn{font-variant-numeric:tabular-nums}
        .L .ph-t{opacity:.28}
        .L .e,.L figure,.L .so,.L .ce,.L .lg,.L .sk-bars li{break-inside:avoid}
        .L .s-t{break-after:avoid}
        .L .h-photo{overflow:hidden;flex-shrink:0}
        .L .h-photo img{width:100%;height:100%;object-fit:cover}
        .L .h-photo:not(.ph) .ini{display:none}
        .L .h-photo.ph{display:flex;align-items:center;justify-content:center}
        .L .h-contacts svg{width:10px;height:10px;display:block}
        .L .sk-m,.L .lv{display:flex;gap:3px}
        .L .sk-m i,.L .lv i{display:block}
        .L .s-empty{font-size:11px;opacity:.4;font-style:italic}
        .L .b-solo{grid-template-columns:1fr!important}

        /* ---------- MAGAZYN ---------- */
        .L-mag{--rule:#d8d2c5;--muted:#6f6858;background:#fbf9f4;color:#1b1914;padding:30px 44px 44px;font-family:'Inter',sans-serif}
        .L-mag .mast{display:flex;justify-content:space-between;font-size:8px;font-weight:700;letter-spacing:.22em;text-transform:uppercase;padding-bottom:6px;border-bottom:1px solid #1b1914}
        .L-mag .h{border-top:3px solid #1b1914;margin-top:2px;display:grid;grid-template-columns:1fr auto;grid-template-areas:"id ph" "ct ct";column-gap:28px;padding-top:22px}
        .L-mag .h-id{grid-area:id;align-self:end;padding-bottom:18px}
        .L-mag .h-photo{grid-area:ph;width:116px;height:146px;margin-bottom:18px;align-self:end}
        .L-mag .h-photo img{filter:grayscale(1) contrast(1.06)}
        .L-mag .h-photo.ph{display:none}
        .L-mag .h-name{font-family:'Fraunces',serif;font-optical-sizing:auto;font-weight:400;font-size:64px;line-height:.92;letter-spacing:-.035em}
        .L-mag .h-name .w:last-child:not(:first-child){font-style:italic;color:var(--a);font-weight:300}
        .L-mag .h-title{font-family:'Fraunces',serif;font-style:italic;font-weight:300;font-size:17px;color:#4a4539;margin-top:12px;line-height:1.3}
        .L-mag .h-contacts{grid-area:ct;display:flex;flex-wrap:wrap;border-top:1px solid #1b1914;border-bottom:1px solid #1b1914;padding:7px 0;font-size:9.5px;row-gap:3px}
        .L-mag .h-contacts li{display:flex;align-items:baseline;gap:6px;padding:0 13px;border-left:1px solid var(--rule)}
        .L-mag .h-contacts li:first-child{padding-left:0;border-left:0}
        .L-mag .h-contacts .ic{display:none}
        .L-mag .h-contacts .k{font-size:7.5px;font-weight:700;letter-spacing:.16em;text-transform:uppercase;color:var(--muted)}
        .L-mag .lead{padding:18px 0 20px;border-bottom:1px solid #1b1914}
        .L-mag .lead p{column-count:2;column-gap:30px;column-rule:1px solid var(--rule);font-family:'Fraunces',serif;font-size:11.5px;line-height:1.6;color:#2c2920}
        .L-mag .lead p::first-letter{float:left;font-size:50px;line-height:.82;font-weight:600;color:var(--a);padding:5px 7px 0 0}
        .L-mag .b{display:grid;grid-template-columns:1fr 200px;column-gap:28px}
        .L-mag .b-side{border-left:1px solid var(--rule);padding-left:22px}
        .L-mag .s{margin-top:22px}
        .L-mag .s-t{display:flex;justify-content:space-between;align-items:baseline;border-top:2px solid #1b1914;padding-top:5px;margin-bottom:13px}
        .L-mag .s-l{font-size:8.5px;font-weight:800;letter-spacing:.22em;text-transform:uppercase}
        .L-mag .s-n{order:2;font-family:'Fraunces',serif;font-style:italic;font-size:12px;color:var(--a)}
        .L-mag .e{display:grid;grid-template-columns:1fr auto;column-gap:14px;padding-bottom:13px;margin-bottom:13px;border-bottom:1px dotted #b9b2a3}
        .L-mag .e:last-child{border-bottom:0;margin-bottom:0;padding-bottom:0}
        .L-mag .e-date{order:2;font-family:'Fraunces',serif;font-style:italic;font-size:11px;color:var(--muted);white-space:nowrap}
        .L-mag .e-role{font-family:'Fraunces',serif;font-size:15px;font-weight:600;line-height:1.2;letter-spacing:-.01em}
        .L-mag .e-org{font-size:8.5px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:var(--a);margin-top:4px}
        .L-mag .e-extra{font-size:10px;color:var(--muted);margin-top:2px}
        .L-mag .e-desc{font-family:'Fraunces',serif;font-size:11px;line-height:1.6;color:#36322a;margin-top:7px}
        .L-mag .sk-chips{font-family:'Fraunces',serif;font-size:12px;line-height:1.7}
        .L-mag .sk-chips li{display:inline}
        .L-mag .sk-chips li:not(:last-child)::after{content:' / ';color:var(--a)}
        .L-mag .sk-bars li{display:flex;justify-content:space-between;align-items:center;gap:12px;font-size:10.5px;padding:5px 0;border-bottom:1px dotted #b9b2a3}
        .L-mag .sk-m{flex-shrink:0}
        .L-mag .sk-m i{width:9px;height:2px;background:var(--rule)}
        .L-mag .sk-m i.on{background:#1b1914}
        .L-mag .so{display:grid;grid-template-columns:1fr auto;align-items:end;padding:6px 0;border-bottom:1px dotted #b9b2a3}
        .L-mag .so-ic{display:none}
        .L-mag .so-p{display:block;font-size:7.5px;font-weight:700;letter-spacing:.16em;text-transform:uppercase;color:var(--muted)}
        .L-mag .so-h{display:block;font-size:10.5px;font-weight:600}
        .L-mag .so-f{text-align:right;line-height:1}
        .L-mag .so-f b{display:block;font-family:'Fraunces',serif;font-weight:400;font-size:21px;letter-spacing:-.02em}
        .L-mag .so-f small{font-size:7px;letter-spacing:.1em;text-transform:uppercase;color:var(--muted)}
        .L-mag .lg{display:flex;justify-content:space-between;font-size:10.5px;padding:4px 0;border-bottom:1px dotted #b9b2a3}
        .L-mag .lg-l{font-family:'Fraunces',serif;font-style:italic;color:var(--muted)}
        .L-mag .lv{display:none}
        .L-mag .ce{padding:5px 0;border-bottom:1px dotted #b9b2a3}
        .L-mag .ce-n{font-family:'Fraunces',serif;font-size:11.5px;font-weight:600;line-height:1.3}
        .L-mag .ce-m{font-size:9px;color:var(--muted);margin-top:1px}
        .L-mag .pf{display:grid;grid-template-columns:repeat(2,1fr);gap:16px}
        .L-mag .pf-img{aspect-ratio:4/3;background:#ece7dc;overflow:hidden}
        .L-mag .pf-img img{width:100%;height:100%;object-fit:cover}
        .L-mag figcaption{font-size:9.5px;line-height:1.45;margin-top:6px;color:var(--muted)}
        .L-mag figcaption b{color:#1b1914;font-family:'Fraunces',serif;font-size:11px;font-weight:600}
        .L-mag .pf-i{font-family:'Fraunces',serif;font-style:italic;color:var(--a);margin-right:5px}
        .L-mag .pf-i::before{content:'Fig. '}

        /* ---------- SZWAJCARSKI ---------- */
        .L-swiss{--muted:#767676;background:#fff;color:#111;font-family:'Inter Tight',sans-serif;padding:0 44px 40px;border-top:12px solid var(--a)}
        .L-swiss .h{display:grid;grid-template-columns:150px 1fr 1fr 104px;grid-template-areas:"nm nm nm ph" "ti ti ct ph";gap:18px 24px;padding:34px 0 26px;border-bottom:2px solid #111}
        .L-swiss .h-id{display:contents}
        .L-swiss .h-name{grid-area:nm;font-size:60px;font-weight:700;line-height:.88;letter-spacing:-.055em}
        .L-swiss .h-name .w{display:block}
        .L-swiss .h-title{grid-area:ti;align-self:end;font-size:15px;font-weight:500;line-height:1.25;letter-spacing:-.015em;max-width:300px}
        .L-swiss .h-photo{grid-area:ph;width:104px;height:130px;align-self:start}
        .L-swiss .h-photo img{filter:grayscale(1)}
        .L-swiss .h-photo.ph{height:104px;background:var(--a);color:#fff;font-size:38px;font-weight:700;letter-spacing:-.05em}
        .L-swiss .h-contacts{grid-area:ct;align-self:end;font-size:9.5px;line-height:1.75}
        .L-swiss .h-contacts li{display:grid;grid-template-columns:58px 1fr}
        .L-swiss .h-contacts .ic{display:none}
        .L-swiss .h-contacts .k{color:var(--muted)}
        .L-swiss .h-contacts .v{font-weight:500;word-break:break-word}
        .L-swiss .s{display:grid;grid-template-columns:150px 1fr;column-gap:24px;padding:16px 0 18px;border-bottom:1px solid #111}
        .L-swiss .s:last-child{border-bottom:0}
        .L-swiss .s-t{display:flex;flex-direction:column;gap:2px}
        .L-swiss .s-n{font-size:9.5px;font-weight:700;color:var(--a)}
        .L-swiss .s-l{font-size:12.5px;font-weight:700;letter-spacing:-.01em}
        .L-swiss .ab{font-size:13px;font-weight:500;line-height:1.45;letter-spacing:-.012em;max-width:520px}
        .L-swiss .e{display:grid;grid-template-columns:92px 1fr;column-gap:16px;margin-bottom:14px}
        .L-swiss .e:last-child{margin-bottom:0}
        .L-swiss .e-date{font-size:9.5px;font-weight:500;color:var(--muted);padding-top:2px}
        .L-swiss .e-role{font-size:12.5px;font-weight:700;letter-spacing:-.01em;line-height:1.25}
        .L-swiss .e-org{font-size:10.5px;color:#444;margin-top:1px}
        .L-swiss .e-extra{font-size:10px;color:var(--muted);margin-top:1px}
        .L-swiss .e-desc{font-size:10.5px;line-height:1.55;color:#2b2b2b;margin-top:6px;max-width:470px}
        .L-swiss .sk-chips{display:flex;flex-wrap:wrap;gap:5px 18px;font-size:11px;font-weight:500}
        .L-swiss .sk-chips li{display:flex;align-items:center;gap:6px}
        .L-swiss .sk-chips li::before{content:'';width:5px;height:5px;background:var(--a);flex-shrink:0}
        .L-swiss .sk-bars{display:grid;grid-template-columns:repeat(3,1fr);gap:10px 20px}
        .L-swiss .sk-bars li{font-size:10.5px;font-weight:500}
        .L-swiss .sk-m{margin-top:4px;gap:2px}
        .L-swiss .sk-m i{flex:1;height:3px;background:#e4e4e4}
        .L-swiss .sk-m i.on{background:#111}
        .L-swiss .sk-m i.on:not(:has(+ .on)){background:var(--a)}
        .L-swiss .so-l{display:grid;grid-template-columns:repeat(3,1fr);gap:12px 20px}
        .L-swiss .so-ic{display:none}
        .L-swiss .so-p{display:block;font-size:9px;color:var(--muted)}
        .L-swiss .so-h{display:block;font-size:11px;font-weight:600;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}
        .L-swiss .so-f b{display:block;font-size:20px;font-weight:700;letter-spacing:-.04em;line-height:1.1;margin-top:3px}
        .L-swiss .so-f small{font-size:8.5px;color:var(--muted)}
        .L-swiss .lg-list{display:grid;grid-template-columns:repeat(3,1fr);gap:10px 20px}
        .L-swiss .lg{font-size:11px}
        .L-swiss .lg-n{display:block;font-weight:600}
        .L-swiss .lg-l{display:block;font-size:9.5px;color:var(--muted)}
        .L-swiss .lv{margin-top:4px;gap:2px}
        .L-swiss .lv i{width:12px;height:3px;background:#e4e4e4}
        .L-swiss .lv i.on{background:#111}
        .L-swiss .ce-l{display:grid;grid-template-columns:repeat(2,1fr);gap:10px 20px}
        .L-swiss .ce-n{font-size:11px;font-weight:600;line-height:1.3}
        .L-swiss .ce-m{font-size:9.5px;color:var(--muted)}
        .L-swiss .pf{display:grid;grid-template-columns:repeat(3,1fr);gap:14px}
        .L-swiss .pf-img{aspect-ratio:4/3;background:#f0f0f0;overflow:hidden}
        .L-swiss .pf-img img{width:100%;height:100%;object-fit:cover}
        .L-swiss figcaption{font-size:9.5px;color:var(--muted);margin-top:6px;line-height:1.4}
        .L-swiss figcaption b{display:block;color:#111;font-size:10.5px}
        .L-swiss .pf-i{color:var(--a);font-weight:700;margin-right:4px}

        /* ---------- BLOK ---------- */
        .L-blok{--muted:#55524a;background:#fffdf6;color:#111;font-family:'Space Grotesk',sans-serif;padding:30px 30px 36px}
        .L-blok .mono,.L-blok .e-date,.L-blok .h-title,.L-blok .h-contacts,.L-blok .s-t,.L-blok .e-org,.L-blok .so-f,.L-blok .lg-l,.L-blok .ce-m{font-family:'JetBrains Mono',monospace}
        .L-blok .h{display:grid;grid-template-columns:124px 1fr;grid-template-areas:"ph id" "ct ct";gap:18px 22px;background:var(--a);border:2.5px solid #111;box-shadow:7px 7px 0 #111;padding:22px 24px}
        .L-blok .h-id{grid-area:id;align-self:center}
        .L-blok .h-photo{grid-area:ph;width:124px;height:124px;border:2.5px solid #111;background:#fff;transform:rotate(-2.5deg);box-shadow:4px 4px 0 #111}
        .L-blok .h-photo.ph{font-size:44px;font-weight:700;letter-spacing:-.04em}
        .L-blok .h-name{font-size:46px;font-weight:700;line-height:.95;letter-spacing:-.045em}
        .L-blok .h-title{display:inline-block;margin-top:12px;background:#111;color:#fff;font-size:10px;font-weight:500;letter-spacing:.04em;padding:5px 10px;transform:rotate(-1deg)}
        .L-blok .h-contacts{grid-area:ct;display:flex;flex-wrap:wrap;gap:6px}
        .L-blok .h-contacts li{display:flex;align-items:center;gap:5px;background:#fff;border:2px solid #111;padding:3px 8px;font-size:9px;font-weight:500}
        .L-blok .h-contacts .k{display:none}
        .L-blok .b{display:grid;grid-template-columns:1fr 214px;gap:26px;margin-top:30px}
        .L-blok .s{margin-bottom:24px}
        .L-blok .s:last-child{margin-bottom:0}
        .L-blok .s-t{display:flex;width:fit-content;gap:8px;background:#111;color:#fff;font-size:10px;font-weight:700;letter-spacing:.1em;text-transform:uppercase;padding:5px 10px;margin-bottom:13px}
        .L-blok .s-n{color:var(--a)}
        .L-blok .ab{font-size:12.5px;font-weight:500;line-height:1.5}
        .L-blok .e{background:#fff;border:2px solid #111;box-shadow:4px 4px 0 #111;padding:12px 14px;margin-bottom:14px}
        .L-blok .e:last-child{margin-bottom:4px}
        .L-blok .e-date{display:inline-block;background:var(--a);border:1.5px solid #111;font-size:8.5px;font-weight:700;padding:1px 6px;margin-bottom:7px}
        .L-blok .e-date:empty{display:none}
        .L-blok .e-role{font-size:14px;font-weight:700;letter-spacing:-.02em;line-height:1.2}
        .L-blok .e-org{font-size:9.5px;color:var(--muted);margin-top:2px}
        .L-blok .e-extra{font-size:10px;color:var(--muted)}
        .L-blok .e-desc{font-size:10.5px;line-height:1.55;margin-top:7px;padding-top:7px;border-top:1.5px dashed #111}
        .L-blok .sk-chips{display:flex;flex-wrap:wrap;gap:6px}
        .L-blok .sk-chips li{border:2px solid #111;background:#fff;box-shadow:2px 2px 0 #111;padding:2px 8px;font-size:10.5px;font-weight:600}
        .L-blok .sk-chips li:nth-child(3n+1){background:var(--a)}
        .L-blok .sk-bars li{margin-bottom:9px;font-size:10.5px;font-weight:600}
        .L-blok .sk-m{margin-top:4px}
        .L-blok .sk-m i{flex:1;height:9px;border:1.5px solid #111;background:#fff}
        .L-blok .sk-m i.on{background:var(--a)}
        .L-blok .so{display:flex;align-items:center;gap:9px;background:#fff;border:2px solid #111;padding:6px 8px;margin-bottom:6px}
        .L-blok .so-ic{width:28px;height:28px;flex-shrink:0;background:var(--c);border:2px solid #111;color:#fff;display:flex;align-items:center;justify-content:center}
        .L-blok .so-ic svg{width:14px;height:14px}
        .L-blok .so-tx{flex:1;min-width:0}
        .L-blok .so-p{display:none}
        .L-blok .so-h{display:block;font-size:10.5px;font-weight:700;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}
        .L-blok .so-f{font-size:9px;color:var(--muted)}
        .L-blok .so-f b{color:#111}
        .L-blok .so-f small::before{content:' '}
        .L-blok .lg{display:flex;justify-content:space-between;align-items:center;padding:5px 0;border-bottom:2px dashed #111;font-size:11px;font-weight:600}
        .L-blok .lg-l{font-size:9px;border:1.5px solid #111;background:#fff;padding:0 5px}
        .L-blok .lv{display:none}
        .L-blok .ce{border-left:6px solid var(--a);padding:2px 0 2px 9px;margin-bottom:9px}
        .L-blok .ce-n{font-size:11px;font-weight:700;line-height:1.3}
        .L-blok .ce-m{font-size:9px;color:var(--muted)}
        .L-blok .pf{display:grid;grid-template-columns:repeat(2,1fr);gap:14px}
        .L-blok figure{border:2px solid #111;background:#fff;box-shadow:4px 4px 0 #111}
        .L-blok .pf-img{aspect-ratio:16/10;border-bottom:2px solid #111;background:var(--a);overflow:hidden}
        .L-blok .pf-img img{width:100%;height:100%;object-fit:cover}
        .L-blok figcaption{padding:7px 9px;font-size:9.5px;color:var(--muted);line-height:1.4}
        .L-blok figcaption b{display:block;color:#111;font-size:11px}
        .L-blok .pf-i{display:none}

        /* ---------- KOLUMNA ---------- */
        .L-kol{--muted:#76747c;--side:color-mix(in srgb,var(--a) 14%,#111114);background:#fff;color:#1c1c20;font-family:'Inter',sans-serif}
        .L-kol .b{display:grid;grid-template-columns:240px 1fr;min-height:1123px}
        .L-kol .b-side{background:var(--side);color:#e8e6e1}
        .L-kol .h-photo{width:240px;height:290px}
        .L-kol .h-photo.ph{height:200px;font-family:'Instrument Serif',serif;font-size:92px;color:var(--a);border-bottom:1px solid rgba(255,255,255,.1)}
        .L-kol .side-in{padding:24px 26px 36px}
        .L-kol .h-contacts{font-size:9.5px;line-height:1.5;padding-bottom:8px}
        .L-kol .h-contacts li{display:flex;gap:9px;align-items:flex-start;margin-bottom:7px}
        .L-kol .h-contacts .ic{color:var(--a);padding-top:2px}
        .L-kol .h-contacts .k{display:none}
        .L-kol .h-contacts .v{word-break:break-word}
        .L-kol .b-side .s{margin-top:22px}
        .L-kol .b-side .s-t{border-bottom:1px solid rgba(255,255,255,.14);padding-bottom:6px;margin-bottom:11px}
        .L-kol .b-side .s-n{display:none}
        .L-kol .b-side .s-l{font-family:'Instrument Serif',serif;font-style:italic;font-size:19px;color:#fff}
        .L-kol .b-main{padding:46px 40px 40px}
        .L-kol .h-id{margin-bottom:30px}
        .L-kol .h-name{font-family:'Instrument Serif',serif;font-size:60px;line-height:.92;letter-spacing:-.015em}
        .L-kol .h-name .w{display:block}
        .L-kol .h-name .w:last-child:not(:first-child){font-style:italic}
        .L-kol .h-title{font-size:9px;font-weight:700;letter-spacing:.28em;text-transform:uppercase;color:var(--a);margin-top:14px}
        .L-kol .h-title::after{content:'';display:block;width:36px;height:2px;background:var(--a);margin-top:16px}
        .L-kol .h-intro{font-size:11px;line-height:1.7;color:#47464d;margin-top:16px;max-width:430px}
        .L-kol .b-main .s{margin-top:26px}
        .L-kol .b-main .s-t{display:flex;align-items:baseline;gap:10px;margin-bottom:14px}
        .L-kol .b-main .s-n{font-size:9.5px;font-weight:700;color:var(--a)}
        .L-kol .b-main .s-l{font-family:'Instrument Serif',serif;font-size:26px;line-height:1}
        .L-kol .b-main .s-experience .s-c,.L-kol .b-main .s-education .s-c{border-left:1px solid #e2e0dc;padding-left:20px;margin-left:4px}
        .L-kol .e{position:relative;display:grid;grid-template-columns:1fr auto;column-gap:14px;margin-bottom:16px}
        .L-kol .e:last-child{margin-bottom:0}
        .L-kol .e::before{content:'';position:absolute;left:-27px;top:4px;width:9px;height:9px;border-radius:50%;background:#fff;border:2px solid var(--a)}
        .L-kol .e-date{order:2;font-size:8.5px;font-weight:600;letter-spacing:.12em;text-transform:uppercase;color:var(--muted);white-space:nowrap;padding-top:3px}
        .L-kol .e-role{font-size:12.5px;font-weight:700;letter-spacing:-.01em}
        .L-kol .e-org{font-size:10.5px;color:var(--a);font-weight:500;margin-top:1px}
        .L-kol .e-extra{font-size:10px;color:var(--muted)}
        .L-kol .e-desc{font-size:10.5px;line-height:1.6;color:#4a4950;margin-top:6px}
        .L-kol .sk-chips{display:flex;flex-wrap:wrap;gap:5px}
        .L-kol .sk-chips li{border:1px solid rgba(255,255,255,.22);padding:2px 8px;font-size:9.5px;border-radius:2px}
        .L-kol .sk-bars li{font-size:10px;margin-bottom:8px}
        .L-kol .sk-m{margin-top:4px;gap:2px}
        .L-kol .sk-m i{flex:1;height:2px;background:rgba(255,255,255,.16)}
        .L-kol .sk-m i.on{background:var(--a)}
        .L-kol .so{display:flex;align-items:center;gap:9px;margin-bottom:9px}
        .L-kol .so-ic{width:24px;height:24px;border-radius:50%;flex-shrink:0;background:var(--c);color:#fff;display:flex;align-items:center;justify-content:center}
        .L-kol .so-ic svg{width:12px;height:12px}
        .L-kol .so-tx{flex:1;min-width:0}
        .L-kol .so-p{display:none}
        .L-kol .so-h{display:block;font-size:10px;font-weight:600;color:#fff;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}
        .L-kol .so-f{font-size:9px;color:rgba(255,255,255,.5)}
        .L-kol .so-f b{color:var(--a)}
        .L-kol .so-f small::before{content:' '}
        .L-kol .lg{display:flex;justify-content:space-between;align-items:center;font-size:10px;margin-bottom:8px}
        .L-kol .lg-l{display:none}
        .L-kol .lv{gap:3px}
        .L-kol .lv i{width:6px;height:6px;border-radius:50%;background:rgba(255,255,255,.16)}
        .L-kol .lv i.on{background:var(--a)}
        .L-kol .ce{margin-bottom:9px}
        .L-kol .ce-n{font-size:10px;font-weight:600;color:#fff;line-height:1.35}
        .L-kol .ce-m{font-size:9px;color:rgba(255,255,255,.5)}
        .L-kol .b-main .ce-n{color:#1c1c20}
        .L-kol .pf{display:grid;grid-template-columns:repeat(2,1fr);gap:14px}
        .L-kol .pf-img{aspect-ratio:3/2;background:#f1efeb;overflow:hidden}
        .L-kol .pf-img img{width:100%;height:100%;object-fit:cover}
        .L-kol figcaption{font-size:9.5px;color:var(--muted);margin-top:6px;line-height:1.4}
        .L-kol figcaption b{display:block;color:#1c1c20;font-size:11px}
        .L-kol .pf-i{display:none}

        /* ---------- PION ---------- */
        .L-pion{--muted:#6d6d6d;--ln:#e6e6e6;background:#fff;color:#121212;font-family:'Inter Tight',sans-serif}
        .L-pion .b{display:grid;grid-template-columns:calc(var(--nfs) + 30px) 1fr;min-height:1123px}
        .L-pion .strip{background:var(--a);display:flex;flex-direction:column;align-items:center;gap:22px;padding:34px 0}
        .L-pion .strip-m{writing-mode:vertical-rl;transform:rotate(180deg);font:600 8px 'JetBrains Mono',monospace;letter-spacing:.2em;text-transform:uppercase;color:#121212}
        .L-pion .h-name{writing-mode:vertical-rl;transform:rotate(180deg);white-space:nowrap;break-inside:avoid;font-size:var(--nfs);font-weight:800;line-height:.8;letter-spacing:-.05em;color:#121212}
        .L-pion .h-name .w:last-child:not(:first-child){color:transparent;-webkit-text-stroke:1.6px #121212}
        .L-pion .b-main{padding:34px 40px 34px 34px;min-width:0}
        .L-pion .h{display:grid;grid-template-columns:84px 1fr;gap:20px;align-items:end;padding-bottom:20px;border-bottom:2px solid #121212}
        .L-pion .h-photo{width:84px;height:104px}
        .L-pion .h-photo.ph{background:#f2f2f2;font-size:26px;font-weight:800;letter-spacing:-.04em;color:#121212}
        .L-pion .h-title{font-size:24px;font-weight:600;line-height:1.08;letter-spacing:-.03em}
        .L-pion .h-contacts{display:flex;flex-wrap:wrap;gap:4px 16px;margin-top:12px;font-size:10px;font-weight:500}
        .L-pion .h-contacts li{display:flex;align-items:center;gap:5px}
        .L-pion .h-contacts .ic{color:var(--a);filter:brightness(.8)}
        .L-pion .h-contacts .k{display:none}
        .L-pion .s{margin-top:20px}
        .L-pion .s-t{display:flex;align-items:center;gap:8px;margin-bottom:12px}
        .L-pion .s-t::after{content:'';flex:1;height:1px;background:var(--ln)}
        .L-pion .s-n{font:700 8.5px 'JetBrains Mono',monospace;background:#121212;color:#fff;padding:2px 5px}
        .L-pion .s-l{font-size:9.5px;font-weight:700;letter-spacing:.16em;text-transform:uppercase}
        .L-pion .ab{font-size:12.5px;font-weight:500;line-height:1.45;letter-spacing:-.012em}
        .L-pion .e{display:grid;grid-template-columns:1fr auto;column-gap:14px;margin-bottom:12px}
        .L-pion .e:last-child{margin-bottom:0}
        .L-pion .e-date{order:2;align-self:start;font-size:9px;font-weight:600;border:1px solid #121212;border-radius:20px;padding:1px 8px;white-space:nowrap}
        .L-pion .e-date:empty{display:none}
        .L-pion .e-role{font-size:13px;font-weight:700;letter-spacing:-.015em;line-height:1.25}
        .L-pion .e-org{font-size:10.5px;font-weight:600;color:var(--muted)}
        .L-pion .e-extra{font-size:10px;color:var(--muted)}
        .L-pion .e-desc{font-size:10.5px;line-height:1.55;color:#333;margin-top:5px}
        .L-pion .side-grid{display:grid;grid-template-columns:repeat(2,1fr);column-gap:28px}
        .L-pion .sk-chips{display:flex;flex-wrap:wrap;gap:5px}
        .L-pion .sk-chips li{background:#f3f3f3;border-left:2px solid var(--a);padding:3px 8px;font-size:10px;font-weight:500}
        .L-pion .sk-bars li{font-size:10.5px;font-weight:500;margin-bottom:8px}
        .L-pion .sk-m{margin-top:4px;gap:2px}
        .L-pion .sk-m i{flex:1;height:4px;background:#ececec}
        .L-pion .sk-m i.on{background:#121212}
        .L-pion .so{display:flex;align-items:center;gap:9px;margin-bottom:8px}
        .L-pion .so-ic{width:26px;height:26px;border-radius:6px;flex-shrink:0;background:var(--c);color:#fff;display:flex;align-items:center;justify-content:center}
        .L-pion .so-ic svg{width:13px;height:13px}
        .L-pion .so-tx{min-width:0}
        .L-pion .so-p{display:none}
        .L-pion .so-h{display:block;font-size:11px;font-weight:600}
        .L-pion .so-f{font-size:9.5px;color:var(--muted)}
        .L-pion .so-f b{color:#121212}
        .L-pion .so-f small::before{content:' '}
        .L-pion .lg{display:flex;justify-content:space-between;align-items:baseline;font-size:11px;font-weight:500;padding:4px 0;border-bottom:1px solid var(--ln)}
        .L-pion .lg-l{font-size:9.5px;font-weight:600;color:var(--muted)}
        .L-pion .lv{display:none}
        .L-pion .ce{margin-bottom:8px}
        .L-pion .ce-n{font-size:11px;font-weight:600;line-height:1.3}
        .L-pion .ce-m{font-size:9.5px;color:var(--muted)}
        .L-pion .pf{display:grid;grid-template-columns:repeat(2,1fr);gap:14px}
        .L-pion .pf-img{aspect-ratio:16/10;background:#f2f2f2;overflow:hidden}
        .L-pion .pf-img img{width:100%;height:100%;object-fit:cover}
        .L-pion figcaption{font-size:9.5px;color:var(--muted);margin-top:6px;line-height:1.4}
        .L-pion figcaption b{display:block;color:#121212;font-size:11px}
        .L-pion .pf-i{display:none}

        /* ---------- RYSUNEK ---------- */
        .L-rys{
            --ln:#1d2430;--muted:#5d6675;--dash:rgba(29,36,48,.28);
            color:#1d2430;font-family:'Inter Tight',sans-serif;padding:24px;min-height:1123px;display:flex;flex-direction:column;
            background-color:#f3f2ec;
            background-image:linear-gradient(rgba(29,36,48,.065) 1px,transparent 1px),linear-gradient(90deg,rgba(29,36,48,.065) 1px,transparent 1px);
            background-size:14px 14px;
        }
        .L-rys .fr{border:1.5px solid var(--ln);flex:1;display:flex;flex-direction:column}
        .L-rys .lbl{display:block;font:500 7px/1 'JetBrains Mono',monospace;letter-spacing:.1em;text-transform:uppercase;color:var(--muted);margin-bottom:7px}
        .L-rys .zones{display:grid;grid-template-columns:repeat(6,1fr);border-bottom:1px solid var(--ln);font:500 7px 'JetBrains Mono',monospace;color:var(--muted)}
        .L-rys .zones span{text-align:center;padding:2px 0;border-left:1px solid var(--ln)}
        .L-rys .zones span:first-child{border-left:0}
        .L-rys .h{display:grid;grid-template-columns:1fr 132px;border-bottom:1px solid var(--ln)}
        .L-rys .c-id{padding:16px 20px 18px}
        .L-rys .c-ph{border-left:1px solid var(--ln);padding:10px}
        .L-rys .h-photo{width:100%;height:136px;border:1px solid var(--ln)}
        .L-rys .h-photo.ph{background:
            linear-gradient(to top right,transparent calc(50% - .5px),var(--ln) 50%,transparent calc(50% + .5px)),
            linear-gradient(to bottom right,transparent calc(50% - .5px),var(--ln) 50%,transparent calc(50% + .5px))}
        .L-rys .h-photo .ini{display:none}
        .L-rys .nm{display:inline-block}
        .L-rys .h-name{font-size:48px;font-weight:600;line-height:.95;letter-spacing:-.04em}
        .L-rys .dim{position:relative;height:1px;background:var(--a);margin:12px 0 12px}
        .L-rys .dim::before,.L-rys .dim::after{content:'';position:absolute;top:-5px;width:1px;height:11px;background:var(--a)}
        .L-rys .dim::before{left:0}.L-rys .dim::after{right:0}
        .L-rys .h-title{font:500 10px 'JetBrains Mono',monospace;letter-spacing:.06em;text-transform:uppercase}
        .L-rys .h-contacts{display:grid;grid-template-columns:repeat(auto-fit,minmax(110px,1fr));border-bottom:1px solid var(--ln)}
        .L-rys .h-contacts li{padding:8px 12px;border-left:1px solid var(--ln);min-width:0}
        .L-rys .h-contacts li:first-child{border-left:0}
        .L-rys .h-contacts .ic{display:none}
        .L-rys .h-contacts .k{display:block;font:500 7px/1 'JetBrains Mono',monospace;letter-spacing:.1em;text-transform:uppercase;color:var(--muted);margin-bottom:5px}
        .L-rys .h-contacts .v{font-size:10.5px;font-weight:500;word-break:break-word}
        .L-rys .lead{padding:13px 20px 15px;border-bottom:1px solid var(--ln)}
        .L-rys .lead p{font-size:11.5px;line-height:1.55;max-width:600px}
        .L-rys .b{display:grid;grid-template-columns:1fr 218px;flex:1}
        .L-rys .b-side{border-left:1px solid var(--ln)}
        .L-rys .s{padding:13px 20px 16px;border-bottom:1px solid var(--ln)}
        .L-rys .b-side .s{padding:13px 16px 15px}
        .L-rys .s:last-child{border-bottom:0}
        .L-rys .s-t{display:flex;gap:5px;font:600 7.5px 'JetBrains Mono',monospace;letter-spacing:.12em;text-transform:uppercase;color:var(--muted);margin-bottom:11px}
        .L-rys .s-n{color:var(--a);filter:brightness(.85)}
        .L-rys .s-n::after{content:' /';color:var(--muted)}
        .L-rys .e{display:grid;grid-template-columns:1fr auto;column-gap:12px;padding-bottom:10px;margin-bottom:10px;border-bottom:1px dashed var(--dash)}
        .L-rys .e:last-child{border-bottom:0;margin-bottom:0;padding-bottom:0}
        .L-rys .e-date{order:2;font:500 8.5px 'JetBrains Mono',monospace;color:var(--muted);white-space:nowrap;padding-top:2px}
        .L-rys .e-role{font-size:12.5px;font-weight:600;letter-spacing:-.01em;line-height:1.25}
        .L-rys .e-org{font-size:10.5px;font-weight:500;color:var(--a);filter:brightness(.85)}
        .L-rys .e-extra{font-size:10px;color:var(--muted)}
        .L-rys .e-desc{font-size:10.5px;line-height:1.55;color:#2c3340;margin-top:5px}
        .L-rys .sk-chips{display:flex;flex-wrap:wrap;gap:4px}
        .L-rys .sk-chips li{border:1px solid var(--ln);padding:2px 7px;font-size:9.5px;font-weight:500;background:#f3f2ec}
        .L-rys .sk-bars li{font-size:10px;font-weight:500;margin-bottom:7px}
        .L-rys .sk-m,.L-rys .lv{margin-top:3px;gap:0;border:1px solid var(--ln);background:#f3f2ec}
        .L-rys .sk-m i,.L-rys .lv i{flex:1;height:6px;border-left:1px solid var(--ln)}
        .L-rys .sk-m i:first-child,.L-rys .lv i:first-child{border-left:0}
        .L-rys .sk-m i.on,.L-rys .lv i.on{background:repeating-linear-gradient(45deg,var(--a) 0 1.5px,transparent 1.5px 4px)}
        .L-rys .so{display:flex;align-items:center;gap:8px;padding:5px 0;border-bottom:1px dashed var(--dash)}
        .L-rys .so:last-child{border-bottom:0}
        .L-rys .so-ic{width:20px;height:20px;flex-shrink:0;border:1px solid var(--ln);display:flex;align-items:center;justify-content:center}
        .L-rys .so-ic svg{width:11px;height:11px}
        .L-rys .so-tx{min-width:0}
        .L-rys .so-p{display:none}
        .L-rys .so-h{display:block;font-size:10.5px;font-weight:600;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}
        .L-rys .so-f{font:500 8.5px 'JetBrains Mono',monospace;color:var(--muted)}
        .L-rys .so-f b{color:#1d2430}
        .L-rys .so-f small::before{content:' '}
        .L-rys .lg{display:grid;grid-template-columns:1fr auto;align-items:baseline;padding:5px 0;border-bottom:1px dashed var(--dash)}
        .L-rys .lg:last-child{border-bottom:0}
        .L-rys .lg-n{font-size:10.5px;font-weight:600}
        .L-rys .lg-l{font:500 8.5px 'JetBrains Mono',monospace;color:var(--muted)}
        .L-rys .lv{grid-column:1/-1;margin-top:4px}
        .L-rys .lv i{height:4px}
        .L-rys .ce{padding:5px 0;border-bottom:1px dashed var(--dash)}
        .L-rys .ce:last-child{border-bottom:0}
        .L-rys .ce-n{font-size:10.5px;font-weight:600;line-height:1.3}
        .L-rys .ce-m{font:500 8.5px 'JetBrains Mono',monospace;color:var(--muted)}
        .L-rys .pf{display:grid;grid-template-columns:repeat(2,1fr);gap:12px}
        .L-rys figure{border:1px solid var(--ln);background:#f3f2ec}
        .L-rys .pf-img{aspect-ratio:16/10;border-bottom:1px solid var(--ln);overflow:hidden;background:
            linear-gradient(to top right,transparent calc(50% - .5px),var(--ln) 50%,transparent calc(50% + .5px)),
            linear-gradient(to bottom right,transparent calc(50% - .5px),var(--ln) 50%,transparent calc(50% + .5px))}
        .L-rys .pf-img img{width:100%;height:100%;object-fit:cover;background:#f3f2ec}
        .L-rys figcaption{padding:6px 8px;font-size:9.5px;color:var(--muted);line-height:1.4}
        .L-rys figcaption b{display:block;color:#1d2430;font-size:10.5px}
        .L-rys .pf-i{display:block;font:500 7px 'JetBrains Mono',monospace;letter-spacing:.1em;color:var(--a);margin-bottom:3px}
        .L-rys .pf-i::before{content:'DET. '}
        .L-rys .tb{display:grid;grid-template-columns:1.2fr 1.6fr .6fr .6fr;border-top:1px solid var(--ln);font-size:10.5px;font-weight:500}
        .L-rys .tb > div{padding:7px 12px 8px;border-left:1px solid var(--ln)}
        .L-rys .tb > div:first-child{border-left:0}

        /* ---- Scrollbars ---- */
        .editor::-webkit-scrollbar{width:3px}
        .editor::-webkit-scrollbar-thumb{background:rgba(255,255,255,.08);border-radius:4px}
        .preview-wrap::-webkit-scrollbar{width:5px}
        .preview-wrap::-webkit-scrollbar-thumb{background:rgba(255,255,255,.08);border-radius:4px}

        /* ---- Print ---- */
        @page cv{size:A4;margin:0}
        @media print{
            *{-webkit-print-color-adjust:exact!important;print-color-adjust:exact!important;color-adjust:exact!important}
            .topbar,.editor{display:none!important}
            body,html{height:auto!important;overflow:visible!important;background:#fff!important}
            .app{height:auto!important;overflow:visible!important;display:block!important}
            .preview-wrap{height:auto!important;overflow:visible!important;padding:0!important;background:#fff!important;display:block!important;align-items:unset!important}
            .cv-paper{width:100%!important;box-shadow:none!important;border-radius:0!important;margin:0!important}
            /* Nowe szablony: A4 na spad (marginesy są w samym projekcie), wydruk = podgląd */
            .L{page:cv;-webkit-box-decoration-break:clone;box-decoration-break:clone}
            .L-kol .b-main,.L-kol .side-in{-webkit-box-decoration-break:clone;box-decoration-break:clone}
            .L-kol .b,.L-pion .b,.L-rys{min-height:297mm}
            .L-pion .b-main{-webkit-box-decoration-break:clone;box-decoration-break:clone}
            .preview-spacer{display:none!important}
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
        <span style="font-size:10px;color:rgba(255,255,255,.2);font-weight:600;letter-spacing:.06em;text-transform:uppercase;margin-right:3px">Kolor</span>
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
    <input type="file" id="import-pdf-file" accept="application/pdf,.pdf" style="display:none" onchange="importFromPdf(this)">
    <button class="tbtn tbtn-reset" id="import-pdf-btn" onclick="document.getElementById('import-pdf-file').click()" title="Wczytaj dane z PDF-a wygenerowanego w tym generatorze">
        <svg width="13" height="13" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg>
        Importuj PDF
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

    <!-- Layout / template -->
    <div class="esec">
        <div class="esec-hdr open" onclick="toggleSection(this)">
            <span class="icon">▦</span>
            <span class="label">Szablon CV</span>
            <span class="arrow">▶</span>
        </div>
        <div class="esec-body open">
            <div class="lay-grid" id="layout-grid"></div>
        </div>
    </div>

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
    <div class="preview-spacer" style="height:2rem"></div>
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

// Szablony: 'modern' = oryginalny renderer, reszta = wspólny semantyczny HTML + własny CSS (.L-<id>)
const LAYOUTS = [
    { id: 'modern', name: 'Nowoczesny',  desc: 'Gradient i zaokrąglone karty' },
    { id: 'mag',    name: 'Magazyn',     desc: 'Redakcyjny, szeryfy, inicjał' },
    { id: 'swiss',  name: 'Szwajcarski', desc: 'Siatka i mocna typografia' },
    { id: 'blok',   name: 'Blok',        desc: 'Grube linie, twarde cienie' },
    { id: 'kol',    name: 'Kolumna',     desc: 'Ciemny pas, zdjęcie na spad' },
    { id: 'pion',   name: 'Pion',        desc: 'Pionowe imię jak grzbiet okładki' },
    { id: 'rys',    name: 'Rysunek',     desc: 'Arkusz techniczny, kratka, ramka' },
];
// split: sekcje boczne w osobnej kolumnie; about: gdzie trafia "O mnie"
const LAYOUT_CFG = {
    mag:   { split: true,  about: 'lead'  },
    swiss: { split: false, about: 'main'  },
    blok:  { split: true,  about: 'main'  },
    kol:   { split: true,  about: 'intro' },
    pion:  { split: true,  about: 'main'  },
    rys:   { split: true,  about: 'lead'  },
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
        layout: 'modern',
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
// IMPORT Z PDF (cv_import.js)
// ============================================================
async function importFromPdf(inputEl) {
    const file = inputEl.files[0];
    inputEl.value = '';
    if (!file) return;
    const btn = document.getElementById('import-pdf-btn');
    btn.disabled = true;
    showSaveStatus('Czytam PDF...');

    let result;
    try {
        result = await CvImport.readFile(file, {
            themes: THEMES,
            socialColors: SOCIAL_COLORS,
            blockIds: BLOCK_DEFS.map(b => b.id),
        });
    } catch (e) {
        btn.disabled = false;
        showSaveStatus('Błąd importu ✗', false);
        alert('Nie udało się odczytać pliku.\n\n' + (e && e.message ? e.message : e));
        return;
    }

    try {
        const s = result.state;
        const cnt = (arr, label) => arr.length ? `• ${label}: ${arr.length}\n` : '';
        const summary =
            'Znaleziono w pliku:\n\n' +
            (s.personal.name ? `• ${s.personal.name}${s.personal.title ? ' — ' + s.personal.title : ''}\n` : '') +
            (result.images.photo ? '• Zdjęcie profilowe\n' : '') +
            (s.about ? '• O mnie\n' : '') +
            cnt(s.experience, 'Doświadczenie') + cnt(s.education, 'Edukacja') +
            cnt(s.skills, 'Umiejętności') + cnt(s.social, 'Social media') +
            cnt(s.portfolio, 'Portfolio') + cnt(s.languages, 'Języki') +
            cnt(s.certifications, 'Certyfikaty') +
            '\nZastąpić obecne dane CV danymi z pliku?';
        if (!confirm(summary)) { showSaveStatus('Anulowano', false); return; }

        // Obrazy: wyciągnij z PDF-a i wgraj na serwer
        const uploadBlob = async (blob, name) => {
            if (!blob) return '';
            const fd = new FormData();
            fd.append('img', blob, name);
            try {
                const r = await fetch('upload.php', { method: 'POST', body: fd });
                const d = await r.json();
                return d.url || '';
            } catch (e) { return ''; }
        };
        if (result.images.photo) {
            showSaveStatus('Wgrywam zdjęcie...');
            s.personal.photo = await uploadBlob(await result.imageBlob(result.images.photo), 'photo.jpg');
        }
        for (let i = 0; i < s.portfolio.length; i++) {
            const ref = result.images.portfolio[i];
            if (ref) s.portfolio[i].img = await uploadBlob(await result.imageBlob(ref), `portfolio-${i}.jpg`);
        }

        if (!s.theme) s.theme = state.theme;
        if (!s.layout) s.layout = state.layout;
        state = mergeState(s);
        localStorage.setItem('cv_state_v2', JSON.stringify(state));
        initForm();
        renderCV();
        await saveToServer();
        showSaveStatus('Zaimportowano ✓');
    } finally {
        result.dispose();
        btn.disabled = false;
    }
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
    renderLayoutPicker();
    save();
}

// ============================================================
// LAYOUT (szablon)
// ============================================================
function setLayout(id) {
    state.layout = id;
    renderLayoutPicker();
    save();
}

// Miniaturki szkicują kompozycję każdego szablonu (w kolorze aktualnego motywu)
function layoutThumb(id, t) {
    const a = t.from;
    switch (id) {
        case 'modern': return `
            <i style="inset:0 0 auto 0;height:26px;background:linear-gradient(135deg,${t.from},${t.to})"></i>
            <i style="left:8px;top:6px;width:14px;height:14px;border-radius:50%;background:rgba(255,255,255,.6)"></i>
            <i style="left:27px;top:9px;width:34px;height:4px;border-radius:2px;background:#fff"></i>
            <i style="right:0;top:26px;bottom:0;width:30%;background:#f1f1f6"></i>
            <i style="left:8px;top:34px;width:20px;height:5px;border-radius:3px;background:${a}"></i>
            <i style="left:8px;top:44px;width:50%;height:3px;background:#e4e4ea"></i>
            <i style="left:8px;top:51px;width:40%;height:3px;background:#e4e4ea"></i>`;
        case 'mag': return `
            <i style="inset:0;background:#fbf9f4"></i>
            <i style="left:8px;right:8px;top:7px;height:1px;background:#1b1914"></i>
            <i style="left:8px;right:8px;top:9px;height:2px;background:#1b1914"></i>
            <i style="left:8px;top:13px;font:400 17px/1 Fraunces,serif;color:#1b1914;letter-spacing:-.04em">Aa <em style="color:${a};font-weight:300">Bb</em></i>
            <i style="right:8px;top:14px;width:15px;height:19px;background:#9a958b"></i>
            <i style="left:8px;right:8px;top:37px;height:1px;background:#1b1914"></i>
            <i style="left:8px;top:41px;width:7px;height:7px;background:${a}"></i>
            <i style="left:17px;top:42px;width:28%;height:2px;background:#cfc9bb"></i>
            <i style="left:17px;top:46px;width:28%;height:2px;background:#cfc9bb"></i>
            <i style="left:52%;top:42px;width:38%;height:2px;background:#cfc9bb"></i>
            <i style="left:52%;top:46px;width:38%;height:2px;background:#cfc9bb"></i>
            <i style="left:8px;right:8px;top:53px;height:1px;background:#1b1914"></i>
            <i style="left:8px;top:58px;width:50%;height:3px;background:#1b1914"></i>
            <i style="left:8px;top:64px;width:42%;height:2px;background:#cfc9bb"></i>`;
        case 'swiss': return `
            <i style="inset:0 0 auto 0;height:5px;background:${a}"></i>
            <i style="left:8px;top:11px;font:700 14px/.85 'Inter Tight',sans-serif;color:#111;letter-spacing:-.06em">Imię<br>Nazwisko</i>
            <i style="right:8px;top:11px;width:13px;height:16px;background:#9a9a9a"></i>
            <i style="left:8px;right:8px;top:36px;height:1.5px;background:#111"></i>
            <i style="left:8px;top:41px;width:16px;height:3px;background:#111"></i>
            <i style="left:34%;top:41px;width:50%;height:2px;background:#d6d6d6"></i>
            <i style="left:34%;top:45px;width:40%;height:2px;background:#d6d6d6"></i>
            <i style="left:8px;right:8px;top:53px;height:1px;background:#111"></i>
            <i style="left:8px;top:58px;width:12px;height:3px;background:#111"></i>
            <i style="left:34%;top:58px;width:5px;height:5px;background:${a}"></i>
            <i style="left:calc(34% + 8px);top:59px;width:30%;height:2px;background:#d6d6d6"></i>`;
        case 'blok': return `
            <i style="inset:0;background:#fffdf6"></i>
            <i style="left:6px;right:9px;top:6px;height:24px;background:${a};border:1.5px solid #111;box-shadow:3px 3px 0 #111"></i>
            <i style="left:11px;top:10px;width:14px;height:14px;background:#fff;border:1.5px solid #111;transform:rotate(-4deg)"></i>
            <i style="left:30px;top:11px;width:40%;height:5px;background:#111"></i>
            <i style="left:30px;top:19px;width:22%;height:4px;background:#111"></i>
            <i style="left:6px;top:39px;width:58%;height:30px;background:#fff;border:1.5px solid #111;box-shadow:2px 2px 0 #111"></i>
            <i style="right:9px;top:39px;width:24%;height:6px;background:#111"></i>
            <i style="right:9px;top:49px;width:11%;height:5px;background:${a};border:1px solid #111"></i>
            <i style="right:calc(9px + 13%);top:49px;width:10%;height:5px;background:#fff;border:1px solid #111"></i>`;
        case 'kol': return `
            <i style="left:0;top:0;bottom:0;width:32%;background:color-mix(in srgb,${a} 14%,#111114)"></i>
            <i style="left:0;top:0;width:32%;height:24px;background:#8d8a90"></i>
            <i style="left:5px;top:31px;width:18%;height:2px;background:rgba(255,255,255,.35)"></i>
            <i style="left:5px;top:37px;width:14%;height:2px;background:rgba(255,255,255,.35)"></i>
            <i style="left:5px;top:45px;width:20%;height:2px;background:${a}"></i>
            <i style="left:calc(32% + 8px);top:8px;font:400 15px/.9 'Instrument Serif',serif;color:#1c1c20">Imię<br><em>Nazwisko</em></i>
            <i style="left:calc(32% + 8px);top:39px;width:9px;height:2px;background:${a}"></i>
            <i style="left:calc(32% + 10px);top:47px;width:1px;height:22px;background:#ddd"></i>
            <i style="left:calc(32% + 8px);top:48px;width:5px;height:5px;border-radius:50%;border:1.5px solid ${a};background:#fff"></i>
            <i style="left:calc(32% + 18px);top:49px;width:36%;height:2px;background:#d9d9dd"></i>
            <i style="left:calc(32% + 18px);top:55px;width:28%;height:2px;background:#d9d9dd"></i>`;
        case 'pion': return `
            <i style="left:0;top:0;bottom:0;width:22%;background:${a}"></i>
            <i style="left:3px;bottom:5px;writing-mode:vertical-rl;transform:rotate(180deg);font:800 21px/.8 'Inter Tight',sans-serif;letter-spacing:-.05em;color:#111">Imię <span style="color:transparent;-webkit-text-stroke:.8px #111">Naz</span></i>
            <i style="left:calc(22% + 8px);top:8px;width:13px;height:16px;background:#a3a3a3"></i>
            <i style="left:calc(22% + 26px);top:10px;width:40%;height:5px;background:#121212"></i>
            <i style="left:calc(22% + 26px);top:19px;width:28%;height:2px;background:#cfcfcf"></i>
            <i style="left:calc(22% + 8px);right:8px;top:29px;height:1px;background:#121212"></i>
            <i style="left:calc(22% + 8px);top:35px;width:8px;height:4px;background:#121212"></i>
            <i style="left:calc(22% + 20px);top:36px;right:8px;height:1px;background:#ddd"></i>
            <i style="left:calc(22% + 8px);top:44px;width:45%;height:3px;background:#cfcfcf"></i>
            <i style="right:8px;top:43px;width:14px;height:5px;border:1px solid #121212;border-radius:4px"></i>
            <i style="left:calc(22% + 8px);top:58px;width:30%;height:3px;background:#cfcfcf"></i>
            <i style="left:calc(22% + 8px + 36%);top:58px;width:30%;height:3px;background:#cfcfcf"></i>`;
        case 'rys': return `
            <i style="inset:0;background:#f3f2ec;background-image:linear-gradient(rgba(29,36,48,.09) 1px,transparent 1px),linear-gradient(90deg,rgba(29,36,48,.09) 1px,transparent 1px);background-size:6px 6px"></i>
            <i style="inset:5px;border:1px solid #1d2430"></i>
            <i style="left:5px;right:5px;top:9px;height:1px;background:#1d2430"></i>
            <i style="left:10px;top:14px;font:600 12px/1 'Inter Tight',sans-serif;letter-spacing:-.04em;color:#1d2430">Imię Nazwisko</i>
            <i style="left:10px;top:29px;width:56%;height:1px;background:${a}"></i>
            <i style="left:10px;top:27px;width:1px;height:5px;background:${a}"></i>
            <i style="left:calc(10px + 56%);top:27px;width:1px;height:5px;background:${a}"></i>
            <i style="right:5px;top:9px;width:22%;height:28px;border-left:1px solid #1d2430;background:linear-gradient(to top right,transparent calc(50% - .5px),#1d2430 50%,transparent calc(50% + .5px)),linear-gradient(to bottom right,transparent calc(50% - .5px),#1d2430 50%,transparent calc(50% + .5px))"></i>
            <i style="left:5px;right:5px;top:37px;height:1px;background:#1d2430"></i>
            <i style="right:5px;top:37px;bottom:16px;width:30%;border-left:1px solid #1d2430"></i>
            <i style="left:10px;top:42px;width:12px;height:2px;background:${a}"></i>
            <i style="left:10px;top:48px;width:44%;height:2px;background:#9aa0aa"></i>
            <i style="right:10px;top:42px;width:20%;height:4px;background:repeating-linear-gradient(45deg,${a} 0 1px,transparent 1px 3px);border:1px solid #1d2430"></i>
            <i style="left:5px;right:5px;bottom:16px;height:1px;background:#1d2430"></i>
            <i style="left:45%;bottom:5px;height:11px;width:1px;background:#1d2430"></i>
            <i style="left:72%;bottom:5px;height:11px;width:1px;background:#1d2430"></i>`;
    }
    return '';
}

function renderLayoutPicker() {
    const grid = document.getElementById('layout-grid');
    if (!grid) return;
    const t = THEMES[state.theme] || THEMES.purple;
    const cur = state.layout || 'modern';
    grid.innerHTML = LAYOUTS.map(l => `
        <button type="button" class="lay${l.id === cur ? ' sel' : ''}" onclick="setLayout('${l.id}')">
            <div class="lay-th">${layoutThumb(l.id, t)}</div>
            <div class="lay-nm">${l.name}</div>
            <div class="lay-ds">${l.desc}</div>
        </button>`).join('');
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

    const paper = document.getElementById('cv-paper');
    const layout = LAYOUT_CFG[state.layout] ? state.layout : 'modern';
    paper.className = 'cv-paper' + (layout === 'modern' ? '' : ' L L-' + layout);
    paper.style.setProperty('--a', theme.from);
    if (layout !== 'modern') {
        paper.innerHTML = renderSemantic(layout);
        return;
    }

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
// SZABLONY — wspólny semantyczny HTML (wygląd w CSS .L-<id>)
// ============================================================
const SEC_LABELS = {
    about: 'O mnie', experience: 'Doświadczenie', education: 'Edukacja', skills: 'Umiejętności',
    social: 'Social media', portfolio: 'Portfolio', languages: 'Języki', certifications: 'Certyfikaty',
};
const SIDE_IDS = new Set(['skills', 'social', 'languages', 'certifications']);
const LANG_RANK = { A1: 1, A2: 2, B1: 3, B2: 4, C1: 5, C2: 6, 'Native / Ojczysty': 6 };
const PLATFORM_NAMES = {
    instagram: 'Instagram', tiktok: 'TikTok', youtube: 'YouTube', facebook: 'Facebook', twitter: 'X / Twitter',
    linkedin: 'LinkedIn', snapchat: 'Snapchat', pinterest: 'Pinterest', inne: 'Link',
};
const CONTACT_FIELDS = [
    ['email', 'E-mail', '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>'],
    ['phone', 'Telefon', '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>'],
    ['location', 'Miasto', '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>'],
    ['website', 'WWW', '<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/></svg>'],
    ['linkedin', 'LinkedIn', '<svg fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>'],
];

const nl2br = s => esc(s).replace(/\n/g, '<br>');
const meter = (n, max) => Array.from({ length: max }, (_, i) => `<i${i < n ? ' class="on"' : ''}></i>`).join('');
const dateRange = (a, b) => esc(a) + (a && b ? ' – ' : '') + esc(b);

function semEntry(role, org, extra, desc, from, to) {
    return `
        <article class="e">
            <div class="e-date tn">${dateRange(from, to)}</div>
            <div class="e-main">
                <h3 class="e-role">${esc(role) || '—'}</h3>
                ${org   ? `<div class="e-org">${esc(org)}</div>` : ''}
                ${extra ? `<div class="e-extra">${esc(extra)}</div>` : ''}
                ${desc  ? `<p class="e-desc">${nl2br(desc)}</p>` : ''}
            </div>
        </article>`;
}

const SEM = {
    about: () => state.about && state.about.trim() ? `<p class="ab">${nl2br(state.about.trim())}</p>` : '',
    experience: () => state.experience.map(e => semEntry(e.role, e.company, '', e.desc, e.from, e.to)).join(''),
    education:  () => state.education.map(e => semEntry(e.degree, e.school, e.extra, '', e.from, e.to)).join(''),
    skills: () => {
        if (!state.skills.length) return '';
        if (state.skillMode === 'bars') {
            return `<ul class="sk sk-bars">${state.skills.map(s =>
                `<li><span class="sk-n">${esc(s.name)}</span><span class="sk-m">${meter(s.level, 5)}</span></li>`).join('')}</ul>`;
        }
        return `<ul class="sk sk-chips">${state.skills.map(s => `<li>${esc(s.name)}</li>`).join('')}</ul>`;
    },
    social: () => {
        if (!state.social.length) return '';
        return `<ul class="so-l">${state.social.map(s => {
            const color = SOCIAL_COLORS[s.platform] || '#6b7280';
            const name  = PLATFORM_NAMES[s.platform] || s.platform || '';
            return `
                <li class="so" style="--c:${color}">
                    <span class="so-ic">${SOCIAL_SVG[s.platform] || SOCIAL_SVG.inne}</span>
                    <span class="so-tx">
                        <span class="so-p">${esc(name)}</span>
                        <span class="so-h">${esc(s.handle) || esc(name)}</span>
                        ${s.followers ? `<span class="so-f tn"><b>${esc(s.followers)}</b><small>obserwujących</small></span>` : ''}
                    </span>
                </li>`;
        }).join('')}</ul>`;
    },
    portfolio: () => {
        if (!state.portfolio.length) return '';
        return `<div class="pf">${state.portfolio.map((p, i) => `
            <figure>
                <div class="pf-img">${p.img ? `<img src="${esc(p.img)}" alt="${esc(p.name)}" onerror="this.remove()">` : ''}</div>
                <figcaption><span class="pf-i tn">${i + 1}</span><b>${esc(p.name) || 'Projekt'}</b>${p.desc ? ` <span>${esc(p.desc)}</span>` : ''}</figcaption>
            </figure>`).join('')}</div>`;
    },
    languages: () => {
        if (!state.languages.length) return '';
        return `<ul class="lg-list">${state.languages.map(l => `
            <li class="lg">
                <span class="lg-n">${esc(l.lang)}</span>
                <span class="lg-l">${esc(l.level)}</span>
                <span class="lv">${meter(LANG_RANK[l.level] || 0, 6)}</span>
            </li>`).join('')}</ul>`;
    },
    certifications: () => {
        if (!state.certifications.length) return '';
        return `<ul class="ce-l">${state.certifications.map(c => `
            <li class="ce">
                <div class="ce-n">${esc(c.name) || '—'}</div>
                <div class="ce-m">${esc(c.issuer)}${c.issuer && c.date ? ' · ' : ''}${esc(c.date)}</div>
            </li>`).join('')}</ul>`;
    },
};

function renderSemantic(layout) {
    const cfg = LAYOUT_CFG[layout];
    const p = state.personal;
    const aboutRaw = (state.about || '').trim();

    // Nagłówek
    const words = (p.name || '').trim().split(/\s+/).filter(Boolean);
    const nameHTML = words.length
        ? words.map(w => `<span class="w">${esc(w)}</span>`).join(' ')
        : '<span class="w ph-t">Imię</span> <span class="w ph-t">Nazwisko</span>';
    const initials = words.slice(0, 2).map(w => w.charAt(0)).join('').toUpperCase();
    const photo = `
        <div class="h-photo${p.photo ? '' : ' ph'}">
            ${p.photo ? `<img src="${esc(p.photo)}" alt="" onerror="this.parentNode.classList.add('ph');this.remove()">` : ''}
            <span class="ini">${esc(initials)}</span>
        </div>`;
    const contactItems = CONTACT_FIELDS.filter(([k]) => p[k]).map(([k, label, svg]) =>
        `<li><span class="ic">${svg}</span><span class="k">${label}</span><span class="v">${esc(p[k])}</span></li>`).join('');
    const contacts = contactItems ? `<ul class="h-contacts">${contactItems}</ul>` : '';
    const idBlock = `
        <div class="h-id">
            <h1 class="h-name">${nameHTML}</h1>
            <div class="h-title">${esc(p.title) || '<span class="ph-t">Stanowisko / specjalizacja</span>'}</div>
            ${cfg.about === 'intro' && aboutRaw ? `<p class="h-intro">${nl2br(aboutRaw)}</p>` : ''}
        </div>`;

    // Sekcje w kolejności użytkownika
    const blocks = state.blockOrder
        .filter(id => state.blockVisible[id] && SEM[id])
        .map(id => ({ id, html: SEM[id]() }))
        .filter(b => b.html);
    if (cfg.about === 'main' && aboutRaw) blocks.unshift({ id: 'about', html: SEM.about() });

    const main = blocks.filter(b => !(cfg.split && SIDE_IDS.has(b.id)));
    const side = blocks.filter(b =>   cfg.split && SIDE_IDS.has(b.id));
    [...main, ...side].forEach((b, i) => { b.n = String(i + 1).padStart(2, '0'); });
    const sec = list => list.map(b => `
        <section class="s s-${b.id}">
            <h2 class="s-t"><span class="s-n tn">${b.n}</span><span class="s-l">${SEC_LABELS[b.id]}</span></h2>
            <div class="s-c">${b.html}</div>
        </section>`).join('');
    const mainHTML = sec(main) || '<p class="s-empty">Dodaj doświadczenie i edukację w panelu po lewej.</p>';

    if (layout === 'kol') {
        return `
            <div class="b">
                <aside class="b-side">${photo}<div class="side-in">${contacts}${sec(side)}</div></aside>
                <main class="b-main">${idBlock}${mainHTML}</main>
            </div>`;
    }

    const titleHTML = esc(p.title) || '<span class="ph-t">Stanowisko / specjalizacja</span>';
    const year = new Date().getFullYear();

    if (layout === 'pion') {
        // Rozmiar imienia dobrany do długości, żeby zawsze mieściło się w wysokości strony
        const len = Math.max(8, (p.name || 'Imię Nazwisko').trim().length);
        const nfs = Math.round(Math.min(108, 930 / (0.56 * len)));
        return `
            <div class="b" style="--nfs:${nfs}px">
                <aside class="strip">
                    <h1 class="h-name">${nameHTML}</h1>
                    <span class="strip-m tn">Curriculum Vitae — ${year}</span>
                </aside>
                <main class="b-main">
                    <header class="h">${photo}<div class="h-id"><div class="h-title">${titleHTML}</div>${contacts}</div></header>
                    ${mainHTML}
                    ${side.length ? `<div class="side-grid">${sec(side)}</div>` : ''}
                </main>
            </div>`;
    }

    if (layout === 'rys') {
        return `
            <div class="fr">
                <div class="zones">${[1, 2, 3, 4, 5, 6].map(n => `<span>${n}</span>`).join('')}</div>
                <header class="h">
                    <div class="c c-id">
                        <span class="lbl">A — Imię i nazwisko</span>
                        <div class="nm"><h1 class="h-name">${nameHTML}</h1><div class="dim"></div></div>
                        <div class="h-title">${titleHTML}</div>
                    </div>
                    <div class="c c-ph">${photo}</div>
                </header>
                ${contacts}
                ${aboutRaw ? `<div class="lead"><span class="lbl">B — Opis</span><p>${nl2br(aboutRaw)}</p></div>` : ''}
                <div class="b${side.length ? '' : ' b-solo'}">
                    <main class="b-main">${mainHTML}</main>
                    ${side.length ? `<aside class="b-side">${sec(side)}</aside>` : ''}
                </div>
                <footer class="tb">
                    <div><span class="lbl">Dokument</span>Curriculum Vitae</div>
                    <div><span class="lbl">Autor</span>${esc(p.name) || '—'}</div>
                    <div><span class="lbl">Format</span>A4</div>
                    <div><span class="lbl">Data</span><span class="tn">${year}</span></div>
                </footer>
            </div>`;
    }

    const mast = layout === 'mag'
        ? `<div class="mast"><span>Curriculum Vitae</span><span>${esc(p.location)}</span><span class="tn">${new Date().getFullYear()}</span></div>`
        : '';
    const lead = cfg.about === 'lead' && aboutRaw ? `<div class="lead"><p>${nl2br(aboutRaw)}</p></div>` : '';
    const body = cfg.split && side.length
        ? `<div class="b"><main class="b-main">${mainHTML}</main><aside class="b-side">${sec(side)}</aside></div>`
        : `<div class="b b-solo"><main class="b-main">${mainHTML}</main></div>`;

    return `${mast}<header class="h">${photo}${idBlock}${contacts}</header>${lead}${body}`;
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
    renderLayoutPicker();
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
