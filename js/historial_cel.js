buscar();
function buscar() {
  x = document.getElementById("fecha").value;
  $.ajax({
    type: "POST",
    url: "../vistas/v-busqueda.php",
    data: "instructor=" + $('#instructor').val() + "&" +
      "programa=" + $('#programa').val() + "&" +
      "fecha=" + x,
    success: function (r) {
      $('#historia').html(r);
    }
  });

};
function visible() {
  var mes_hora = document.getElementById('tblDatos');
  mes_hora.classList.add('active');
  var paginador = document.getElementById('paginador');
  paginador.classList.add('active');
  
}
function visible1() {
  var mes_hora = document.getElementById('tblDatos');
  mes_hora.classList.remove('active');
  var paginador = document.getElementById('paginador');
  paginador.classList.remove('active');
  
}


