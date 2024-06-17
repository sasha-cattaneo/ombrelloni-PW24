<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel = "stylesheet" href="/PW24/styles/style_tables.css">
    <link rel = "stylesheet" href="/PW24/styles/style_contratti.css">
    <script src="/PW24/scripts/jquery-3.7.1.min.js" type="text/javascript"></script>
    <script src="/PW24/scripts/funzioni_generali.js" type="text/javascript"></script>
    <script src="/PW24/scripts/funzioni_contratti.js" type="text/javascript"></script>
    <title>Contratti</title>
</head>
<body onload="get_data('contratto',true,'cliente');show_data();adjustStickyElementPosition();">
    <div id="top_container">
    	<div id="filtro_container">
    		<form id="filtro" method="post" onsubmit="submitForm('contratto');return false;">
    	    	<input class="input-field" type="number" id="id" name="id" placeholder="Id" min="1">
            	<div id="data_container">
                    <label>Data:</label><br>
                    <input type="date" id="data" name="data">
                </div>
	            <div id="prezzo_container">
                    <label>Importo:</label><br>
                    <input class="input-field" placeholder="Min" type="number" id="importo_from" name="importo_from" min="0">
                    <input class="input-field" placeholder="Max" type="number" id="importo_to" name="importo_to" min="0">
                </div>
                <div id="stipulato_da_container">
                    <a>Stipulato da:</a><br>
                    <input class="input-field" type="text" id="nome" name="nome" placeholder="nome">
                    <input class="input-field" type="text" id="cognome" name="cognome" placeholder="cognome">
                </div>
                <input id="submit" type="submit" value="Cerca">
	        </form>
			<button	id="reset" onclick="resetFiltri()">Reset filtri</button>
	    </div>
    </div>
    <div id="dati"></div>
    <div id="modal-info" class="modal">
        <div class="modal-content">
            <span class="close" onclick="chiudiModal();">&times;</span>
            <p>Codice: <a id="modal-codice"></a></p>
            <p>Nome: <a id="modal-nome"></a></p>
            <p>Cognome: <a id="modal-cognome"></a></p>
            <p>Indirizzo: <a id="modal-indirizzo"></a></p>
        </div>

    </div>
</body>
</html>