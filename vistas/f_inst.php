<?php
 function insertar_datos($doc,$instructor){
 		global $conexion;
 	$sentencia = "insert into instructores(documento,n_instructor	
	 ) values ('$doc','$instructor')";
 	$ejecutar = mysqli_query($conexion,$sentencia);
 	return $ejecutar;
 }
?>