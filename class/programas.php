<?php
include ('conexion.php');

class insertar_programa extends Conex
{

    static function insertar ($ficha, $nom_programa)
        {
            
            $conexion = Conex::conectar();
            $sql= " insert into programas (ficha, nom_programa) values ('$ficha', '$nom_programa')";
            $resultado = $conexion->query($sql);
            //echo $sql;
            if ($conexion ->affected_rows > 0)
            {
                
                echo '<script language="javascript">alert("tus datos se guardaron");window.location.href="../vistas/agregar_programa.php";</script>';
            }
            else
            {
                echo '<script language="javascript">alert("tus datos no se guardaron");window.location.href="../vistas/agregar_programa.php";</script>';
                
                
            }
        }
}