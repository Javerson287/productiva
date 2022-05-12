<?php
 function insertar_datos($tipo,$ficha,$programa,$fase,$producto,$competencia,$hora,$rap,$hr,$fi,$ff,$instructor,$perfil,$lugar,$hi,$hf,$ho,$LUN,$MAR,$MIE,$JUE,$VIE,$SAB,$DOM){
 		global $conexion;
 	$sentencia = "insert into prueba(TIPO_FORMACION,FICHA,N_PROGRAMA,FASE_PROYECTO,PRODUCTO_FASE,ID_COMPETENCIA,HORA_COMPETENCIA,ID_rap,hora_RAP,FECHA_INICIO,FECHA_FIN,INSTRUCTOR,PERFIL_INSTRUCTOR,LUGAR,HORA_NICIO,HORA_FIN,HORA,LUN,MAR,MIE,JUE,VIE,SAB,DOM	
	 ) values ('$tipo','$ficha','$programa','$fase','$producto','$competencia','$hora','$rap','$hr','$fi','$ff','$instructor','$perfil','$lugar','$hi','$hf','$ho','$LUN','$MAR','$MIE','$JUE','$VIE','$SAB','$DOM')";
 	$ejecutar = mysqli_query($conexion,$sentencia);
	 
	 die();
 	return $ejecutar;
 }
?>