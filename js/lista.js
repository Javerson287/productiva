
$(document).ready(function(){
    //$('#sede').val($sede);
    
    recargarLista();
    $('#sede').change(function(){
        recargarLista();     
        
    });
   
})

function recargarLista(){
    $.ajax({
        type:"GET",
        url:"sede.php",
        data:"continente=" + $('#sede').val()+"&sede="+ $('#id_bloque').val(),
        success:function(r){
            $('#select2lista').html(r);
        }
    });
    



}


