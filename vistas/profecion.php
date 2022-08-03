<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600|Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
  <script src="../js/jquery-3.1.1.min.js"></script>
  
    <script src="../js/buscador.js"></script>
    <link rel="stylesheet" href="../css/instructor.css">
 
   <title>TYPKEY_profeciones</title>
</head> 

<body>
<button id="volver"><a href="../index.php">volver</a></button>
    <?php

    
    ?>
    <form action="../controladores/r_profeciones.php" method="POST" id="form">

        <fieldset>
            <div class="titulo">Ingresar Profecion</div>
            <input type="text" name="nombre" id="impe" placeholder="profecion" required />         
            <input type="submit" class="next action-button" name="Enviar" value="Enviar">
        </fieldset>
    </form>

    <input type="button" hidden id="n_pagi"value="ins">

    <div class="editar">
        <div class="titulo2"> Profesiones Registrados</div>
        <input class="buscauniversal" type="text" onkeyup="return getSearchResults(event, this);">


        <table class="table" id="tbinstructor">
            <thead>
                <th>Profeción</th>
                <th>Opcion</th>
            </thead>
            <tbody id="historia">
                
            </tbody>
        </table>
        <div id="paginador"></div>
    </div>

    <div  class="overlay5" id="overlay5">
        <?php
        include('../controladores/edi_profecion.php');
          ?>

    </div>
    <script src="../js/popup3.js"></script>

   
</body>

</html>