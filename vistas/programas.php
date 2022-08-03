<!DOCTYPE html>
<html lang="es">

<head>


    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600|Open+Sans" rel="stylesheet">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <script src="../js/jquery-3.1.1.min.js"></script>
    <script src="../js/buscador_p.js"></script>
    <title>programas</title>
    <link rel="stylesheet" href="../css/instructor.css">
    <title>programas</title>

</head>

<body>

    <?php
    include("../class/conexion.php");
    if (isset($_POST["enviar"])) { //nos permite recepcionar una variable que si exista y que no sea null
        $conexion = Conex::conectar();
        require_once("f_progra.php");

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

                $datos[0] . " " . $datos[1] . " " . $datos[2] . "<br/>";

                if ($rows > 1) {

                    $name = html_entity_decode($datos[2], ENT_QUOTES | ENT_HTML401, "UTF-8");

                    $resultado = insertar_datos($datos[0], $datos[1], $name);
                }
            }
        }
    }


    ?>

    <button id="volver"><a href="../index.php">volver</a></button>
    <?php


    ?>
    <form action="../controladores/r_programas.php" method="POST" id="form">

        <fieldset>
            <div class="titulo">Ingresar Programa</div>

            <input type="number" name="ficha" id="impe" placeholder="ficha" required>
            <input type="text" name="programa" id="impe" placeholder="Nombres del programa" required />
            <input type="number" name="cp" id="impe" placeholder="cantidad de aprendises" required>
            <?php
            header('Content-Type: text/html; charset=UTF-8');

            $mysqli = Conex::conectar();
            ?>

            <select name='nivel' class="form-control" required>
                <option value="">nivel del programa</option>
                <?php
                //Vincular con la tabla y extraer datos

                $query = $mysqli->query("SELECT * FROM nivel");
                while ($valores = mysqli_fetch_array($query)) {
                    echo '<option value="' . $valores['id_nivel'] . '">' . $valores['n_nivel'] . '</option>';
                }
                ?>
                <!--fin select-->
            </select>
            <!--lista de los tipos de formacion-->
            <select name='id_formacion' class="form-control" required>
                <option value="">tipo de formacion</option>
                <?php
                //Vincular con la tabla y extraer datos
                $query = $mysqli->query("SELECT * FROM tipo_formacion");
                while ($valores = mysqli_fetch_array($query)) {
                    echo '<option value="' . $valores['id_formacion'] . '">' . $valores['t_formacion'] . '</option>';
                }
                ?>
                <!--fin select-->
            </select>

            <input type="submit" class="next action-button" name="Enviar" value="Enviar">



        </fieldset>
    </form>
    <input type="button" hidden id="n_pagi" value="programas">
    <div class="editar">
        <div class="titulo2"> programas registrados</div>
        <!-- buscadores -->
        <input class="buscauniversal" type="text" placeholder="Buscar por Ficha o Nombre" id="escri" onkeyup="return getSearchResults(event, this);">
        <select name='nivel' class="form-control" id="buscapro">
            <option value="">nivel del programa</option>
            <?php
            //Vincular con la tabla y extraer datos

            $query = $mysqli->query("SELECT * FROM nivel");
            while ($valores = mysqli_fetch_array($query)) {
                echo '<option value="' . $valores['id_nivel'] . '">' . $valores['n_nivel'] . '</option>';
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
        <br>

        <table class="table" id="progra">
            <thead>
                <th>ficha</th>
                <th>nombre del programa</th>
                <th>cant aprendices</th>
                <th>nivel del programa</th>
                <th>tipo de formacion</th>
                <th>Opcion</th>
            </thead>
            <tbody id="historia">
                
                </tbody>
        </table>
        <div id="paginador"></div>
    </div>

    <div class="overlay_pro" id="overlay_pro">
        <?php
        include('../controladores/edi_programas.php');
        ?>

    </div>



    <script src="../js/popup4.js"></script>
   
</body>

</html>