
$(document).ready(function(){
    //$('#sede').val($sede);
    
    recargarLista();
    $('#buscador').change(function(){
        recargarLista();     
        
    });
   
})

function recargarLista(){
    $.ajax({
        type:"GET",
        url:"../controladores/programa.php",
        data:"programa=" + $('#buscador').val(),
        success:function(r){
            $('#competencia').html(r);
        }
    });
    



}


