<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel = "stylesheet" href="/PW24/styles/style_tables.css">
    <link rel = "stylesheet" href="/PW24/styles/style_ombrelloni.css">
    <script src="/PW24/scripts/jquery-3.7.1.min.js" type="text/javascript"></script>
    <script src="/PW24/scripts/funzioni_generali.js" type="text/javascript"></script>
    <script src="/PW24/scripts/funzioni_ombrelloni.js" type="text/javascript"></script>
    <title>Ombrelloni</title>
</head>
<body onload="get_data('ombrellone',true,'tipologia');show_data();popola_filtri();adjustStickyElementPosition();">
	<div id="top_container">
    	<div id="filtro_container">
    		<form id="filtro" method="post" onsubmit="submitForm('ombrellone');return false;">
                <input class="input-field" type="number" id="id" name="id" placeholder="Id" min="1">
            	<select id="settore_select" name="settore">
        	    	<option value=""  selected>Settore</option>
    	        </select>
	            <select id="numFila_select" name="numFila">
            		<option value=""  selected>Num. fila</option>
        	    </select>
    	        <select id="numPosto_select" name="numPosto">
	            	<option value=""  selected>Num. posto</option>
	            </select>
	            <select id="tipologia_select" name="tipologia">
	            	<option value=""  selected>Tipologia</option>
	            </select>
	            <input id="submit" type="submit" value="Cerca">
	            
	        </form>
			<button	id="reset" onclick="resetFiltri()">Reset filtri</button>
	    </div>
    	<div id="aggiungi_container"><a onclick="mostraModal('aggiungi')">&#43</a></div>
    </div>
    <div id="dati"></div>
    <div id="modal-info" class="modal">
        <div class="modal-content">
            <span class="close" onclick="chiudiModal();">&times;</span>
            <p>Codice: <a id="modal-codice"></a></p>
            <p>Nome: <a id="modal-nome"></a></p>
            <p>Descrizione: <a id="modal-descrizione"></a></p>
        </div>
    </div>
    <div id="modal-modifica" class="modal">
        <div class="modal-content">
            <form id="modifica" method="post" onsubmit="modifica('ombrellone');return false;">
                <span class="close" onclick="chiudiModal();">&times;</span>
                <p>Id: <a id="modal-id"></a><input id="modal-input_id" name="id" hidden></p>
                <p>Settore:
                    <select id="modal-settore_select" name="settore">
                        <option value="" disabled>Settore</option>
                    </select>
                </p>
                <p>Num fila:
                    <select id="modal-numFila_select" name="numFila">
                        <option value="" disabled>Num. fila</option>
                    </select>
                </p>
                <p>Num posto (in fila n):
                    <select id="modal-numPosto_select" name="numPosto">
                        <option value="" disabled>Num. posto</option>
                    </select>
                </p>
                <p>Tipologia:
                    <select id="modal-tipologia_select" name="tipologia">
                        <option value="" disabled>Tipologia</option>
                    </select>
                </p>
                <input id="submit" type="submit" value="Modifica">
            </form>
        </div>
    </div>
    <div id="modal-aggiungi" class="modal">
        <div class="modal-content">
            <form id="aggiungi" method="post" onsubmit="aggiungi('ombrellone');return false;">
                <span class="close" onclick="chiudiModal();">&times;</span>
        
                <p>Settore:
                    <select id="modal-aggiungi-settore_select" name="settore">
                        <option value="" disabled selected>Settore</option>
                    </select>
                </p>
                <p>Num fila:
                    <select id="modal-aggiungi-numFila_select" name="numFila">
                        <option value="" disabled selected>Num. fila</option>
                    </select>
                </p>
                <p>Num posto (in fila n):
                    <select id="modal-aggiungi-numPosto_select" name="numPosto">
                        <option value="" disabled selected>Num. posto</option>
                    </select>
                </p>
                <p>Tipologia:
                    <select id="modal-aggiungi-tipologia_select" name="tipologia">
                        <option value="" disabled selected>Tipologia</option>
                    </select>
                </p>
                <input id="submit" type="submit" value="Aggiungi">
            </form>
        </div>
    </div>
</body>
</html>