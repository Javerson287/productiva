<?php
 function insertar_datos($id,$comp){
 		global $conex;
 	$sentencia = "insert into competencicas(id_competencia,competencia
	 ) values ('$id','$comp')";
 	$ejecutar = mysqli_query($conex,$sentencia);
 	return $ejecutar;
 }
?>