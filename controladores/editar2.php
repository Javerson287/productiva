<?php

$tabla=$_GET['tabla'];
 $campo=$_GET['campo'];
 $campo1=$_GET['campo1'];
 $id_campo= $_GET['edi'];
 $id= $_GET['edi_intructor'];
 $profecion= $_GET['profecion'];

include("../class/eliminar.php");
editar3($tabla, $id_campo, $id,$campo, $campo1,$profecion);


header('location: ../vistas/instructor.php');


