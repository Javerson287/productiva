function prueba(a){

console.log(a);

$.ajax({
    type:"GET",
    url:"../controladores/programa.php",
    data:"programa=" + a,
    success:function(r){
        $('#competencia').html(r);
    }
    
});

prueba2(a);

}

console.log('ese es')

function prueba2(a){

    console.log(a);
    
    $.ajax({
        type:"GET",
        url:"../controladores/programa2.php",
        data:"programa=" + a,
        success:function(r){
            $('#no').html(r);
        }
    });
    
    }
    
    console.log('ese es')

