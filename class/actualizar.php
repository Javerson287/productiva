<?php
include ('../conexion.php');

class actualizar extends conex
{
    static function actualiza($tabla, $campo , $dato , $no_campo, $no_dato)
{
    
    $conexion = conex::conectar();
    $sql = " update $tabla set $campo = '$dato' "; 
    //$sql .= " from $tabla "; 

    if ($campo != null && $dato != null)
    {
        $sql .= " where $no_campo = '$no_dato'  ";
        
    }

    //echo $sql;
    $resultado = $conexion->query($sql);
    $conexion->close();

}
}