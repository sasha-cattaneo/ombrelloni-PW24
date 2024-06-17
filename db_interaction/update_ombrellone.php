<?php
include("config.php");
$connessione = mysqli_connect($host, $username, $password, $database);

if (!$connessione)
    die("Errore di connessione: " . $connessione->connect_error);


$id = $_POST["id"];
$settore = $_POST["settore"];
$numFila = $_POST["numFila"];
$numPosto = $_POST["numPosto"];
$tipologia = $_POST["tipologia"];

$q = "UPDATE ombrellone SET settore=$settore,numFila=$numFila,numPostoFila=$numPosto,tipologia=$tipologia WHERE id=$id";

$query = $connessione->prepare($q);
if($query == false)
    print("Errore query:".$q);
$query->execute();
echo($q);
?>