
$(document).ready(function(){
 
    lista3();
    $('#bloque').change(function(){
        lista3();     
        
    });
})
function lista3(){
    $.ajax({
        type:"GET",
        url:"piso.php",
        data:"bloque=" + $('#bloque').val()+"&piso="+ $('#id_piso').val(),
        success:function(r){
            $('#lista_piso').html(r);
        }
    });
}
