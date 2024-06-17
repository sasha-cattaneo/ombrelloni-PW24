function updateUrl(table){
    window.history.replaceState(null, null, "?table="+table);
}

function changeActive(t){
    $(".nav_element").removeClass("active");
    $(t).addClass("active");
}