<?php
include ('conexion.php');

class prestamos extends Conex
{
    static function ingresar_prestamo($ficha,$fase,$producto,$resutado,$ambiente,$instructor,$f_prestamo,$f_devolucion,$h_ingreso, $h_salida,$lunes,$martes,$miercoles,$jueves,$viernes,$sabado,$domingo,$competencia)
    {
        $conexion = Conex::conectar();
        include("Csesiones.php");
        Csesiones::iniciar_sesion();
        $a=$_SESSION['usuario'] ;
       // echo $a;
        // $p = explode (" ",$ambiente);
        // $i = explode (" ",$No_documento);
    $sql = "call disponibilidad2('$f_prestamo','$f_devolucion','$h_ingreso', '$h_salida','$ambiente', '$lunes','$martes','$miercoles','$jueves','$viernes','$sabado','$domingo')";
        //echo $sql;
        $resultado = $conexion->query($sql);
        
        if ($conexion ->affected_rows > 0)
        {
            echo '<script language="javascript">alert("ya esta prestado");window.location.href="c-prestamo.php";</script>';
        }else{
            
        $resultado=($resutado=="")? "null":"'$resutado'";
            $conexion = Conex::conectar();
           //$p = explode (" ",$ambiente);
            $sql = "insert into prestamo_ambientes(id_ambiente, fecha_inicio,fecha_fin,hora_inicio, hora_fin,ficha,documento,lunes,martes,miercoles,jueves,viernes,sabado,domingo,id_competencia,id_producto,id_resultado,id_fase)";
            $sql .= "values('$ambiente','$f_prestamo','$f_devolucion','$h_ingreso', '$h_salida','$ficha','$instructor','$lunes','$martes','$miercoles','$jueves','$viernes','$sabado','$domingo','$competencia','$producto',$resultado,'$fase')";
            $resultado = $conexion->query($sql);
        
            if ($conexion ->affected_rows > 0)
            {
                echo '<script language="javascript">alert("Tus datos se guardaron");window.location.href="c-prestamo.php";</script>';
            }else
            {
                
                echo '<script language="javascript">alert("Tus datos no se guardaron");window.location.href="c-prestamo.php";</script>';
            }
        }
    }
}