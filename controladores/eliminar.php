<?php
$id=$_GET['id'];
$tabla=$_GET['tabla'];


include("../class/eliminar.php");
if ($tabla=='sede') {
    borrar($tabla,'id_sede',$id);
    header('location: ../vistas/editar_sede.php');
}else {
    $sede=$_GET['sede'];
    if ($tabla=='bloque') {
        
        borrar($tabla,'id_bloque',$id);
        header('location: ../vistas/bloques.php?id='.$sede);
    }
    if ($tabla=='piso') {
        $bloque=$_GET['bloque'];
        borrar($tabla,'id_piso',$id);
        header('location: ../vistas/bloques.php?id='.$sede);
    }
    if ($tabla=='ambiente') {
        $piso=$_GET['piso'];
        borrar($tabla,'id_ambiente',$id);
        
        header('location: ../vistas/bloques.php?id='.$sede);
    }
}


