<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#090909">
    <title>Masuk — Class 2026B</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Mono:wght@400;500&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg: #090909;
            --line: rgba(255,255,255,.1);
            --text: #f6f4f1;
            --muted: #9b9995;
            --orange: #ff6b24;
            --orange2: #ff914d;
        }

        * { box-sizing: border-box; }
        body {
            margin: 0; min-height: 100vh;
            background: var(--bg); color: var(--text);
            font-family: Manrope, sans-serif;
            display: grid; place-items: center;
            padding: 32px 20px;
            overflow-x: hidden;
        }
        a { color: inherit; text-decoration: none; }
        button, a { -webkit-tap-highlight-color: transparent; }
        .mono { font-family: "DM Mono", monospace; letter-spacing: .1em; text-transform: uppercase; }

        body::before {
            content: ""; position: fixed; inset: 0;
            pointer-events: none; z-index: -1;
            background:
                radial-gradient(ellipse at 15% 10%, rgba(255,107,36,.13), transparent 34%),
                radial-gradient(ellipse at 95% 90%, rgba(255,107,36,.08), transparent 30%);
        }
        .noise {
            position: fixed; inset: 0; z-index: 50;
            pointer-events: none; opacity: .035;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 180 180' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='.85' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='.45'/%3E%3C/svg%3E");
        }

        /* ---------- SATU CARD BESAR ---------- */
        .card {
            position: relative; overflow: hidden;
            width: min(1040px, 100%);
            display: grid; grid-template-columns: 1.05fr .95fr;
            border: 1px solid var(--line); border-radius: 28px;
            background:
                radial-gradient(ellipse at 100% 0%, rgba(255,107,36,.12), transparent 42%),
                radial-gradient(ellipse at 0% 100%, rgba(255,107,36,.07), transparent 40%),
                linear-gradient(145deg, rgba(255,255,255,.045), rgba(255,255,255,.012));
            box-shadow: 0 40px 120px rgba(0,0,0,.5);
            animation: rise .7s cubic-bezier(.2,.7,.2,1) both;
        }

        /* ---------- BAGIAN KIRI (di dalam card) ---------- */
        .side { padding: 38px 40px; display: flex; flex-direction: column; }
        .brand { display: flex; align-items: center; gap: 12px; font-weight: 800; letter-spacing: -.04em; width: fit-content; }
        .brand-mark {
            display: grid; place-items: center;
            width: 38px; height: 38px; border-radius: 12px;
            background: var(--orange); color: #111;
            font-size: 15px; font-weight: 900;
            box-shadow: 0 0 28px rgba(255,107,36,.2);
        }
        .brand small { display: block; color: var(--muted); font-size: 10px; letter-spacing: .12em; margin-top: 2px; font-weight: 600; }

        .side-body { flex: 1; display: flex; flex-direction: column; justify-content: center; padding-top: 26px; }
        .eyebrow { display: inline-flex; align-items: center; gap: 10px; color: #ff9b6a; font-size: 11px; }
        .dot { width: 7px; height: 7px; border-radius: 50%; background: var(--orange); box-shadow: 0 0 16px var(--orange); animation: pulse 2s infinite; }
        .side h1 { font-size: clamp(38px, 4.4vw, 60px); line-height: 1; letter-spacing: -.075em; margin: 20px 0 16px; font-weight: 800; }
        .side h1 span { color: var(--orange); }
        .side-copy { max-width: 400px; color: #aaa7a2; font-size: 14px; line-height: 1.9; margin: 0; }

        /* foto 2 orang */
        .stage { position: relative; display: flex; justify-content: center; align-items: center; margin-top: 30px; padding: 26px 0 8px; }
        .orbit {
            position: absolute; left: 50%; top: 50%;
            width: min(360px, 100%); aspect-ratio: 1;
            translate: -50% -50%;
            border: 1px solid rgba(255,107,36,.2); border-radius: 50%;
            animation: spin 40s linear infinite;
        }
        .orbit::before, .orbit::after { content: ""; position: absolute; border-radius: 50%; inset: 28px; border: 1px solid rgba(255,255,255,.07); }
        .orbit::after { inset: 60px; border-color: rgba(255,107,36,.13); }
        .orbit-dot { position: absolute; top: 12%; left: 14%; width: 9px; height: 9px; border-radius: 50%; background: var(--orange); box-shadow: 0 0 20px var(--orange); }

        .person {
            position: relative; z-index: 1; margin: 0;
            width: min(160px, 30vw); aspect-ratio: 3 / 4;
            border-radius: 18px; overflow: hidden;
            border: 1px solid rgba(255,255,255,.16);
            background: linear-gradient(145deg, #1f1c19, #0e0e0e 70%);
            box-shadow: 0 30px 80px rgba(0,0,0,.55), 0 0 50px rgba(255,107,36,.07);
        }
        .p1 { transform: rotate(-4deg) translateY(12px); margin-right: -14px; animation: float 6s ease-in-out infinite; }
        .p2 { transform: rotate(4deg) translateY(-12px); margin-left: -14px; animation: float 6s ease-in-out infinite -3s; }
        .person img { position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; z-index: 1; }
        .person .ph {
            position: absolute; inset: 0; display: grid; place-items: center;
            font-size: 54px; font-weight: 800; letter-spacing: -.08em;
            color: rgba(255,107,36,.55);
            background: radial-gradient(circle at 70% 20%, rgba(255,107,36,.25), transparent 50%);
        }
        .person figcaption {
            position: absolute; left: 0; right: 0; bottom: 0; z-index: 2;
            padding: 34px 13px 12px; text-align: left;
            background: linear-gradient(transparent, rgba(0,0,0,.88));
        }
        .person figcaption strong { display: block; font-size: 12px; letter-spacing: -.02em; }
        .person figcaption span { font-size: 8px; color: var(--orange2); }

        .center-badge {
            position: absolute; z-index: 3; left: 50%; top: 50%; translate: -50% -50%;
            display: grid; place-items: center;
            width: 64px; height: 64px; border-radius: 50%;
            background: var(--orange); color: #111;
            font-size: 18px; font-weight: 900; letter-spacing: -.08em;
            border: 4px solid #121212;
            box-shadow: 0 0 40px rgba(255,107,36,.35);
        }
        .floating-tag {
            position: absolute; z-index: 4; top: 2%; right: 0;
            padding: 10px 13px;
            border: 1px solid rgba(255,255,255,.12); border-radius: 12px;
            background: rgba(20,20,20,.82); backdrop-filter: blur(14px);
            box-shadow: 0 16px 45px #0008;
            font-size: 9px; text-align: left;
            animation: float 5s ease-in-out infinite;
        }
        .floating-tag strong { display: block; font-size: 12px; margin-top: 3px; }
        .tag-accent { color: var(--orange); }

        /* ---------- BAGIAN FORM (di dalam card yang sama) ---------- */
        .form-side { display: flex; flex-direction: column; justify-content: center; padding: 44px 44px 44px 24px; }
        .form-box { width: 100%; max-width: 400px; margin: 0 auto; }
        .back { display: inline-flex; align-items: center; gap: 9px; color: #aaa39b; font-size: 12px; margin-bottom: 28px; transition: color .2s; }
        .back:hover { color: var(--orange); }
        .kicker { font-size: 10px; color: var(--orange); margin-bottom: 12px; }
        .form-box h2 { font-size: 34px; letter-spacing: -.06em; margin: 0 0 10px; line-height: 1.05; }
        .sub { color: var(--muted); font-size: 13px; line-height: 1.7; margin: 0 0 26px; }

        .field { margin-bottom: 18px; }
        .field label { display: block; font-size: 12px; font-weight: 700; margin-bottom: 9px; color: #dedad5; }
        .field input[type=email], .field input[type=password], .field input[type=text] {
            width: 100%; height: 50px; padding: 0 15px;
            border: 1px solid #30302f; border-radius: 10px;
            background: rgba(0,0,0,.35); color: #fff;
            font: 13px Manrope, sans-serif; outline: none;
            transition: border .2s, box-shadow .2s, background .2s;
        }
        .field input:focus { border-color: var(--orange); background: rgba(0,0,0,.5); box-shadow: 0 0 0 3px rgba(255,107,36,.12); }
        .field input::placeholder { color: #67635e; }
        .input-wrap { position: relative; }
        .input-wrap input { padding-right: 96px !important; }
        .toggle {
            position: absolute; right: 8px; top: 50%; transform: translateY(-50%);
            height: 34px; padding: 0 12px;
            background: rgba(255,255,255,.05); border: 1px solid var(--line); border-radius: 8px;
            color: #bbb; cursor: pointer; font: 600 11px Manrope, sans-serif;
            transition: color .2s, border-color .2s;
        }
        .toggle:hover { color: var(--orange); border-color: rgba(255,107,36,.5); }

        .row { display: flex; align-items: center; justify-content: space-between; gap: 12px; margin: 4px 0 24px; font-size: 12px; color: #aaa; }
        .check { display: flex; align-items: center; gap: 8px; cursor: pointer; }
        .check input { accent-color: var(--orange); width: 15px; height: 15px; }
        .accent { color: var(--orange); font-weight: 700; }
        .accent:hover { color: var(--orange2); }

        /* tombol seragam (sama dengan welcome) */
        .btn {
            display: flex; align-items: center; justify-content: center;
            width: 100%; height: 52px; padding: 0;
            border: 1px solid transparent; border-radius: 10px;
            font: 700 14px Manrope, sans-serif;
            white-space: nowrap; cursor: pointer;
            transition: transform .25s, background .25s, border-color .25s, box-shadow .25s;
        }
        .btn:hover { transform: translateY(-2px); }
        .btn-orange { background: var(--orange); color: #111; box-shadow: 0 8px 30px rgba(255,107,36,.13); }
        .btn-orange:hover { background: var(--orange2); box-shadow: 0 12px 34px rgba(255,107,36,.22); }
        .btn-ghost { border-color: var(--line); background: rgba(255,255,255,.02); color: #eee; }
        .btn-ghost:hover { border-color: rgba(255,107,36,.5); background: rgba(255,255,255,.05); }

        .divider { display: flex; align-items: center; gap: 14px; margin: 20px 0; color: #6f6a64; font-size: 10px; }
        .divider::before, .divider::after { content: ""; flex: 1; height: 1px; background: var(--line); }

        .errors { background: #351713; border: 1px solid #743124; color: #ffb7a5; border-radius: 10px; padding: 12px 14px; font-size: 12px; line-height: 1.7; margin-bottom: 18px; }
        .success { background: #12281a; border: 1px solid #275a37; color: #b7f5c6; border-radius: 10px; padding: 12px 14px; font-size: 12px; line-height: 1.7; margin-bottom: 18px; }
        .terms { font-size: 10px; line-height: 1.7; color: #77716a; margin: 22px 0 0; text-align: center; }

        @keyframes rise { from { opacity: 0; transform: translateY(18px); } to { opacity: 1; transform: translateY(0); } }
        @keyframes pulse { 50% { opacity: .45; box-shadow: 0 0 5px var(--orange); } }
        @keyframes spin { to { rotate: 360deg; } }
        @keyframes float { 0%,100% { translate: 0 0; } 50% { translate: 0 -10px; } }

        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after { animation: none !important; transition: none !important; }
        }

        /* ---------- RESPONSIVE ---------- */
        @media (max-width: 900px) {
            body { padding: 20px 14px; place-items: start center; }
            .card { grid-template-columns: 1fr; border-radius: 22px; }
            .side { padding: 28px 26px 8px; }
            .side-body { padding-top: 20px; }
            .side h1 { font-size: 40px; }
            .side-copy { font-size: 13px; max-width: none; }
            .stage { margin-top: 18px; }
            .form-side { padding: 24px 26px 34px; }
            .form-box { max-width: 460px; }
        }
        @media (max-width: 520px) {
            .person { width: 38vw; }
            .side { padding: 24px 20px 6px; }
            .form-side { padding: 20px 20px 28px; }
            .form-box h2 { font-size: 30px; }
        }
    </style>
</head>
<body>
<div class="noise"></div>

<div class="card">

    {{-- BAGIAN KIRI --}}
    <aside class="side">
        <a href="{{ route('welcome') }}" class="brand" aria-label="Kembali ke beranda">
            <span class="brand-mark">B.</span>
            <span>CLASS 2026B<small>UNESA · INFORMATICS</small></span>
        </a>

        <div class="side-body">
            <div class="eyebrow mono"><span class="dot"></span> YOUR DIGITAL CLASSROOM</div>
            <h1>Good to see<br>you <span>again.</span></h1>
            <p class="side-copy">Masuk ke ruang digital Kelas 2026B. Tetap terhubung dengan informasi, cerita, dan perjalanan kita.</p>

            <div class="stage" aria-hidden="true">
                <div class="orbit"><span class="orbit-dot"></span></div>
                <div class="floating-tag">
                    <span class="mono tag-accent">STATUS / 001</span>
                    <strong>Future in progress ↗</strong>
                </div>

                <figure class="person p1">
                    <div class="ph">W1</div>
                    <img src="{{ asset('images/wakuro-1.jpg') }}" alt="" onerror="this.remove()">
                    <figcaption><strong>Wakuro</strong><span class="mono">CLASS 2026B</span></figcaption>
                </figure>

                <div class="center-badge">26B</div>

                <figure class="person p2">
                    <div class="ph">W2</div>
                    <img src="{{ asset('images/wakuro-2.jpg') }}" alt="" onerror="this.remove()">
                    <figcaption><strong>Wakuro</strong><span class="mono">CLASS 2026B</span></figcaption>
                </figure>
            </div>
        </div>
    </aside>

    {{-- BAGIAN FORM --}}
    <main class="form-side">
        <div class="form-box">
            <div class="kicker mono">01 / SIGN IN</div>
            <h2>Selamat datang.</h2>
            <p class="sub">Masukkan detail akunmu untuk melanjutkan.</p>

            @if (session('status'))
                <div class="success">{{ session('status') }}</div>
            @endif

            @if ($errors->any())
                <div class="errors">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="field">
                    <label for="email">Email</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" placeholder="nama@email.com" autocomplete="email" required autofocus>
                </div>

                <div class="field">
                    <label for="password">Password</label>
                    <div class="input-wrap">
                        <input id="password" name="password" type="password" placeholder="Masukkan password" autocomplete="current-password" required>
                        <button class="toggle" type="button" data-toggle="password">Lihat</button>
                    </div>
                </div>

                <div class="row">
                    <label class="check"><input type="checkbox" name="remember"> Ingat saya</label>
                    @if (Route::has('password.request'))
                        <a class="accent" href="{{ route('password.request') }}">Lupa password?</a>
                    @endif
                </div>

                <button class="btn btn-orange" type="submit">Masuk ke akun</button>
            </form>

            <div class="divider mono">atau</div>

            <a class="btn btn-ghost" href="{{ route('register') }}">Buat akun baru</a>

            <p class="terms">Dengan masuk, pastikan kamu menggunakan akun yang benar. Jaga kerahasiaan password dan jangan bagikan akses akunmu.</p>
        </div>
    </main>

</div>

<script>
    document.querySelectorAll('[data-toggle]').forEach(b => b.addEventListener('click', () => {
        const i = document.getElementById(b.dataset.toggle);
        const show = i.type === 'password';
        i.type = show ? 'text' : 'password';
        b.textContent = show ? 'Sembunyikan' : 'Lihat';
    }));
</script>
</body>
</html>