<?php

if (isset($_POST["enviar"])) {//nos permite recepcionar una variable que si exista y que no sea null
	require_once("conexion.php");
	require_once("f_progra.php");

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

         	   $datos[0] ." ".$datos[1] ." ".$datos[2]."<br/>";
			
				if($rows > 1) {

					$name = html_entity_decode($datos[2], ENT_QUOTES | ENT_HTML401, "UTF-8");
					
         		$resultado = insertar_datos( $datos[0],$datos[1],$name);

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
<html lang="es">

<head>
    
   
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600|Open+Sans" rel="stylesheet">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <script src="../js/jquery-3.1.1.min.js"></script>
    <title>programas</title>
    <link rel="stylesheet" href="../css/instructor.css">
 <title>programas</title>
   
</head>

<body>
<button id="volver"><a href="../index.php">volver</a></button>
    <?php

    
    ?>
    <form action="../controladores/r_programas.php" method="POST" id="form">

        <fieldset>
            <div class="titulo">Ingresar Programa</div>
       
            <input type="number" name="ficha" id="impe" placeholder="ficha" required>
            <input type="text" name="programa" id="impe" placeholder="Nombres del programa" required />
            <input type="number" name="cp" id="impe" placeholder="cantidad de aprendises" required>
            <?php
            header('Content-Type: text/html; charset=UTF-8');
            include("../class/conexion.php");
            $mysqli = Conex::conectar();
            ?>

            <select name='nivel' class="form-control" required>
                <option value="">nivel del programa</option>
                <?php
                //Vincular con la tabla y extraer datos
                  
                $query = $mysqli->query("SELECT * FROM nivel");
                while ($valores = mysqli_fetch_array($query)) {
                    echo '<option value="' . $valores['id_nivel'] . '">' . $valores['n_nivel'] . '</option>';
                }
                ?>
                <!--fin select-->
            </select>
            <!--lista de los tipos de formacion-->
            <select name='id_formacion' class="form-control" required>
                <option value="">tipo de formacion</option>
                <?php
                //Vincular con la tabla y extraer datos
                $query = $mysqli->query("SELECT * FROM tipo_formacion");
                while ($valores = mysqli_fetch_array($query)) {
                    echo '<option value="' . $valores['id_formacion'] . '">' . $valores['t_formacion'] . '</option>';
                }
                ?>
                <!--fin select-->
            </select>

            <input type="submit" class="next action-button" name="Enviar" value="Enviar">



        </fieldset>
    </form>
    <input type="button" hidden id="n_pagi"value="programas">
    <div class="editar">
        <div class="titulo2"> programas registrados</div>

        <table class="table" id="progra">
            <thead>
                <th>ficha</th>
                <th>nombre del programa</th>
                <th>cant aprendices</th>
                <th>nivel del programa</th>
                <th>tipo de formacion</th>
                <th>Opcion</th>
            </thead>
            <tbody>
                <?php
                $sql = "select * from programas";

                $result = mysqli_query($mysqli, $sql);
                while ($row = mysqli_fetch_object($result)) {
                  $sql = "select n_nivel from nivel where id_nivel ='$row->id_nivel'";
                          $row1 = mysqli_fetch_object(  mysqli_query($mysqli, $sql));
                         
                     ?>
                        <td data-label="ficha:"><?php echo $row->ficha; ?></td>
                        <td data-label="Nombre del programa:"><?php echo $row->n_programa; ?></td>
                        <td data-label="cant aprendices:"><?php echo $row->cantidad_aprendizes; ?></td>
                        <td data-label="nivel:" id="nivel"><?php 
                        
                        if(isset($row1->n_nivel)){

                            echo $row1->n_nivel;

                        }


                        ?></td>

<?php
                        $sql1 = "select *  from tipo_formacion  where id_formacion ='$row->id_formacion'";
                          $row2 = mysqli_fetch_object(  mysqli_query($mysqli, $sql1));

                          ?>
                        <td data-label="formacion:"><?php 

                         if(isset($row2->t_formacion)){

                            echo $row2->t_formacion; 

                        }
                        
                         ?></td>
                        <td data-label="formacion:"><?php echo $row2->t_formacion; ?></td>
                        <?php $pp1="imprimir6('".$row->ficha."','".$row->n_programa."', '".$row->id_formacion."','".$row->cantidad_aprendizes."', '".$row->id_nivel."')"; ?>
                        <td data-label="Opcion"> <?php echo '<button onclick="'.$pp1.'">actualizar</button>';?></td>



                    </tr>

                <?php } ?>
        </table>
        <div id="paginador"></div>
    </div>

    <div  class="overlay_pro" id="overlay_pro">
        <?php
        include('../controladores/edi_programas.php');
          ?>

    </div>
    <script src="../js/popup4.js"></script>
    <script src="../js/paginador.js"></script>
</body>

</html>