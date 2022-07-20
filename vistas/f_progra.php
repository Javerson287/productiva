<?php
 function insertar_datos($ficha,$nivel,$pro){
 		global $conexion;
 	$sentencia = "insert into programas(ficha,id_nivel,n_programa	
	 ) values ('$ficha','$nivel','$pro')";
 	$ejecutar = mysqli_query($conexion,$sentencia);
 	return $ejecutar;
 }
?>