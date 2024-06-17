function show_data(){
    var numRecord = Object.keys(records).length;
    /* console.log("[show_data]Record:"+numRecord); */
    if(numRecord == 0){
        $('#dati')[0].innerHTML = "<b>Nessun record trovato.</b>";
        return;
    }

    var table = '<table id="header_tabella">';
    table += '<tr><th class="codice">Codice</th>'
            +'<th class="nome">Nome</th>'
            +'<th class="cognome">Cognome</th>'
            +'<th class="dataNascita">Data di nascita</th>'
            +'<th class="indirizzo">indirizzo</th>'
            +'</tr></table>';
    table += '<table id="dati_tabella">';
    for (var i=0; i<numRecord; i++){
        table += '<tr>';
        table += '<td class="codice">'+records[i].codice+'</td>';
        table += '<td class="nome">'+records[i].nome+'</td>';
        table += '<td class="cognome">'+records[i].cognome+'</td>';
        table += '<td class="dataNascita">'+records[i].dataNascita+'</td>';
        table += '<td class="indirizzo">'+records[i].indirizzo+'</td>';
        table += '</tr>';
    }
    table += '</table>';

    $('#dati')[0].innerHTML = table;
}

function resetFiltri(){
    $("#filtro")[0].reset();
    get_data("cliente",false,"");
    show_data("cliente");
}