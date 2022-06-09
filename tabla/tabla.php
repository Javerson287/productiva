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


    <div id="lista">
            
        <ul id="buscador" name="programas">
            <?php
            //se realiza la conexion con la base de datos
            include('../class/conexion.php');
            $conexion = Conex::conectar();
            $sql = "select * from programas";
            //echo $sql;
            $resultado = $conexion->query($sql);
            //se crea l alista de los ambientes
            while ($fila = mysqli_fetch_array($resultado)) {

                $fase2 = $fila['n_programa'] . ' ';


                $fase = $fila['ficha'];

                echo "<li id='1' onclick ='prueba($fase)'>" . $fase2 . "</li>";
            }

            ?>
        </ul>
        <br>

        <div id="l1" >
            <table class="default" style="border:4px solid; border-color: black;" id="competencia"></table>
        </div>

        <div id="l2">
            <table class="default" style="border:4px solid; border-color: black; " id="no"></table>
        </div>

    </div>

    <script src="../js/lista_pro.js"></script>
    <!-- <script src="../js/listaP.js"></script>  -->
    <!-- <script src="../js/buscador_lista.js"></script> -->


</body>

</html>
<?
