
$(document).ready(function(){
 
    lista3();
    $('#bloque').change(function(){
        lista3();     
        
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

function lista3(){
    $.ajax({
        type:"GET",
        url:"piso.php",
        data:"bloque=" + $('#bloque').val(),
        success:function(r){
            $('#lista_piso').html(r);
        }
    });
}
