<?php
include("../config.php");
$connessione = mysqli_connect($host, $username, $password, $database);

if(!$connessione)
    die("Errore di connessione: " . $connessione->connect_error);

$q = "SELECT * FROM tariffa WHERE ";
$param_types = "";
if(isset($_GET["codice"])){
    $q .= "codice = ? AND ";
    $param_types .= "s";
}
if(isset($_GET["tipo"])){
    $q .= "tipo = ? AND ";
    $param_types .= "s";
}
if(isset($_GET["prezzo_min"])){
    $q .= "prezzo >= ? AND ";
    $param_types .= "i";
}
if(isset($_GET["prezzo_max"])){
    $q .= "prezzo <= ? AND ";
    $param_types .= "i";
}
// if(isset($_GET["periodo_from"])){
//     $q .= "dataInizio <= ? AND dataFine >= ? AND ";
//     $param_types .= "ss";
// }
// if(isset($_GET["periodo_to"])){
//     $q .= "dataInizio <= ? AND dataFine >= ? AND ";
//     $param_types .= "ss";
// }
if(isset($_GET["periodo_from"])){
    $q .= "dataInizio <= ? AND ";
    $param_types .= "s";
}
if(isset($_GET["periodo_to"])){
    $q .= "dataFine >= ? AND ";
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
if(isset($_GET["tipo"]))
    $params[] = & $_GET["tipo"];
if(isset($_GET["prezzo_min"]))
    $params[] = & $_GET["prezzo_min"];
if(isset($_GET["prezzo_max"]))
    $params[] = & $_GET["prezzo_max"];
if(isset($_GET["periodo_from"]))
    $params[] = & $_GET["periodo_from"];
if(isset($_GET["periodo_to"]))
    $params[] = & $_GET["periodo_to"];
// if(isset($_GET["periodo_to"]))
//     $params[] = & $_GET["periodo_to"];
// if(isset($_GET["periodo_to"]))
//     $params[] = & $_GET["periodo_to"];

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