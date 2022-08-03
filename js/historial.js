
function buscar() {
  x = document.getElementById("fecha").value;
  $.ajax({
    type: "GET",
    url: "historial.php",
    data: "instructor=" + $('#instructor').val() + "&" +
      "programa=" + $('#programa').val() + "&" +
      "fecha=" + x,
    success: function (r) {
      $('#historia').html(r);
    }
  });

  $('#exel a').prop('href',"../reporte.php?instructor=" + $('#instructor').val() + "&" +
  "programa=" + $('#programa').val() + "&" +
  "fecha=" + x);
  
}


var hoy = new Date();
var fecha = hoy.getFullYear() + '-' + (hoy.getMonth() + 1) + '-' + hoy.getDate();


$.ajax({
  type: "GET",
  url: "../controladores/historial.php",
  data: "instructor=" + $('#instructor').val() + "&" +
    "programa=" + $('#programa').val() + "&" +
    "fecha=",
  success: function (r) {
    $('#historia').html(r);
  }
});
function visible() {
  var mes_hora = document.getElementById('tblDatos');
  mes_hora.classList.add('active');
  var paginador = document.getElementById('paginador');
  paginador.classList.add('active');
  var exel= document.getElementById('exel');
  exel.classList.add('active');
 
}
function visible1() {
  var mes_hora = document.getElementById('tblDatos');
  mes_hora.classList.remove('active');
  var paginador = document.getElementById('paginador');
  paginador.classList.remove('active');
  var exel= document.getElementById('exel');
  exel.classList.remove('active');
}
function visible2() {
  var edi= document.getElementById('editable');
  edi.classList.remove('active');
  var mes_hora= document.getElementById('mes_hora');
  mes_hora.classList.remove('active');

}


//cuadro de ediccion del historial
function editar(so) {
  $.ajax({
    type: "GET",
    url: "../controladores/edi_historial.php", 
    data: 
    "id=" + so,
    success: function (r) {
      $('#editable').html(r);
    }
  })
  var edi= document.getElementById('editable');
  edi.classList.add('active');
}


//funcion para la eliminacion
function alerta(so) {
  var mensaje;
  var opcion = confirm("¡esta seguro que deseas eliminar! no se podra recuperar este registro");
  if (opcion == true) {
    mensaje = so;
    $.ajax({
      type: "GET",
      url: "../controladores/eliminar_h.php",
      data: "tabla=prestamo_ambientes" + "&" +
        "id_campo=id_prestamo" + "&" +
        "id=" + so
    });
   buscar();

    
  } else {
    mensaje = "Has clickado Cancelar";
  }

}

//funcion para descargar en exel este codigo esta a prueva 

function exportTableToExcel(tableID, filename = ''){
  var downloadLink;
  var dataType = 'application/vnd.ms-excel';
  var tableSelect = document.getElementById(tableID);
  var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
  
  // Specify file name
  filename = filename?filename+'.xls':'excel_data.xls';
  
  // Create download link element
  downloadLink = document.createElement("a");
  
  document.body.appendChild(downloadLink);
  
  if(navigator.msSaveOrOpenBlob){
      var blob = new Blob(['ufeff', tableHTML], {
          type: dataType
      });
      navigator.msSaveOrOpenBlob( blob, filename);
  }else{
      // Create a link to the file
      downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
  
      // Setting the file name
      downloadLink.download = filename;
      
      //triggering the function
      downloadLink.click();
  }
}