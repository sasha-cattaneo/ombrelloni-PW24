function show_data (){
    var numRecord = Object.keys(records).length;
    // console.log("[show_data]Record:"+numRecord);
    if(numRecord == 0){
        $('#dati')[0].innerHTML = "<b>Nessun record trovato.</b>";
        return;
    }

    var table = '<table id="header_tabella">';
    table += '<tr><th class="codice">Codice</th>'
            +'<th class="tipo">Tipo</th>'
            +'<th class="prezzo">Prezzo</th>'
            +'<th class="dataInizio">Data inizio</th>'
            +'<th class="dataFine">Data fine</th>'
            +'</tr></table>';
    table += '<table id="dati_tabella">';
    for (var i=0; i<numRecord; i++){
        table += '<tr>';
        table += '<td class="codice">'+records[i].codice+'</td>';
        table += '<td class="tipo">'+records[i].tipo+'</td>';
        table += '<td class="prezzo">'+records[i].prezzo+'</td>';
        table += '<td class="dataInizio">'+records[i].dataInizio+'</td>';
        table += '<td class="dataFine">'+records[i].dataFine+'</td>';
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

//     var now = new Date();
//     var day = ("0" + now.getDate()).slice(-2);
//     var month = ("0" + (now.getMonth() + 1)).slice(-2);

//     var today = now.getFullYear()+"-"+(month)+"-"+(day) ;

// console.log(today);
//     $('#periodo_from')[0].val(today);

}

function resetFiltri(){
    $("#filtro")[0].reset();
    get_data("tariffa",false,"");
    show_data("tariffa");
}

function updateDataMin(){
    // console.log($('#periodo_from').val());
    $('#periodo_to').attr('min', $('#periodo_from').val());
}