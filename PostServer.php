<!--// $_POST = i dati vengono inviati nel corpo della richiesta HTTP, SICURO, nessun limite di caratteri, le richieste POST non possono essere salvate in cache, meno facili da condividere, meno facili da memorizzare nei preferiti
// $_GET = i dati vengono inviati nell'URL, NON SICURO, limite di caratteri, le richieste GET possono essere salvate in cache, facili da condividere, facili da memorizzare nei preferiti
// $_GET e $_POST variabili speciali che contengono da un form HTML, i dati vengono inviati al file indicato nell'attributo action del tag. -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label>Prezzo: </label>
        <br>
        <input type="text" name="prezzo">
        <br>
        <label>Quantità: </label>
        <br>
        <input type="text" name="quantita">
        <br><br><br>
        <input type="submit" value="totale">
    </form>

    <!--If($_SERVER["REQUEST_METHOD"] === "POST") {
        $quantita = $_POST["quantita"];
        $prezzo = $_POST["prezzo"];
        $totale = $quantita * $prezzo;

        echo "<p>Hai ordinato {$quantita} {$cibo}</p>";
        echo "<p>Il totale è: {$totale}</p>";

        vuoldire che se il metodo della richiesta HTTP è POST allora esegui il codice al suo interno, altrimenti non eseguirlo, inoltre $_SERVER["REQUEST_METHOD"] è una variabile speciale che contiene il metodo della richiesta HTTP, in questo caso POST.   
    }-->

    <?php
        $cibo = "Pizza";
        $quantita = $_POST["quantita"] ?? "";
        $prezzo = $_POST["prezzo"] ?? "";

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if (empty($quantita) && empty($prezzo)) {
                echo "<p>Errore: tutti i campi devono essere compilati.</p>";
            } elseif (empty($quantita)) {
                echo "<p>Errore: il campo quantità deve essere compilato.</p>";
            } elseif (empty($prezzo)) {
                echo "<p>Errore: il campo prezzo deve essere compilato.</p>";
            } elseif (!is_numeric($quantita) || !is_numeric($prezzo)) {
                echo "<p>Errore: i campi quantità e prezzo devono essere numerici.</p>";
            } else {
                $totale = $quantita * $prezzo;

                echo "<p>Hai ordinato {$quantita} {$cibo}</p>";
                echo "<p>Il totale è: {$totale}</p>";
            }
        }
    ?>
</body>
</html>