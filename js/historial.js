
document.addEventListener("mouseup", e => {
  if (e.target.matches("#buscar") ) {
    x=document.getElementById("fecha").value;
    $.ajax({
      type: "GET",
      url: "historial.php",
      data:"instructor=" + $('#instructor').val() +"&"+
      "programa=" + $('#programa').val() +"&"+
      "fecha=" + x,
      success: function(r) {
        $('#historia').html(r);
      }
    });
    

  }



});
console.log('hola1');
	
var hoy = new Date();
var fecha =  hoy.getFullYear()+ '-' + ( hoy.getMonth() + 1 ) + '-' + hoy.getDate();
console.log('hola'.fecha);

$.ajax({
  type: "GET",
  url: "../controladores/historial.php",
  data:"instructor=" + $('#instructor').val() +"&"+
  "programa=" + $('#programa').val() +"&"+
  "fecha=" + fecha ,
  success: function(r) {
    $('#historia').html(r);
  }
});
