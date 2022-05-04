<?php 
 include '../class/conexion.php';

 $conexion=Conex::conectar();

 $instructor =$_GET['programas'];
 

	$sql="SELECT 
			 ficha 
		from prog_inst 
		where documento='$instructor'";
       

	$result=mysqli_query($conexion,$sql);

	$cadena="
			<select id='mibuscador' name='ficha' size='5'>";

			while($fila = mysqli_fetch_array($result) )
			{
				$ficha = $fila[ 'ficha'].' ';

			
				
			   
				 $cadena .= "<option value =' $ficha'> $ficha </option>";
				
			}

	echo  $cadena."</select>";
	//var_dump($cadena);
	
	

?>
<script src="../js/buscador_lista.js"></script>
