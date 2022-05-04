<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Relacion</title>
    <link rel="stylesheet" href="../css/agregar.css">
</head>
<body>
  <div id = centrar>
    <h1>TypKey</h1>
    <hr style="height:2px;border-width:0;background-color:blue">
            
  </div>
   

  <form action="../controladores/r_relacio.php" method="POST" id="form">

    <fieldset>
        
      <h2 class="fs-title">INGRESAR RELACIÓN ENTRE INSTRUCTORES Y PROGRAMAS</h2>
      <br>
            <br>
      <label for="imp">programa:</label>
      <select name="programa">

        <?php
            //se realiza la conexion con la base de datos
            include('../class/conexion.php');
            $conexion = conex::conectar();
            $sql = "select ficha, n_programa from programas";
            echo $sql;
            $resultado = $conexion->query($sql);
            //se crea l alista de los ambientes
            while($fila = mysqli_fetch_array($resultado) )
            {
                $programa = $fila[ 'ficha'];
                $programa .= "  ";
                $programa .= $fila[ 'n_programa'];
                echo "<option values =' $programa'>  $programa </option>";
 }
            ?>
            </select>
            <br>
            <br>

      <label for="imp">Instructor:</label>
      <select name="instructor">

        <?php
            //se realiza la conexion con la base de datos
            
            $conexion = conex::conectar();
            $sql = "select documento, n_instructor from instructores";
            //echo $sql;
            $resultado = $conexion->query($sql);
            //se crea l alista de los ambientes
            while($fila = mysqli_fetch_array($resultado) )
            {
                $instructor = $fila[ 'documento'];
                $instructor .= "  ";
                $instructor .= $fila[ 'n_instructor'];
                echo "<option values =' $instructor'>  $instructor </option>";
 }
            ?>
            </select>
      
      <br><br>
      <a class="next action-button" href="../index.php">Volver</a>
      <input type="submit" class="next action-button" name="Enviar" value="Enviar">
  
        
     
    </fieldset>
    
    
  </form>
</body>
</html>