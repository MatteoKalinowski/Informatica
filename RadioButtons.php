<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="Index.php" method="post">
        <input type="radio" name="CartaCredito" value="Visa">Visa<br>
        <input type="radio" name="CartaCredito" value="MasterCard">MasterCard<br>
        <input type="radio" name="CartaCredito" value="AmericanExpress">American Express<br>
        <input type="submit" name="confirm" value="Conferma">
    </form>

    <form action="Index.php" method="post">
        <input type="checkbox" name="cibi[]" value="Banana">Banana<br>
        <input type="checkbox" name="cibi[]" value="Mela">Mela<br>
        <input type="checkbox" name="cibi[]" value="Pera">Pera<br>
        <input type="submit" name="confirm2" value="Conferma">
    </form>
</body>
</html>

<?php
if (isset($_POST['confirm'])) {
    $cartaCredito = null;

    if (isset($_POST["CartaCredito"])) {
        $cartaCredito = $_POST["CartaCredito"];
    }

    echo "<p>Hai selezionato la carta di credito: {$cartaCredito}</p>";
}

if (isset($_POST['confirm2'])) {
    $c = $_POST["cibi"] ?? [];

    foreach ($c as $cibo) {
        echo "<p>Hai selezionato: {$cibo}</p>";
    }
} if (isset($_POST['confirm2']) && !isset($_POST["cibi"])) {
    echo "<p>Non hai selezionato nessun cibo.</p>";
}
?>