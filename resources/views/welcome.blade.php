<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#0a0a0a">
    <meta name="description" content="Website komunitas Kelas 2026B D4 Manajemen Informatika UNESA.">
    <title>2026B — Manajemen Informatika UNESA</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Mono:wght@400;500&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg: #090909;
            --panel: #111;
            --line: rgba(255,255,255,.1);
            --text: #f6f4f1;
            --muted: #9b9995;
            --orange: #ff6b24;
            --orange2: #ff914d;
        }

        * { box-sizing: border-box; }
        html { scroll-behavior: smooth; scroll-padding-top: 90px; }
        body {
            margin: 0;
            background: var(--bg);
            color: var(--text);
            font-family: Manrope, sans-serif;
            overflow-x: hidden;
        }
        a { color: inherit; text-decoration: none; }
        button, a { -webkit-tap-highlight-color: transparent; }

        body::before {
            content: "";
            position: fixed; inset: 0;
            pointer-events: none; z-index: -1;
            background:
                radial-gradient(ellipse at 78% 8%, rgba(255,107,36,.12), transparent 34%),
                radial-gradient(ellipse at 5% 55%, rgba(255,107,36,.06), transparent 28%);
        }
        .noise {
            position: fixed; inset: 0; z-index: 10;
            pointer-events: none; opacity: .035;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 180 180' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='.85' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='.45'/%3E%3C/svg%3E");
        }

        .wrap { width: min(1160px, calc(100% - 48px)); margin: auto; }
        .mono { font-family: "DM Mono", monospace; letter-spacing: .1em; text-transform: uppercase; }

        /* ---------- NAV ---------- */
        .nav {
            position: sticky; top: 0; z-index: 20;
            border-bottom: 1px solid rgba(255,255,255,.07);
            background: rgba(9,9,9,.78);
            backdrop-filter: blur(18px);
        }
        .nav-inner { width: 100%; max-width: none; padding: 0 32px; height: 76px; display: flex; align-items: center; justify-content: space-between; gap: 24px; }
        .brand { display: flex; align-items: center; gap: 12px; font-weight: 800; letter-spacing: -.04em; }
        .brand-mark {
            display: grid; place-items: center;
            width: 38px; height: 38px; border-radius: 12px;
            background: var(--orange); color: #111;
            font-size: 15px; font-weight: 900;
            box-shadow: 0 0 28px rgba(255,107,36,.2);
        }
        .brand small { display: block; color: var(--muted); font-size: 10px; letter-spacing: .12em; margin-top: 2px; font-weight: 600; }
        .links { display: flex; gap: 28px; color: #b7b4af; font-size: 13px; }
        .links a { transition: color .25s; }
        .links a:hover { color: #fff; }
        .nav-actions { display: flex; gap: 10px; align-items: center; }

        /* ---------- BUTTONS (semua ukuran seragam) ---------- */
        .btn {
            display: inline-flex; align-items: center; justify-content: center;
            width: 120px; height: 44px;
            padding: 0;
            border: 1px solid transparent; border-radius: 10px;
            font: 700 13px Manrope, sans-serif;
            white-space: nowrap; cursor: pointer;
            transition: transform .25s, background .25s, border-color .25s, box-shadow .25s;
        }
        .btn:hover { transform: translateY(-2px); }
        .btn-orange { background: var(--orange); color: #111; box-shadow: 0 8px 30px rgba(255,107,36,.13); }
        .btn-orange:hover { background: var(--orange2); box-shadow: 0 12px 34px rgba(255,107,36,.22); }
        .btn-ghost { border-color: var(--line); background: rgba(255,255,255,.02); color: #eee; }
        .btn-ghost:hover { border-color: rgba(255,107,36,.5); background: rgba(255,255,255,.05); }
        .btn-lg { width: 168px; height: 52px; font-size: 14px; }

        .menu-btn {
            display: none; background: none;
            border: 1px solid var(--line); color: #fff;
            border-radius: 9px; width: 44px; height: 44px; font-size: 20px; cursor: pointer;
        }

        /* ---------- HERO ---------- */
        .hero { text-align: center; padding: 84px 0 40px; }
        .eyebrow { display: inline-flex; align-items: center; gap: 10px; color: #ff9b6a; font-size: 11px; }
        .dot { width: 7px; height: 7px; border-radius: 50%; background: var(--orange); box-shadow: 0 0 16px var(--orange); animation: pulse 2s infinite; }
        .hero h1 {
            font-size: clamp(44px, 8vw, 96px);
            line-height: .98; letter-spacing: -.075em;
            margin: 24px 0; font-weight: 800;
        }
        .hero h1 span { color: var(--orange); }
        .hero-copy { max-width: 560px; margin: 0 auto; color: #aaa7a2; font-size: 15px; line-height: 1.9; }
        .hero-actions { display: flex; justify-content: center; flex-wrap: wrap; gap: 12px; margin-top: 32px; }

        /* ---------- STAGE FOTO 2 ORANG ---------- */
        .stage-section { padding: 30px 0 60px; }
        .stage {
            position: relative;
            display: flex; justify-content: center; align-items: center;
            padding: 50px 0;
        }
        .orbit {
            position: absolute; left: 50%; top: 50%;
            width: min(620px, 100%); aspect-ratio: 1;
            margin: 0; translate: -50% -50%;
            border: 1px solid rgba(255,107,36,.2); border-radius: 50%;
            animation: spin 40s linear infinite;
        }
        .orbit::before, .orbit::after { content: ""; position: absolute; border-radius: 50%; inset: 40px; border: 1px solid rgba(255,255,255,.07); }
        .orbit::after { inset: 90px; border-color: rgba(255,107,36,.13); }
        .orbit-dot { position: absolute; top: 12%; left: 14%; width: 10px; height: 10px; border-radius: 50%; background: var(--orange); box-shadow: 0 0 22px var(--orange); }

        .person {
            position: relative; z-index: 1; margin: 0;
            width: min(290px, 38vw); aspect-ratio: 3 / 4;
            border-radius: 22px; overflow: hidden;
            border: 1px solid rgba(255,255,255,.16);
            background: linear-gradient(145deg, #1f1c19, #0e0e0e 70%);
            box-shadow: 0 35px 90px rgba(0,0,0,.55), 0 0 60px rgba(255,107,36,.07);
            transition: transform .4s cubic-bezier(.2,.7,.2,1);
            cursor: pointer; /* BARU: kartu bisa diklik */
        }
        .person:focus-visible { outline: 2px solid var(--orange); outline-offset: 4px; } /* BARU */
        .p1 { transform: rotate(-4deg) translateY(16px); margin-right: -20px; animation: float 6s ease-in-out infinite; }
        .p2 { transform: rotate(4deg) translateY(-16px); margin-left: -20px; animation: float 6s ease-in-out infinite -3s; }
        .p1:hover { transform: rotate(-2deg) translateY(10px) scale(1.03); }
        .p2:hover { transform: rotate(2deg) translateY(-22px) scale(1.03); }

        .person img { position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; z-index: 1; }
        .person .ph {
            position: absolute; inset: 0; display: grid; place-items: center;
            font-size: clamp(54px, 9vw, 96px); font-weight: 800; letter-spacing: -.08em;
            color: rgba(255,107,36,.55);
            background: radial-gradient(circle at 70% 20%, rgba(255,107,36,.25), transparent 50%);
        }
        .person figcaption {
            position: absolute; left: 0; right: 0; bottom: 0; z-index: 2;
            padding: 46px 18px 16px;
            background: linear-gradient(transparent, rgba(0,0,0,.88));
            text-align: left;
        }
        .person figcaption strong { display: block; font-size: 15px; letter-spacing: -.02em; }
        .person figcaption span { font-size: 9px; color: var(--orange2); }

        .center-badge {
            position: absolute; z-index: 3; left: 50%; top: 50%;
            translate: -50% -50%;
            display: grid; place-items: center;
            width: 96px; height: 96px; border-radius: 50%;
            background: var(--orange); color: #111;
            font-size: 28px; font-weight: 900; letter-spacing: -.08em;
            border: 5px solid var(--bg);
            box-shadow: 0 0 50px rgba(255,107,36,.35);
            pointer-events: none; /* BARU: supaya tidak menghalangi klik ke kartu */
        }

        .floating-tag {
            position: absolute; z-index: 4;
            padding: 13px 16px;
            border: 1px solid rgba(255,255,255,.12); border-radius: 12px;
            background: rgba(20,20,20,.82); backdrop-filter: blur(14px);
            box-shadow: 0 16px 45px #0008;
            font-size: 11px; text-align: left;
            animation: float 5s ease-in-out infinite;
        }
        .floating-tag strong { display: block; font-size: 13px; margin-top: 4px; }
        .tag-one { top: 12%; right: 4%; }
        .tag-two { bottom: 10%; left: 4%; animation-delay: -2s; }
        .tag-accent { color: var(--orange); }

        .stage-caption { text-align: center; margin-top: 8px; font-size: 11px; color: #8f8b85; }
        .stage-caption b { color: var(--orange); font-weight: 500; }

        /* ---------- PITA TEKS BERJALAN ---------- */
        .band-wrap { overflow: hidden; padding: 38px 0; }
        .band {
            margin: 0 -4%;
            transform: rotate(-2deg);
            background: var(--orange); color: #111;
            box-shadow: 0 10px 50px rgba(255,107,36,.2);
            overflow: hidden;
        }
        .band-track {
            display: flex; width: max-content;
            padding: 16px 0;
            font-size: 12px; font-weight: 500;
            animation: marquee 30s linear infinite;
        }
        .band-track span { display: flex; align-items: center; gap: 30px; padding-right: 30px; white-space: nowrap; }
        .band-track i { font-style: normal; opacity: .55; }

        /* ---------- SECTIONS ---------- */
        section.content { padding: 90px 0; }
        .section-head { display: flex; justify-content: space-between; align-items: end; gap: 30px; margin-bottom: 38px; }
        .kicker { font-size: 10px; color: var(--orange); margin-bottom: 13px; }
        .section-head h2 { font-size: clamp(32px, 4vw, 50px); line-height: 1.08; letter-spacing: -.06em; margin: 0; }
        .section-head p { max-width: 380px; color: var(--muted); font-size: 13px; line-height: 1.8; margin: 0; }

        .feature-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 14px; }
        .feature {
            min-height: 225px; padding: 25px;
            border: 1px solid var(--line); border-radius: 16px;
            background: linear-gradient(145deg, rgba(255,255,255,.035), rgba(255,255,255,.012));
            transition: transform .3s, border-color .3s, background .3s;
        }
        .feature:hover { transform: translateY(-6px); border-color: rgba(255,107,36,.4); background: linear-gradient(145deg, rgba(255,107,36,.07), rgba(255,255,255,.015)); }
        .feature-icon { width: 43px; height: 43px; display: grid; place-items: center; border-radius: 12px; background: rgba(255,107,36,.1); color: var(--orange); font-size: 19px; }
        .feature h3 { font-size: 17px; margin: 27px 0 10px; letter-spacing: -.03em; }
        .feature p { font-size: 12px; line-height: 1.8; color: var(--muted); margin: 0; }

        .manifesto {
            padding: 55px;
            border: 1px solid rgba(255,107,36,.23); border-radius: 22px;
            background: radial-gradient(ellipse at 90% 20%, rgba(255,107,36,.12), transparent 35%), #101010;
            display: flex; justify-content: space-between; align-items: center; gap: 35px;
        }
        .manifesto h2 { font-size: clamp(30px, 4.5vw, 55px); line-height: 1.08; letter-spacing: -.06em; margin: 12px 0; }
        .manifesto p { max-width: 520px; color: var(--muted); font-size: 13px; line-height: 1.8; margin: 0 0 24px; }
        .manifesto .symbol { font-size: 110px; line-height: 1; color: var(--orange); opacity: .85; letter-spacing: -.1em; }

        footer { border-top: 1px solid var(--line); padding: 28px 0; color: #85817b; font-size: 11px; }
        .footer-inner { display: flex; justify-content: space-between; align-items: center; gap: 20px; }
        .footer-links { display: flex; gap: 18px; }
        .footer-links a:hover { color: var(--orange); }

        .reveal { opacity: 0; transform: translateY(22px); transition: opacity .7s ease, transform .7s cubic-bezier(.2,.7,.2,1); }
        .reveal.visible { opacity: 1; transform: translateY(0); }
        .delay-1 { transition-delay: .1s; }
        .delay-2 { transition-delay: .2s; }

        /* ---------- BARU: POP UP BIO ---------- */
        .modal {
            position: fixed; inset: 0; z-index: 100;
            display: grid; place-items: center; padding: 20px;
            background: rgba(0,0,0,.72); backdrop-filter: blur(8px);
            opacity: 0; visibility: hidden;
            transition: opacity .3s ease, visibility .3s;
        }
        .modal.open { opacity: 1; visibility: visible; }
        .modal-card {
            position: relative; overflow: auto;
            width: min(780px, 100%); max-height: calc(100vh - 40px);
            display: grid; grid-template-columns: .85fr 1.15fr;
            border: 1px solid rgba(255,107,36,.23); border-radius: 22px;
            background: radial-gradient(ellipse at 90% 0%, rgba(255,107,36,.12), transparent 40%), #101010;
            box-shadow: 0 40px 120px rgba(0,0,0,.6);
            transform: translateY(22px) scale(.97);
            transition: transform .4s cubic-bezier(.2,.7,.2,1);
        }
        .modal.open .modal-card { transform: none; }
        .modal-photo {
            position: relative; min-height: 340px;
            background: linear-gradient(145deg, #1f1c19, #0e0e0e 70%);
        }
        .modal-photo img { position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; z-index: 1; }
        .modal-photo .ph {
            position: absolute; inset: 0; display: grid; place-items: center;
            font-size: 96px; font-weight: 800; letter-spacing: -.08em;
            color: rgba(255,107,36,.55);
            background: radial-gradient(circle at 70% 20%, rgba(255,107,36,.25), transparent 50%);
        }
        .modal-body { padding: 38px 34px 34px; }
        .modal-body .kicker { margin-bottom: 12px; }
        .modal-body h3 { font-size: clamp(30px, 4vw, 40px); letter-spacing: -.06em; line-height: 1.05; margin: 0 0 6px; }
        .modal-role { font-size: 12px; color: var(--orange2); margin: 0 0 18px; }
        .modal-bio { font-size: 13px; line-height: 1.85; color: #aaa7a2; margin: 0 0 22px; }
        .modal-list { margin: 0; border-top: 1px solid var(--line); }
        .modal-list div {
            display: grid; grid-template-columns: 130px 1fr; gap: 14px;
            padding: 12px 0; border-bottom: 1px solid var(--line);
        }
        .modal-list dt { font-size: 10px; color: var(--muted); padding-top: 2px; }
        .modal-list dd { margin: 0; font-size: 13px; font-weight: 600; color: var(--text); }
        .modal-close {
            position: absolute; top: 14px; right: 14px; z-index: 5;
            width: 38px; height: 38px; display: grid; place-items: center;
            border: 1px solid var(--line); border-radius: 10px;
            background: rgba(9,9,9,.7); color: #fff; font-size: 20px; line-height: 1; cursor: pointer;
            transition: border-color .25s, color .25s;
        }
        .modal-close:hover { border-color: rgba(255,107,36,.6); color: var(--orange); }

        @keyframes pulse { 50% { opacity: .45; box-shadow: 0 0 5px var(--orange); } }
        @keyframes spin { to { rotate: 360deg; } }
        @keyframes float { 0%,100% { translate: 0 0; } 50% { translate: 0 -10px; } }
        @keyframes marquee { to { transform: translateX(-50%); } }

        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after {
                animation-duration: .01ms !important; animation-iteration-count: 1 !important;
                scroll-behavior: auto !important; transition-duration: .01ms !important;
            }
            .reveal { opacity: 1; transform: none; }
        }

        @media (max-width: 850px) {
            .links { gap: 15px; }
            .feature-grid { grid-template-columns: repeat(2, 1fr); }
            .manifesto { padding: 36px; }
            .manifesto .symbol { font-size: 75px; }
            .tag-one { right: 0; }
            .tag-two { left: 0; }
        }
        @media (max-width: 640px) {
            .wrap { width: min(100% - 32px, 1160px); }
            .nav-inner { width: 100%; padding: 0 16px; height: 66px; gap: 10px; }
            .menu-btn { display: block; }
            .links {
                display: none; position: absolute; top: 66px; left: 0; right: 0;
                padding: 20px 24px; background: #0d0d0d;
                border-bottom: 1px solid var(--line);
                flex-direction: column; gap: 20px;
            }
            .links.open { display: flex; }
            .nav-actions { gap: 6px; }
            .nav-actions .btn { width: 82px; height: 40px; font-size: 12px; }
            .brand { font-size: 13px; }
            .brand-mark { width: 34px; height: 34px; }

            .hero { padding: 60px 0 20px; }
            .hero-copy { font-size: 13px; }
            .hero-actions .btn-lg { flex: 1; width: auto; min-width: 0; }

            .stage { padding: 36px 0; }
            .person { width: 42vw; border-radius: 16px; }
            .p1 { margin-right: -14px; }
            .p2 { margin-left: -14px; }
            .person figcaption { padding: 34px 12px 12px; }
            .person figcaption strong { font-size: 12px; }
            .center-badge { width: 66px; height: 66px; font-size: 19px; border-width: 4px; }
            .floating-tag { padding: 9px 11px; font-size: 9px; }
            .floating-tag strong { font-size: 11px; }
            .tag-one { top: 2%; }
            .tag-two { bottom: 2%; }

            .band-wrap { padding: 26px 0; }
            .band-track { padding: 13px 0; font-size: 10px; }

            section.content { padding: 64px 0 !important; }
            .section-head { align-items: start; flex-direction: column; gap: 15px; margin-bottom: 25px; }
            .feature-grid { grid-template-columns: 1fr; }
            .feature { min-height: 0; padding: 22px; }
            .feature h3 { margin-top: 20px; }
            .manifesto { padding: 27px; display: block; }
            .manifesto .symbol { display: none; }
            .footer-inner { align-items: start; flex-direction: column; }
            .footer-links { flex-wrap: wrap; }

            /* BARU: pop up di layar kecil */
            .modal { padding: 14px; }
            .modal-card { grid-template-columns: 1fr; border-radius: 18px; }
            .modal-photo { min-height: 0; aspect-ratio: 4 / 3; }
            .modal-body { padding: 26px 22px 26px; }
            .modal-list div { grid-template-columns: 110px 1fr; gap: 10px; }
        }
    </style>
</head>
<body>
<div class="noise"></div>

<header class="nav">
    <div class="wrap nav-inner">
        <a href="{{ route('welcome') }}" class="brand" aria-label="2026B beranda">
            <span class="brand-mark">B.</span>
            <span>CLASS 2026B<small>UNESA · INFORMATICS</small></span>
        </a>
        <nav class="links" id="mainNav" aria-label="Navigasi utama">
            <a href="#tentang">Tentang</a>
            <a href="#ruang-kelas">Ruang Kelas</a>
            <a href="#visi">Visi Kami</a>
        </nav>
        <div class="nav-actions">
            <a class="btn btn-ghost" href="{{ route('login') }}">Masuk</a>
            <a class="btn btn-orange" href="{{ route('register') }}">Gabung</a>
            <button class="menu-btn" id="menuBtn" aria-label="Buka menu" aria-expanded="false">☰</button>
        </div>
    </div>
</header>

<main>
    {{-- HERO --}}
    <div class="wrap hero">
        <div class="eyebrow mono"><span class="dot"></span> DIGITAL HOME OF CLASS 2026B</div>
        <h1>Built by curiosity.<br><span>Driven by code.</span></h1>
        <p class="hero-copy">Ruang digital untuk tumbuh, berkarya, dan saling terhubung. Kami adalah Kelas 2026B — mahasiswa D4 Manajemen Informatika UNESA, generasi yang siap membangun masa depan lewat teknologi.</p>
        <div class="hero-actions">
            <a class="btn btn-orange btn-lg" href="{{ route('register') }}">Daftar</a>
            <a class="btn btn-ghost btn-lg" href="{{ route('login') }}">Masuk</a>
        </div>
    </div>

    {{-- FOTO 2 ORANG DI TENGAH --}}
    <div class="wrap stage-section">
        <div class="stage reveal">
            <div class="orbit"><span class="orbit-dot"></span></div>

            <div class="floating-tag tag-one">
                <span class="mono tag-accent">STATUS / 001</span>
                <strong>Future in progress ↗</strong>
            </div>

            <figure class="person p1" data-profile="0" tabindex="0" role="button" aria-haspopup="dialog" aria-label="Lihat profil Wakuro">
                <div class="ph">W1</div>
                <img src="{{ asset('images/wakuro-1.jpg') }}" alt="Wakuro 1" onerror="this.remove()">
                <figcaption>
                    <strong>Wakuro</strong>
                    <span class="mono">CLASS 2026B</span>
                </figcaption>
            </figure>

            <div class="center-badge">26B</div>

            <figure class="person p2" data-profile="1" tabindex="0" role="button" aria-haspopup="dialog" aria-label="Lihat profil Wakuro">
                <div class="ph">W2</div>
                <img src="{{ asset('images/wakuro-2.jpg') }}" alt="Wakuro 2" onerror="this.remove()">
                <figcaption>
                    <strong>Wakuro</strong>
                    <span class="mono">CLASS 2026B</span>
                </figcaption>
            </figure>

            <div class="floating-tag tag-two">
                <span class="mono" style="color:#a8a39d">CREATIVE SYSTEMS</span>
                <strong>Think. Build. Repeat.</strong>
            </div>
        </div>
        <p class="stage-caption mono reveal"><b>✳</b> WAKURO · ONE CLASS. ONE VISION. · SURABAYA, 2026</p>
    </div>

    {{-- PITA TEKS BERJALAN --}}
    <div class="band-wrap" aria-hidden="true">
        <div class="band">
            <div class="band-track mono">
                <span>LEARN TO BUILD <i>✳</i> BUILD TO IMPACT <i>✳</i> GROW TOGETHER <i>✳</i> CLASS 2026B <i>✳</i> UNESA <i>✳</i> LEARN TO BUILD <i>✳</i> BUILD TO IMPACT <i>✳</i> GROW TOGETHER <i>✳</i> CLASS 2026B <i>✳</i> UNESA <i>✳</i></span>
                <span>LEARN TO BUILD <i>✳</i> BUILD TO IMPACT <i>✳</i> GROW TOGETHER <i>✳</i> CLASS 2026B <i>✳</i> UNESA <i>✳</i> LEARN TO BUILD <i>✳</i> BUILD TO IMPACT <i>✳</i> GROW TOGETHER <i>✳</i> CLASS 2026B <i>✳</i> UNESA <i>✳</i></span>
            </div>
        </div>
    </div>

    {{-- TENTANG --}}
    <section class="content" id="tentang">
        <div class="wrap">
            <div class="section-head reveal">
                <div>
                    <div class="kicker mono">01 / WHO WE ARE</div>
                    <h2>Lebih dari sekadar<br>ruang kelas.</h2>
                </div>
                <p>Kami belajar bukan hanya untuk menyelesaikan studi, tetapi juga untuk menciptakan sesuatu yang berarti bersama.</p>
            </div>
            <div class="feature-grid" id="ruang-kelas">
                <article class="feature reveal">
                    <div class="feature-icon">⌘</div>
                    <h3>Tech &amp; Innovation</h3>
                    <p>Mengeksplorasi pemrograman, sistem informasi, dan solusi digital untuk tantangan nyata.</p>
                </article>
                <article class="feature reveal delay-1">
                    <div class="feature-icon">◎</div>
                    <h3>One Community</h3>
                    <p>Ruang untuk saling mendukung, bertukar ide, dan tumbuh bersama sebagai satu angkatan.</p>
                </article>
                <article class="feature reveal delay-2">
                    <div class="feature-icon">↗</div>
                    <h3>Future Portfolio</h3>
                    <p>Mendokumentasikan proyek, proses belajar, dan pencapaian sebagai jejak perjalanan kami.</p>
                </article>
            </div>
        </div>
    </section>

    {{-- VISI --}}
    <section class="content" id="visi" style="padding-top:0">
        <div class="wrap">
            <div class="manifesto reveal">
                <div>
                    <div class="kicker mono">02 / OUR PRINCIPLE</div>
                    <h2>Think boldly.<br><span style="color:var(--orange)">Build together.</span></h2>
                    <p>Setiap ide punya potensi. Setiap proses adalah pembelajaran. Dan setiap langkah terasa lebih berarti saat dijalani bersama.</p>
                    <a class="btn btn-orange btn-lg" href="{{ route('register') }}">Gabung Sekarang</a>
                </div>
                <div class="symbol" aria-hidden="true">26<br>B.</div>
            </div>
        </div>
    </section>
</main>

<footer>
    <div class="wrap footer-inner">
        <div>© {{ date('Y') }} <strong style="color:#eee">CLASS 2026B</strong> · D4 Manajemen Informatika UNESA</div>
        <div class="footer-links">
            <a href="#tentang">Tentang</a>
            <a href="{{ route('login') }}">Masuk</a>
            <a href="{{ route('register') }}">Daftar</a>
        </div>
    </div>
</footer>

{{-- BARU: POP UP BIO --}}
<div class="modal" id="profileModal" aria-hidden="true">
    <div class="modal-card" role="dialog" aria-modal="true" aria-labelledby="pmName">
        <button class="modal-close" id="pmClose" type="button" aria-label="Tutup profil">×</button>
        <div class="modal-photo" id="pmPhoto"></div>
        <div class="modal-body">
            <div class="kicker mono">PROFIL / CLASS 2026B</div>
            <h3 id="pmName"></h3>
            <p class="modal-role mono" id="pmRole"></p>
            <p class="modal-bio" id="pmBio"></p>
            <dl class="modal-list" id="pmList"></dl>
        </div>
    </div>
</div>

<script>
    const menuBtn = document.getElementById('menuBtn');
    const mainNav = document.getElementById('mainNav');

    menuBtn?.addEventListener('click', () => {
        const open = mainNav.classList.toggle('open');
        menuBtn.setAttribute('aria-expanded', String(open));
        menuBtn.textContent = open ? '×' : '☰';
    });

    mainNav?.querySelectorAll('a').forEach(a => a.addEventListener('click', () => {
        mainNav.classList.remove('open');
        menuBtn?.setAttribute('aria-expanded', 'false');
        if (menuBtn) menuBtn.textContent = '☰';
    }));

    const observer = new IntersectionObserver(entries => entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('visible');
            observer.unobserve(entry.target);
        }
    }), { threshold: .12 });
    document.querySelectorAll('.reveal').forEach(el => observer.observe(el));

    /* =====================================================
       BARU: DATA BIO — EDIT DI SINI
       Urutan: [0] = kartu kiri, [1] = kartu kanan
       ===================================================== */
    const profiles = [
        {
            initial: 'W1',
            photo: "{{ asset('images/wakuro-1.jpg') }}",
            name: 'Wakuro',
            role: 'Mahasiswa D4 Manajemen Informatika',
            bio: 'Tulis bio singkat di sini. Ceritakan sedikit tentang minat, hal yang sedang dipelajari, atau tujuan di dunia teknologi.',
            data: [
                ['Nama lengkap', 'Isi nama lengkap'],
                ['NIM', 'Isi NIM'],
                ['Kelas', '2026B'],
                ['Asal', 'Isi kota asal'],
                ['Hobi', 'Isi hobi'],
                ['Instagram', '@username']
            ]
        },
        {
            initial: 'W2',
            photo: "{{ asset('images/wakuro-2.jpg') }}",
            name: 'Wakuro',
            role: 'Mahasiswa D4 Manajemen Informatika',
            bio: 'Tulis bio singkat di sini. Ceritakan sedikit tentang minat, hal yang sedang dipelajari, atau tujuan di dunia teknologi.',
            data: [
                ['Nama lengkap', 'Isi nama lengkap'],
                ['NIM', 'Isi NIM'],
                ['Kelas', '2026B'],
                ['Asal', 'Isi kota asal'],
                ['Hobi', 'Isi hobi'],
                ['Instagram', '@username']
            ]
        }
    ];

    /* ---------- Logika pop up ---------- */
    const modal   = document.getElementById('profileModal');
    const pmClose = document.getElementById('pmClose');
    const pmPhoto = document.getElementById('pmPhoto');
    const pmName  = document.getElementById('pmName');
    const pmRole  = document.getElementById('pmRole');
    const pmBio   = document.getElementById('pmBio');
    const pmList  = document.getElementById('pmList');
    let lastFocus = null;

    function openProfile(index) {
        const p = profiles[index];
        if (!p) return;

        pmPhoto.replaceChildren();
        const ph = document.createElement('div');
        ph.className = 'ph';
        ph.textContent = p.initial;
        pmPhoto.appendChild(ph);

        const img = document.createElement('img');
        img.src = p.photo;
        img.alt = p.name;
        img.onerror = () => img.remove();
        pmPhoto.appendChild(img);

        pmName.textContent = p.name;
        pmRole.textContent = p.role;
        pmBio.textContent = p.bio;

        pmList.replaceChildren();
        p.data.forEach(([label, value]) => {
            const row = document.createElement('div');
            const dt = document.createElement('dt');
            dt.className = 'mono';
            dt.textContent = label;
            const dd = document.createElement('dd');
            dd.textContent = value;
            row.append(dt, dd);
            pmList.appendChild(row);
        });

        lastFocus = document.activeElement;
        modal.classList.add('open');
        modal.setAttribute('aria-hidden', 'false');
        document.body.style.overflow = 'hidden';
        pmClose.focus();
    }

    function closeProfile() {
        modal.classList.remove('open');
        modal.setAttribute('aria-hidden', 'true');
        document.body.style.overflow = '';
        lastFocus?.focus();
    }

    document.querySelectorAll('.person[data-profile]').forEach(card => {
        card.addEventListener('click', () => openProfile(Number(card.dataset.profile)));
        card.addEventListener('keydown', e => {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                openProfile(Number(card.dataset.profile));
            }
        });
    });

    pmClose.addEventListener('click', closeProfile);
    modal.addEventListener('click', e => { if (e.target === modal) closeProfile(); });
    document.addEventListener('keydown', e => {
        if (!modal.classList.contains('open')) return;
        if (e.key === 'Escape') closeProfile();
        if (e.key === 'Tab') { e.preventDefault(); pmClose.focus(); }
    });
</script>
</body>
</html>