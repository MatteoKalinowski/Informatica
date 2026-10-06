Ecco la versione **molto più bella e dinamica**.  

Ho potenziato:

- Animazioni più fluide e staggered  
- Glow e glassmorphism più sofisticati  
- Hover avanzati su card e immagini  
- Header e bottoni più “premium”  
- Micro-interazioni e rivelazioni più eleganti  
- Tipografia e spaziature raffinate  
- Effetti di luce e profondità  
- Mobile ancora più curato  

Copia e incolla questo file completo:

```php
<?php
$pageTitle = "Gymnos | Palestra a Vignola";
$tagline   = "Trasforma il tuo corpo con Luca Mancini. Supera i tuoi limiti.";
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
            --bg: #070707;
            --surface: #111111;
            --surface-2: #1a1a1a;
            --accent: #e8ff3d;
            --accent-dark: #c4d92a;
            --accent-glow: rgba(232, 255, 61, 0.35);
            --text: #f5f5f5;
            --muted: #9a9a9a;
            --border: rgba(255,255,255,0.08);
            --radius: 18px;
            --ease: cubic-bezier(0.22, 1, 0.36, 1);
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
            cursor: default;
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: var(--bg); }
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(var(--accent), var(--accent-dark));
            border-radius: 10px;
        }

        /* ========== HEADER ========== */
        header {
            position: fixed;
            top: 0; left: 0; right: 0;
            z-index: 1000;
            padding: 1.2rem 2.8rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(7,7,7,0.55);
            backdrop-filter: blur(20px) saturate(180%);
            -webkit-backdrop-filter: blur(20px) saturate(180%);
            border-bottom: 1px solid transparent;
            transition: all 0.4s var(--ease);
        }

        header.scrolled {
            background: rgba(7,7,7,0.92);
            border-bottom-color: var(--border);
            padding: 0.85rem 2.8rem;
            box-shadow: 0 10px 40px rgba(0,0,0,0.5);
        }

        .logo {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 2.05rem;
            letter-spacing: 0.16em;
            color: var(--accent);
            text-decoration: none;
            position: relative;
            transition: all 0.3s;
        }

        .logo::after {
            content: "";
            position: absolute;
            inset: -8px -12px;
            background: radial-gradient(circle, var(--accent-glow), transparent 70%);
            opacity: 0;
            transition: opacity 0.4s;
            z-index: -1;
            border-radius: 50%;
        }

        .logo:hover::after { opacity: 1; }
        .logo:hover { text-shadow: 0 0 30px var(--accent-glow); }

        nav {
            display: flex;
            gap: 2.4rem;
            align-items: center;
        }

        nav a {
            color: var(--muted);
            text-decoration: none;
            font-size: 0.92rem;
            font-weight: 500;
            letter-spacing: 0.04em;
            position: relative;
            transition: color 0.3s;
            padding: 0.2rem 0;
        }

        nav a:not(.nav-cta)::after {
            content: "";
            position: absolute;
            bottom: -2px;
            left: 50%;
            width: 0;
            height: 2px;
            background: var(--accent);
            transition: all 0.35s var(--ease);
            transform: translateX(-50%);
            border-radius: 2px;
        }

        nav a:not(.nav-cta):hover {
            color: #fff;
        }

        nav a:not(.nav-cta):hover::after {
            width: 100%;
        }

        .nav-cta {
            background: linear-gradient(135deg, var(--accent), var(--accent-dark));
            color: #0a0a0a !important;
            padding: 0.65rem 1.5rem;
            border-radius: 12px;
            font-weight: 600;
            box-shadow: 0 6px 20px rgba(232,255,61,0.25);
            transition: all 0.35s var(--ease) !important;
            position: relative;
            overflow: hidden;
        }

        .nav-cta::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, transparent, rgba(255,255,255,0.25), transparent);
            transform: translateX(-100%);
            transition: transform 0.5s;
        }

        .nav-cta:hover::before { transform: translateX(100%); }
        .nav-cta:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(232,255,61,0.4);
        }

        .menu-toggle {
            display: none;
            flex-direction: column;
            gap: 6px;
            background: none;
            border: none;
            cursor: pointer;
            padding: 8px;
            z-index: 10;
        }

        .menu-toggle span {
            display: block;
            width: 26px;
            height: 2.5px;
            background: var(--text);
            border-radius: 3px;
            transition: all 0.35s var(--ease);
        }

        .menu-toggle.active span:nth-child(1) { transform: translateY(8.5px) rotate(45deg); }
        .menu-toggle.active span:nth-child(2) { opacity: 0; transform: scaleX(0); }
        .menu-toggle.active span:nth-child(3) { transform: translateY(-8.5px) rotate(-45deg); }

        /* ========== HERO ========== */
        .hero {
            min-height: 100vh;
            display: grid;
            grid-template-columns: 1fr 1fr;
            align-items: center;
            padding: 8rem 4.5rem 5rem;
            gap: 3rem;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: "";
            position: absolute;
            top: -40%;
            right: -20%;
            width: 80%;
            height: 180%;
            background: radial-gradient(ellipse at center, rgba(232,255,61,0.12) 0%, transparent 65%);
            pointer-events: none;
            animation: pulseGlow 10s ease-in-out infinite alternate;
        }

        .hero::after {
            content: "";
            position: absolute;
            bottom: 10%;
            left: -10%;
            width: 40%;
            height: 40%;
            background: radial-gradient(circle, rgba(232,255,61,0.05), transparent 70%);
            pointer-events: none;
        }

        @keyframes pulseGlow {
            0% { opacity: 0.6; transform: scale(1) rotate(0deg); }
            100% { opacity: 1; transform: scale(1.08) rotate(3deg); }
        }

        .hero-content h1 {
            font-family: 'Bebas Neue', sans-serif;
            font-size: clamp(4rem, 8vw, 7.2rem);
            line-height: 0.9;
            letter-spacing: 0.02em;
            margin-bottom: 1.4rem;
            opacity: 0;
            transform: translateY(40px);
            animation: fadeUp 1s 0.15s forwards var(--ease);
        }

        .hero-content h1 span {
            background: linear-gradient(135deg, var(--accent), #f0ff7a);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            display: inline-block;
        }

        .hero-content .tagline {
            font-size: 1.22rem;
            color: var(--muted);
            max-width: 440px;
            margin-bottom: 2.6rem;
            font-weight: 300;
            opacity: 0;
            transform: translateY(30px);
            animation: fadeUp 1s 0.35s forwards var(--ease);
        }

        .hero-btns {
            display: flex;
            gap: 1.1rem;
            flex-wrap: wrap;
            opacity: 0;
            transform: translateY(30px);
            animation: fadeUp 1s 0.5s forwards var(--ease);
        }

        @keyframes fadeUp {
            to { opacity: 1; transform: translateY(0); }
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.6rem;
            padding: 1.05rem 2.1rem;
            font-family: 'Inter', sans-serif;
            font-size: 0.98rem;
            font-weight: 600;
            border-radius: 14px;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.35s var(--ease);
            border: none;
            position: relative;
            overflow: hidden;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--accent), var(--accent-dark));
            color: #0a0a0a;
            box-shadow: 0 8px 25px rgba(232,255,61,0.3);
        }

        .btn-primary:hover {
            transform: translateY(-4px) scale(1.02);
            box-shadow: 0 16px 40px rgba(232,255,61,0.45);
        }

        .btn-outline {
            background: rgba(255,255,255,0.03);
            color: var(--text);
            border: 1.5px solid rgba(255,255,255,0.18);
            backdrop-filter: blur(8px);
        }

        .btn-outline:hover {
            border-color: var(--accent);
            color: var(--accent);
            background: rgba(232,255,61,0.08);
            transform: translateY(-3px);
        }

        .hero-image-wrap {
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            opacity: 0;
            transform: scale(0.9) translateY(20px);
            animation: fadeScale 1.1s 0.3s forwards var(--ease);
        }

        @keyframes fadeScale {
            to { opacity: 1; transform: scale(1) translateY(0); }
        }

        .hero-image {
            width: min(400px, 88%);
            aspect-ratio: 1;
            object-fit: cover;
            border-radius: 50%;
            border: 5px solid var(--accent);
            box-shadow:
                0 0 0 16px rgba(232,255,61,0.1),
                0 30px 80px rgba(0,0,0,0.6),
                0 0 60px rgba(232,255,61,0.15);
            transition: all 0.6s var(--ease);
        }

        .hero-image:hover {
            transform: scale(1.05);
            box-shadow:
                0 0 0 22px rgba(232,255,61,0.15),
                0 40px 100px rgba(0,0,0,0.7),
                0 0 80px rgba(232,255,61,0.25);
        }

        .hero-badge {
            position: absolute;
            bottom: 6%;
            right: 8%;
            background: rgba(17,17,17,0.85);
            backdrop-filter: blur(16px);
            border: 1px solid var(--border);
            padding: 0.9rem 1.4rem;
            border-radius: 16px;
            font-size: 0.88rem;
            font-weight: 500;
            box-shadow: 0 15px 40px rgba(0,0,0,0.5);
            animation: float 5s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-12px); }
        }

        .hero-badge strong {
            color: var(--accent);
            display: block;
            font-size: 1.25rem;
            font-family: 'Bebas Neue', sans-serif;
            letter-spacing: 0.06em;
        }

        /* ========== STATS ========== */
        .stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1px;
            background: var(--border);
            margin: 0 2.5rem;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 25px 60px rgba(0,0,0,0.4);
        }

        .stat {
            background: var(--surface);
            padding: 2.6rem 1.5rem;
            text-align: center;
            transition: all 0.4s var(--ease);
            position: relative;
            overflow: hidden;
        }

        .stat::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(145deg, transparent 40%, rgba(232,255,61,0.06));
            opacity: 0;
            transition: opacity 0.4s;
        }

        .stat:hover::before { opacity: 1; }
        .stat:hover {
            background: var(--surface-2);
            transform: translateY(-4px);
        }

        .stat .number {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 3.1rem;
            color: var(--accent);
            letter-spacing: 0.04em;
            line-height: 1;
            text-shadow: 0 0 30px var(--accent-glow);
        }

        .stat .label {
            color: var(--muted);
            font-size: 0.9rem;
            margin-top: 0.5rem;
            font-weight: 400;
        }

        /* ========== SECTIONS ========== */
        section {
            padding: 7rem 2.5rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .section-header {
            text-align: center;
            margin-bottom: 4rem;
        }

        .section-header h2 {
            font-family: 'Bebas Neue', sans-serif;
            font-size: clamp(2.6rem, 5.5vw, 3.8rem);
            letter-spacing: 0.04em;
            margin-bottom: 0.9rem;
        }

        .section-header h2 span {
            background: linear-gradient(135deg, var(--accent), #f0ff7a);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .section-header p {
            color: var(--muted);
            max-width: 560px;
            margin: 0 auto;
            font-size: 1.1rem;
        }

        .reveal {
            opacity: 0;
            transform: translateY(50px);
            transition: opacity 0.9s var(--ease), transform 0.9s var(--ease);
        }

        .reveal.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* ABOUT */
        .about-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4.5rem;
            align-items: start;
        }

        .about-text h3 {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 1.95rem;
            letter-spacing: 0.04em;
            margin-bottom: 1.2rem;
            color: var(--accent);
        }

        .about-text p {
            color: var(--muted);
            margin-bottom: 1.3rem;
            font-size: 1.05rem;
        }

        .about-text ul {
            list-style: none;
            margin-top: 1.8rem;
        }

        .about-text li {
            display: flex;
            align-items: center;
            gap: 0.85rem;
            margin-bottom: 0.85rem;
            font-size: 1rem;
            transition: all 0.3s;
            padding: 0.3rem 0;
        }

        .about-text li:hover {
            transform: translateX(10px);
            color: #fff;
        }

        .about-text li::before {
            content: "✓";
            color: var(--accent);
            font-weight: 700;
            font-size: 1.2rem;
            flex-shrink: 0;
            text-shadow: 0 0 12px var(--accent-glow);
        }

        /* SERVICES */
        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.8rem;
        }

        .service-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 2.3rem 1.9rem;
            transition: all 0.45s var(--ease);
            position: relative;
            overflow: hidden;
        }

        .service-card::before {
            content: "";
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--accent), transparent);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.45s var(--ease);
        }

        .service-card:hover {
            border-color: rgba(232,255,61,0.35);
            transform: translateY(-10px);
            box-shadow: 0 25px 60px rgba(0,0,0,0.45);
            background: var(--surface-2);
        }

        .service-card:hover::before { transform: scaleX(1); }

        .service-icon {
            width: 56px;
            height: 56px;
            background: rgba(232,255,61,0.12);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.6rem;
            margin-bottom: 1.4rem;
            transition: all 0.4s var(--ease);
        }

        .service-card:hover .service-icon {
            transform: scale(1.12) rotate(-6deg);
            background: rgba(232,255,61,0.22);
            box-shadow: 0 0 25px rgba(232,255,61,0.2);
        }

        .service-card h3 {
            font-size: 1.22rem;
            font-weight: 600;
            margin-bottom: 0.7rem;
        }

        .service-card p {
            color: var(--muted);
            font-size: 0.95rem;
            line-height: 1.7;
        }

        /* TRAINER */
        .trainer {
            background: linear-gradient(150deg, var(--surface), var(--surface-2));
            border-radius: 24px;
            padding: 3.5rem;
            display: grid;
            grid-template-columns: auto 1fr;
            gap: 3.5rem;
            align-items: center;
            border: 1px solid var(--border);
            box-shadow: 0 30px 70px rgba(0,0,0,0.4);
            transition: all 0.45s var(--ease);
        }

        .trainer:hover {
            transform: translateY(-6px);
            box-shadow: 0 40px 90px rgba(0,0,0,0.5);
        }

        .trainer-img {
            width: 240px;
            height: 240px;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid var(--accent);
            box-shadow: 0 0 0 12px rgba(232,255,61,0.12);
            transition: all 0.5s var(--ease);
        }

        .trainer:hover .trainer-img {
            transform: scale(1.04);
            box-shadow: 0 0 0 16px rgba(232,255,61,0.18);
        }

        .trainer-info h3 {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 2.5rem;
            letter-spacing: 0.04em;
            margin-bottom: 0.35rem;
        }

        .trainer-info .role {
            color: var(--accent);
            font-weight: 600;
            font-size: 1rem;
            margin-bottom: 1.4rem;
            letter-spacing: 0.03em;
        }

        .trainer-info p {
            color: var(--muted);
            margin-bottom: 1.9rem;
            max-width: 520px;
            line-height: 1.75;
            font-size: 1.05rem;
        }

        /* AZIONE */
        .azione-card {
            margin: 3.5rem auto 0;
            max-width: 700px;
            border-radius: 22px;
            overflow: hidden;
            border: 1px solid var(--border);
            box-shadow: 0 25px 60px rgba(0,0,0,0.4);
            position: relative;
        }

        .azione-card img {
            width: 100%;
            display: block;
            height: 520px;
            object-fit: cover;
            object-position: top center;
            transition: transform 0.7s var(--ease);
        }

        .azione-card:hover img { transform: scale(1.05); }

        .azione-overlay {
            position: absolute;
            bottom: 0; left: 0; right: 0;
            padding: 2rem 2.2rem;
            background: linear-gradient(transparent, rgba(0,0,0,0.85));
        }

        .azione-overlay h3 {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 1.9rem;
            letter-spacing: 0.05em;
            margin-bottom: 0.35rem;
        }

        .azione-overlay p {
            color: var(--muted);
            font-size: 0.98rem;
        }

        /* TRANSFORMAZIONE */
        .transformation-card {
            position: relative;
            max-width: 920px;
            margin: 0 auto 2.8rem;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 30px 70px rgba(0,0,0,0.45);
            border: 1px solid var(--border);
        }

        .transformation-img {
            width: 100%;
            display: block;
            transition: transform 0.7s var(--ease);
        }

        .transformation-card:hover .transformation-img { transform: scale(1.04); }

        .transformation-caption {
            position: absolute;
            bottom: 0; left: 0; right: 0;
            display: flex;
            justify-content: space-between;
            padding: 1.4rem 2rem;
            background: linear-gradient(transparent, rgba(0,0,0,0.8));
        }

        .badge-prima, .badge-dopo {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 1.5rem;
            letter-spacing: 0.08em;
            padding: 0.45rem 1.2rem;
            border-radius: 10px;
        }

        .badge-prima {
            background: rgba(255,255,255,0.12);
            color: #fff;
            backdrop-filter: blur(10px);
        }

        .badge-dopo {
            background: linear-gradient(135deg, var(--accent), var(--accent-dark));
            color: #0a0a0a;
            box-shadow: 0 4px 15px rgba(232,255,61,0.3);
        }

        .transformation-quote {
            text-align: center;
            max-width: 540px;
            margin: 0 auto 1rem;
        }

        .transformation-quote p {
            font-size: 1.3rem;
            font-style: italic;
            color: var(--text);
            margin-bottom: 0.7rem;
            line-height: 1.55;
        }

        .transformation-quote span {
            color: var(--accent);
            font-weight: 600;
            font-size: 1rem;
        }

        /* SPONSOR */
        .sponsor-card {
            margin: 4rem auto 0;
            max-width: 540px;
            border-radius: 24px;
            overflow: hidden;
            border: 1px solid var(--border);
            box-shadow: 0 25px 60px rgba(0,0,0,0.45);
            position: relative;
            background: var(--surface);
            transition: all 0.45s var(--ease);
        }

        .sponsor-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 35px 80px rgba(0,0,0,0.55);
        }

        .sponsor-card img {
            width: 100%;
            display: block;
            transition: transform 0.6s var(--ease);
        }

        .sponsor-card:hover img { transform: scale(1.04); }

        .sponsor-badge {
            position: absolute;
            top: 1.3rem;
            left: 1.3rem;
            background: linear-gradient(135deg, var(--accent), var(--accent-dark));
            color: #0a0a0a;
            font-family: 'Bebas Neue', sans-serif;
            font-size: 1.05rem;
            letter-spacing: 0.06em;
            padding: 0.45rem 1rem;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(232,255,61,0.35);
        }

        .sponsor-info {
            padding: 1.7rem 1.8rem;
            text-align: center;
        }

        .sponsor-info h3 {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 1.85rem;
            letter-spacing: 0.04em;
            margin-bottom: 0.45rem;
        }

        .sponsor-info p {
            color: var(--muted);
            font-size: 0.98rem;
        }

        /* CONTACT */
        .contact-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
        }

        .contact-info h3 {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 2.1rem;
            margin-bottom: 1.9rem;
            letter-spacing: 0.04em;
        }

        .contact-item {
            display: flex;
            gap: 1.2rem;
            margin-bottom: 1.6rem;
            align-items: flex-start;
            transition: all 0.3s;
            padding: 0.4rem 0;
        }

        .contact-item:hover {
            transform: translateX(8px);
        }

        .contact-item .icon {
            width: 48px;
            height: 48px;
            background: rgba(232,255,61,0.12);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            font-size: 1.25rem;
            transition: all 0.35s;
        }

        .contact-item:hover .icon {
            background: rgba(232,255,61,0.25);
            transform: scale(1.1);
            box-shadow: 0 0 20px rgba(232,255,61,0.2);
        }

        .contact-item strong {
            display: block;
            font-size: 0.95rem;
            margin-bottom: 0.25rem;
        }

        .contact-item span {
            color: var(--muted);
            font-size: 0.95rem;
        }

        .contact-form {
            display: flex;
            flex-direction: column;
            gap: 1.2rem;
            background: var(--surface);
            padding: 2.3rem;
            border-radius: var(--radius);
            border: 1px solid var(--border);
            box-shadow: 0 20px 50px rgba(0,0,0,0.3);
        }

        .contact-form input,
        .contact-form textarea,
        .contact-form select {
            background: var(--bg);
            border: 1px solid var(--border);
            color: var(--text);
            padding: 1.05rem 1.25rem;
            border-radius: 12px;
            font-family: 'Inter', sans-serif;
            font-size: 0.98rem;
            outline: none;
            transition: all 0.3s;
        }

        .contact-form input:focus,
        .contact-form textarea:focus,
        .contact-form select:focus {
            border-color: var(--accent);
            box-shadow: 0 0 0 4px rgba(232,255,61,0.15);
        }

        .contact-form textarea {
            min-height: 140px;
            resize: vertical;
        }

        .contact-form button {
            align-self: flex-start;
            margin-top: 0.5rem;
        }

        /* MAP */
        .map-section { margin-top: 4rem; }

        .map-wrapper {
            border-radius: 20px;
            overflow: hidden;
            border: 1px solid var(--border);
            box-shadow: 0 25px 60px rgba(0,0,0,0.4);
            background: var(--surface);
        }

        .map-wrapper iframe {
            display: block;
            width: 100%;
            height: 440px;
            border: 0;
            filter: grayscale(20%) contrast(1.05);
            transition: filter 0.5s;
        }

        .map-wrapper:hover iframe {
            filter: grayscale(0%) contrast(1);
        }

        .map-actions {
            display: flex;
            gap: 1.1rem;
            flex-wrap: wrap;
            padding: 1.4rem 1.6rem;
            background: var(--surface);
            border-top: 1px solid var(--border);
            justify-content: center;
        }

        .map-actions a {
            display: inline-flex;
            align-items: center;
            gap: 0.55rem;
            padding: 0.8rem 1.5rem;
            border-radius: 12px;
            font-size: 0.95rem;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.35s var(--ease);
        }

        .map-actions .btn-map-primary {
            background: linear-gradient(135deg, var(--accent), var(--accent-dark));
            color: #0a0a0a;
            box-shadow: 0 6px 20px rgba(232,255,61,0.25);
        }

        .map-actions .btn-map-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 28px rgba(232,255,61,0.4);
        }

        .map-actions .btn-map-outline {
            background: transparent;
            color: var(--text);
            border: 1px solid rgba(255,255,255,0.2);
        }

        .map-actions .btn-map-outline:hover {
            border-color: var(--accent);
            color: var(--accent);
            background: rgba(232,255,61,0.08);
        }

        footer {
            background: var(--surface);
            border-top: 1px solid var(--border);
            padding: 3.2rem 2rem;
            text-align: center;
            color: var(--muted);
            font-size: 0.95rem;
        }

        footer strong {
            color: var(--accent);
            font-family: 'Bebas Neue', sans-serif;
            letter-spacing: 0.12em;
            font-size: 1.3rem;
            text-shadow: 0 0 20px var(--accent-glow);
        }

        /* RESPONSIVE */
        @media (max-width: 900px) {
            .hero {
                grid-template-columns: 1fr;
                text-align: center;
                padding: 7rem 1.6rem 4rem;
            }
            .hero-content .tagline { margin-left: auto; margin-right: auto; }
            .hero-btns { justify-content: center; }
            .hero-badge {
                right: 50%;
                transform: translateX(50%);
                bottom: -15px;
            }
            .stats {
                grid-template-columns: repeat(2, 1fr);
                margin: 0 1.2rem;
            }
            .about-grid, .contact-grid, .trainer {
                grid-template-columns: 1fr;
                text-align: center;
            }
            .trainer { padding: 2.4rem; }
            .trainer-img { margin: 0 auto; }
            .about-text ul { display: inline-block; text-align: left; }
            .contact-form button { align-self: center; }
            nav {
                display: none;
                position: absolute;
                top: 100%;
                left: 0; right: 0;
                background: rgba(7,7,7,0.97);
                backdrop-filter: blur(20px);
                flex-direction: column;
                padding: 1.8rem;
                gap: 1.4rem;
                border-bottom: 1px solid var(--border);
            }
            nav.open { display: flex; }
            .menu-toggle { display: flex; }
            .map-wrapper iframe { height: 340px; }
        }

        @media (max-width: 500px) {
            header { padding: 1rem 1.3rem; }
            header.scrolled { padding: 0.85rem 1.3rem; }
            section { padding: 4.8rem 1.3rem; }
            .stats { grid-template-columns: 1fr 1fr; }
            .contact-form { padding: 1.6rem; }
            .map-wrapper iframe { height: 290px; }
            .map-actions { flex-direction: column; align-items: stretch; }
            .map-actions a { justify-content: center; }
        }
    </style>
</head>
<body>

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
            <a href="#trasformazione">Trasformazione</a>
            <a href="#contatti" class="nav-cta">Prenota Ora</a>
        </nav>
    </header>

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

        <div class="azione-card reveal">
            <img src="luca-allenamento.jpg" alt="Luca Mancini in allenamento a Gymnos">
            <div class="azione-overlay">
                <h3>Luca in Azione</h3>
                <p>Sessioni di gruppo intense e motivanti nella nostra sala</p>
            </div>
        </div>
    </section>

    <section id="trasformazione">
        <div class="section-header reveal">
            <h2>LA SUA <span>TRASFORMAZIONE</span></h2>
            <p>Dal noob al chad. Ecco come Luca ha trasformato il suo corpo con costanza e metodo.</p>
        </div>

        <div class="transformation-card reveal">
            <img src="luca-trasformazione.jpg" alt="Luca Mancini - Prima e Dopo" class="transformation-img">
            <div class="transformation-caption">
                <div class="badge-prima">PRIMA</div>
                <div class="badge-dopo">DOPO</div>
            </div>
        </div>

        <div class="transformation-quote reveal">
            <p>“La differenza tra me e te sono i panini con tonno e uova del forno Tre Spighe”</p>
            <span>— Luca Mancini</span>
        </div>

        <div class="sponsor-card reveal">
            <div class="sponsor-badge">SPONSOR UFFICIALE</div>
            <img src="luca-sponsor-acqua.jpg" alt="Luca Mancini sponsor Acqua Bollente GymNos">
            <div class="sponsor-info">
                <h3>Acqua Bollente GymNos</h3>
                <p>L’unica acqua ufficiale della palestra. Sempre calda, sempre GymNos.</p>
            </div>
        </div>
    </section>

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
                       target="_blank" rel="noopener noreferrer" class="btn-map-primary">
                        📍 Apri in Google Maps
                    </a>
                    <a href="https://www.google.com/maps/dir/?api=1&destination=Via+Giuseppe+Mazzini+19/G,+41058+Vignola+MO" 
                       target="_blank" rel="noopener noreferrer" class="btn-map-outline">
                        🧭 Indicazioni stradali
                    </a>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <p><strong>GYMNOS</strong> · Palestra a Vignola</p>
        <p style="margin-top:0.7rem;">&copy; <?= date('Y') ?> Gymnos. Tutti i diritti riservati.</p>
    </footer>

    <script>
        const header = document.getElementById('header');
        window.addEventListener('scroll', () => {
            header.classList.toggle('scrolled', window.scrollY > 50);
        });

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

        // Reveal on scroll with staggered effect
        const reveals = document.querySelectorAll('.reveal');
        const revealObserver = new IntersectionObserver((entries) => {
            entries.forEach((entry, index) => {
                if (entry.isIntersecting) {
                    setTimeout(() => {
                        entry.target.classList.add('visible');
                    }, index * 80);
                }
            });
        }, { threshold: 0.1, rootMargin: '0px 0px -60px 0px' });

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
                const duration = 2000;
                const start = performance.now();

                const update = (now) => {
                    const progress = Math.min((now - start) / duration, 1);
                    const eased = 1 - Math.pow(1 - progress, 4);
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
        }, { threshold: 0.35 });

        if (statsSection) statsObserver.observe(statsSection);
    </script>
</body>
</html>
