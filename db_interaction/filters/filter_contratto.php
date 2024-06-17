<?php
include("../config.php");
$connessione = mysqli_connect($host, $username, $password, $database);

if(!$connessione)
    die("Errore di connessione: " . $connessione->connect_error);

$q = "SELECT * FROM contratto JOIN cliente ON contratto.stipulatoDa = cliente.codice WHERE ";
$param_types = "";
if(isset($_GET["id"])){
    $q .= "id = ? AND ";
    $param_types .= "s";
}
if(isset($_GET["data"])){
    $q .= "data = ? AND ";
    $param_types .= "s";
}
if(isset($_GET["importo_from"])){
    $q .= "importo >= ? AND ";
    $param_types .= "i";
}
if(isset($_GET["importo_to"])){
    $q .= "importo <= ? AND ";
    $param_types .= "i";
}
if(isset($_GET["nome"])){
    $q .= "nome LIKE ? AND ";
    $param_types .= "s";
}
if(isset($_GET["cognome"])){
    $q .= "cognome LIKE ? AND ";
    $param_types .= "s";
}
$q .= "1=1";
//  print($q);
$query = $connessione->prepare($q);

if($query == FALSE)
    die("Errore nella query");

$params = array();
$params[] = & $param_types;
if(isset($_GET["id"]))
    $params[] = & $_GET["id"];
if(isset($_GET["data"]))
    $params[] = & $_GET["data"];
if(isset($_GET["importo_from"]))
    $params[] = & $_GET["importo_from"];
if(isset($_GET["importo_to"]))
    $params[] = & $_GET["importo_to"];
if(isset($_GET["nome"])){
    $nome = $_GET["nome"]."%";
    $params[] = & $nome;
}
if(isset($_GET["cognome"])){
    $cognome = $_GET["cognome"]."%";
    $params[] = & $cognome;
}

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