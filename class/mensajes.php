<?php
class mensajes
{
    static function m_amb($resultado)
    {
        if ($resultado ->affected_rows > 0)
        {
            echo '<script language="javascript">alert("Tus datos se guardaron");window.location.href="../vistas/agregar_ambiente.php";</script>';
        }
        else
        {
            echo '<script language="javascript">alert("Tus datos no se guardaron");window.location.href="../vistas/agregar_ambiente.php"</script>';
        }
        
    }
}
