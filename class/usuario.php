<?php
/** esta fucion permite ingresar ambientes a la base de datos 
 * param       numero           fecha                fecha en la que se regitra el usuario
 * param       texto            correo                el correo del ususuario
 * param       texto            nombre_usuario        es como se va ayamar el usuario
 * param       texto            clave                 clave que ingresa el usuario
*/
include_once('conexion.php');
class usuario extends conex
{
    static function consultar_usuario (  $correo, $usuario, $clave )
    {
        $conexion=self::conectar();
        
        $sql= " insert into usuario ( fecha, clave, correo, nombre_usuario) values ( now(),'$clave', '$correo','$usuario')";
        $resultado = $conexion->query($sql);
        if ($conexion ->affected_rows > 0)
            {
                
                echo '<script language="javascript">alert("Tus datos se guardaron");window.location.href="../controladores/c-iniciar_seccion.php";</script>';
                
            }
            else
            {
                
                
                
                echo '<script language="javascript">alert("el correo ya esta registrado intente con otro");window.location.href="./c-registrarse.php";</script>';
            }
        
    }
}

