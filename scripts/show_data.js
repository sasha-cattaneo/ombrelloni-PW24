function get_data(table){
	var link = "/PW24/db_interaction/read_ombrellone.php";
    
    $.ajax({
            type: "GET", 
            //dataType: 'json', 
            url: link,
            async: false,
			data:{
            	table: table
            },
            success: function (msg) {
                //console.log(JSON.stringify(msg));
                data = JSON.parse(JSON.stringify(msg));
    			console.log(data);
                console.log("|"+Object.keys(data).length+"|");
            },
            error: function(jqXHR, textStatus, errorThrown) { 
            	alert('Error: '+textStatus); 
            }
 	});
    
    var righe = Object.keys(data).length;
    var table = '<table id="header_tabella">';
    table += '<tr><th class="id">id</th>'
    		+'<th class="settore">Settore</th>'
    		+'<th class="numFila">Num. fila</th>'
            +'<th class="numPosto">Num. posto</th>'
            +'<th class="tipologia">Tipologia</th></tr></table><table id="dati_tabella">';
    for(var i=0;i<righe;i++){
    	table += '<tr>';
        table += '<td class="id">'+data[i].id+'</td>';
        table += '<td class="settore">'+data[i].settore+'</td>';
        table += '<td class="numFila">'+data[i].numFila+'</td>';
        table += '<td class="numPosto">'+data[i].numPostoFila+'</td>';
        table += '<td class="tipologia">'+data[i].tipologia+'</td>';
		table += '<td class="elimina">🗑</td>';
        table += '<td class="modifica">🖉</td>';
        table += '</tr>';
    }
    table += '</table>';
    
    document.getElementById('dati').innerHTML = table;
}
