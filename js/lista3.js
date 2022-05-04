
$(document).ready(function(){
    //$('#sede').val($sede);
    
    lista4();
    $('#lista2').change(function(){
        lista4();     
        
    });
})

function lista4(){
    $.ajax({
        type:"GET",
        url:"ambiente.php",
        data:"ambiente=" + $('#lista2').val(),
        success:function(r){
            $('#lista_ambiente').html(r);
        }
    });
}
