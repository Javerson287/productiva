<?php
include ('../conexion.php');

class insertar_programa extends conex
{

    static function insertar ($ficha, $nom_programa, $no_documento)
        {
            $conexion = conex::conectar();
            $sql= " insert into programas (ficha, nom_programa, No_documento) values ('$ficha', '$nom_programa', '$no_documento')";
            $resultado = $conexion->query($sql);
            echo $sql;
            /* if ($conexion ->affected_rows > 0)
            {
                echo"tus datos se guardaron";
            }
            else
            {
                echo "tus datos no se guardaron";
            }*/
        }
}