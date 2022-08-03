<!DOCTYPE html>
<html>

<head>
    <title>
    </title>

    <script src="../js/jquery-3.1.1.min.js"></script>
    <script src="../js/select2.full.min.js"></script>
</head>

<body>

<?php

include("../class/conexion.php");

if (isset($_POST["enviar"])) {//nos permite recepcionar una variable que si exista y que no sea null

    $conex= Conex::conectar();
	require_once("f_pres.php");

	$archivo = $_FILES["archivo"]["name"];
	$archivo_copiado= $_FILES["archivo"]["tmp_name"];
	$archivo_guardado = "copia_".$archivo;


	

	//echo $archivo."esta en la ruta temporal: " .$archivo_copiado;


 copy($archivo_copiado, $archivo_guardado);
 
    
    if (file_exists($archivo_guardado)) {
    	 
    	 $fp = fopen($archivo_guardado,"r");//abrir un archivo
         $rows = 0;
         while ($datos = fgetcsv($fp , 1000 , ";")) {
         	    $rows ++;
         	   $datos[0] ." ".$datos[1] ." ".$datos[2]." ".$datos[3] ." ".$datos[4] ." ".$datos[5]." ".$datos[6]." ".$datos[7] ." ".$datos[8]." ".$datos[9]." ".$datos[10] ." ".$datos[11]." ".$datos[12]." ".$datos[13] ." ".$datos[14]." ".$datos[15]." ".$datos[16] ." ".$datos[17]." ".$datos[18]." ".$datos[19] ." ".$datos[20]." ".$datos[21]." ".$datos[22] ."<br/>";
			
					
			
				if($rows > 1) {
					$til = html_entity_decode($datos[0], ENT_QUOTES | ENT_HTML401, "UTF-8");
					$til1 = html_entity_decode($datos[2], ENT_QUOTES | ENT_HTML401, "UTF-8");
					$til2 = html_entity_decode($datos[3], ENT_QUOTES | ENT_HTML401, "UTF-8");
					$til3 = html_entity_decode($datos[4], ENT_QUOTES | ENT_HTML401, "UTF-8");
					$til4 = html_entity_decode($datos[8], ENT_QUOTES | ENT_HTML401, "UTF-8");
					$til5 = html_entity_decode($datos[9], ENT_QUOTES | ENT_HTML401, "UTF-8");
					$til6 = html_entity_decode($datos[10], ENT_QUOTES | ENT_HTML401, "UTF-8");
                    $til7 = html_entity_decode($datos[11], ENT_QUOTES | ENT_HTML401, "UTF-8"); 
                    $til8 = html_entity_decode($datos[12], ENT_QUOTES | ENT_HTML401, "UTF-8"); 
                    $til9 = html_entity_decode($datos[13], ENT_QUOTES | ENT_HTML401, "UTF-8");
					 
				    $f = str_replace('/','-', $datos[6]);
					$DateTime = DateTime::createFromFormat('d-m-Y', $f);
					$fecha = $DateTime->format('Y-m-d');
					$fecha2 = str_replace('-','/', $fecha);
					
					
				
                    $fe = str_replace('/','-', $datos[7]);
					$Date = DateTime::createFromFormat('d-m-Y', $fe);
					$for = $Date->format('Y-m-d');
					$fecha3 = str_replace('-','/', $for);

                    $lun = ($datos[16] == 'X' || $datos[16] == 'x') ? "1" : "0";
                    $mar = ($datos[17] == 'X' || $datos[17] == 'x') ? "1" : "0";
                    $mie = ($datos[18] == 'X' || $datos[18] == 'x') ? "1" : "0";
                    $jue = ($datos[19] == 'X' || $datos[19] == 'x') ? "1" : "0";
                    $vie = ($datos[20] == 'X' || $datos[20] == 'x') ? "1" : "0";
                    $sab = ($datos[21] == 'X' || $datos[21] == 'x') ? "1" : "0";
                    $dom = ($datos[22] == 'X' || $datos[22] == 'x') ? "1" : "0";
					

         		insertar_datos($til,$datos[1],$til1,$til2,$til3,$datos[5],$fecha2,$fecha3,$til4,$til5,$til6,$til7,$til8,$til9,$datos[14],$datos[15],$lun,$mar,$mie,$jue,$vie,$sab,$dom);
      
                
            
                }
            }
        }  

}


?>


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
        <br>

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

         
	 </div>
    

            <button id="enviar">enviar</button>
        </form>

        <div class="formulario">
	 	<form action="" class="formulariocompleto" method="post" enctype="multipart/form-data">
	 		 <input type="file" name="archivo" class="form-control"/>
	 		<input type="submit" value="SUBIR ARCHIVO" class="form-control" name="enviar">
	 	</form>
        </div>
        <script src="../js/dias.js"></script>
        <script src="../js/lista.js"></script>
        <script src="../js/listaP.js"></script>
        


</body>

</html>