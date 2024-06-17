<?php
include("../config.php");
$connessione = mysqli_connect($host, $username, $password, $database);

if(!$connessione)
    die("Errore di connessione: " . $connessione->connect_error);

$q = "SELECT * FROM cliente WHERE ";
$param_types = "";
if(isset($_GET["codice"])){
    $q .= "codice=? AND ";
    $param_types .= "s";
}
if(isset($_GET["nome"])){
    $q .= "nome LIKE ? AND ";
    $param_types .= "s";
}
if(isset($_GET["cognome"])){
    $q .= "cognome LIKE ? AND ";
    $param_types .= "s";
}
if(isset($_GET["dataNascita_from"])){
    $q .= "dataNascita>=? AND ";
    $param_types .= "s";
}
if(isset($_GET["dataNascita_to"])){
    $q .= "dataNascita <=? AND ";
    $param_types .= "s";
}
$q .= "1=1";
// print($q);
$query = $connessione->prepare($q);

if($query == FALSE)
    die("Errore nella query");
$params = array();
$params[] = & $param_types;
if(isset($_GET["codice"]))
    $params[] = & $_GET["codice"];
if(isset($_GET["nome"])){
    $nome = $_GET["nome"].'%';
    $params[] = & $nome;
}
if(isset($_GET["cognome"])){
    $cognome = $_GET["cognome"].'%';
    $params[] = & $cognome;
}
if(isset($_GET["dataNascita_from"]))
    $params[] = & $_GET["dataNascita_from"];
if(isset($_GET["dataNascita_to"]))
    $params[] = & $_GET["dataNascita_to"];

// print_r($params);

call_user_func_array(array($query, "bind_param"), $params);

$query->execute();

$result = $query->get_result();

if($result){
    $rows = array();
    $lenght = 0;
    while($r = mysqli_fetch_assoc($result)) {
            $rows[] = $r;
            $lenght++;
    }
    header('Content-Type: application/json; charset=utf-8');
    //echo($lenght."<br>");
    echo(json_encode($rows));
}else{
    echo("Query non ha restituito nulla!");
}
?>