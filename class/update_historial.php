<?php
include('conexion.php');

class prestamos extends Conex
{
    static function ingresar_prestamo($ficha, $fase, $producto, $resutado, $ambiente, $instructor, $f_prestamo, $f_devolucion, $h_ingreso, $h_salida, $lunes, $martes, $miercoles, $jueves, $viernes, $sabado, $domingo, $competencia,$id)
    {
        $conexion = Conex::conectar();
        include("Csesiones.php");
        Csesiones::iniciar_sesion();
        $a = $_SESSION['usuario'];
        $sql = "call disponibilidad2('$f_prestamo','$f_devolucion','$h_ingreso', '$h_salida','$ambiente', '$lunes','$martes','$miercoles','$jueves','$viernes','$sabado','$domingo','$id')";
        //echo $sql;
       $conexion->query($sql);

        if ($conexion->affected_rows > 0) {
            echo '<script language="javascript">alert("ya esta programado");window.location.href="c-historial.php";</script>';
        } else {

$id_resultado =($id_resutado=="")? "null":"'$resutado'";
            $conexion = Conex::conectar();
            //$p = explode (" ",$ambiente);
            $sql = "UPDATE `prestamo_ambientes` SET 
                    `id_ambiente` = '$ambiente',
                    `fecha_inicio`='$f_prestamo',
                    `fecha_fin`='$f_devolucion',
                    `hora_inicio`='$h_ingreso',
                    `hora_fin`='$h_salida',
                    `ficha`='$ficha',
                    `documento`='$instructor',
                    `lunes`='$lunes',
                    `martes`='$martes',
                    `miercoles`='$miercoles',
                    `jueves`='$jueves',
                    `viernes`='$viernes',
                    `sabado`='$sabado',
                    `domingo`='$domingo',
                    `id_competencia`='$competencia',
                    `id_producto`='$producto',
                    `id_resultado`=$id_resultado,
                    `id_fase`='$fase'
                    WHERE `id_prestamo` = '$id';";
            $conexion->query($sql);
           


            if ($conexion->affected_rows > 0) {
                echo '<script language="javascript">alert("Tus datos se guardaron");window.location.href="c-historial.php";</script>';
            } else {

                echo '<script language="javascript">alert("Tus datos no se guardaron");window.location.href="c-historial.php";</script>';
            }
        }
    }
}
