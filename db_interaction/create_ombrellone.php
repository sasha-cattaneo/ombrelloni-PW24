<?php
include("config.php");
$connessione = mysqli_connect($host, $username, $password, $database);

if (!$connessione)
    die("Errore di connessione: " . $connessione->connect_error);



$settore = $_POST["settore"];
$numFila = $_POST["numFila"];
$numPosto = $_POST["numPosto"];
$tipologia = $_POST["tipologia"];

$q = "INSERT INTO ombrellone (settore,numFila,numPostoFila,tipologia) VALUES ($settore,$numFila,$numPosto,$tipologia)";

$query = $connessione->prepare($q);
if($query == false)
    print("Errore query:".$q);
$query->execute();
echo($q);

$q = "SELECT max(id) FROM ombrellone";

$query = $connessione->prepare($q);
if($query == false)
    print("Errore query:".$q);
$query->execute();
echo($q);

$id = $query->get_result();

$id = $id->fetch_assoc();

$id = $id["max(id)"];

$q = "INSERT INTO giornoDisponibilita (idOmbrellone, data) VALUES ";
$start_date = strtotime(date("Y")."-"."05-15");

$date = date("Y")."-"."05-15";
for($i=0; $i < 139; $i++){
    $q .= "($id, '$date')";
    if($i !== 138)
        $q .= ",";
    $date = date('Y-m-d', strtotime($date . "+1 day"));
}

$query = $connessione->prepare($q);
if($query == false)
    print("Errore query:".$q);
$query->execute();
echo($q);
?>