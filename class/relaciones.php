<?php
include ('conexion.php');

class insertar_programa extends Conex
{

    static function insertar ($ficha,  $no_documento)
        {
            $inst = explode (" ",$no_documento);
            $pro = explode (" ",$ficha);
            $conexion = Conex::conectar();
            $sql= " insert into prog_inst (ficha, documento) values ('$pro[0]', '$inst[0]')";
            $resultado = $conexion->query($sql);
            echo $sql;
            if ($conexion ->affected_rows > 0)
            {
                
                echo '<script language="javascript">alert("tus datos se guardaron");window.location.href="../vistas/agregar_relacion.php";</script>';
            }
            else
            {
                echo '<script language="javascript">alert("tus datos no se guardaron");window.location.href="../vistas/agregar_relacion.php";</script>';
                
                
            }
        }
}