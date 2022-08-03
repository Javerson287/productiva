<?php
include ('conexion.php');

class insertar_instructores extends Conex
{

    static function insertar ($No_documento, $nom_instructor,$n_profecion)
        {
           
            $conexion = Conex::conectar();
            $sql= "INSERT INTO `instructores` (`documento`, `n_instructor`, `borrar`, `id_profesiones`) VALUES ('$No_documento', '$nom_instructor', 0 , '$n_profecion');";
            $resultado = $conexion->query($sql);
            if ($conexion ->affected_rows > 0)
            {
                echo '<script language="javascript">alert("Tus datos se guardaron");window.location.href="../vistas/instructor.php";</script>';
            }
            else
            {
                // echo $sql;
                echo '<script language="javascript">alert("Tus datos no se guardaron");window.location.href="../vistas/instructor.php";</script>';

            }
        }
    static function insertar_profecion ($n_profecion)
        {
           
            $conexion = Conex::conectar();
            $sql= "INSERT INTO `profesiones` (`n_profesiones`) VALUES ('$n_profecion');";
            $resultado = $conexion->query($sql);
            if ($conexion ->affected_rows > 0)
            {
                echo '<script language="javascript">alert("Tus datos se guardaron");window.location.href="../vistas/profecion.php";</script>';
            }
            else
            {
            echo $sql;
               // echo '<script language="javascript">alert("Tus datos no se guardaron");window.location.href="../vistas/profecion.php";</script>';

            }
        }
}