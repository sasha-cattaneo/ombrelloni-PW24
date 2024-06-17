<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<link rel="icon" type="image/x-icon" href="/PW24/images/favicon.ico">
    <link rel = "stylesheet" href="styles/style_index.css">
    <script src="scripts/jquery-3.7.1.min.js" type="text/javascript"></script>
    <script src="scripts/funzioni_index.js" type="text/javascript"></script>
    <title>HeaderSummer</title>
</head>
<body <?php  if(isset($_GET["table"])){
                echo"onload=\"changeActive('#{$_GET["table"]}')\"";
             }?> >
<div id="main">
    <header>
    	<a href="index.php"><img id="logo" src="/PW24/images/logo.png" alt="Logo" title="Logo"width="50" height="50"></a>
        <h1><bold>HeaderSummer</bold></h1>
    </header>
    <div id = "nav">
        <ul>
            <li><a id="ombrelloni" class="nav_element" href="tables/ombrelloni.php" target="content" onclick="updateUrl('ombrelloni');changeActive(this);">Ombrelloni</a></li>
            <li><a id="tariffe" class="nav_element" href="tables/tariffe.php" target="content" onclick="updateUrl('tariffe');changeActive(this);">Tariffe</a></li>
            <li><a id="contratti" class="nav_element" href="tables/contratti.php" target="content" onclick="updateUrl('contratti');changeActive(this);">Contratti</a></li>
            <li><a id="clienti" class="nav_element" href="tables/clienti.php" target="content" onclick="updateUrl('clienti');changeActive(this);">Clienti</a></li>
            <li><a id="tipologie" class="nav_element" href="tables/tipologie.php" target="content" onclick="updateUrl('tipologie');changeActive(this);">Tipologie</a></li>
        </ul>
    </div>
    <div id = "data">
        <iframe id="content" name="content"  src="<?php if(isset($_GET["table"])){
                                                            echo "tables/".$_GET["table"].".php";
                                                        }else{
                                                            echo "home.html";
                                                        }?>">
        </iframe>
    </div>
    <footer>
        <div id="footer_left">
            <p>Gruppo: <i>Headers</i></p>
            <p>Realizzato da: <i>Cattaneo Sasha</i> (1081300), <i>Roma Ilaria</i> (1073565)</p>
        </div>
        <div id="footer_right">
            <p>Anno 2023/24</p>
            <p><b>Programmazione web</b></p>
        </div>
    </footer>
</div>
</body>

</html>