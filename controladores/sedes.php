<?php
include("../class/conexion.php");
$conect=Conex::conectar();
$sql="select * from sede where borrar=0;";
$result= mysqli_query($conect, $sql);