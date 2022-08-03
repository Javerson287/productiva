<?php
 function insertar_datos($tipo,$ficha,$fase,$producto,$competencia,$rap,$fi,$ff,
 $instructor,$perfil,$sede,$bloque,$piso,$ambiente,$hi,$hf,$LUN,$MAR,$MIE,$JUE,$VIE,$SAB,$DOM){
 		global $conex;
 	$sentencia = "INSERT INTO cargue (TIPO_FORMACION, FICHA, FASE_PROYECTO, PRODUCTO_FASE, ID_COMPETENCIA,ID_rap, FECHA_INICIO, FECHA_FIN, INSTRUCTOR, PERFIL_INSTRUCTOR, sede,
	 bloque, piso, ambiente, HORA_NICIO, HORA_FIN, LUN, MAR, MIE, JUE, VIE, SAB, DOM) VALUES
	('$tipo','$ficha','$fase','$producto','$competencia','$rap','$fi','$ff','$instructor','$perfil','$sede','$bloque','$piso','$ambiente','$hi','$hf','$LUN','$MAR','$MIE','$JUE','$VIE','$SAB','$DOM')";
 	$ejecutar = mysqli_query($conex,$sentencia);
	 

 	
 }
?>