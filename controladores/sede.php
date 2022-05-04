<?php 
 include '../class/conexion.php';

 $conexion=Conex::conectar();

 $sede =$_GET['continente'];
 


	$sql="SELECT id_bloque,
			 n_bloque 
		from bloque 
		where id_sede='$sede'";
       

	$result=mysqli_query($conexion,$sql);

	$cadena="
			<select id='bloque' name='bloque' name='bloque'>";

			while($fila = mysqli_fetch_array($result) )
			{
				$bloque1 = $fila[ 'id_bloque'].' ';

				$bloque = $fila[ 'n_bloque'];
				
			   
				 $cadena .= "<option value =' $bloque1'> $bloque </option>";
				
			}

	echo  $cadena."</select>";
	//var_dump($cadena);
	
	

?>
<script src="../js/lista2.js"></script>
<script src="../js/buscador_lista.js"></script>