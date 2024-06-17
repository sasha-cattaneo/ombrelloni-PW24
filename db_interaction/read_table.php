<?php
include("config.php");
$connessione = mysqli_connect($host, $username, $password, $database);

if(!$connessione)
    die("Errore di connessione: " . $connessione->connect_error);

if(!$_GET["join"])
    $q = "SELECT * FROM ".$_GET["table"];
else{
    $q_foreign_key = "SELECT COLUMN_NAME FROM information_schema.KEY_COLUMN_USAGE WHERE TABLE_NAME = '".$_GET["table"]."' AND REFERENCED_TABLE_NAME = '".$_GET["table_to_join"]."'";
    $query_foreign_key = $connessione->prepare($q_foreign_key);
    if($query_foreign_key == false)
        print("Errore query:".$q_foreign_key);
    $query_foreign_key->execute();
    $foreign_key = $query_foreign_key->get_result();
    $foreign_key = $foreign_key->fetch_all();
    $foreign_key = array_shift($foreign_key);

    $q_primary_key = "SELECT COLUMN_NAME FROM information_schema.KEY_COLUMN_USAGE WHERE TABLE_NAME = '".$_GET["table_to_join"]."' AND CONSTRAINT_NAME = 'PRIMARY'";
    $query_primary_key = $connessione->prepare($q_primary_key);
    if($query_primary_key == false)
        print("Errore query:".$q_primary_key);
    $query_primary_key->execute();
    $primary_key = $query_primary_key->get_result();
    $primary_key = $primary_key->fetch_all();
    $primary_key = current($primary_key);

    $q = "SELECT * FROM ".$_GET["table"]." JOIN ".$_GET["table_to_join"]." ON ".$_GET["table"].".".$foreign_key[0]." = ".$_GET["table_to_join"].".".$primary_key[0]." ORDER BY id";
}
$query = $connessione->prepare($q);
if($query == false)
    die("Errore query:".$q);
$query->execute();
//print($query);
//$result = mysqli_query($connessione, $query);
$result = $query->get_result();

//$ombrelloni = mysqli_fetch_all($result);

//print(json_encode($ombrelloni));

$rows = array();
$lenght = 0;
while($r = $result->fetch_assoc()) {
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