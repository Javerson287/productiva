<?php
include ('conexion.php');

class insertar_programas extends Conex
{

    static function insertar ($ficha, $programa,$cp, $nivel, $t_formacion)
        {
           
            $conexion = Conex::conectar();
            $sql= "INSERT INTO `programas` (`ficha`, `n_programa`, `cantidad_aprendizes`, `id_nivel`,`borrar`,`id_formacion`) VALUES ('$ficha', ' $programa',$cp, ' $nivel', '1','$t_formacion');";
            $resultado = $conexion->query($sql);
       
        
            if ($conexion ->affected_rows > 0)
            {
                
                
                echo '<script language="javascript">alert("Tus datos se guardaron");window.location.href="../vistas/programas.php";</script>';
            }
            else
            {
                
                
                echo '<script language="javascript">alert("Tus datos no se guardaron");window.location.href="../vistas/programas.php";</script>';
                
                
                
            }
        }
}