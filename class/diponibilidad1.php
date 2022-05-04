<?php

include ('conexion.php');
class disponible extends Conex
{
    static function disponibilidad($fecha, $hora)
    {
        
        $conexion = Conex::conectar();
        
        $sql = "call disponibilidad('$fecha', '$hora')";
       
        $resultado = $conexion->query($sql);
        
        //echo $sql;
        return $resultado;
    }
}