<?php

?>
<html>

<head>
    <title>
    </title>
    <link rel="stylesheet" href=../css/list.css>
    <script src="../js/jquery-3.1.1.min.js"></script>
    <script src="../js/select2.full.min.js"></script>
</head>

<body>
    <button id="volver"><a href="../index.php">volver</a></button>
    <div id="titulo">
        <h1> Instructores VS programas</h1>
    </div>


    <div id="lista">
        <div id="lado">
        <table  class="instru">
               <thead>
                <th>instructores</th><tr>
                <th><input class="instructor" data-table="instru" type="text" placeholder="buscar.."></th></tr>
            </thead> 
            <tbody  id="primero">
               <?php
                //se realiza la conexion con la base de datos
                include('../class/conexion.php');
                $conexion = Conex::conectar();
                $sql = "select * from instructores";
                //echo $sql;
                $resultado = $conexion->query($sql);
                //se crea l alista de los ambientes
                while ($fila = mysqli_fetch_array($resultado)) {
                    $fase2 = $fila['n_instructor'] . ' ';
                    $fase = $fila['documento'];
                    echo "<tr><td onclick='prueba($fase)'>$fase2</td></tr>";
                }
                ?>
                </tbody>
            </table>
        </div>

        <div id="lado1" >
            <table id='agr' class='rela'>
                <thead>
                    <th>programas relacionadas</th>
                    <tr><th><input class="instructor" data-table="rela" type="text" placeholder="buscar.."></th></tr>
                </thead>
                <tbody id="l1"></tbody>
            </table>
        </div>
        <div id="lado2">
            <table id='agr1' class='nrela'>
                <thead>
                    <th>programas no relacionadas</th>
                    <tr><th><input class="instructor" data-table="nrela" type="text" placeholder="buscar.."></th></tr>
                </thead>
                <tbody id="l2"></tbody>


            </table>
        </div>

    </div>
    <script src="../js/lista_ins.js"></script>
    
 
</body>

</html>
<?
