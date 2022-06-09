<?php

include '../class/conexion.php';

$conexion=Conex::conectar();

$ficha=$_GET['ficha'];
$comp=$_GET['competencia'];

$sql = 
	"INSERT INTO prog_comp (id_competencia,ficha) VALUES ('$comp', '$ficha')";
	mysqli_query($conexion,$sql);
	
	

    ?>