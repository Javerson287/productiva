<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script type="text/javascript" src="../js/jquery-1.7.1.js"></script>
    <script type="text/javascript" src="../js/jquery-ui.js"></script>
    <link rel="stylesheet" type="text/css" href="../js/jquery-ui.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/sede.css">
    <script src="../js/popup3.js"></script>
    <title>sedes</title>
  
</head>

<body>
<button id="volver"><a href="../index.php">volver</a></button>
    <div class="titulo">sedes disponibles</div>
    <button onclick='imprimir5()' id="in" type="bu">agregar sede</button>
  
    <div class="centra1">
        <?php
        include("../controladores/sedes.php");
        while ($row = mysqli_fetch_array($result)) {
            echo '<a href="bloques.php?id=' . $row['id_sede'] . '">'; ?>
            <div class="sede1">
                <div class="img">
                    <img src="../img/loco.PNG" alt="sede">
                </div>
                

                <?= $row['n_sede'] ?>
                <br><br>
                <?php echo '<a id="eliminar1"  href="../controladores/eliminar.php?id=' . $row['id_sede'] . '&tabla=sede" class="eliminar">eliminar</a>';
               
               ?>
            
              
            </div>
        <?php echo '</a>';
        } ?>
    </div>
    <script src="../js/eliminar.js"></script>
    
<!-- lo siguiente va hacer el formulario de insertar sedes -->
<div  class="overlay5" id="overlay5">
    <div class="popup5" id="popup5">
   
            <?php include('insertssede.html');?>
    </div>
</div> 

</body>

</html>