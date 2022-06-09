<?php 
 include '../class/conexion.php';

 $conexion=Conex::conectar();

 $comp =$_GET['programa'];
 

	$sql="SELECT 
			 *
		from prog_comp INNER JOIN competencicas on prog_comp.id_competencia = competencicas.id_competencia
		where prog_comp.ficha='$comp'";
       	
	$result=mysqli_query($conexion,$sql);

	$cadena ="<table style = 'border = 1px soild; '>
	
	";
			
			while($fila = mysqli_fetch_array($result) )
			{
			
				$competencia2 = $fila[ 'id_competencia'].' ';

				$competencia = $fila[ 'competencia'];
				

				

			
				
				 $cadena .= "<tr><td>$competencia</td><td><button onclick ='eli($comp,$competencia2)'>-</button></td></tr>";
				
			}
		
			
	echo  $cadena."</table>";
	//var_dump($cadena);
	
	

?>
