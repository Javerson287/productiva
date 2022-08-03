function getSearchResults(event, element) {

      var searchKeyword = element.value;
      
      $.ajax({
        type: "POST",
        url: "../vistas/histo_pro.php",
        data: "buscar="+searchKeyword +"&buscar_p="+ $('#buscapro').val(),
        success: function (r) {
          $('#historia').html(r);
        }
      });
  }  

  $.ajax({
    type: "POST",
    url: "../vistas/histo_pro.php",
    success: function (r) {
      $('#historia').html(r);
    }
  });

  // buscador por profecion
  $(document).ready(function(){
    mini();
    $('#buscapro').change(function(){
        mini();     
        
    });
   
})

function mini(){
    $.ajax({
        type:"POST",
        url:"../vistas/histo_pro.php",
        data: "buscar="+$('#escri').val() +"&buscar_p="+ $('#buscapro').val(),
        success:function(r){
        $('#historia').html(r);
        }
    });

}
