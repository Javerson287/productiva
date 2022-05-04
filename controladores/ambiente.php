<?php 
 include '../class/conexion.php';

 $conexion=Conex::conectar();

 $piso =$_GET['ambiente'];




	$sql="SELECT id_ambiente,
			 n_ambiente 
		from ambiente 
		where id_piso='$piso'";
    

	$result=mysqli_query($conexion,$sql);

	$cadena="
			<select id='ambiente' name='ambiente'>";

			while($fila = mysqli_fetch_array($result) )
			{
				$ambiente1 = $fila[ 'id_ambiente'].' ';

				$ambiente = $fila[ 'n_ambiente'];
				
			   
				 $cadena .= "<option value =' $ambiente1'> $ambiente </option>";
				
			}

	echo  $cadena."</select>";

	
	//var_dump($cadena);
	
	

?>

<script src="../js/buscador_lista.js"></script>
