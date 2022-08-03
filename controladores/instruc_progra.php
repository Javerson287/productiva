<?php
include '../class/conexion.php';
//esta es la decion que permite traer los datos a la vista
if (isset($_GET['ins'])) {
	$inst = $_GET['ins'];
}
if(isset($_GET['idrap'])){
	$com = $_GET['idrap'];
	rap($com);
}
if (isset($_GET['relacion'])) {

	relacionados($inst);
}
if (isset($_GET['control'])) {

	n_relacion($inst);
}
//esta decionpermite eliminar o ingresar nuevas relaciones
if (isset($_GET['eli'])) {
	$ficha = $_GET['ficha'];
	eli($ficha, $inst);
}
if (isset($_GET['ingr'])) {
	$ficha = $_GET['ficha'];
	mas($ficha, $inst);
}
//funcion para traer los programas relacionados
function relacionados($ins)
{
	$conexion = Conex::conectar();
	$sql = "SELECT * from
			prog_inst INNER JOIN programas on prog_inst.ficha= programas.ficha
			where prog_inst.documento='$ins'";
	$result = mysqli_query($conexion, $sql);
	$cadena = "";
	while ($fila = mysqli_fetch_array($result)) {
		$ficha = $fila['ficha'] . ' ';
		$ficha2 = $fila['n_programa'];
		$cadena .= "<tr><td id='tex'>$ficha- $ficha2</td><td><button onclick ='eli($ficha,$ins)'>-</button></td></tr>";
	}
	echo  $cadena;
}
//funcion para poder traer los rap registrados
function rap($id)
{
	$conexion = Conex::conectar();
	$sql = "SELECT * from
			resultado_aprenizaje 
			where id_competencia='$id'";
			
	$result = mysqli_query($conexion, $sql);
	$cadena = "";
	while ($fila = mysqli_fetch_array($result)) {
		$ficha = $fila['id_resultado'] . ' ';
		$ficha2 = $fila['resultado_aprenizaje'];
		$cadena .= "<tr><td id='tex'>$ficha- $ficha2</td></tr>";
	}
	
	echo  $cadena;
}
//funcion para poder traer las ue no estan relacionadas xd
function n_relacion($ins)
{

	$conexion = Conex::conectar();
	$sql = "SELECT  *
	   FROM programas
	  WHERE NOT EXISTS (SELECT ficha
			 from prog_inst 
			 where documento = $ins AND programas.ficha = prog_inst.ficha)";
	$result = mysqli_query($conexion, $sql);
	$cadena = "
	";
	while ($fila = mysqli_fetch_array($result)) {
		$ficha = $fila['ficha'] . ' ';
		$ficha2 = $fila['n_programa'];
		$cadena .= "<tr><td id='tex'>$ficha- $ficha2</td><td><button onclick ='ins($ins,$ficha)'>+</button></td></tr>";
	}

	echo  $cadena;
}

//funcion para eiminar las relaciones de los programas e instructores
function eli($ficha, $ins)
{
	$conexion = Conex::conectar();
	$sql = "DELETE FROM prog_inst WHERE `prog_inst`.`ficha` = $ficha AND `prog_inst`.`documento` = $ins";

	mysqli_query($conexion, $sql);
}
function mas($ficha, $ins)
{
	$conexion = Conex::conectar();
	$sql =
		"INSERT INTO prog_inst (documento,ficha) VALUES ('$ins', '$ficha')";
	mysqli_query($conexion, $sql);
}
