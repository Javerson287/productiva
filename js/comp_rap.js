function prueba(a) {



    $.ajax({
        type: "GET",
        url: "../controladores/instruc_progra.php",
        data: "idrap=" + a ,
        success: function (r) {
            $('#l2').html(r);
        }

    });
    document.getElementById("id_com").value = a;
}


function visible() {
    var mes_hora = document.getElementById('agregarp');
    mes_hora.classList.add('active');
}
function visible1() {
    var mes_hora = document.getElementById('agregarp');
    mes_hora.classList.remove('active');
}
//--

//.-

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


