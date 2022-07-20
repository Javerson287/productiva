<!DOCTYPE html>
<html>

<head>
    <title>
    </title>

    <script src="../js/jquery-3.1.1.min.js"></script>
    <script src="../js/select2.full.min.js"></script>
</head>

<body>
    <div id=centrar>
        <h1>TipKey</h1>
        <hr style="height:2px;border-width:0;background-color:blue">
    </div>

    <button id="volver"><a href="../index.php">volver</a></button>
    <form action="../controladores/r-prestamo.php" method="POST">

        <div class="container">

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
                            include('../class/conexion.php');
                            $conexion = Conex::conectar();
                            //se realiza la conexion con la base de datos
                            $sql = "select  * from instructores";
                            echo $sql;
                            $resultado = $conexion->query($sql);
                            //se crea l alista de los ambientes
                            while ($fila = mysqli_fetch_array($resultado)) {
                                $instructor1 = $fila['documento'];
                                $instructor = $fila['n_instructor'];
                                echo "<option value =' $instructor1'> $instructor </option>";
                            }
                            ?>
                        </select></td>

                    <td data-label="Programa:">
                        <div id="lista_programa"></div>
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





                                echo "<option value ='$sede2'> $sede </option>";
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
        </div>
        <br><br>

        <form action="../controladores/r-prestamo.php" method="POST">

            <div class="container">

                <table class="table">

                    <thead><br>
                        <th>Inicio prestamo:</th>
                        <th>Fin prestamo:</th>
                        <th>Horario:</th>
                        <th COLSPAN="7">Dias:</th>
                        <th>visualizar dias trabajados</th>



                    </thead>


                    <td data-label="Inicio prestamo:"> <input type="date" id="fecha_i" onchange="pasar()" name=inicio_prestamo></td>
                    <td data-label="Fin prestamo:"><input type="date" id="fecha_f" name=fin_prestamo min=""></td>
                    <td data-label="Horario:">
                        <input type="time" name="h_ingreso" id="h_i" value="12:00:00" step="1" />
                        <input type="time" name="h_salida" id="h_f" step="1" value="12:00:00" />

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


            </div>
            <br><br>
            <div class="container" id="mes_hora">
                <table class="table">
                    <thead>
                        <th COLSPAN="26">meses:</th>
                    </thead>
                    <tbody id="meses" data-label="meses:"></tbody>
                </table>
            </div>
            <button id="enviar">enviar</button>
        </form>
        <script src="../js/dias.js"></script>
        <script src="../js/lista.js"></script>
        <script src="../js/listaP.js"></script>
        


</body>

</html>