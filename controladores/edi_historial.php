<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ingresar sede</title>
    <link rel="stylesheet" type=" text/css" href="../css/edi_historial.css">

    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600|Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Oswald" rel="stylesheet">

</head>

<body>
    <?php
    $id = $_GET['id'];
    include('../class/conexion.php');
    $conexion = Conex::conectar();
    $sql = "select  * from prestamo_ambientes as prestamo INNER JOIN ambiente ON prestamo.id_ambiente=ambiente.id_ambiente
    INNER JOIN piso ON ambiente.id_piso=piso.id_piso
    INNER JOIN bloque ON bloque.id_bloque=piso.id_bloque
    INNER JOIN sede ON sede.id_sede=bloque.id_sede
     where id_prestamo = '$id' ";

    $resultado = $conexion->query($sql);
    $enviados = mysqli_fetch_array($resultado)
    ?>
    <div id="center">
        <!-- estos input son importantes para la edicion -->
        <input type="text" hidden value="<?php echo $enviados['ficha'] ?>" id="id_programa">
          <input type="text" hidden value="<?php echo $enviados['documento'] ?>" id="id_documentoi">
        <input type="text" hidden value="<?php echo $enviados['id_ambiente'] ?>" id="id_ambiente">
        <input type="text" hidden value="<?php echo $enviados['id_bloque'] ?>" id="id_bloque">
        <input type="text" hidden value="<?php echo $enviados['id_piso'] ?>" id="id_piso">
        <input type="text" hidden value="<?php echo $enviados['lunes'] ?>" id="l">
        <input type="text" hidden value="<?php echo $enviados['martes'] ?>" id="mar">
        <input type="text" hidden value="<?php echo $enviados['miercoles'] ?>" id="mir">
        <input type="text" hidden value="<?php echo $enviados['jueves'] ?>" id="ju">
        <input type="text" hidden value="<?php echo $enviados['viernes'] ?>" id="vi">
        <input type="text" hidden value="<?php echo $enviados['sabado'] ?>" id="sa">
        <input type="text" hidden value="<?php echo $enviados['domingo'] ?>" id="do">

        <!-- fin de los input -->
        <form action="r-prestamo_update.php" method="POST" id="form" name="actualizar">

            <fieldset>
            <input type="text" hidden name="id" value="<?php echo $id ?>" >
                <a href="#" id="btn-cerrar-popup5" onclick="visible2()" class="btn-cerrar-popup5"><i class="fas fa-times"></i></a>
                <h2 class="fs-title">edicion del historial</h2>

                <table class="table">


                    <thead><br>
                        
                        <th>instructor:</th>
                        <th>Programa:</th>
                        <th>Fase del Proyecto:</th>
                        <th>PRODUCTO DE LA FASE:</th>
                        <th>ID Competencia:</th>
                        <th>ID Rap:</th>
                        <th>Sede:</th>
                        <th>Bloque:</th>
                        <th>Piso:</th>
                        <th>Ambiente:</th>
                    </thead>
                    <tbody>

                        

                        <td data-label="instructor:"><select id="mibuscador2" name="instructor">

                                <?php
                                //se realiza la conexion con la base de datos
                                $conexion = Conex::conectar();
                                $sql = "select  * from instructores";

                                $resultado = $conexion->query($sql);
                                //se crea l alista de los ambientes
                                while ($fila = mysqli_fetch_array($resultado)) {
                                    $instructor1 = $fila['documento'];
                                    $instructor = $fila['n_instructor'];
                                    if ($instructor1 == $enviados['documento']) {

                                        echo "<option value ='  $instructor1' selected='selected'> $instructor </option>";
                                    } else {
                                        echo "<option value ='$instructor1'> $instructor </option>";
                                    }
                                }

                                ?>
                            </select></td>


                        <td data-label="Programa:" id="lista_programa">

                        </td>

                        <td data-label="Fase del Proyecto:"> <select id="fase" name="fase">
                                <?php
                                //se realiza la conexion con la base de datos

                                $sql = "select * from fase";
                                //echo $sql;
                                $resultado = $conexion->query($sql);
                                //se crea l alista de los ambientes
                                while ($fila = mysqli_fetch_array($resultado)) {
                                    $fase2 = $fila['fase_proyecto'] . ' ';

                                    $fase = $fila['id_fase'];





                                    echo "<option value ='$fase'> $fase2 </option>";
                                }

                                ?>
                            </select> </td>


                        <td data-label="PRODUCTO DE LA FASE:"><select id="producto" name="producto">

                                <?php
                                //se realiza la conexion con la base de datos

                                $sql = "select  * from producto_fase ";
                                echo $sql;
                                $resultado = $conexion->query($sql);
                                //se crea l alista de los ambientes
                                while ($fila = mysqli_fetch_array($resultado)) {
                                    $pro = $fila['id_producto'];
                                    $pro2 = $fila['producto'];
                                    echo "<option value =' $pro'> $pro </option>";
                                }

                                ?>
                            </select>

                        <td data-label="ID COMPETENCIA:"><select id="com" name="com">

                                <?php
                                //se realiza la conexion con la base de datos

                                $sql = "select  * from competencicas ";
                                echo $sql;
                                $resultado = $conexion->query($sql);
                                //se crea l alista de los ambientes
                                while ($fila = mysqli_fetch_array($resultado)) {
                                    $com = $fila['id_competencia'];
                                    $com2 = $fila['competencia'];
                                    echo "<option value =' $com'> $com </option>";
                                }

                                ?>
                            </select>

                        <td data-label="ID RAP:"><select id="rap" name="rap">

                                <?php
                                //se realiza la conexion con la base de datos

                                $sql = "select  * from resultado_aprenizaje ";
                                echo $sql;
                                $resultado = $conexion->query($sql);
                                //se crea l alista de los ambientes
                                while ($fila = mysqli_fetch_array($resultado)) {
                                    $rap = $fila['id_resultado'];
                                    $rap2 = $fila['resultado_aprenizaje'];
                                    echo "<option value =' $rap'> $rap </option>";
                                }

                                ?>
                            </select>

                        <td data-label="Sede:"><select id="sede" name="sede">
                                <?php
                                //se realiza la conexion con la base de datos

                                $sql = "select * from sede";
                                //echo $sql;
                                $resultado = $conexion->query($sql);
                                //se crea l alista de los ambientes
                                while ($fila = mysqli_fetch_array($resultado)) {
                                    $sede2 = $fila['id_sede'] . ' ';
                                    $sede = $fila['n_sede'];
                                    if ($sede2 == $enviados['id_sede']) {

                                        echo "<option value ='  $sede2' selected='selected'> $sede </option>";
                                    } else {
                                        echo "<option value ='$sede2'> $sede </option>";
                                    }
                                }

                                ?>
                            </select></td>



                        <!-- agregando lista de bloques -->
                        <td data-label="Bloque:">
                            <div id="select2lista" div>
                        </td>

                        <!-- agregando lista de pisos -->

                        <td data-label="Piso:">
                            <div id="lista_piso"></div>
                        </td>

                        <!-- agregando lista de ambientes -->
                        <td data-label="Ambiente:">
                            <div id="lista_ambiente"></div>
                        </td>


                </table>

                <!-- segunda tabla -->
                <table class="table">

                    <thead><br>
                        <th>Inicio prestamo:</th>
                        <th>Fin prestamo:</th>
                        <th>Horario:</th>
                        <th COLSPAN="7">Dias:</th>
                        <th>visualizar dias trabajados</th>



                    </thead>


                    <td data-label="Inicio prestamo:"> <input type="date" id="fecha_i" onchange="pasar()" name=inicio_prestamo value="<?php echo $enviados['fecha_inicio'] ?>"></td>
                    <td data-label="Fin prestamo:"><input type="date" id="fecha_f" name=fin_prestamo min="<?php echo $enviados['fecha_inicio'] ?>" value="<?php echo $enviados['fecha_fin'] ?>"></td>
                    <td data-label="Horario:">
                        <input type="time" name="h_ingreso" id="h_i" value="<?php echo $enviados['hora_inicio'] ?>" step="1" />
                        <input type="time" name="h_salida" id="h_f" step="1" value="<?php echo $enviados['hora_fin'] ?>" />

                    </td>


                    <td class="dia" data-label="Dias:">
                        <input type="radio" name="lunes" id="lunes" value="2" onclick="uncheckRadio(this,'lunes')">LUN
                    </td>
                    <td><input type="radio" name="martes" id="martes" value="2" onclick="uncheckRadio(this,'martes')">MAR</td>
                    <td><input type="radio" name="miercoles" id="mir" value="2" onclick="uncheckRadio(this,'mir')">MIE</td>
                    <td><input type="radio" name="jueves" value="2" id="j" onclick="uncheckRadio(this,'j')">JUE</td>
                    <td><input type="radio" name="viernes" value="2" id="v" onclick="uncheckRadio(this,'v')">VIE</td>
                    <td><input type="radio" name="sabado" value="2" id="s" onclick="uncheckRadio(this,'s')">SAB</td>
                    <td><input type="radio" name="domingo" value="2" id="d" onclick="uncheckRadio(this,'d')">DOM</td>

                    </td>
                    <td><input type="radio" name="ver" value="1" onclick=" visible_mes(this)"></td>
                    </tbody>

                </table>
                <br>
                    <table class="table" id="mes_hora">
                        <thead>
                            <th COLSPAN="26">meses:</th>
                        </thead>
                        <tbody id="meses" data-label="meses:"></tbody>
                    </table>
                <div class="enviar">
                    <button type="submit" class="enviar" value="enviar">enviar</button>
                </div>
            </fieldset>
        </form>

    </div>

    <script src="../js/dias.js"></script>
    <script src="../js/listaP.js"></script>
    <script src="../js/lista.js"></script>

</body>

</html>