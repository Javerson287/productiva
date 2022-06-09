<?php

include '../class/conexion.php';

$buscar = "";


if(isset($_POST['buscar'])){

    $buscar = $_POST['buscar'];

}



$conexion = Conex::conectar();

$SQL_READ = "SELECT * FROM
programas INNER JOIN prestamo_ambientes AS prestamo on programas.ficha=prestamo.ficha
INNER JOIN ambiente ON ambiente.id_ambiente = prestamo.id_ambiente
INNER JOIN piso ON piso.id_piso = ambiente.id_piso
INNER JOIN bloque ON bloque.id_bloque = piso.id_bloque
INNER JOIN sede ON sede.id_sede = bloque.id_sede
INNER JOIN prog_inst ON programas.ficha = prog_inst.ficha
INNER JOIN instructores ON instructores.documento = prog_inst.documento

";




if($buscar != null){

    $SQL_READ .= "where n_sede like '%".$buscar."%' or n_instructor like '%".$buscar."%'";

}

$sql_query = mysqli_query($conexion, $SQL_READ);

//echo $SQL_READ;
 
    