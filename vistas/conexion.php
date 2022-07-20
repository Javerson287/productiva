<?php
$conexion = mysqli_connect("localhost","root","","sena");

if($conexion){
  echo "se realizo correctamente la conexion";
}else{
 echo " no se realizo correctamente la conexion";
}
?>