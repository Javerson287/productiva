<?php
include ('../conexion.php');

class cla_borrar extends conex
{
     static function borrar ($tabla, $campo = null, $dato = null)
    {
        $conexion=self::conectar();
        $sql = "delete " ;
        $sql .= "from $tabla ";

        //aqui se deside si se eliminan todos los datos o uno especifico de la tabla 
        if ( $campo != null && $dato != null)
        {
            $sql .= "where $campo = '$dato' " ;
        }

       echo $sql;
        echo ('se a eliminado el dado');
        $resultado = $conexion->query($sql);
        $conexion->close();
    
        
    }
}