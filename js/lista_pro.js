function prueba(a){

console.log(a);

$.ajax({
    type:"GET",
    url:"../controladores/programa.php",
    data:"programa=" + a,
    success:function(r){
        $('#l1').html(r);
    }
    
});

prueba2(a);

}



function prueba2(a){

    console.log(a);
    
    $.ajax({
        type:"GET",
        url:"../controladores/programa2.php",
        data:"programa=" + a,
        success:function(r){
            $('#l2').html(r);
        }
    });
    
    }

    function ins(ficha,competencia2){

        $.ajax({
            type:"GET",
            url:"../controladores/ins.php",
            data:"competencia=" + competencia2 + "&" + "ficha=" + ficha,
            success:function(r){
                if(r==0){
                    alert("agregado con exito");

                    prueba(ficha);

                }else{
                    alert("Fallo el server");
                }
            }
    });

    

    }

    function eli(ficha,competencia2){

        console.log(ficha + '-' + competencia2 );

        $.ajax({
            type:"GET",
            url:"../controladores/eli_com.php",
            data:"competencia=" + competencia2 + "&" + "ficha=" + ficha,
            success:function(r){
                if(r==0){
                    prueba(ficha);

                    alert("eliminado con exito");
                    
                }else{
                    alert("Fallo el server");
                }
            }
    });

    

    }
    var ultimaFila = null;
    var colorOriginal;
    $(Inicializar);
    function Inicializar() {
        $('#buscador td').click(function () {
            if (ultimaFila != null) {
                ultimaFila.css('background-color', colorOriginal)
            }
            colorOriginal = $(this).css('background-color');
            $(this).css('background-color', '#0d573d');
            ultimaFila = $(this);
        });
    }