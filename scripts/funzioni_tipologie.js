function show_data (){
    var numRecord = Object.keys(records).length;
    // console.log("[show_data]Record:"+numRecord);
    if(numRecord == 0){
        $('#dati')[0].innerHTML = "<b>Nessun record trovato.</b>";
        return;
    }

    var table = '<table id="header_tabella">';
    table += '<tr><th class="codice">Codice</th>'
            +'<th class="nome">Nome</th>'
            +'<th class="descrizione">Descrizione</th>'
            +'</tr></table>';
    table += '<table id="dati_tabella">';
    for (var i=0; i<numRecord; i++){
        table += '<tr>';
        table += '<td class="codice">'+records[i].codice+'</td>';
        table += '<td class="nome">'+records[i].nome+'</td>';
        table += '<td class="descrizione">'+records[i].descrizione+'</td>';
        table += '</tr>';
    }
    table += '</table>';

    $('#dati')[0].innerHTML = table;
}
function popola_filtri(){ 
    var numRecord = Object.keys(records).length;
    /* console.log("[popola_filtri]Record:"+numRecord); */
    if(numRecord == 0)
        return;
    
    var tipi = new Array();
    for (var i=0; i<numRecord; i++){
        if(!tipi.includes(records[i].tipo)){
            tipi.push(records[i].tipo);
            var opt_tipo = document.createElement('option');
            opt_tipo.value = records[i].tipo;
            opt_tipo.innerHTML = records[i].tipo;
            $('#tipo_select')[0].appendChild(opt_tipo);
        }
    }
}

function resetFiltri(){
    $("#filtro")[0].reset();
    get_data("tipologia",false,"");
    show_data("tipologia");
}