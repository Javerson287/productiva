<?php

include '../class/conexion.php';

$conexion=Conex::conectar();

$ficha=$_GET['ficha'];
$comp=$_GET['competencia'];

$sql = 
	"DELETE FROM prog_comp WHERE prog_comp.id_competencia = $comp AND prog_comp.ficha = $ficha";
	mysqli_query($conexion,$sql);
	
	

    ?>