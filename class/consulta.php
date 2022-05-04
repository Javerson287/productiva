<?php
include('conexion.php');

class consulta extends Conex
{
    static function consultar_tabla ($tabla, $campo = null, $dato = null)
    {
    $conexion=self::conectar();
    $sql = "select * " ;
    $sql .= "from $tabla ";

    //aqui se deside si se traen todos los datos o uno especifico de la tabla 
    if ( $campo != null && $dato != null)
    {
        $sql .= "where $campo = '$dato' " ;
    }
   echo $sql;

    $resultado = $conexion->query('select * from programas');
    $conexion->close();
    return $resultado;
    

    }

    static function  imprime_tabla ($resultado)
    {
        $a = "<table border = '1 px'> ";
    
        while ($fila = mysqli_fetch_array($resultado))
        {
        for ( $i= 0; $i < mysqli_num_fields ($resultado) ; $i++)
        {
            
            $a .= "<td>". $fila [$i].'<br>'."</td>";

        }
        
        }
        $a .= "</table>";
        return $a;

    }

    static function autenticacion( $usuario, $clave )
        {              
            $conexion=self::conectar();
        
            //Esta clase es del modelo.
            $sql  = " SELECT id ";
            $sql .= " FROM usuario ";
            $sql .= " WHERE correo = '$usuario' ";
            $sql .= " AND clave = '$clave' ";
            //echo $sql;
            $resultado = $conexion->query( $sql );

            return $resultado;
        }

        static function administrador( $usuario  )
        {              
            $conexion=self::conectar();
        
            //Esta clase es del modelo.
            $sql  = " SELECT id ";
            $sql .= " FROM usuario ";
            $sql .= " WHERE correo = '$usuario' ";
            //echo $sql;
            $resultado = $conexion->query( $sql );

            return $resultado;
        }

}


