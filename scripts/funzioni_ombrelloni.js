var ombrelloni;
var tipologie;

function show_data (){
    ombrelloni = records;

    var numRecord = Object.keys(ombrelloni).length;
    // console.log("[show_data]Record:"+numRecord);
    if(numRecord == 0){
        $('#dati')[0].innerHTML = "<b>Nessun record trovato.</b>";
        return;
    }

    var table = '<table id="header_tabella">';
    table += '<tr><th class="id">Id</th>'
            +'<th class="settore">Settore</th>'
            +'<th class="numFila">Num. fila</th>'
            +'<th class="numPosto">Num. posto</th>'
            +'<th class="tipologia">Tipologia</th>'
            +'<th class="elimina"></th>'
            +'<th class="modifica"></th>'
            +'</tr></table>';
    table += '<table id="dati_tabella">';
    for (var i=0; i<numRecord; i++){
        table += '<tr>';
        table += '<td class="id">'+ombrelloni[i].id+'</td>';
        table += '<td class="settore">'+ombrelloni[i].settore+'</td>';
        table += '<td class="numFila">'+ombrelloni[i].numFila+'</td>';
        table += '<td class="numPosto">'+ombrelloni[i].numPostoFila+'</td>';
        table += '<td class="tipologia"><a onclick="mostraModal(\'info\','+(ombrelloni[i].tipologia-1)+')">'+ombrelloni[i].nome+"<br>"+'</a></td>';
        table += '<td class="elimina"><a onclick="elimina(\'ombrellone\','+ombrelloni[i].id+')">&#128465</a></td>';
        table += '<td class="modifica"><a onclick="mostraModal(\'modifica\','+i+')">&#128393</a></td>';
        table += '</tr>';
    }
    table += '</table>';

    $('#dati')[0].innerHTML = table;
}
function popola_filtri(){ 

    var numRecord = Object.keys(ombrelloni).length;
    /* console.log("[popola_filtri]Record:"+numRecord); */
    if(numRecord == 0)
        return;

    var settori = new Array();
    var numFile = new Array();
    var numPosti = new Array();

    for (var i=0; i<numRecord; i++){        
        if(!settori.includes(ombrelloni[i].settore)){
            settori.push(ombrelloni[i].settore);
            var opt_settore = document.createElement('option');
            opt_settore.value = ombrelloni[i].settore;
            opt_settore.innerHTML = ombrelloni[i].settore;
            $('#settore_select')[0].appendChild(opt_settore.cloneNode(true));
            $('#modal-settore_select')[0].appendChild(opt_settore.cloneNode(true));  
            $('#modal-aggiungi-settore_select')[0].appendChild(opt_settore);
        }
        if(!numFile.includes(ombrelloni[i].numFila)){
            numFile.push(ombrelloni[i].numFila);
            var opt_numFila = document.createElement('option');
            opt_numFila.value = ombrelloni[i].numFila;
            opt_numFila.innerHTML = ombrelloni[i].numFila;
            $('#numFila_select')[0].appendChild(opt_numFila.cloneNode(true));
            $('#modal-numFila_select')[0].appendChild(opt_numFila.cloneNode(true));
            $('#modal-aggiungi-numFila_select')[0].appendChild(opt_numFila);
        }
        if(!numPosti.includes(ombrelloni[i].numPostoFila)){
            numPosti.push(ombrelloni[i].numPostoFila);
            var opt_numPostoFila = document.createElement('option');
            opt_numPostoFila.value = ombrelloni[i].numPostoFila;
            opt_numPostoFila.innerHTML = ombrelloni[i].numPostoFila;
            $('#numPosto_select')[0].appendChild(opt_numPostoFila.cloneNode(true));
            $('#modal-numPosto_select')[0].appendChild(opt_numPostoFila.cloneNode(true));
            $('#modal-aggiungi-numPosto_select')[0].appendChild(opt_numPostoFila);
        }
        // if(!tipologie.includes(records[i].tipologia)){
        //     tipologie.push(records[i].tipologia);
        //     var opt_tipologia = document.createElement('option');
        //     opt_tipologia.value = records[i].tipologia;
        //     opt_tipologia.innerHTML = records[i].tipologia;
        //     $('#tipologia_select')[0].appendChild(opt_tipologia.cloneNode(true));
        //     $('#modal-tipologia_select')[0].appendChild(opt_tipologia.cloneNode(true));
        //     $('#modal-aggiungi-tipologia_select')[0].appendChild(opt_tipologia);
        // }
    }

    tipologie = get_data('tipologia',false,'');

    var numRecord = Object.keys(tipologie).length;
    /* console.log("[popola_filtri]Record:"+numRecord); */
    if(numRecord == 0)
        return;

    for(var i=0; i<numRecord; i++){
        var opt_tipologia = document.createElement('option');
        opt_tipologia.value = tipologie[i].codice;
        opt_tipologia.innerHTML = tipologie[i].nome;
        $('#tipologia_select')[0].appendChild(opt_tipologia.cloneNode(true));
        $('#modal-tipologia_select')[0].appendChild(opt_tipologia.cloneNode(true));
        $('#modal-aggiungi-tipologia_select')[0].appendChild(opt_tipologia);
    }
}

function resetFiltri(){
    // let $form = $("#filtro");

    // $form.find("select").each(
    //     function(){
    //         $(this)[0].selectedIndex = 0;
    //     });
    $("#filtro")[0].reset();
    get_data("ombrellone",true,"tipologia");
    show_data("ombrellone");
}

function mostraModal(modal_select ,i){
    switch (modal_select){
        case "info":{
            modal = $("#modal-info");
            modal.find("#modal-codice").text(tipologie[i].codice);
            modal.find("#modal-nome").text(tipologie[i].nome);
            modal.find("#modal-descrizione").text(tipologie[i].descrizione);

            modal.css("display","block");
            break;
        }            
        case "modifica":{
            modal = $("#modal-modifica");
            modal.find("#modal-id").text(ombrelloni[i].id);
            modal.find("#modal-input_id").val(ombrelloni[i].id);
            modal.find("#modal-settore_select").val(ombrelloni[i].settore).change();
            modal.find("#modal-numFila_select").val(ombrelloni[i].numFila).change();
            modal.find("#modal-numPosto_select").val(ombrelloni[i].numPostoFila).change();
            modal.find("#modal-tipologia_select").val(ombrelloni[i].tipologia).change();

            modal.css("display","block");
            break;
        }
        case "aggiungi":{
            modal = $("#modal-aggiungi");

            
            modal.css("display","block");
            break;
        }
        default:
       
    }
}

function chiudiModal() {
    $(".modal").css("display","none");
}
window.onclick = function(event) {
    if($(event.target).hasClass("modal"))
        $(".modal").css("display","none");
}

function elimina(table, id){
    text = "Confermare l'eliminazione del record ["+id+"] ?";
    if(!confirm(text))
        return;

    var link = "/PW24/db_interaction/delete_ombrellone.php";

    var parametri = Array();

    parametri.push({name: "id", value: id});

    $.ajax({
            type: "POST",
            url: link,
            async: false,
			data: $.param(parametri),
            success: function (msg) {
                // console.log("[elimina]");
                // console.log(msg);
                // console.log("Successo"); 
                // console.log("[/elimina]")
                alert("Record ["+id+"] eliminato!");
            },
            error: function(jqXHR, textStatus, errorThrown) { 
            	// console.log("[elimina]"+this.url);
            	alert('Error: '+textStatus); 
            }
 	});
    get_data('ombrellone',true,'tipologia');
    show_data();
}

function modifica(table){
    var link = "/PW24/db_interaction/update_ombrellone.php";

    var parametri = $("#modifica").serializeArray();

    $.ajax({
            type: "POST",
            url: link,
            async: false,
			data: $.param(parametri),
            success: function (msg) {
                // console.log("[modifica]");
                // console.log(msg);
                // console.log("Successo"); 
                // console.log("[/modifica]")
                alert("Record modificato!");
            },
            error: function(jqXHR, textStatus, errorThrown) { 
            	// console.log("[modifica]"+this.url);
            	alert('Error: '+textStatus); 
            }
 	});
    chiudiModal();
    get_data('ombrellone',true,'tipologia')
    show_data();
}

function aggiungi(table){
    var link = "/PW24/db_interaction/create_ombrellone.php";

    disableFormElements("#aggiungi");

    var parametri = $("#aggiungi").serializeArray();

    if(parametri.length != 4){
        enableFormElements("#aggiungi");

        alert("Riempire tutti i campi!");
        return;
    }


    $.ajax({
            type: "POST",
            url: link,
            async: false,
			data: $.param(parametri),
            success: function (msg) {
                // console.log("[aggiungi]");
                // console.log(msg);
                // console.log("Successo"); 
                // console.log("[/aggiungi]")
                alert("Record aggiunto!");
            },
            error: function(jqXHR, textStatus, errorThrown) { 
            	// console.log("[aggiungi]"+this.url);
            	alert('Error: '+textStatus); 
            }
 	});
    enableFormElements("#aggiungi");
    chiudiModal();
    get_data('ombrellone',true,'tipologia')
    show_data();
}

// $(document).ready(function() {
//     $("#modifica select").change(function() {
//         $('#submit').removeAttr('disabled');
//         console.log("test");
//     })
// });