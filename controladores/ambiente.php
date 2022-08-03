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

				if (isset($_GET['id'])) {
					if ($ambiente1 == $_GET['id']) {
			
						$cadena .= "<option value ='  $ambiente1' selected='selected'> $ambiente </option>";
					}else {
						$cadena .= "<option value =' $ambiente1'> $ambiente </option>";
					}
				} else {
					$cadena .= "<option value =' $ambiente1'> $ambiente </option>";
				}
				 
				
			}

	echo  $cadena."</select>";

	
	//var_dump($cadena);
	
	

?>


