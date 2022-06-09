<?php

include('../class/conexion.php');
function borrar($tabla, $id_campo, $id)
{
    $conect = Conex::conectar();
    $sql = "UPDATE $tabla SET `borrar` = '1' WHERE $id_campo = $id;";
    return mysqli_query($conect,$sql);
}

function editar($tabla, $id_campo, $id)
{
    
    $conect = Conex::conectar();
    $sql = "UPDATE $tabla SET `borrar` = '1' WHERE $id_campo = $id;";
    return mysqli_query($conect,$sql);
}
function editar2($tabla, $id_campo, $id,$campo,$campo1)
{
    
    $conect = Conex::conectar();
    $sql = "UPDATE $tabla SET $campo = '$id_campo' WHERE $campo1 = '$id';";
    //echo $sql;
    return mysqli_query($conect,$sql);
}

function editar3($tabla, $id_campo, $id,$campo,$campo1,$profecion)
{
    
    $conect = Conex::conectar();
    $sql = "UPDATE $tabla SET $campo = '$id_campo', id_profesiones = '$profecion', documento= '$id' WHERE documento = '$campo1'; ";
    

    

  
     return mysqli_query($conect,$sql);
    
}
function editar4($ficha_i, $ficha_f, $programa, $cp, $nivel, $formacion)
{
    
    $conect = Conex::conectar();
    $sql = "UPDATE programas SET ficha = '$ficha_f', n_programa = '$programa', cantidad_aprendizes= '$cp', id_nivel='$nivel', id_formacion='$formacion' WHERE ficha = '$ficha_i'; ";
    echo $sql;
    

  
     return mysqli_query($conect,$sql);
    
}

