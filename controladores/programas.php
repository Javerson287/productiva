<?php
include '../class/conexion.php';

$conexion = Conex::conectar();

$instructor = $_GET['programas'];
if (isset($_GET['ficha'])) {
}

$sql = "SELECT 
			 *
		from prog_inst 
		INNER JOIN programas ON programas.ficha = prog_inst.ficha
		where documento='$instructor'";

$result = mysqli_query($conexion, $sql);

$cadena = "
			<select id='mibuscador' name='ficha' >";

while ($fila = mysqli_fetch_array($result)) {
	$ficha = $fila['ficha'] . ' ';
	$nombre = $fila['n_programa'] . ' ';
	
	if (isset($_GET['ficha'])) {
		if ($ficha == $_GET['ficha']) {

			$cadena .= "<option value ='  $ficha' selected='selected'> $ficha-$nombre </option>";
		}else {
			$cadena .= "<option value =' $ficha'> $ficha-$nombre </option>";
		}
	} else {
		$cadena .= "<option value =' $ficha'> $ficha-$nombre </option>";
	}
}

echo  $cadena . "</select>";
	//var_dump($cadena);
