<?php
include("config.php");
$connessione = mysqli_connect($host, $username, $password, $database);

if (!$connessione)
    die("Errore di connessione: " . $connessione->connect_error);


$id = $_POST["id"];

$q = "DELETE FROM ombrelloneVenduto WHERE idOmbrellone=$id";

$query = $connessione->prepare($q);
if($query == false)
    print("Errore query:".$q);
$query->execute();
echo($q);

$q = "DELETE FROM giornoDisponibilita WHERE idOmbrellone=$id";

$query = $connessione->prepare($q);
if($query == false)
    print("Errore query:".$q);
$query->execute();
echo($q);

$q = "DELETE FROM ombrellone WHERE id=$id";

$query = $connessione->prepare($q);
if($query == false)
    print("Errore query:".$q);
$query->execute();
echo($q);
?>