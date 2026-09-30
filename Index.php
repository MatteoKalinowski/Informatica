Ecco il file **`index.php`** completo, pronto da copiare e incollare:

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
            --bg: #0a0a0a;
            --surface: #141414;
            --surface-2: #1c1c1c;
            --accent: #e8ff3d;
            --accent-dark: #c4d92a;
            --text: #f5f5f5;
            --muted: #9a9a9a;
            --border: rgba(255,255,255,0.08);
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
            line-height: 1.6;
            overflow-x: hidden;
        }

        /* ========== HEADER ========== */
        header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 100;
            padding: 1.1rem 2.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(10,10,10,0.85);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--border);
        }

        .logo {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 1.9rem;
            letter-spacing: 0.12em;
            color: var(--accent);
            text-decoration: none;
        }

        nav {
            display: flex;
            gap: 2rem;
            align-items: center;
        }

        nav a {
            color: var(--muted);
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            letter-spacing: 0.04em;
            transition: color 0.25s;
        }

        nav a:hover {
            color: var(--accent);
        }

        .nav-cta {
            background: var(--accent);
            color: #0a0a0a !important;
            padding: 0.55rem 1.3rem;
            border-radius: 4px;
            font-weight: 600;
            transition: background 0.25s, transform 0.2s !important;
        }

        .nav-cta:hover {
            background: var(--accent-dark);
            transform: translateY(-1px);
        }

        /* ========== HERO ========== */
        .hero {
            min-height: 100vh;
            display: grid;
            grid-template-columns: 1fr 1fr;
            align-items: center;
            padding: 7rem 4rem 4rem;
            gap: 3rem;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: "";
            position: absolute;
            top: -20%;
            right: -10%;
            width: 60%;
            height: 140%;
            background: radial-gradient(ellipse, rgba(232,255,61,0.07) 0%, transparent 70%);
            pointer-events: none;
        }

        .hero-content h1 {
            font-family: 'Bebas Neue', sans-serif;
            font-size: clamp(3.8rem, 7vw, 6.5rem);
            line-height: 0.95;
            letter-spacing: 0.03em;
            margin-bottom: 1.2rem;
        }

        .hero-content h1 span {
            color: var(--accent);
        }

        .hero-content .tagline {
            font-size: 1.15rem;
            color: var(--muted);
            max-width: 420px;
            margin-bottom: 2.2rem;
            font-weight: 300;
        }

        .hero-btns {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.9rem 1.8rem;
            font-family: 'Inter', sans-serif;
            font-size: 0.95rem;
            font-weight: 600;
            border-radius: 4px;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.25s;
            border: none;
        }

        .btn-primary {
            background: var(--accent);
            color: #0a0a0a;
        }

        .btn-primary:hover {
            background: var(--accent-dark);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(232,255,61,0.25);
        }

        .btn-outline {
            background: transparent;
            color: var(--text);
            border: 1.5px solid rgba(255,255,255,0.25);
        }

        .btn-outline:hover {
            border-color: var(--accent);
            color: var(--accent);
        }

        .hero-image-wrap {
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        .hero-image {
            width: min(380px, 85%);
            aspect-ratio: 1;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid var(--accent);
            box-shadow:
                0 0 0 12px rgba(232,255,61,0.08),
                0 20px 60px rgba(0,0,0,0.5);
            transition: transform 0.4s ease, box-shadow 0.4s ease;
        }

        .hero-image:hover {
            transform: scale(1.03);
            box-shadow:
                0 0 0 16px rgba(232,255,61,0.12),
                0 25px 70px rgba(0,0,0,0.6);
        }

        .hero-badge {
            position: absolute;
            bottom: 8%;
            right: 12%;
            background: var(--surface);
            border: 1px solid var(--border);
            padding: 0.7rem 1.1rem;
            border-radius: 8px;
            font-size: 0.85rem;
            font-weight: 500;
            box-shadow: 0 8px 30px rgba(0,0,0,0.4);
        }

        .hero-badge strong {
            color: var(--accent);
            display: block;
            font-size: 1.1rem;
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
            border-radius: 10px;
            overflow: hidden;
        }

        .stat {
            background: var(--surface);
            padding: 2.2rem 1.5rem;
            text-align: center;
        }

        .stat .number {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 2.8rem;
            color: var(--accent);
            letter-spacing: 0.04em;
            line-height: 1;
        }

        .stat .label {
            color: var(--muted);
            font-size: 0.85rem;
            margin-top: 0.4rem;
            font-weight: 400;
        }

        /* ========== SECTIONS ========== */
        section {
            padding: 6rem 2.5rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .section-header {
            text-align: center;
            margin-bottom: 3.5rem;
        }

        .section-header h2 {
            font-family: 'Bebas Neue', sans-serif;
            font-size: clamp(2.4rem, 5vw, 3.4rem);
            letter-spacing: 0.04em;
            margin-bottom: 0.7rem;
        }

        .section-header h2 span {
            color: var(--accent);
        }

        .section-header p {
            color: var(--muted);
            max-width: 520px;
            margin: 0 auto;
            font-size: 1.05rem;
        }

        /* ========== ABOUT ========== */
        .about-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
        }

        .about-text h3 {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 1.8rem;
            letter-spacing: 0.04em;
            margin-bottom: 1rem;
            color: var(--accent);
        }

        .about-text p {
            color: var(--muted);
            margin-bottom: 1.2rem;
            font-size: 1.02rem;
        }

        .about-text ul {
            list-style: none;
            margin-top: 1.5rem;
        }

        .about-text li {
            display: flex;
            align-items: center;
            gap: 0.7rem;
            margin-bottom: 0.7rem;
            font-size: 0.98rem;
        }

        .about-text li::before {
            content: "✓";
            color: var(--accent);
            font-weight: 700;
            font-size: 1.1rem;
        }

        /* ========== SERVICES ========== */
        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 1.5rem;
        }

        .service-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 2rem 1.6rem;
            transition: border-color 0.3s, transform 0.3s, box-shadow 0.3s;
        }

        .service-card:hover {
            border-color: rgba(232,255,61,0.35);
            transform: translateY(-5px);
            box-shadow: 0 12px 40px rgba(0,0,0,0.35);
        }

        .service-icon {
            width: 48px;
            height: 48px;
            background: rgba(232,255,61,0.12);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
            margin-bottom: 1.2rem;
        }

        .service-card h3 {
            font-size: 1.15rem;
            font-weight: 600;
            margin-bottom: 0.6rem;
        }

        .service-card p {
            color: var(--muted);
            font-size: 0.92rem;
            line-height: 1.6;
        }

        /* ========== TRAINER ========== */
        .trainer {
            background: var(--surface);
            border-radius: 16px;
            padding: 3rem;
            display: grid;
            grid-template-columns: auto 1fr;
            gap: 3rem;
            align-items: center;
            border: 1px solid var(--border);
        }

        .trainer-img {
            width: 220px;
            height: 220px;
            object-fit: cover;
            border-radius: 50%;
            border: 3px solid var(--accent);
        }

        .trainer-info h3 {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 2.2rem;
            letter-spacing: 0.04em;
            margin-bottom: 0.3rem;
        }

        .trainer-info .role {
            color: var(--accent);
            font-weight: 600;
            font-size: 0.95rem;
            margin-bottom: 1.2rem;
            letter-spacing: 0.03em;
        }

        .trainer-info p {
            color: var(--muted);
            margin-bottom: 1.5rem;
            max-width: 480px;
        }

        /* ========== CONTACT ========== */
        .contact-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
        }

        .contact-info h3 {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 1.8rem;
            margin-bottom: 1.5rem;
            letter-spacing: 0.04em;
        }

        .contact-item {
            display: flex;
            gap: 1rem;
            margin-bottom: 1.4rem;
            align-items: flex-start;
        }

        .contact-item .icon {
            width: 40px;
            height: 40px;
            background: rgba(232,255,61,0.12);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            font-size: 1.1rem;
        }

        .contact-item strong {
            display: block;
            font-size: 0.9rem;
            margin-bottom: 0.15rem;
        }

        .contact-item span {
            color: var(--muted);
            font-size: 0.9rem;
        }

        .contact-form {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .contact-form input,
        .contact-form textarea,
        .contact-form select {
            background: var(--surface);
            border: 1px solid var(--border);
            color: var(--text);
            padding: 0.9rem 1.1rem;
            border-radius: 6px;
            font-family: 'Inter', sans-serif;
            font-size: 0.95rem;
            outline: none;
            transition: border-color 0.25s;
        }

        .contact-form input:focus,
        .contact-form textarea:focus,
        .contact-form select:focus {
            border-color: var(--accent);
        }

        .contact-form textarea {
            min-height: 120px;
            resize: vertical;
        }

        .contact-form button {
            align-self: flex-start;
            margin-top: 0.3rem;
        }

        /* ========== FOOTER ========== */
        footer {
            background: var(--surface);
            border-top: 1px solid var(--border);
            padding: 2.5rem;
            text-align: center;
            color: var(--muted);
            font-size: 0.9rem;
        }

        footer strong {
            color: var(--accent);
            font-family: 'Bebas Neue', sans-serif;
            letter-spacing: 0.08em;
            font-size: 1.1rem;
        }

        /* ========== RESPONSIVE ========== */
        @media (max-width: 900px) {
            .hero {
                grid-template-columns: 1fr;
                text-align: center;
                padding: 6rem 1.5rem 3rem;
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
                bottom: -10px;
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
                padding: 2rem;
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
            }
        }

        @media (max-width: 500px) {
            header {
                padding: 1rem 1.2rem;
            }
            section {
                padding: 4rem 1.2rem;
            }
            .stats {
                grid-template-columns: 1fr 1fr;
            }
        }
    </style>
</head>
<body>

    <!-- HEADER -->
    <header>
        <a href="#" class="logo">GYMNOS</a>
        <nav>
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
    <div class="stats">
        <div class="stat">
            <div class="number">500+</div>
            <div class="label">Membri attivi</div>
        </div>
        <div class="stat">
            <div class="number">12</div>
            <div class="label">Corsi settimanali</div>
        </div>
        <div class="stat">
            <div class="number">8</div>
            <div class="label">Anni di esperienza</div>
        </div>
        <div class="stat">
            <div class="number">100%</div>
            <div class="label">Risultati reali</div>
        </div>
    </div>

    <!-- ABOUT -->
    <section id="about">
        <div class="section-header">
            <h2>CHI <span>SIAMO</span></h2>
            <p>Gymnos è la palestra di riferimento a Vignola. Un ambiente moderno, motivante e orientato ai risultati.</p>
        </div>
        <div class="about-grid">
            <div class="about-text">
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
            <div class="about-text">
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
        <div class="section-header">
            <h2>I NOSTRI <span>SERVIZI</span></h2>
            <p>Tutto ciò di cui hai bisogno per raggiungere i tuoi obiettivi, sotto lo stesso tetto.</p>
        </div>
        <div class="services-grid">
            <div class="service-card">
                <div class="service-icon">💪</div>
                <h3>Personal Training</h3>
                <p>Sessioni one-to-one con Luca Mancini e il nostro team. Programmi su misura, monitoraggio costante e risultati misurabili.</p>
            </div>
            <div class="service-card">
                <div class="service-icon">🏋️</div>
                <h3>Sala Pesi</h3>
                <p>Area free weights completa, macchine isotoniche e cardio di ultima generazione. Spazio, qualità e sicurezza.</p>
            </div>
            <div class="service-card">
                <div class="service-icon">🔥</div>
                <h3>Corsi di Gruppo</h3>
                <p>HIIT, Functional, Pilates, Spinning e molto altro. Energia di gruppo per spingerti oltre i tuoi limiti.</p>
            </div>
            <div class="service-card">
                <div class="service-icon">🥗</div>
                <h3>Consulenza Nutrizionale</h3>
                <p>Piani alimentari personalizzati in collaborazione con nutrizionisti partner. L’allenamento inizia a tavola.</p>
            </div>
            <div class="service-card">
                <div class="service-icon">📊</div>
                <h3>Valutazione Corporea</h3>
                <p>Analisi della composizione corporea, misurazioni e monitoraggio dei progressi nel tempo.</p>
            </div>
            <div class="service-card">
                <div class="service-icon">🎯</div>
                <h3>Programmi Mirati</h3>
                <p>Dimagrimento, ipertrofia, preparazione atletica o rieducazione motoria. Un percorso per ogni obiettivo.</p>
            </div>
        </div>
    </section>

    <!-- TRAINER -->
    <section id="trainer">
        <div class="section-header">
            <h2>IL TUO <span>TRAINER</span></h2>
            <p>Conosci chi ti accompagnerà nel tuo percorso di trasformazione.</p>
        </div>
        <div class="trainer">
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
        <div class="section-header">
            <h2>VIENI A <span>TROVARCI</span></h2>
            <p>Prenota la tua prova gratuita o contattaci per maggiori informazioni.</p>
        </div>
        <div class="contact-grid">
            <div class="contact-info">
                <h3>Gymnos Vignola</h3>
                <div class="contact-item">
                    <div class="icon">📍</div>
                    <div>
                        <strong>Indirizzo</strong>
                        <span>Via dell’Industria, Vignola (MO)</span>
                    </div>
                </div>
                <div class="contact-item">
                    <div class="icon">🕐</div>
                    <div>
                        <strong>Orari</strong>
                        <span>Lun–Ven 7:00–22:00 · Sab 9:00–18:00 · Dom chiuso</span>
                    </div>
                </div>
                <div class="contact-item">
                    <div class="icon">📞</div>
                    <div>
                        <strong>Telefono</strong>
                        <span>+39 059 123 4567</span>
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
            <form class="contact-form" method="post" action="contact.php">
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
    </section>

    <!-- FOOTER -->
    <footer>
        <p><strong>GYMNOS</strong> · Palestra a Vignola</p>
        <p style="margin-top:0.5rem;">&copy; <?= date('Y') ?> Gymnos. Tutti i diritti riservati.</p>
    </footer>

</body>
</html>
```


Metti l’immagine nella stessa cartella e chiamala `luca-mancini.jpg`.