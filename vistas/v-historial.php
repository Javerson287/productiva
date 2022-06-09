<html>

<head>


      <title></title>
      <script src="../js/jquery-3.1.1.min.js"></script>
<script src="../js/select2.full.min.js"></script>

      <script src="../js/historial.js"></script>

</head>

<body>

      <div class="header">
            <ul class="nav">
                  <li><a href="../index.php">Volver</a></li>

            </ul>
      </div>

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
      <input type="date" id="fecha" >
      <!-- barra de busqueda -->

<button id="buscar">buscar</button>


      <br>
      <form action="../controladores/c-historial.php" method="POST">

           
      </form>
      <div class="container">
            <div>

                  <table class="table">

                        <thead><br>




                              <th>TIPO DE FORMACION</th>
                              <th>Programa</th>
                              <th>FASE DEL PROYECTO</th>
                              <th>PRODUCTO DE LA FASE</th>
                              <th>ID COMPETENCIA</th>
                              <th>ID RAP</th>
                              <th>Sede</th>
                              <th>Bloque</th>
                              <th>Piso</th>



                              <th>ambiente</th>
                              <th>Fecha</th>
                              <th>Horario</th>
                              <th>Ficha</th>
                              <th>Instructor</th>


                              <th>Lun</th>
                              <th>Mar</th>
                              <th>Mie</th>
                              <th>Jue</th>
                              <th>Vie</th>
                              <th>Sab</th>
                              <th>Dom</th>
                              <th>Cant Aprendices</th>
                              <th COLSPAN="2">opciones </th>

                        </thead>
                        <tbody id="historia">
                             
                        </tbody>
                  </table>
                  <a href="../reporte.php"><button onClick>GENERAR EXCEL</button></a>

            </div>
      </div>


</body>

</html>