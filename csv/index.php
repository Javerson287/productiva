<?php

if (isset($_POST["enviar"])) {//nos permite recepcionar una variable que si exista y que no sea null
	require_once("conexion.php");
	require_once("functions.php");

	$archivo = $_FILES["archivo"]["name"];
	$archivo_copiado= $_FILES["archivo"]["tmp_name"];
	$archivo_guardado = "copia_".$archivo;

	//echo $archivo."esta en la ruta temporal: " .$archivo_copiado;

	if (copy($archivo_copiado ,$archivo_guardado )) {
		echo "se copeo correctamente el archivo temporal a nuestra carpeta de trabajo <br/>";
	}else{
		echo "hubo un error <br/>";
	}
    
    if (file_exists($archivo_guardado)) {
    	 
    	 $fp = fopen($archivo_guardado,"r");//abrir un archivo
         $rows = 0;
         while ($datos = fgetcsv($fp , 1000 , ";")) {
         	    $rows ++;
         	   $datos[0] ." ".$datos[1] ." ".$datos[2]." ".$datos[3] ." ".$datos[4] ." ".$datos[5]." ".$datos[6]." ".$datos[7] ." ".$datos[8]." ".$datos[9]." ".$datos[10] ." ".$datos[11]." ".$datos[12]." ".$datos[13] ." ".$datos[14]." ".$datos[15]." ".$datos[16] ." ".$datos[17]." ".$datos[18]." ".$datos[19] ." ".$datos[20]." ".$datos[21]." ".$datos[22] ." ".$datos[23]."<br/>";
			
					
			
				if($rows > 1) {
					$til = utf8_encode($datos[0]); 
					$til1 = utf8_encode($datos[2]); 
					$til2 = utf8_encode($datos[3]); 
					$til3 = utf8_encode($datos[4]); 
					$til4 = utf8_encode($datos[11]); 
					$til5 = utf8_encode($datos[12]); 
					$til6 = utf8_encode($datos[13]); 
					 
				    $f = str_replace('/','-', $datos[9]);
					$DateTime = DateTime::createFromFormat('d-m-Y', $f);
					$fecha = $DateTime->format('Y-m-d');
					$fecha2 = str_replace('-','/', $fecha);
					echo $fecha2 .'<br>';
					
					$fe = str_replace('/','-', $datos[10]);
					$Date = DateTime::createFromFormat('d-m-Y', $fe);
					$for = $Date->format('Y-m-d');
					$fecha3 = str_replace('-','/', $for);
					echo $fecha3;

         		$resultado = insertar_datos($til,$datos[1],$til1,$til2,$til3,$datos[5],$datos[6],$datos[7],$datos[8],$fecha2,$fecha3,$til4,$til5,$til6,$datos[14],$datos[15],$datos[16],$datos[17],$datos[18],$datos[19],$datos[20],$datos[21],$datos[22],$datos[23]);
         	if($resultado){
				
         		echo "se inserto los datos correctamnete<br/>";
				 
         	}else{
				
         		echo "no se inserto <br/>";
         	}
         	}
         }



    }else{
    	echo "no existe el archivo copiado <br/>";
    }

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Dubir archivo a la BD mysql</title>
</head>
<body>
	 
	 <div class="formulario">
	 	<form action="index.php" class="formulariocompleto" method="post" enctype="multipart/form-data">
	 		 <input type="file" name="archivo" class="form-control"/>
	 		<input type="submit" value="SUBIR ARCHIVO" class="form-control" name="enviar">
	 	</form>
	 </div>
</body>
</html>
