<?php
$id=$_GET['id'];
$tabla=$_GET['tabla'];
$sede=$_GET['sede'];
$campo=$_GET['campo'];
$campo1=$_GET['campo1'];
$id_campo= $_GET['edi'];
include("../class/eliminar.php");
editar2($tabla, $id_campo, $id,$campo, $campo1);

header('location: ../vistas/bloques.php?id='.$sede);