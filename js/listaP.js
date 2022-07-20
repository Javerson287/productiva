
$(document).ready(function(){
    //$('#sede').val($sede);
   recargarListaP();
    $('#mibuscador2').change(function(){
        recargarListaP();     
    });
   
})

function recargarListaP(){
    console.log( $('#id_programa').val());
    $.ajax({
        type:"GET",
        url:"programas.php",
        data:"programas=" + $('#mibuscador2').val()+"&ficha="+ $('#id_programa').val(),
        success:function(r){
            $('#lista_programa').html(r);
        }
    });
    



}


