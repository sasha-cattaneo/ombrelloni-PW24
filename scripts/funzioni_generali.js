function get_data(table,join,table_to_join){
	var link = "/PW24/db_interaction/read_table.php";

    var parametri = Array();

    parametri.push({name: "table", value: table});

    if(join == true){
        parametri.push({name: "join", value: join});
        parametri.push({name: "table_to_join", value: table_to_join});
    }
    
    $.ajax({
            type: "GET", 
            url: link,
            async: false,
			data: $.param(parametri),
            success: function (msg) {
            	/* console.log(this.url); */
                records = JSON.parse(JSON.stringify(msg));
    			// console.log("[get_data]");
                // console.log(records);
                // console.log("Record:"+Object.keys(records).length);
                // console.log("[/get_data]"); 
            },
            error: function(jqXHR, textStatus, errorThrown) { 
            	//console.log(this.url);
            	alert('Error: '+textStatus); 
            }
 	});
    return records;
    
}

function submitForm(table){
	var link = "/PW24/db_interaction/filters/filter_"+table+".php";
    
    disableFormElements("#filtro");

    var parametri = $("#filtro").serializeArray();
    // console.log($("#filtro").serializeArray());
    if(parametri.length == 0){
        enableFormElements("#filtro");
        alert("Selezionare dei filtri!");

        return;
    }

    //parametri.push({name: "table", value: table});

    $.ajax({
            type: "GET",
            url: link,
            async: false,
			data: $.param(parametri),
            success: function (msg) {
            	
                records = JSON.parse(JSON.stringify(msg));
                // console.log("[submitForm]");
                // console.log(this.url);
                // console.log(records);
                // console.log("Record:"+Object.keys(records).length); 
                // console.log("[/submitForm]")
            },
            error: function(jqXHR, textStatus, errorThrown) { 
            	// console.log("[submitForm]"+this.url);
            	alert('Error: '+textStatus); 
            }
 	});
    
    enableFormElements("#filtro");

    show_data();
}

function disableFormElements(idForm){
    var $form = $(idForm);
    $form.find("select").each(
        function(){
            if($(this).val() ==  "")
                $(this).attr("disabled", "disabled");
        });
    $form.find("input").each(
        function(){
            if($(this).val() ==  "")
                $(this).attr("disabled", "disabled");
        });
}

function enableFormElements(idForm){
    var $form = $(idForm);
    
    $form.find("select").each(
        function(){
            $(this).removeAttr("disabled");
        });
    $form.find("input").each(
        function(){
            $(this).removeAttr("disabled");
        });
}

function adjustStickyElementPosition(){
    var topDiv_height = $('#top_container').innerHeight();
    $('#header_tabella').css('top',topDiv_height);
    //console.log(topDiv_height);
}


window.addEventListener('resize', adjustStickyElementPosition,true);