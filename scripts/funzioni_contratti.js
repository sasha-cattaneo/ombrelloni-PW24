// function get_data_with_clienti(table,table_to_join){
// 	var link = "/PW24/db_interaction/read_table_contratto+cliente.php";
    
//     $.ajax({
//             type: "GET", 
//             url: link,
//             async: false,
// 			data:{
//             	table: table,
//                 table_to_join: table_to_join
//             },
//             success: function (msg) {
//             	console.log(this.url); 
//                 records = JSON.parse(JSON.stringify(msg));
//     			// console.log("[get_data]");
//                 // console.log(records);
//                 // console.log("Record:"+Object.keys(records).length);
//                 // console.log("[/get_data]"); 
//             },
//             error: function(jqXHR, textStatus, errorThrown) { 
//             	//console.log(this.url);
//             	alert('Error: '+textStatus); 
//             }
//  	});
    
// }


function show_data(){
    var numRecord = Object.keys(records).length;
    /* console.log("[show_data]Record:"+numRecord); */
    if(numRecord == 0){
        $('#dati')[0].innerHTML = "<b>Nessun record trovato.</b>";
        return;
    }

    var table = '<table id="header_tabella">';
    table += '<tr><th class="id">Id</th>'
            +'<th class="data">Data</th>'
            +'<th class="importo">Importo</th>'
            +'<th class="stipulatoDa">Stipulato da</th>'
            +'</tr></table>';
    table += '<table id="dati_tabella">';
    for (var i=0; i<numRecord; i++){
        table += '<tr>';
        table += '<td class="id">'+records[i].id+'</td>';
        table += '<td class="data">'+records[i].data+'</td>';
        table += '<td class="importo">'+records[i].importo+'</td>';
        // table += '<td class="stipulatoDa">'+records[i].stipulatoDa+'</td>';
        table += '<td class="stipulatoDa"><a onclick="mostraModal('+i+')">'+records[i].nome+" "+records[i].cognome+'</a></td>';

        table += '</tr>';
    }
    table += '</table>';

    $('#dati')[0].innerHTML = table;
}

function resetFiltri(){
    $("#filtro")[0].reset();

    get_data("contratto",true,"cliente");
    show_data("contratto");
}

function getCliente(id){
    var link = "/PW24/db_interaction/get_record.php";
    var table="cliente";
    
    $.ajax({
            type: "GET", 
            url: link,
            async: false,
			data:{
            	table: table,
                id: id
            },
            success: function (msg) {
                cliente = JSON.parse(JSON.stringify(msg)); 
            }, 
            error: function(jqXHR, textStatus, errorThrown) { 
            	alert('Error: '+textStatus); 
            }
 	});
}

function mostraModal(i){
    modal = $("#modal-info");
    modal.find("#modal-codice").text(records[i].stipulatoDa);
    modal.find("#modal-nome").text(records[i].nome);
    modal.find("#modal-cognome").text(records[i].cognome);
    modal.find("#modal-indirizzo").text(records[i].indirizzo);

    modal.css("display","block");
}

function chiudiModal() {
    $("#modal-info").css("display","none");
}
window.onclick = function(event) {
    if (event.target == document.getElementById("modal-info"))
        $("#modal-info").css("display","none");
}