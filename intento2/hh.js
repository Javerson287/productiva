document.addEventListener("mouseup", e => {
  if (e.target.matches("#sel") || e.target.matches("#color")|| e.target.matches("#fecha")) {
    var x=document.getElementById("fecha").value;
    $.ajax({
      type: "GET",
      url: "historial.php",
      data:"frutas=" + $('#sel').val() +"&"+
      "color=" + $('#color').val() +"&"+
      "fecha=" + x,
      success: function(r) {
        $('#historia').html(r);
      }
    });
    

  }



})
//  function myfution() {
//   var x=document.getElementById("fecha").value;
//   console.log(x);
// }

var x=document.getElementById("fecha").value;

$.ajax({
  type: "GET",
  url: "historial.php",
  data:"frutas=" + $('#sel').val() +"&"+
  "color=" + $('#color').val() +"&"+
  "fecha=" + x,
  success: function(r) {
    $('#historia').html(r);
  }
});