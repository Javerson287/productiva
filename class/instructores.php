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
                
                
                echo '<script language="javascript">alert("Tus datos no se guardaron");window.location.href="../vistas/instructor.php";</script>';
                
                
                
            }
        }
        static function insertar_rap ($id_com, $id_rap,$name)
        {
           
            $conexion = Conex::conectar();
            $sql= "INSERT INTO `resultado_aprenizaje` (`id_competencia`, `id_resultado`, `resultado_aprenizaje`) VALUES ('$id_com', '$id_rap', '$name');";
            $resultado = $conexion->query($sql);
            if ($conexion ->affected_rows > 0)
            {
                
                
                echo '<script language="javascript">alert("Tus datos se guardaron");window.location.href="../vistas/agregar_relacion idrap.php";</script>';
            }
            else
            {
             
                
                echo '<script language="javascript">alert("Tus datos no se guardaron");window.location.href="../vistas/agregar_relacion idrap.php";</script>';
                
                
                
            }
        }
}