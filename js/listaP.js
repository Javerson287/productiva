
$(document).ready(function(){
    //$('#sede').val($sede);
   recargarListaP();
    $('#mibuscador2').change(function(){
        recargarListaP();     
        
    });
   
})

function recargarListaP(){
    $.ajax({
        type:"GET",
        url:"programas.php",
        data:"programas=" + $('#mibuscador2').val(),
        success:function(r){
            $('#lista_programa').html(r);
        }
    });
    



}


