<div style="font-family: Consolas;">
<?php
    include("plantilla.php");
    $ser = $_GET['servidor'];
    $usu = $_GET['usuario'];
    $pww = $_GET['contraseña'];
    $bdd = $_GET['base-de-datos'];


    $conexion = @mysqli_connect($ser, $usu,$pww, $bdd);

    if (!$conexion){
        echo ('Verifique la conexion');
    }else{
        echo "Conexión correcta<br><hr>";

        $errores = array();


        $documentText = file_get_contents('database_tipkey.sql');
        $documentText = rtrim($documentText,"\n");
        $documentText = str_replace("//", "", $documentText);
        $documentText = str_replace("DELIMITER ;", "DELIMITER", $documentText);


        $scrips = explode('DELIMITER', trim($documentText));

        $tablas = explode(";", array_shift($scrips));

        $scrips = array_merge($tablas, $scrips);

        foreach($scrips as $sql){
            if ( strlen( trim( $sql ) ) > 0){
                $r = $conexion->query($sql);

                if ($r == false){
                    $arrores[] = $conexion->error;
                }
            }   
        }


        if (count($errores) == 0){
            echo '<a href="../index.php">iniciar</a>';
            
            

            $archivoConexion = fopen('../class/conexion.php', 'w');

            $lines[] = "<?php\n";
            $lines[] = "\n class Conex\n";
            $lines[] = "\n {\n";
            $lines[] = "\t static function conectar()";
            $lines[] = "\n { \n";
            $lines[] = "\t return mysqli_connect('$ser', '$usu', '$pww', '$bdd');";
            $lines[] = "\n } \n";
            $lines[] = "\n } \n"; 
            $lines[] = "\n?>";
            
            foreach($lines as $linea){
                fputs($archivoConexion, $linea);
            }

            $nuevoArchivo = fopen("../config/stl.text", "a");
            fputs($nuevoArchivo, "Archivo instaldo");
            
            
        }
        
    }
?>
</div>