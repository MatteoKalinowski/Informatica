<?php

//Array

$cibi = array("Mela", "Pera", "Banana", "Kiwi", "Ananas");

//$cibi[0] = "Fragola"; Sostituzione
//array_push($cibi, "Fragola"); Aggiunta
//array_pop($cibi); Rimozione dell'ultimo elemento
//array_shift($cibi); Rimozione del primo elemento
//$cibi = array_reverse($cibi); Inverte l'array

/*
for($i = 0; $i < count($cibi); $i++) {
    echo $cibi[$i]."<br>";
}
*/

foreach($cibi as $cibo) {
    echo $cibo."<br>";
}

//Array Associativi
//Array composto di coppiechiave => valore

$capitali = array(
    "USA" => "Washington D.C.",
    "Italia" => "Roma",
    "Francia" => "Parigi");

//$capitali["USA"] = "New York"; Sostituzione
//array_push($capitali, "Londra"); Aggiunta
//array_pop($capitali); Rimozione dell'ultimo elemento
//array_shift($capitali); Rimozione del primo elemento
//$capitali = array_reverse($capitali); Inverte l'array

$chiavi = array_keys($capitali); //Prende solo le chiavi dell'array
$valori = array_values($capitali); //Prende solo i valori dell'array

foreach($capitali as $chiave => $valore) {
    echo "{$chiave} = {$valore}<br>";
}
?>














<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <form action="sa.php" method="get">
            <label>username: </label>
</br>
            <input type="text" name="username">
</br>
            <label>password: </label>
</br>
            <input type="password" name="password">
</br> </br> </br>
            <input type="submit" value="login">

        </form>
</body>
</html>

<?php
    echo "{$_GET['username']} <br>";
    echo "{$_GET['password']} <br>";
?>

