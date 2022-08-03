<?php

include '../class/conexion.php';

$conexion=Conex::conectar();

$competencia2=$_GET['programa'];
$comp=$_GET['competencia'];

$sql2 = 
	"INSERT INTO prog_comp (id_competencia,ficha) VALUES ('$competencia2', '$comp')";
	mysqli_query($conexion,$sql2);
	
	

    ?>