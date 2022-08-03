<?php

include("../class/instructores.php");
$id_com = $_GET['id_com'];
$id_rap = $_GET['id_rap'];
$name = $_GET['name'];

if ($id_com == true && $id_rap == true && $name == true) {

  insertar_instructores::insertar_rap($id_com, $id_rap, $name);
} else {

  echo "hola";
  // header( "location: ../vistas/agregar_relacion idrap.php" );
}
