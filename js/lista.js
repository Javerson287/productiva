
$(document).ready(function(){
    //$('#sede').val($sede);
    

    $('#sede').change(function(){
        recargarLista();     
        
    });
   
})

function recargarLista(){
    $.ajax({
        type:"GET",
        url:"sede.php",
        data:"continente=" + $('#sede').val(),
        success:function(r){
            $('#select2lista').html(r);
        }
    });
    



}


