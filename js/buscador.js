function getSearchResults(event, element) {

      var searchKeyword = element.value;
      $.ajax({
        type: "POST",
        url: "../vistas/histo_profeciones.php",
        data: "buscar="+searchKeyword,
        success: function (r) {
          $('#historia').html(r);
        }
      });
    
      
    
  }  

  $.ajax({
    type: "POST",
    url: "../vistas/histo_profeciones.php",
    success: function (r) {
      $('#historia').html(r);
    }
  });
 