<?php
include_once('conexion.php');
class ambientes extends conex
{
    static function ingresar_ambientes($cede,$nom_aula)
    {
       include_once('mensajes.php');
        $conexion = conex::conectar();
        $sql= " insert into ambientes (cede, nom_aula) values ('$cede', '$nom_aula')";
        $resultado = $conexion->query($sql);
        //echo $sql;
        mensajes::m_amb($conexion);
    }
 
   

}