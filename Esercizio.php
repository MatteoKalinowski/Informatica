<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ordina il tuo pasto 🍔</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #fff5e6, #ffe8cc);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding: 40px 20px;
            color: #333;
        }

        .container {
            background: white;
            border-radius: 24px;
            box-shadow: 0 20px 40px rgba(255, 140, 0, 0.15);
            max-width: 520px;
            width: 100%;
            padding: 40px 36px;
            position: relative;
            overflow: hidden;
        }

        .container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 8px;
            background: linear-gradient(90deg, #ff9a3c, #ff6b6b, #ff9a3c);
        }

        h1 {
            text-align: center;
            font-size: 1.8rem;
            color: #e85d04;
            margin-bottom: 8px;
        }

        .subtitle {
            text-align: center;
            color: #888;
            font-size: 0.95rem;
            margin-bottom: 32px;
        }

        .form-group {
            margin-bottom: 24px;
        }

        label.main-label {
            display: block;
            font-weight: 600;
            color: #444;
            margin-bottom: 8px;
            font-size: 0.95rem;
        }

        input[type="text"] {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid #ffe0b2;
            border-radius: 12px;
            font-size: 1rem;
            font-family: inherit;
            transition: all 0.25s ease;
            background: #fffaf5;
        }

        input[type="text"]:focus {
            outline: none;
            border-color: #ff9a3c;
            background: white;
            box-shadow: 0 0 0 4px rgba(255, 154, 60, 0.15);
        }

        .section-title {
            font-weight: 600;
            color: #e85d04;
            margin: 28px 0 14px;
            font-size: 1.05rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .options {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .option {
            display: flex;
            align-items: center;
            background: #fff8f0;
            padding: 14px 16px;
            border-radius: 14px;
            border: 2px solid transparent;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .option:hover {
            background: #fff0e0;
            border-color: #ffd699;
        }

        .option input {
            margin-right: 14px;
            width: 18px;
            height: 18px;
            accent-color: #e85d04;
            cursor: pointer;
        }

        .option label {
            cursor: pointer;
            flex: 1;
            font-size: 0.98rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .price {
            background: #ffe0b2;
            color: #c2410c;
            font-weight: 600;
            font-size: 0.85rem;
            padding: 4px 10px;
            border-radius: 20px;
        }

        .delivery-options {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
        }

        .delivery-option {
            background: #fff8f0;
            border-radius: 14px;
            padding: 16px;
            text-align: center;
            border: 2px solid transparent;
            cursor: pointer;
            transition: all 0.2s;
        }

        .delivery-option:hover {
            background: #fff0e0;
        }

        .delivery-option input {
            display: none;
        }

        .delivery-option input:checked + label {
            color: #e85d04;
        }

        .delivery-option input:checked ~ .check {
            opacity: 1;
        }

        .delivery-option label {
            cursor: pointer;
            font-weight: 500;
            display: block;
        }

        .submit-btn {
            width: 100%;
            background: linear-gradient(135deg, #ff9a3c, #e85d04);
            color: white;
            border: none;
            padding: 16px;
            border-radius: 14px;
            font-size: 1.1rem;
            font-weight: 600;
            font-family: inherit;
            cursor: pointer;
            margin-top: 32px;
            transition: all 0.25s ease;
            box-shadow: 0 8px 20px rgba(232, 93, 4, 0.25);
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 24px rgba(232, 93, 4, 0.35);
        }

        .submit-btn:active {
            transform: translateY(0);
        }

        /* Riepilogo ordine */
        .riepilogo {
            margin-top: 40px;
            background: #fff8f0;
            border-radius: 18px;
            padding: 28px;
            border: 2px solid #ffe0b2;
        }

        .riepilogo h2 {
            color: #e85d04;
            font-size: 1.3rem;
            margin-bottom: 18px;
            text-align: center;
        }

        .riepilogo p {
            margin-bottom: 10px;
            font-size: 0.98rem;
        }

        .riepilogo strong {
            color: #555;
        }

        .totale {
            margin-top: 18px;
            padding-top: 16px;
            border-top: 2px dashed #ffd699;
            font-size: 1.25rem;
            font-weight: 700;
            color: #e85d04;
            text-align: center;
        }

        .sconto {
            display: inline-block;
            background: #dcfce7;
            color: #166534;
            font-size: 0.8rem;
            padding: 3px 10px;
            border-radius: 20px;
            margin-left: 8px;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🍔 Ordina il tuo pasto</h1>
        <p class="subtitle">Compila i campi e goditi qualcosa di buono!</p>

        <form action="" method="post">
            <div class="form-group">
                <label class="main-label" for="nome">Il tuo nome</label>
                <input type="text" id="nome" name="nome" placeholder="Es. Mario" required>
            </div>

            <div class="form-group">
                <label class="main-label" for="cognome">Il tuo cognome</label>
                <input type="text" id="cognome" name="cognome" placeholder="Es. Rossi" required>
            </div>

            <div class="section-title">🍽️ Scegli i prodotti</div>
            <div class="options">
                <div class="option">
                    <input type="checkbox" id="Hamburger" name="prodotti[]" value="Hamburger">
                    <label for="Hamburger">
                        Hamburger
                        <span class="price">7$</span>
                    </label>
                </div>
                <div class="option">
                    <input type="checkbox" id="Pizza" name="prodotti[]" value="Pizza">
                    <label for="Pizza">
                        Pizza
                        <span class="price">8$</span>
                    </label>
                </div>
                <div class="option">
                    <input type="checkbox" id="Piadina" name="prodotti[]" value="Piadina">
                    <label for="Piadina">
                        Piadina
                        <span class="price">6$</span>
                    </label>
                </div>
            </div>

            <div class="section-title">🍟 Extra</div>
            <div class="options">
                <div class="option">
                    <input type="checkbox" id="Patatine" name="extra[]" value="Patatine">
                    <label for="Patatine">
                        Patatine
                        <span class="price">3$</span>
                    </label>
                </div>
                <div class="option">
                    <input type="checkbox" id="Bibita" name="extra[]" value="Bibita">
                    <label for="Bibita">
                        Bibita
                        <span class="price">2$</span>
                    </label>
                </div>
                <div class="option">
                    <input type="checkbox" id="Dessert" name="extra[]" value="Dessert">
                    <label for="Dessert">
                        Dessert
                        <span class="price">4$</span>
                    </label>
                </div>
            </div>

            <div class="section-title">🚚 Modalità di consegna</div>
            <div class="delivery-options">
                <div class="delivery-option">
                    <input type="radio" id="Ritiro" name="consegna" value="ritiro" checked>
                    <label for="Ritiro">
                        🏠 Ritiro<br>
                        <small style="color:#888; font-weight:400;">Gratis</small>
                    </label>
                </div>
                <div class="delivery-option">
                    <input type="radio" id="Domicilio" name="consegna" value="domicilio">
                    <label for="Domicilio">
                        🛵 A domicilio<br>
                        <small style="color:#888; font-weight:400;">+3$</small>
                    </label>
                </div>
            </div>

            <button type="submit" class="submit-btn">Conferma Ordine ✨</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nome = htmlspecialchars($_POST['nome'] ?? '');
            $cognome = htmlspecialchars($_POST['cognome'] ?? '');
            $prodotti = $_POST['prodotti'] ?? [];
            $extra = $_POST['extra'] ?? [];
            $consegna = $_POST['consegna'] ?? null;

            $prezziProdotti = [
                'Hamburger' => 7,
                'Pizza' => 8,
                'Piadina' => 6
            ];

            $prezziExtra = [
                'Patatine' => 3,
                'Bibita' => 2,
                'Dessert' => 4
            ];

            $prezzo_totale = 0;

            foreach ($prodotti as $prodotto) {
                if (isset($prezziProdotti[$prodotto])) {
                    $prezzo_totale += $prezziProdotti[$prodotto];
                }
            }

            foreach ($extra as $item) {
                if (isset($prezziExtra[$item])) {
                    $prezzo_totale += $prezziExtra[$item];
                }
            }

            if ($consegna === 'domicilio') {
                $prezzo_totale += 3;
            }

            $sconto_applicato = false;
            if ($prezzo_totale > 20) {
                $prezzo_totale *= 0.90;
                $sconto_applicato = true;
            }

            $prodotto_selezionato = !empty($prodotti) ? implode(', ', $prodotti) : 'Nessun prodotto selezionato';
            $extra_selezionati = !empty($extra) ? implode(', ', $extra) : 'Nessun extra selezionato';
            $consegna_label = $consegna === 'ritiro' ? 'Ritiro in negozio' : ($consegna === 'domicilio' ? 'Consegna a domicilio' : 'Nessuna modalità selezionata');
        ?>
            <div class="riepilogo">
                <h2>📋 Riepilogo Ordine</h2>
                <p><strong>Nome:</strong> <?= $nome ?> <?= $cognome ?></p>
                <p><strong>Prodotti:</strong> <?= $prodotto_selezionato ?></p>
                <p><strong>Extra:</strong> <?= $extra_selezionati ?></p>
                <p><strong>Consegna:</strong> <?= $consegna_label ?></p>
                <div class="totale">
                    Totale: $<?= number_format($prezzo_totale, 2, ',', '.') ?>
                    <?php if ($sconto_applicato): ?>
                        <span class="sconto">-10% sconto!</span>
                    <?php endif; ?>
                </div>
            </div>
        <?php } ?>
    </div>
</body>
</html>