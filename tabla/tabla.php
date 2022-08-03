
<html>

<head>
    <title>
    </title>
    <link rel="stylesheet" href=../css/list.css>
    <script src="../js/jquery-3.1.1.min.js"></script>
    <script src="../js/select2.full.min.js"></script>
</head>

<body>

<?php

use function Composer\Autoload\includeFile;


include('../class/conexion.php');



if (isset($_POST["enviar"])) { //nos permite recepcionar una variable que si exista y que no sea null
    $conex = Conex::conectar();
    require_once("f_comp.php");

    $archivo = $_FILES["archivo"]["name"];
    $archivo_copiado = $_FILES["archivo"]["tmp_name"];
    $archivo_guardado = "copia_" . $archivo;

    //echo $archivo."esta en la ruta temporal: " .$archivo_copiado;

    if (copy($archivo_copiado, $archivo_guardado)) {
        echo "se copeo correctamente el archivo temporal a nuestra carpeta de trabajo <br/>";
    } else {
        echo "hubo un error <br/>";
    }

    if (file_exists($archivo_guardado)) {

        $fp = fopen($archivo_guardado, "r"); //abrir un archivo
        $rows = 0;
        while ($datos = fgetcsv($fp, 1000, ";")) {
            $rows++;

            $datos[0] . " " . $datos[1] . "<br/>";

            if ($rows > 1) {

                $name = html_entity_decode($datos[1], ENT_QUOTES | ENT_HTML401, "UTF-8");

                $resultado = insertar_datos($datos[0], $name);

            }
        }
    }
}


?>


    <button id="volver"><a href="../index.php">volver</a></button>

    <div id="titulo">
        <h1> programas vs competencias</h1>
    </div>


    <div id="lista">
        <div id="lado">
            <table id="buscador"  class="progra">
                <thead>
                <th>programas</th><tr>
                <th><input class="instructor" data-table="progra" type="text" placeholder="buscar.."></th></tr>
                </thead>
                <tbody id="primero">
                <?php
                //se realiza la conexion con la base de datos
              
                $conexion = Conex::conectar();
                $sql = "select * from programas";
                //echo $sql;
                $resultado = $conexion->query($sql);
                //se crea l alista de los ambientes
                while ($fila = mysqli_fetch_array($resultado)) {

                    $fase2 = $fila['n_programa'] . ' ';
                    $fase = $fila['ficha'];
                    echo "<tr><td onclick='prueba($fase)'>$fase2</td></tr>";
                }
                ?>
                </tbody>
            </table>
        </div>


        <div id="lado1" >
            <table id='agr' class='rela'>
                <thead>
                    <th>competencias relacionadas</th>
                    <tr><th><input class="instructor" data-table="rela" type="text" placeholder="buscar.."></th></tr>
                </thead>
                <tbody id="l1"></tbody>
            </table>
        </div>
        <div id="lado2">
            <table id='agr1' class='nrela'>
                <thead>
                    <th>competencias no relacionadas</th>
                    <tr><th><input class="instructor" data-table="nrela" type="text" placeholder="buscar.."></th></tr>
                </thead>
                <tbody id="l2"></tbody>


            </table>
        </div>


    </div>


    <div class="formulario" id= 'subir'>
	 	<form action="" class="formulariocompleto" method="post" enctype="multipart/form-data">
	 		 <input type="file" name="archivo" class="form-control"/>
	 		<input type="submit" value="SUBIR ARCHIVO" class="form-control" name="enviar">
	 	</form>
    <script src="../js/lista_pro.js"></script>

</body>

</html>
<?
