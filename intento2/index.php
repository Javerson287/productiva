<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="jquery-3.1.1.min.js"></script>
<script src="select2.full.min.js"></script>
    <link rel="stylesheet" href="index.css">
    <title>Document</title>
</head>

<body>

    <select id="sel" name="fruta">
        <option value='no' id="selct" type="text" selected></option>
        <?php
        include('conexion.php');
        //se realiza la conexion con la base de datos
        $conexion = conex::conectar();
        $sql = "select * from fruta ORDER BY fut ASC
        ";
        //echo $sql;
        $resultado = $conexion->query($sql);
        //se crea l alista de los ambientes
        while ($fila = mysqli_fetch_array($resultado)) {
            $fase2 = $fila['fut'] . ' ';
            $fase = $fila['id'];
            echo "<option value ='$fase' class='ok' id='select'> $fase2 </option>";
        }

        ?>
    </select>
    <!-- selctor de los colores a buscar -->
    <select id="color" name="color">
        <option value='no' id="selct" type="text" selected></option>
        <?php

        //se realiza la conexion con la base de datos

        $sql = "select * from color ORDER BY colr ASC
        ";
        //echo $sql;
        $resultado = $conexion->query($sql);
        //se crea l alista de los ambientes
        while ($fila = mysqli_fetch_array($resultado)) {
            $fase12 = $fila['colr'] . ' ';
            $fase1 = $fila['id_color'];
            echo "<option value ='$fase1' class='ok' id='select'> $fase12 </option>";
        }

        ?>
    </select>

    <!-- escoger fechas para la busqueda  -->
    <input type="date" id="fecha">

<!-- creacion de la tabla de los resultados -->
    <table class="table" style="color:aquamarine; border:11px;">
        <thead>
            <th>ID_FRUTA</th>
            <th>FRUTA</th>
            <th>PRECIO</th>
            <th>fecha</th>
            <th>COLOR</th>
        </thead>
        <tbody id="historia">
     
            
            
          
        </tbody>
    </table>
    <script src="hh.js"></script>
</body>

</html>