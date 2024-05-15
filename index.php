<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<link rel="icon" type="image/x-icon" href="/PW24/images/favicon.ico">
    <link rel = "stylesheet" href="styles/style_index.css">
    <script src="scripts/jquery-3.7.1.min.js" type="text/javascript"></script>
    <script src="scripts/show_data.js" type="text/javascript"></script>
    <title>HeaderSummer</title>
</head>
<body>
<div id="main">
    <header>
    	<img src="/PW24/images/logo.png" alt="Logo" title="Logo"width="50" height="50">
        <h1><bold>HeaderSummer</bold></h1>
    </header>
    <div id = "nav">
        <ul>
            <li><a href="tables/ombrelloni.php" target="content">Ombrelloni</a></li>
            <li><a href="tables/tipologie.php" target="content">Tipologie</a></li>
            <li><a href="tables/tariffe.php" target="content">Tariffe</a></li>
            <li><a href="tables/contratti.php" target="content">Contratti</a></li>
            <li><a href="tables/clienti.php" target="content">Clienti</a></li>
        </ul>
    </div>
    <div id = "filter">
        FILTRO
    </div>
    <div id = "data">
        <iframe id="content" name="content" title="ombrelloni"></iframe>
    </div>
    <footer>
        PIE DI PAGINA
    </footer>
</div>
</body>

</html>