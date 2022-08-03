<?php
 function insertar_datos($id,$resu,$idr){
 		global $conex;
 	$sentencia = "insert into resultado_aprenizaje(id_competencia,id_resultado,resultado_aprenizaje
	 ) values ('$id','$resu', '$idr')";
 	$ejecutar = mysqli_query($conex,$sentencia);
 	return $ejecutar;
 }
?>