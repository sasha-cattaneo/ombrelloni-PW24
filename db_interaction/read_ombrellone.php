<?php
include("config.php");
$connessione = mysqli_connect($host, $username, $password, $database);

$query = "SELECT * FROM ".$_GET["table"];
//print($query);
$result = mysqli_query($connessione, $query);

//$ombrelloni = mysqli_fetch_all($result);

//print(json_encode($ombrelloni));

$rows = array();
$lenght = 0;
while($r = mysqli_fetch_assoc($result)) {
    	$rows[] = $r;
        $lenght++;
}
header('Content-Type: application/json; charset=utf-8');
//echo($lenght."<br>");
echo(json_encode($rows));
// while($ombrellone = mysqli_fetch_assoc($ombrelloni, MYSQLI_ASSOC))
// {
// 	echo("[".$ombrellone['id'].",".
//     $ombrellone['settore'].",".
//     $ombrellone['numFila'].",".
//     $ombrellone['numPostoFila'].",".
//     $ombrellone['tipologia']."]");
// }
?>