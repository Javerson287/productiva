<?php
$id=$_GET['id'];
$nombre=$_GET['profecion'];
$tabla="profesiones";
$campo="n_profesiones";
$campo_id="id_profesiones";
include("../class/eliminar.php");

editar2($tabla,$nombre,$id,$campo,$campo_id,);

header('location: ../vistas/profecion.php');