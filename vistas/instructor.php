<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600|Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <title>instructor</title>
    <link rel="stylesheet" href="../css/instructor.css">
    <script src="../js/jquery-3.1.1.min.js"></script>
    <script src="../js/buscador_i.js"></script>
    <title>TYPKEY_inctructores</title>
</head>

<body>

    <?php

    include("../class/conexion.php");
    if (isset($_POST["enviar"])) { //nos permite recepcionar una variable que si exista y que no sea null

        $conexion = Conex::conectar();
        require_once("f_inst.php");

        $archivo = $_FILES["archivo"]["name"];
        $archivo_copiado = $_FILES["archivo"]["tmp_name"];
        $archivo_guardado = "copia_" . $archivo;

        //echo $archivo."esta en la ruta temporal: " .$archivo_copiado;

        copy($archivo_copiado, $archivo_guardado);

        if (file_exists($archivo_guardado)) {

            $fp = fopen($archivo_guardado, "r"); //abrir un archivo
            $rows = 0;
            while ($datos = fgetcsv($fp, 1000, ";")) {
                $rows++;

                $datos[0] . " " . $datos[1] . "<br/>";

                if ($rows > 1) {

                    $til2 = html_entity_decode($datos[0], ENT_QUOTES | ENT_HTML401, "UTF-8");
                    $til = $name = html_entity_decode($datos[1], ENT_QUOTES | ENT_HTML401, "UTF-8");


                    $resultado = insertar_datos($til2, $til);
                }
            }
        }
    }


    ?>




    <button id="volver"><a href="../index.php">volver</a></button>
    <?php


    ?>
    <form action="../controladores/r_instructor.php" method="POST" id="form">

        <fieldset>
            <div class="titulo">Ingresar Instructor</div>
            <input type="number" name="CC" id="impe" placeholder="Numero de Identificacion" required>
            <input type="text" name="nombre" id="impe" placeholder="Nombres y Apellidos" required />

            <?php

            $mysqli = Conex::conectar();
            ?>

            <select name='profecion' class="form-control" required>
                <option value="">PROFECIÓN</option>
                <?php
                //Vincular con la tabla y extraer datos
                $query = $mysqli->query("SELECT * FROM profesiones");
                while ($valores = mysqli_fetch_array($query)) {
                    echo '<option value="' . $valores['id_profesiones'] . '">' . $valores['n_profesiones'] . '</option>';
                }
                ?>
                <!--fin select-->
            </select>

            <input type="submit" class="next action-button" name="Enviar" value="Enviar">



        </fieldset>
    </form>
    <input type="button" hidden id="n_pagi" value="ins">

    <div class="editar">
        <div class="titulo2"> instructores registrados</div>
        <input class="buscauniversal" type="text" placeholder="Buscar por nombre" id="escri" onkeyup="return getSearchResults(event, this);">


        <select name='profecion' id="buscapro" class="form-control" >
            <option value="">Buscar por profecion</option>
            <?php
            //Vincular con la tabla y extraer datos
            $query = $mysqli->query("SELECT * FROM profesiones");
            while ($valores = mysqli_fetch_array($query)) {
                echo '<option value="' . $valores['id_profesiones'] . '">' . $valores['n_profesiones'] . '</option>';
            }
            ?>
            <!--fin select-->
        </select>




        <div class="formulario">
            <form action="" class="formulariocompleto" method="post" enctype="multipart/form-data">
                <input type="file" name="archivo" class="form-control" />
                <input type="submit" value="SUBIR ARCHIVO" class="form-control" name="enviar">
            </form>
        </div>

        <table class="table" id="tbinstructor">
            <thead>
                <th>No Documento</th>
                <th>Nombre y Apellidos</th>
                <th>profeción</th>
                <th>Opcion</th>
            </thead>
            <tbody id="historia">

            </tbody>
        </table>
        <div id="paginador"></div>
    </div>

    <div class="overlay5" id="overlay5">
        <?php
        include('../controladores/edi_instructor.php');
        ?>

    </div>
    <script src="../js/popup3.js"></script>
   
</body>

</html>