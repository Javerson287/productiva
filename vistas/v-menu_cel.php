<!DOCTYPE html>
<html>

<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>historial</title>
      <script src="../js/jquery-3.1.1.min.js"></script>
      <script src="../js/select2.full.min.js"></script>
</head>

<body>
      <!-- este es la vista de la programacion de los celadores e instructores -->
     
      
      <button id="volver"> <a href="../controladores/c-iniciar_seccion.php">Iniciar sesion</a></button>
      <select id="instructor" name="instructor">
            <option value='no' id="insstructor" type="text" selected></option>
            <?php
            include('../class/conexion.php');
            //se realiza la conexion con la base de datos
            $conexion = Conex::conectar();
            $sql = "select * from instructores ORDER BY n_instructor ASC
        ";
            //echo $sql;
            $resultado = $conexion->query($sql);
            //se crea l alista de los ambientes
            while ($fila = mysqli_fetch_array($resultado)) {
                  $fase2 = $fila['n_instructor'] . ' ';
                  $fase = $fila['documento'];
                  echo "<option value ='$fase' class='ok' id='instructor'> $fase2 </option>";
            }

            ?>
      </select>

      <!-- selctor de los colores a buscar -->
      <select id="programa" name="programa">
            <option value='no' id="programa" type="text" selected></option>
            <?php

            //se realiza la conexion con la base de datos

            $sql = "select * from programas ORDER BY n_programa ASC
        ";
            //echo $sql;
            $resultado = $conexion->query($sql);
            //se crea l alista de los ambientes
            while ($fila = mysqli_fetch_array($resultado)) {
                  $fase12 = $fila['n_programa'] . ' ';
                  $fase1 = $fila['ficha'];
                  echo "<option value ='$fase1' class='ok' id='programa'> $fase1  $fase12 </option>";
            }

            ?>
      </select>


      <!-- escoger fechas para la busqueda  -->
      <input type="date" id="fecha">
      <!-- barra de busqueda -->
      <button id="buscar" onclick="buscar()">buscar</button>
      
      <input type='button' id='n_pagi' value='hc' hidden>
      
                  <table  id="tblDatos">
                        <thead>
                        <th>Programa</th>
                        <th>Instructor</th>
                        <th>Sede</th>
                              <th>Bloque</th>
                              <th>Piso</th>
                              <th>ambiente</th>
                              <th>Fecha</th>
                              <th>Horario</th>
                              <th>Ficha</th>
                           
                              <th>Lun</th>
                              <th>Mar</th>
                              <th>Mie</th>
                              <th>Jue</th>
                              <th>Vie</th>
                              <th>Sab</th>
                              <th>Dom</th>
                              <th>Cant Aprendices</th>

                        </thead>
                        <tbody id="historia" >

                        </tbody>
                  </table>
                  <div id="paginador"></div>

<script src="../js/historial_cel.js"></script>


</body>

</html>