<?php 
 include '../class/conexion.php';

 $conexion=Conex::conectar();

 $bloque =$_GET['bloque'];
 //echo $bloque;



	$sql="SELECT id_piso,
			 n_piso 
		from piso 
		where id_bloque='$bloque'";

	
       

	$result=mysqli_query($conexion,$sql);

	$cadena="
			<select id='lista2' name='piso' >";

			while($fila = mysqli_fetch_array($result) )
			{
				$piso1 = $fila[ 'id_piso'].' ';

				$piso = $fila[ 'n_piso'];
				
			   
				 $cadena .= "<option value =' $piso1'> $piso </option>";
				
			}

	echo  $cadena."</select>";
	

?>

<script src="../js/lista3.js"></script>
<script src="../js/buscador_lista.js"></script>