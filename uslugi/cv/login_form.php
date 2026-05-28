<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generator CV — Logowanie</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=DM+Serif+Display:ital@0;1&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            background: #0d0d10;
            background-image: radial-gradient(circle, rgba(255,255,255,.045) 1px, transparent 1px);
            background-size: 22px 22px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
        }

        /* Ambient glow blobs */
        .blob {
            position: fixed;
            border-radius: 50%;
            filter: blur(80px);
            pointer-events: none;
            z-index: 0;
        }
        .blob-1 {
            width: 400px; height: 400px;
            background: rgba(168, 85, 247, .12);
            top: -100px; left: -100px;
        }
        .blob-2 {
            width: 350px; height: 350px;
            background: rgba(236, 72, 153, .09);
            bottom: -80px; right: -80px;
        }

        /* Card */
        .card {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 400px;
            background: rgba(255,255,255,.055);
            border: 1px solid rgba(255,255,255,.08);
            border-radius: 24px;
            padding: 2.5rem 2rem 2rem;
            box-shadow:
                0 1px 0 rgba(255,255,255,.07) inset,
                0 32px 80px rgba(0,0,0,.5),
                0 0 0 1px rgba(255,255,255,.04);
        }

        /* Header */
        .logo-row {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 1.75rem;
        }
        .logo-icon {
            width: 40px; height: 40px;
            background: linear-gradient(135deg, #a855f7, #ec4899);
            border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            font-size: 18px;
            box-shadow: 0 4px 16px rgba(168,85,247,.4);
            flex-shrink: 0;
        }
        .logo-text { flex: 1; }
        .logo-title {
            font-family: 'DM Serif Display', serif;
            font-style: italic;
            font-size: 1.3rem;
            color: #fff;
            line-height: 1.1;
        }
        .logo-sub {
            font-size: 10.5px;
            color: rgba(255,255,255,.3);
            font-weight: 500;
            margin-top: 2px;
            letter-spacing: .04em;
        }

        h2 {
            font-size: 1rem;
            font-weight: 700;
            color: rgba(255,255,255,.85);
            margin-bottom: 6px;
        }
        .subtitle {
            font-size: 12.5px;
            color: rgba(255,255,255,.28);
            margin-bottom: 1.75rem;
            line-height: 1.5;
        }

        /* Error badge */
        .error-badge {
            display: flex;
            align-items: center;
            gap: 7px;
            background: rgba(248,113,113,.1);
            border: 1px solid rgba(248,113,113,.2);
            border-radius: 10px;
            padding: 10px 14px;
            margin-bottom: 1rem;
            font-size: 12.5px;
            color: #fca5a5;
            font-weight: 500;
        }

        /* Input group */
        .input-group { margin-bottom: 1rem; }
        .input-label {
            display: block;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: .07em;
            text-transform: uppercase;
            color: rgba(255,255,255,.3);
            margin-bottom: 6px;
        }
        .input-wrap { position: relative; }
        .input-wrap input {
            width: 100%;
            background: rgba(255,255,255,.06);
            border: 1px solid rgba(255,255,255,.1);
            border-radius: 12px;
            padding: 11px 44px 11px 14px;
            font-size: 14px;
            color: rgba(255,255,255,.9);
            font-family: inherit;
            transition: all .18s;
            letter-spacing: .04em;
        }
        .input-wrap input:focus {
            outline: none;
            border-color: rgba(168,85,247,.55);
            background: rgba(168,85,247,.07);
            box-shadow: 0 0 0 3px rgba(168,85,247,.15);
        }
        .input-wrap input::placeholder { color: rgba(255,255,255,.2); }

        /* Eye toggle */
        .eye-btn {
            position: absolute;
            right: 13px; top: 50%;
            transform: translateY(-50%);
            background: none; border: none;
            color: rgba(255,255,255,.25);
            cursor: pointer;
            padding: 4px;
            transition: color .15s;
            line-height: 0;
        }
        .eye-btn:hover { color: rgba(255,255,255,.6); }

        /* Submit button */
        .btn-submit {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 12px;
            background: linear-gradient(135deg, #a855f7, #ec4899);
            color: #fff;
            font-size: 13.5px;
            font-weight: 700;
            font-family: inherit;
            cursor: pointer;
            margin-top: .25rem;
            transition: all .18s;
            box-shadow: 0 4px 20px rgba(168,85,247,.4);
            letter-spacing: .01em;
        }
        .btn-submit:hover {
            box-shadow: 0 6px 28px rgba(168,85,247,.6);
            transform: translateY(-1px);
        }
        .btn-submit:active { transform: none; box-shadow: 0 2px 10px rgba(168,85,247,.3); }

        /* Footer */
        .card-footer {
            margin-top: 1.5rem;
            padding-top: 1.25rem;
            border-top: 1px solid rgba(255,255,255,.06);
            text-align: center;
            font-size: 11px;
            color: rgba(255,255,255,.15);
        }
        .card-footer a {
            color: rgba(168,85,247,.6);
            text-decoration: none;
        }
        .card-footer a:hover { color: #a855f7; }
    </style>
</head>
<body>
    <div class="blob blob-1"></div>
    <div class="blob blob-2"></div>

    <div class="card">
        <div class="logo-row">
            <div class="logo-icon">✦</div>
            <div class="logo-text">
                <div class="logo-title">Generator CV</div>
                <div class="logo-sub">Social Media & Dziennikarstwo</div>
            </div>
        </div>

        <h2>Witaj!</h2>
        <p class="subtitle">Wpisz hasło, aby uzyskać dostęp do swojego generatora CV.</p>

        <?php if (!empty($_GET['error'])): ?>
        <div class="error-badge">
            <svg width="15" height="15" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
            </svg>
            Nieprawidłowe hasło. Spróbuj ponownie.
        </div>
        <?php endif; ?>

        <form method="POST" action="authorize.php">
            <div class="input-group">
                <label class="input-label" for="password">Hasło</label>
                <div class="input-wrap">
                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="••••••••"
                        autocomplete="current-password"
                        autofocus
                    >
                    <button type="button" class="eye-btn" onclick="togglePwd(this)" tabindex="-1">
                        <svg id="eye-icon" width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                    </button>
                </div>
            </div>
            <button type="submit" class="btn-submit">Wejdź do generatora →</button>
        </form>

        <div class="card-footer">
            <a href="../../">← wróć do RGBpc.pl</a>
        </div>
    </div>

    <script>
        function togglePwd(btn) {
            const input = document.getElementById('password');
            const isText = input.type === 'text';
            input.type = isText ? 'password' : 'text';
            document.getElementById('eye-icon').innerHTML = isText
                ? '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>'
                : '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>';
        }
    </script>
</body>
</html>
