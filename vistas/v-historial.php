<html>

<head>


      <title></title>
      <script src="../js/jquery-3.1.1.min.js"></script>
      <script src="../js/select2.full.min.js"></script>
      <script src='../js/dias.js'></script>

      <script src="../js/historial.js"></script>

</head>

<body>

      <button id="volver"> <a href="../index.php">Volver</a></button>
      <select id="instructor" name="instructor">
            <div id="sel">
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
            </div>
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

      <form action="../controladores/c-historial.php" method="POST">

      <input type="button" hidden id="n_pagi"value="h">
      </form>

      <div class="container">
                  <table class="table" id="tblDatos">
                        <thead>
                              <th rowspan='2'>TIPO DE FORMACION</th>
                              <th rowspan='2'>Programa</th>
                              <th rowspan='2'>FASE DEL PROYECTO</th>
                              <th rowspan='2'>PRODUCTO DE LA FASE</th>
                              <th rowspan='2' id='id_com'>ID <br>COMPETENCIA</th>
                              <th rowspan='2'>ID RAP</th>
                              <th rowspan='2'>Sede</th>
                              <th rowspan='2'>Bloque</th>
                              <th rowspan='2'>Piso</th>
                              <th rowspan='2'>ambiente</th>
                              <th rowspan='2' id='bor_s'>Fecha</th>
                              <th rowspan='2'>Horario</th>
                              <th rowspan='2'>Ficha</th>
                              <th rowspan='2'>Instructor</th>
                              <th rowspan='2' id="dias">Lun</th>
                              <th rowspan='2' id="dias">Mar</th>
                              <th rowspan='2' id="dias">Mie</th>
                              <th rowspan='2' id="dias">Jue</th>
                              <th rowspan='2' id="dias">Vie</th>
                              <th rowspan='2' id="dias">Sab</th>
                              <th rowspan='2' id="dias">Dom</th>
                              <th rowspan='2'>Cant Aprendices</th>
                              <th rowspan='2' COLSPAN="2">opciones </th>
                              <th>meses</th>

                        </thead>
                        <tbody id="historia" id="mes_hora">

                        </tbody>
                  </table>

            
            <div id="exel"><a href="../reporte.php"><button id="ca" onClick>GENERAR EXCEL</button></a></div>
            
      </div>

      <div id="paginador"></div>
      <div id="editable"></div>

</body>

</html>