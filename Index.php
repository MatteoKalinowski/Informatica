Ecco la versione aggiornata con **mappa Google Maps interattiva** (zoom, pan, indicazioni stradali) nella sezione Contatti.

Ho aggiunto:
- Mappa responsive e arrotondato con bordo elegante
- Marker sulla posizione di Via dell’Industria, Vignola
- Link “Apri in Google Maps” e “Indicazioni”
- Layout che si adatta bene su mobile

Copia e incolla il file completo:

```php
<?php
// GYMNOS — Palestra a Vignola | Luca Mancini
$pageTitle = "Gymnos | Palestra a Vignola";
$tagline   = "Trasforma il tuo corpo. Supera i tuoi limiti.";
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle) ?></title>
    <meta name="description" content="Gymnos - La palestra di Vignola. Allenati con Luca Mancini. Personal training, corsi di gruppo e attrezzature all'avanguardia.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg: #080808;
            --surface: #111111;
            --surface-2: #181818;
            --accent: #e8ff3d;
            --accent-dark: #c4d92a;
            --accent-glow: rgba(232, 255, 61, 0.25);
            --text: #f5f5f5;
            --muted: #9a9a9a;
            --border: rgba(255,255,255,0.07);
            --radius: 14px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            background: var(--bg);
            color: var(--text);
            font-family: 'Inter', system-ui, sans-serif;
            line-height: 1.65;
            overflow-x: hidden;
        }

        /* ========== SCROLLBAR ========== */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: var(--bg);
        }
        ::-webkit-scrollbar-thumb {
            background: #333;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: var(--accent-dark);
        }

        /* ========== HEADER ========== */
        header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            padding: 1.15rem 2.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(8,8,8,0.6);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border-bottom: 1px solid transparent;
            transition: all 0.35s ease;
        }

        header.scrolled {
            background: rgba(8,8,8,0.92);
            border-bottom-color: var(--border);
            padding: 0.9rem 2.5rem;
            box-shadow: 0 8px 30px rgba(0,0,0,0.4);
        }

        .logo {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 1.95rem;
            letter-spacing: 0.14em;
            color: var(--accent);
            text-decoration: none;
            position: relative;
            transition: text-shadow 0.3s;
        }

        .logo:hover {
            text-shadow: 0 0 20px var(--accent-glow);
        }

        nav {
            display: flex;
            gap: 2.2rem;
            align-items: center;
        }

        nav a {
            color: var(--muted);
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            letter-spacing: 0.04em;
            position: relative;
            transition: color 0.25s;
        }

        nav a:not(.nav-cta)::after {
            content: "";
            position: absolute;
            bottom: -4px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--accent);
            transition: width 0.3s ease;
        }

        nav a:not(.nav-cta):hover {
            color: var(--text);
        }

        nav a:not(.nav-cta):hover::after {
            width: 100%;
        }

        .nav-cta {
            background: var(--accent);
            color: #0a0a0a !important;
            padding: 0.6rem 1.4rem;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s cubic-bezier(0.22, 1, 0.36, 1) !important;
            box-shadow: 0 4px 15px rgba(232,255,61,0.2);
        }

        .nav-cta:hover {
            background: var(--accent-dark);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(232,255,61,0.35);
        }

        .menu-toggle {
            display: none;
            flex-direction: column;
            gap: 5px;
            background: none;
            border: none;
            cursor: pointer;
            padding: 6px;
        }

        .menu-toggle span {
            display: block;
            width: 24px;
            height: 2px;
            background: var(--text);
            border-radius: 2px;
            transition: all 0.3s;
        }

        .menu-toggle.active span:nth-child(1) {
            transform: translateY(7px) rotate(45deg);
        }
        .menu-toggle.active span:nth-child(2) {
            opacity: 0;
        }
        .menu-toggle.active span:nth-child(3) {
            transform: translateY(-7px) rotate(-45deg);
        }

        /* ========== HERO ========== */
        .hero {
            min-height: 100vh;
            display: grid;
            grid-template-columns: 1fr 1fr;
            align-items: center;
            padding: 7.5rem 4rem 4rem;
            gap: 3rem;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: "";
            position: absolute;
            top: -30%;
            right: -15%;
            width: 70%;
            height: 160%;
            background: radial-gradient(ellipse, rgba(232,255,61,0.09) 0%, transparent 65%);
            pointer-events: none;
            animation: pulseGlow 8s ease-in-out infinite alternate;
        }

        @keyframes pulseGlow {
            0% { opacity: 0.7; transform: scale(1); }
            100% { opacity: 1; transform: scale(1.05); }
        }

        .hero-content h1 {
            font-family: 'Bebas Neue', sans-serif;
            font-size: clamp(3.8rem, 7.5vw, 6.8rem);
            line-height: 0.93;
            letter-spacing: 0.03em;
            margin-bottom: 1.3rem;
            opacity: 0;
            transform: translateY(30px);
            animation: fadeUp 0.9s 0.2s forwards cubic-bezier(0.22, 1, 0.36, 1);
        }

        .hero-content h1 span {
            color: var(--accent);
        }

        .hero-content .tagline {
            font-size: 1.18rem;
            color: var(--muted);
            max-width: 420px;
            margin-bottom: 2.4rem;
            font-weight: 300;
            opacity: 0;
            transform: translateY(25px);
            animation: fadeUp 0.9s 0.4s forwards cubic-bezier(0.22, 1, 0.36, 1);
        }

        .hero-btns {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
            opacity: 0;
            transform: translateY(25px);
            animation: fadeUp 0.9s 0.55s forwards cubic-bezier(0.22, 1, 0.36, 1);
        }

        @keyframes fadeUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.55rem;
            padding: 0.95rem 1.9rem;
            font-family: 'Inter', sans-serif;
            font-size: 0.95rem;
            font-weight: 600;
            border-radius: 10px;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.22, 1, 0.36, 1);
            border: none;
        }

        .btn-primary {
            background: var(--accent);
            color: #0a0a0a;
            box-shadow: 0 6px 20px rgba(232,255,61,0.25);
        }

        .btn-primary:hover {
            background: var(--accent-dark);
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(232,255,61,0.4);
        }

        .btn-outline {
            background: transparent;
            color: var(--text);
            border: 1.5px solid rgba(255,255,255,0.2);
        }

        .btn-outline:hover {
            border-color: var(--accent);
            color: var(--accent);
            background: rgba(232,255,61,0.06);
            transform: translateY(-2px);
        }

        .hero-image-wrap {
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            opacity: 0;
            transform: scale(0.92);
            animation: fadeScale 1s 0.35s forwards cubic-bezier(0.22, 1, 0.36, 1);
        }

        @keyframes fadeScale {
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .hero-image {
            width: min(380px, 85%);
            aspect-ratio: 1;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid var(--accent);
            box-shadow:
                0 0 0 14px rgba(232,255,61,0.08),
                0 25px 70px rgba(0,0,0,0.55);
            transition: transform 0.5s cubic-bezier(0.22, 1, 0.36, 1), box-shadow 0.5s ease;
        }

        .hero-image:hover {
            transform: scale(1.04);
            box-shadow:
                0 0 0 18px rgba(232,255,61,0.12),
                0 30px 80px rgba(0,0,0,0.65);
        }

        .hero-badge {
            position: absolute;
            bottom: 8%;
            right: 10%;
            background: rgba(17,17,17,0.9);
            backdrop-filter: blur(10px);
            border: 1px solid var(--border);
            padding: 0.75rem 1.2rem;
            border-radius: 12px;
            font-size: 0.85rem;
            font-weight: 500;
            box-shadow: 0 12px 40px rgba(0,0,0,0.45);
            animation: float 4s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-8px); }
        }

        .hero-badge strong {
            color: var(--accent);
            display: block;
            font-size: 1.15rem;
            font-family: 'Bebas Neue', sans-serif;
            letter-spacing: 0.05em;
        }

        /* ========== STATS ========== */
        .stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1px;
            background: var(--border);
            margin: 0 2rem;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 20px 50px rgba(0,0,0,0.3);
        }

        .stat {
            background: var(--surface);
            padding: 2.4rem 1.5rem;
            text-align: center;
            transition: background 0.3s;
            position: relative;
            overflow: hidden;
        }

        .stat::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, transparent, rgba(232,255,61,0.04));
            opacity: 0;
            transition: opacity 0.3s;
        }

        .stat:hover::before {
            opacity: 1;
        }

        .stat:hover {
            background: var(--surface-2);
        }

        .stat .number {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 2.9rem;
            color: var(--accent);
            letter-spacing: 0.04em;
            line-height: 1;
        }

        .stat .label {
            color: var(--muted);
            font-size: 0.87rem;
            margin-top: 0.45rem;
            font-weight: 400;
        }

        /* ========== SECTIONS ========== */
        section {
            padding: 6.5rem 2.5rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .section-header {
            text-align: center;
            margin-bottom: 3.8rem;
        }

        .section-header h2 {
            font-family: 'Bebas Neue', sans-serif;
            font-size: clamp(2.5rem, 5vw, 3.5rem);
            letter-spacing: 0.04em;
            margin-bottom: 0.8rem;
        }

        .section-header h2 span {
            color: var(--accent);
        }

        .section-header p {
            color: var(--muted);
            max-width: 540px;
            margin: 0 auto;
            font-size: 1.07rem;
        }

        .reveal {
            opacity: 0;
            transform: translateY(40px);
            transition: opacity 0.8s cubic-bezier(0.22, 1, 0.36, 1), transform 0.8s cubic-bezier(0.22, 1, 0.36, 1);
        }

        .reveal.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* ========== ABOUT ========== */
        .about-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: start;
        }

        .about-text h3 {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 1.85rem;
            letter-spacing: 0.04em;
            margin-bottom: 1.1rem;
            color: var(--accent);
        }

        .about-text p {
            color: var(--muted);
            margin-bottom: 1.25rem;
            font-size: 1.03rem;
        }

        .about-text ul {
            list-style: none;
            margin-top: 1.6rem;
        }

        .about-text li {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 0.75rem;
            font-size: 0.98rem;
            transition: transform 0.25s;
        }

        .about-text li:hover {
            transform: translateX(6px);
        }

        .about-text li::before {
            content: "✓";
            color: var(--accent);
            font-weight: 700;
            font-size: 1.15rem;
            flex-shrink: 0;
        }

        /* ========== SERVICES ========== */
        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(270px, 1fr));
            gap: 1.6rem;
        }

        .service-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 2.1rem 1.7rem;
            transition: all 0.4s cubic-bezier(0.22, 1, 0.36, 1);
            position: relative;
            overflow: hidden;
        }

        .service-card::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: linear-gradient(90deg, var(--accent), transparent);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.4s ease;
        }

        .service-card:hover {
            border-color: rgba(232,255,61,0.3);
            transform: translateY(-8px);
            box-shadow: 0 20px 50px rgba(0,0,0,0.4);
            background: var(--surface-2);
        }

        .service-card:hover::after {
            transform: scaleX(1);
        }

        .service-icon {
            width: 52px;
            height: 52px;
            background: rgba(232,255,61,0.12);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 1.3rem;
            transition: transform 0.35s, background 0.35s;
        }

        .service-card:hover .service-icon {
            transform: scale(1.1) rotate(-5deg);
            background: rgba(232,255,61,0.2);
        }

        .service-card h3 {
            font-size: 1.18rem;
            font-weight: 600;
            margin-bottom: 0.65rem;
        }

        .service-card p {
            color: var(--muted);
            font-size: 0.93rem;
            line-height: 1.65;
        }

        /* ========== TRAINER ========== */
        .trainer {
            background: linear-gradient(145deg, var(--surface), var(--surface-2));
            border-radius: 20px;
            padding: 3.2rem;
            display: grid;
            grid-template-columns: auto 1fr;
            gap: 3.2rem;
            align-items: center;
            border: 1px solid var(--border);
            box-shadow: 0 25px 60px rgba(0,0,0,0.35);
            transition: transform 0.4s, box-shadow 0.4s;
        }

        .trainer:hover {
            transform: translateY(-4px);
            box-shadow: 0 30px 70px rgba(0,0,0,0.4);
        }

        .trainer-img {
            width: 230px;
            height: 230px;
            object-fit: cover;
            border-radius: 50%;
            border: 3px solid var(--accent);
            box-shadow: 0 0 0 10px rgba(232,255,61,0.1);
            transition: transform 0.5s;
        }

        .trainer:hover .trainer-img {
            transform: scale(1.03);
        }

        .trainer-info h3 {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 2.3rem;
            letter-spacing: 0.04em;
            margin-bottom: 0.3rem;
        }

        .trainer-info .role {
            color: var(--accent);
            font-weight: 600;
            font-size: 0.95rem;
            margin-bottom: 1.3rem;
            letter-spacing: 0.03em;
        }

        .trainer-info p {
            color: var(--muted);
            margin-bottom: 1.7rem;
            max-width: 500px;
            line-height: 1.7;
        }

        /* ========== CONTACT ========== */
        .contact-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3.5rem;
        }

        .contact-info h3 {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 1.9rem;
            margin-bottom: 1.7rem;
            letter-spacing: 0.04em;
        }

        .contact-item {
            display: flex;
            gap: 1.1rem;
            margin-bottom: 1.5rem;
            align-items: flex-start;
            transition: transform 0.25s;
        }

        .contact-item:hover {
            transform: translateX(5px);
        }

        .contact-item .icon {
            width: 44px;
            height: 44px;
            background: rgba(232,255,61,0.12);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            font-size: 1.15rem;
            transition: background 0.3s, transform 0.3s;
        }

        .contact-item:hover .icon {
            background: rgba(232,255,61,0.22);
            transform: scale(1.08);
        }

        .contact-item strong {
            display: block;
            font-size: 0.9rem;
            margin-bottom: 0.2rem;
        }

        .contact-item span {
            color: var(--muted);
            font-size: 0.92rem;
        }

        .contact-form {
            display: flex;
            flex-direction: column;
            gap: 1.1rem;
            background: var(--surface);
            padding: 2rem;
            border-radius: var(--radius);
            border: 1px solid var(--border);
        }

        .contact-form input,
        .contact-form textarea,
        .contact-form select {
            background: var(--bg);
            border: 1px solid var(--border);
            color: var(--text);
            padding: 0.95rem 1.15rem;
            border-radius: 10px;
            font-family: 'Inter', sans-serif;
            font-size: 0.95rem;
            outline: none;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        .contact-form input:focus,
        .contact-form textarea:focus,
        .contact-form select:focus {
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(232,255,61,0.12);
        }

        .contact-form textarea {
            min-height: 130px;
            resize: vertical;
        }

        .contact-form button {
            align-self: flex-start;
            margin-top: 0.4rem;
        }

        /* ========== MAP ========== */
        .map-section {
            margin-top: 3.5rem;
        }

        .map-wrapper {
            border-radius: 16px;
            overflow: hidden;
            border: 1px solid var(--border);
            box-shadow: 0 20px 50px rgba(0,0,0,0.35);
            background: var(--surface);
        }

        .map-wrapper iframe {
            display: block;
            width: 100%;
            height: 420px;
            border: 0;
            filter: grayscale(15%) contrast(1.05);
            transition: filter 0.4s;
        }

        .map-wrapper:hover iframe {
            filter: grayscale(0%) contrast(1);
        }

        .map-actions {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
            padding: 1.2rem 1.5rem;
            background: var(--surface);
            border-top: 1px solid var(--border);
            justify-content: center;
        }

        .map-actions a {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.7rem 1.3rem;
            border-radius: 8px;
            font-size: 0.9rem;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s;
        }

        .map-actions .btn-map-primary {
            background: var(--accent);
            color: #0a0a0a;
        }

        .map-actions .btn-map-primary:hover {
            background: var(--accent-dark);
            transform: translateY(-2px);
        }

        .map-actions .btn-map-outline {
            background: transparent;
            color: var(--text);
            border: 1px solid rgba(255,255,255,0.2);
        }

        .map-actions .btn-map-outline:hover {
            border-color: var(--accent);
            color: var(--accent);
        }

        /* ========== FOOTER ========== */
        footer {
            background: var(--surface);
            border-top: 1px solid var(--border);
            padding: 2.8rem 2rem;
            text-align: center;
            color: var(--muted);
            font-size: 0.92rem;
        }

        footer strong {
            color: var(--accent);
            font-family: 'Bebas Neue', sans-serif;
            letter-spacing: 0.1em;
            font-size: 1.2rem;
        }

        /* ========== RESPONSIVE ========== */
        @media (max-width: 900px) {
            .hero {
                grid-template-columns: 1fr;
                text-align: center;
                padding: 6.5rem 1.5rem 3.5rem;
            }
            .hero-content .tagline {
                margin-left: auto;
                margin-right: auto;
            }
            .hero-btns {
                justify-content: center;
            }
            .hero-badge {
                right: 50%;
                transform: translateX(50%);
                bottom: -12px;
            }
            .stats {
                grid-template-columns: repeat(2, 1fr);
                margin: 0 1rem;
            }
            .about-grid,
            .contact-grid,
            .trainer {
                grid-template-columns: 1fr;
                text-align: center;
            }
            .trainer {
                padding: 2.2rem;
            }
            .trainer-img {
                margin: 0 auto;
            }
            .about-text ul {
                display: inline-block;
                text-align: left;
            }
            .contact-form button {
                align-self: center;
            }
            nav {
                display: none;
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                background: rgba(8,8,8,0.97);
                backdrop-filter: blur(16px);
                flex-direction: column;
                padding: 1.5rem;
                gap: 1.2rem;
                border-bottom: 1px solid var(--border);
            }
            nav.open {
                display: flex;
            }
            .menu-toggle {
                display: flex;
            }
            .map-wrapper iframe {
                height: 320px;
            }
        }

        @media (max-width: 500px) {
            header {
                padding: 1rem 1.2rem;
            }
            header.scrolled {
                padding: 0.85rem 1.2rem;
            }
            section {
                padding: 4.5rem 1.2rem;
            }
            .stats {
                grid-template-columns: 1fr 1fr;
            }
            .contact-form {
                padding: 1.5rem;
            }
            .map-wrapper iframe {
                height: 280px;
            }
            .map-actions {
                flex-direction: column;
                align-items: stretch;
            }
            .map-actions a {
                justify-content: center;
            }
        }
    </style>
</head>
<body>

    <!-- HEADER -->
    <header id="header">
        <a href="#" class="logo">GYMNOS</a>
        <button class="menu-toggle" id="menuToggle" aria-label="Menu">
            <span></span>
            <span></span>
            <span></span>
        </button>
        <nav id="nav">
            <a href="#about">Chi Siamo</a>
            <a href="#servizi">Servizi</a>
            <a href="#trainer">Trainer</a>
            <a href="#contatti" class="nav-cta">Prenota Ora</a>
        </nav>
    </header>

    <!-- HERO -->
    <section class="hero">
        <div class="hero-content">
            <h1>ALLENATI<br><span>SENZA LIMITI</span></h1>
            <p class="tagline"><?= htmlspecialchars($tagline) ?></p>
            <div class="hero-btns">
                <a href="#contatti" class="btn btn-primary">Prova Gratuita</a>
                <a href="#servizi" class="btn btn-outline">Scopri i Servizi</a>
            </div>
        </div>
        <div class="hero-image-wrap">
            <img src="luca-mancini.jpg" alt="Luca Mancini - Trainer Gymnos" class="hero-image">
            <div class="hero-badge">
                <strong>Luca Mancini</strong>
                Personal Trainer
            </div>
        </div>
    </section>

    <!-- STATS -->
    <div class="stats reveal">
        <div class="stat">
            <div class="number" data-target="500">0</div>
            <div class="label">Membri attivi</div>
        </div>
        <div class="stat">
            <div class="number" data-target="12">0</div>
            <div class="label">Corsi settimanali</div>
        </div>
        <div class="stat">
            <div class="number" data-target="8">0</div>
            <div class="label">Anni di esperienza</div>
        </div>
        <div class="stat">
            <div class="number" data-target="100">0</div>
            <div class="label">Risultati reali</div>
        </div>
    </div>

    <!-- ABOUT -->
    <section id="about">
        <div class="section-header reveal">
            <h2>CHI <span>SIAMO</span></h2>
            <p>Gymnos è la palestra di riferimento a Vignola. Un ambiente moderno, motivante e orientato ai risultati.</p>
        </div>
        <div class="about-grid">
            <div class="about-text reveal">
                <h3>La tua palestra a Vignola</h3>
                <p>
                    Nato dalla passione per il fitness e il benessere, Gymnos offre un’esperienza di allenamento completa:
                    attrezzature di ultima generazione, corsi di gruppo energici e un team di trainer certificati.
                </p>
                <p>
                    Che tu voglia dimagrire, aumentare la massa muscolare o semplicemente sentirti meglio,
                    qui trovi il percorso giusto per te.
                </p>
                <ul>
                    <li>Attrezzature Technogym e Matrix</li>
                    <li>Spogliatoi moderni e docce</li>
                    <li>Area funzionale e free weights</li>
                    <li>Parcheggio gratuito</li>
                </ul>
            </div>
            <div class="about-text reveal">
                <h3>Perché scegliere Gymnos?</h3>
                <p>
                    Non siamo una palestra qualsiasi. Crediamo in un approccio personalizzato:
                    ogni membro riceve attenzione, un piano su misura e il supporto costante del nostro staff.
                </p>
                <p>
                    Situati nel cuore di Vignola, siamo facili da raggiungere e aperti con orari pensati
                    per chi lavora e per chi studia.
                </p>
                <ul>
                    <li>Personal training individuale</li>
                    <li>Valutazione corporea inclusa</li>
                    <li>Programmi nutrizionali</li>
                    <li>Atmosfera motivante e inclusiva</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- SERVICES -->
    <section id="servizi">
        <div class="section-header reveal">
            <h2>I NOSTRI <span>SERVIZI</span></h2>
            <p>Tutto ciò di cui hai bisogno per raggiungere i tuoi obiettivi, sotto lo stesso tetto.</p>
        </div>
        <div class="services-grid">
            <div class="service-card reveal">
                <div class="service-icon">💪</div>
                <h3>Personal Training</h3>
                <p>Sessioni one-to-one con Luca Mancini e il nostro team. Programmi su misura, monitoraggio costante e risultati misurabili.</p>
            </div>
            <div class="service-card reveal">
                <div class="service-icon">🏋️</div>
                <h3>Sala Pesi</h3>
                <p>Area free weights completa, macchine isotoniche e cardio di ultima generazione. Spazio, qualità e sicurezza.</p>
            </div>
            <div class="service-card reveal">
                <div class="service-icon">🔥</div>
                <h3>Corsi di Gruppo</h3>
                <p>HIIT, Functional, Pilates, Spinning e molto altro. Energia di gruppo per spingerti oltre i tuoi limiti.</p>
            </div>
            <div class="service-card reveal">
                <div class="service-icon">🥗</div>
                <h3>Consulenza Nutrizionale</h3>
                <p>Piani alimentari personalizzati in collaborazione con nutrizionisti partner. L’allenamento inizia a tavola.</p>
            </div>
            <div class="service-card reveal">
                <div class="service-icon">📊</div>
                <h3>Valutazione Corporea</h3>
                <p>Analisi della composizione corporea, misurazioni e monitoraggio dei progressi nel tempo.</p>
            </div>
            <div class="service-card reveal">
                <div class="service-icon">🎯</div>
                <h3>Programmi Mirati</h3>
                <p>Dimagrimento, ipertrofia, preparazione atletica o rieducazione motoria. Un percorso per ogni obiettivo.</p>
            </div>
        </div>
    </section>

    <!-- TRAINER -->
    <section id="trainer">
        <div class="section-header reveal">
            <h2>IL TUO <span>TRAINER</span></h2>
            <p>Conosci chi ti accompagnerà nel tuo percorso di trasformazione.</p>
        </div>
        <div class="trainer reveal">
            <img src="luca-mancini.jpg" alt="Luca Mancini" class="trainer-img">
            <div class="trainer-info">
                <h3>Luca Mancini</h3>
                <div class="role">Head Coach & Personal Trainer · Gymnos Vignola</div>
                <p>
                    Appassionato di fitness da oltre 8 anni, Luca ha aiutato centinaia di persone a raggiungere
                    i propri obiettivi. Specializzato in allenamento funzionale, ipertrofia e rieducazione posturale,
                    crede che ogni corpo abbia un potenziale straordinario: basta sbloccarlo con il metodo giusto.
                </p>
                <a href="#contatti" class="btn btn-primary">Prenota una sessione con Luca</a>
            </div>
        </div>
    </section>

        <!-- CONTACT -->
    <section id="contatti">
        <div class="section-header reveal">
            <h2>VIENI A <span>TROVARCI</span></h2>
            <p>Prenota la tua prova gratuita o contattaci per maggiori informazioni.</p>
        </div>
        <div class="contact-grid">
            <div class="contact-info reveal">
                <h3>Gymnos Vignola</h3>
                <div class="contact-item">
                    <div class="icon">📍</div>
                    <div>
                        <strong>Indirizzo</strong>
                        <span>Via Giuseppe Mazzini, 19/G<br>41058 Vignola (MO)</span>
                    </div>
                </div>
                <div class="contact-item">
                    <div class="icon">🕐</div>
                    <div>
                        <strong>Orari</strong>
                        <span>Lun–Ven 8:00–22:00 · Sab 10:00–18:00 · Dom 10:00–13:00</span>
                    </div>
                </div>
                <div class="contact-item">
                    <div class="icon">📞</div>
                    <div>
                        <strong>Telefono</strong>
                        <span>+39 059 765024</span>
                    </div>
                </div>
                <div class="contact-item">
                    <div class="icon">✉️</div>
                    <div>
                        <strong>Email</strong>
                        <span>info@gymnos-vignola.it</span>
                    </div>
                </div>
            </div>
            <form class="contact-form reveal" method="post" action="contact.php">
                <input type="text" name="name" placeholder="Il tuo nome" required>
                <input type="email" name="email" placeholder="La tua email" required>
                <input type="tel" name="phone" placeholder="Telefono (opzionale)">
                <select name="interest">
                    <option value="" disabled selected>Di cosa sei interessato?</option>
                    <option value="prova">Prova gratuita</option>
                    <option value="personal">Personal Training</option>
                    <option value="corsi">Corsi di gruppo</option>
                    <option value="abbonamento">Abbonamento</option>
                    <option value="altro">Altro</option>
                </select>
                <textarea name="message" placeholder="Messaggio (opzionale)"></textarea>
                <button type="submit" class="btn btn-primary">Invia richiesta</button>
            </form>
        </div>

        <!-- MAPPA INTERATTIVA - Punto preciso Gymnos -->
        <div class="map-section reveal">
            <div class="map-wrapper">
                <iframe
                    src="https://maps.google.com/maps?q=Via+Giuseppe+Mazzini+19/G,+41058+Vignola+MO&t=m&z=17&ie=UTF8&iwloc=&output=embed"
                    allowfullscreen
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    title="Mappa Gymnos Club - Via Giuseppe Mazzini 19/G, Vignola">
                </iframe>
                <div class="map-actions">
                    <a href="https://www.google.com/maps/search/?api=1&query=Via+Giuseppe+Mazzini+19/G,+41058+Vignola+MO" 
                       target="_blank" 
                       rel="noopener noreferrer" 
                       class="btn-map-primary">
                        📍 Apri in Google Maps
                    </a>
                    <a href="https://www.google.com/maps/dir/?api=1&destination=Via+Giuseppe+Mazzini+19/G,+41058+Vignola+MO" 
                       target="_blank" 
                       rel="noopener noreferrer" 
                       class="btn-map-outline">
                        🧭 Indicazioni stradali
                    </a>
                </div>
            </div>
        </div>
    </section>


    <!-- FOOTER -->
    <footer>
        <p><strong>GYMNOS</strong> · Palestra a Vignola</p>
        <p style="margin-top:0.6rem;">&copy; <?= date('Y') ?> Gymnos. Tutti i diritti riservati.</p>
    </footer>

    <script>
        // Header scroll effect
        const header = document.getElementById('header');
        window.addEventListener('scroll', () => {
            header.classList.toggle('scrolled', window.scrollY > 40);
        });

        // Mobile menu
        const menuToggle = document.getElementById('menuToggle');
        const nav = document.getElementById('nav');
        menuToggle.addEventListener('click', () => {
            menuToggle.classList.toggle('active');
            nav.classList.toggle('open');
        });

        nav.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                menuToggle.classList.remove('active');
                nav.classList.remove('open');
            });
        });

        // Scroll reveal
        const reveals = document.querySelectorAll('.reveal');
        const revealObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });

        reveals.forEach(el => revealObserver.observe(el));

        // Animated counters
        const counters = document.querySelectorAll('.number[data-target]');
        let countersStarted = false;

        const animateCounters = () => {
            if (countersStarted) return;
            countersStarted = true;

            counters.forEach(counter => {
                const target = +counter.getAttribute('data-target');
                const label = counter.closest('.stat').querySelector('.label').textContent;
                const suffix = label.includes('Risultati') ? '%' : 
                               label.includes('Membri') ? '+' : '';
                const duration = 1800;
                const start = performance.now();

                const update = (now) => {
                    const progress = Math.min((now - start) / duration, 1);
                    const eased = 1 - Math.pow(1 - progress, 3);
                    const value = Math.floor(eased * target);
                    counter.textContent = value + (progress === 1 ? suffix : '');
                    if (progress < 1) requestAnimationFrame(update);
                };
                requestAnimationFrame(update);
            });
        };

        const statsSection = document.querySelector('.stats');
        const statsObserver = new IntersectionObserver((entries) => {
            if (entries[0].isIntersecting) {
                animateCounters();
                statsObserver.disconnect();
            }
        }, { threshold: 0.4 });

        if (statsSection) statsObserver.observe(statsSection);
    </script>
</body>
</html>


