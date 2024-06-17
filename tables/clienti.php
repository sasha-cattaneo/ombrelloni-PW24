<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel = "stylesheet" href="/PW24/styles/style_tables.css">
    <link rel = "stylesheet" href="/PW24/styles/style_clienti.css">
    <script src="/PW24/scripts/jquery-3.7.1.min.js" type="text/javascript"></script>
    <script src="/PW24/scripts/funzioni_generali.js" type="text/javascript"></script>
    <script src="/PW24/scripts/funzioni_clienti.js" type="text/javascript"></script>
    <title>Clienti</title>
</head>
<body onload="get_data('cliente',false,'');show_data();adjustStickyElementPosition();">
    <div id="top_container">
    	<div id="filtro_container">
    		<form id="filtro" method="post" onsubmit="submitForm('cliente');return false;">
    	    	<input class="input-field" type="number" id="codice" name="codice" placeholder="Codice" min="1">
            	<input class="input-field" type="text" id="nome" name="nome" placeholder="Nome">
	            <input class="input-field" type="text" id="cognome" name="cognome" placeholder="Cognome">
                <div id="dataNascita_container">
                    <a>Data di nascita:</a><br>
                    <input type="date" id="dataNascita_from" name="dataNascita_from">
                    <input type="date" id="dataNascita_to" name="dataNascita_to">
                </div>
                <input id="submit" type="submit" value="Cerca">
	        </form>
			<button	id="reset" onclick="resetFiltri()">Reset filtri</button>
	    </div>
    </div>
    <div id="dati"></div>
</body>
</html>