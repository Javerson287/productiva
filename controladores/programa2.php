<?php 
 include '../class/conexion.php';

 $conexion=Conex::conectar();

 $comp =$_GET['programa'];
 

	$sql="SELECT  *
	FROM competencicas
   WHERE NOT EXISTS (SELECT id_competencia
		  from prog_comp 
		  where ficha = $comp AND competencicas.id_competencia = prog_comp.id_competencia)";
       	
	$result=mysqli_query($conexion,$sql);

	$cadena ="<table style = 'border = 1px soild; '>
	
	";
			
			while($fila = mysqli_fetch_array($result) )
			{
			
				$competencia2 = $fila[ 'id_competencia'].' ';

				$competencia = $fila[ 'competencia'];
				

				

			
				
				 $cadena .= "<tr><td data-label='loco'>$competencia</td></tr>";
				
			}
		
			
	echo  $cadena."</table>";
	//var_dump($cadena);
	
	

?>
