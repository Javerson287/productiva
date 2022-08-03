
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

	$cadena = "";
			
			while($fila = mysqli_fetch_array($result) )
			{
				$competencia2 = $fila[ 'id_competencia'].' ';
				$competencia = $fila[ 'competencia'];
				 $cadena .= "<tr><td id='tex'>$competencia</td><td><button onclick ='ins($comp,$competencia2)'>+</button></td></tr>";
			}
		
			
			echo  $cadena;
	//var_dump($cadena);
	

	
	// $sql2="INSERT INTO prog_comp (id_competencia, ficha) VALUES ($comp, $competencia2);";
// echo mysqli_query($conexion,$sql2);


?>
