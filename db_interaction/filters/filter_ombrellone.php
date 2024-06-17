<?php
include("../config.php");
$connessione = mysqli_connect($host, $username, $password, $database);
if(!$connessione)
    die("Errore di connessione: " . $connessione->connect_error);


if($connessione){
	/*$query = "SELECT * FROM ".$_GET["table"]." WHERE ";
	if(isset($_GET["id"]))
		$query .= "id='".$_GET["id"]."' AND ";
	if(isset($_GET["settore"]))
		$query .= "settore='".$_GET["settore"]."' AND ";
	if(isset($_GET["numFila"]))
		$query .= "numFila='".$_GET["numFila"]."' AND ";
	if(isset($_GET["numPosto"]))
		$query .= "numPostoFila='".$_GET["numPosto"]."' AND ";
	if(isset($_GET["tipologia"]))
		$query .= "tipologia='".$_GET["tipologia"]."' AND ";

	$query .= "1=1";
	//print($query);
	$result = mysqli_query($connessione, $query);
	*/
    $q = "SELECT * FROM ombrellone JOIN tipologia ON ombrellone.tipologia = tipologia.codice  WHERE ";
    $param_types = "";
    if(isset($_GET["id"])){
        $q .= "id=? AND ";
        $param_types .= "s";
    }
	if(isset($_GET["settore"])){
        $q .= "settore=? AND ";
        $param_types .= "s";
    }
	if(isset($_GET["numFila"])){
        $q .= "numFila=? AND ";
        $param_types .= "s";
    }
	if(isset($_GET["numPosto"])){
        $q .= "numPostoFila=? AND ";
        $param_types .= "s";
    }
	if(isset($_GET["tipologia"])){
        $q .= "tipologia=? AND ";
        $param_types .= "s";
    }
    $q .= "1=1";
    // print($q);
    $query = $connessione->prepare($q);

    if($query == FALSE)
        die("Errore nella query");
    $params = array();
    $params[] = & $param_types;
    if(isset($_GET["id"]))
        $params[] = & $_GET["id"];
    if(isset($_GET["settore"]))
        $params[] = & $_GET["settore"];
    if(isset($_GET["numFila"]))
        $params[] = & $_GET["numFila"];
    if(isset($_GET["numPosto"]))
        $params[] = & $_GET["numPosto"];
    if(isset($_GET["tipologia"]))
        $params[] = & $_GET["tipologia"];

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
}else{
	echo("Errore di connessione");
}
?>