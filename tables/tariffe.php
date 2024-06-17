<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel = "stylesheet" href="/PW24/styles/style_tables.css">
    <link rel = "stylesheet" href="/PW24/styles/style_tariffe.css">
    <script src="/PW24/scripts/jquery-3.7.1.min.js" type="text/javascript"></script>
    <script src="/PW24/scripts/funzioni_generali.js" type="text/javascript"></script>
    <script src="/PW24/scripts/funzioni_tariffe.js" type="text/javascript"></script>
    <title>Tariffe</title>
</head>
<body onload="get_data('tariffa',false,'');popola_filtri();show_data();adjustStickyElementPosition();">
    <div id="top_container">
    	<div id="filtro_container">
    		<form id="filtro" method="post" onsubmit="submitForm('tariffa');return false;">
                <input class="input-field" type="number" id="codice" name="codice" placeholder="Codice" min="1">
    	    	
            	<select id="tipo_select" name="tipo">
            		<option value="" selected>Tipo</option>
        	    </select>
                <div id="prezzo_container">
                    <label>Prezzo:</label><br>
                    <input class="input-field" type="number" id="prezzo_min" name="prezzo_min" min="0" placeholder="Min">
                    <input class="input-field" type="number" id="prezzo_max" name="prezzo_max" min="0" placeholder="Max">
                </div>
                <div id="periodo_container">
                    <label>Periodo:</label><br>
                    <input type="date" id="periodo_from" name="periodo_from" value="2024-05-15" onchange="updateDataMin()" min="2024-05-15" max="2024-09-30">
                    <input type="date" id="periodo_to" name="periodo_to" min="2024-05-15"  max="2024-09-30">
                </div>
                <input id="submit" type="submit" value="Cerca">
	        </form>
			<button	id="reset" onclick="resetFiltri()">Reset filtri</button>
	    </div>
    </div>
    <div id="dati"></div>
</body>
</html>