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
        <div id="primero">
            <table id="buscador">
                <th>instructores</th>
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
            </table>
        </div>

        <div id="l1">
            <table id='agr'>
                <thead>
                    <th>programas relacionadas</th>
                </thead>
                <tbody ></tbody>
            </table>
        </div>
        <div id="l2">
            <table id='agr1'>
                <thead>
                    <th>programas no relacionadas</th>
                </thead>
                <tbody></tbody>


            </table>
        </div>

    </div>
    <script src="../js/lista_ins.js"></script>
</body>

</html>
<?
