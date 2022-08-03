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
    
function eli(ficha, ins) {

    console.log(ficha + '-' + ins);
    console.log("ins=" + ins + "&" + "ficha=" + ficha + "&eli=1");

    $.ajax({
        type: "GET",
        url: "../controladores/instruc_progra.php",
        data: "ins=" + ins + "&" + "ficha=" + ficha + "&eli=1",
        success: function (r) {
            if (r == 0) {
                prueba(ins);

                alert("eliminado con exito");
                console.log(r);
            } else {
                alert("Fallo el server");
                console.log(r);
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
//codigo para realizar la busqueda en la tabla de instructores
function instructor_bus(document) {

var LightTableFilter = (function(Arr) {
    var _input;
    function _onInputEvent(e) {
      _input = e.target;
      var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
      Arr.forEach.call(tables, function(table) {
        Arr.forEach.call(table.tBodies, function(tbody) {
          Arr.forEach.call(tbody.rows, _filter);
        });
      });
    }
    function _filter(row) {
      var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
      row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
    }
    return {
      init: function() {
        var inputs = document.getElementsByClassName('instructor');
        
        Arr.forEach.call(inputs, function(input) {
          input.oninput = _onInputEvent;
        });
      }
    };
  })(Array.prototype);
  document.addEventListener('readystatechange', function() {
    if (document.readyState === 'complete') {
      LightTableFilter.init();
    }
  });


}
instructor_bus(document); 