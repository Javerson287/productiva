<html>

<head>


<title></title>



</head>

<body>

        <div class="header">
		<ul class="nav">
			<li><a href="../index.php">Volver</a></li>
			
		</ul>
	</div> 
       <br>
	<form action="../controladores/c-historial.php" method="POST">
             
                  <div class="field" id="buscar">
                        <input type="text" id="buscar" name= "buscar" placeholder="Buscar Registro"/>
                  </div>
            
      </form> 
       <div class="container">
            <div>
                  
                   <table class="table" >

                        <thead><br>




                              <th>TIPO DE FORMACION</th>
                              <th>Programa</th>
                              <th>FASE DEL PROYECTO</th>
                              <th>PRODUCTO DE LA FASE</th>
                              <th>ID COMPETENCIA</th>
                              <th>ID RAP</th>
                              <th>Sede</th>
                              <th>Bloque</th>
                              <th>Piso</th>

                             
                             
                              <th>ambiente</th>
                              <th>Fecha</th>
                              <th>Horario</th>
                              <th>Ficha</th>
                              <th>Instructor</th>
                            
                              
                              <th>Lun</th>
                              <th>Mar</th>
                              <th>Mie</th>
                              <th>Jue</th>
                              <th>Vie</th>
                              <th>Sab</th>
                              <th>Dom</th>
                              
                              <th>Cant Aprendices</th>
                            
                        </thead>
                        <tbody>
                        <?php

                              include "v-busqueda.php";
                              while($row= mysqli_fetch_array($sql_query)){?>
                              <tr>
                              <td data-label="TIPO DE FORMACION"><?=$row['t_formacion'] ?></td>
                              <td data-label="Programa"><?=$row['n_programa']?></td>
                              <td data-label="FASE DEL PROYECTO"><?=$row['id_fase'] ?></td>
                              <td data-label="PRODUCTO DE LA FASE"><?=$row['id_producto'] ?></td>
                              <td data-label="ID COMPETENCIA"><?=$row['id_competencia'] ?></td>
                              <td data-label="ID RAP"><?=$row['id_resultado'] ?></td>
                              <td data-label="Cede"><?=$row['n_sede'] ?></td>
                              <td data-label="Bloque"><?=$row['n_bloque'] ?></td>
                              <td data-label="Piso"><?=$row['n_piso'] ?></td>
                           
                            
                              <td data-label="ambiente"><?=$row['n_ambiente']?></td>
                              <td data-label="Fecha:"><?=$row['fecha_inicio'].' / '.$row['fecha_fin']?></td>
                              <td data-label="Horario:"><?=$row['hora_inicio'].' / '.$row['hora_fin']?></td>
                              <td data-label="Ficha:"><?=$row['ficha']?></td>
                              <td data-label="Instructor:"><?=$row['n_instructor']?></td>
                            
                              <td data-label="Lun:"><?=''; if($row['lunes'] == 1)
                              {

                                    echo 'X';

                              }else{

                                    echo '';
                              }
                              ?></td>                   
                              <td data-label="Mar:"><?=''; if($row['martes'] == 1)
                              {

                                  echo 'X';

                              }else{

                                    echo '';
                              }
                              ?></td>               
                              <td data-label="Mie:"><?=''; if($row['miercoles'] == 1)
                              {

                                    echo 'X';
                              }else{

                                    echo '';
                              }
                              ?></td>               
                              <td data-label="Jue:"><?=''; if($row['jueves'] == 1)
                              {

                                    echo 'X';

                              }else{

                                    echo '';
                              }
                              ?></td>               
                              <td data-label="Vie:"><?=''; if($row['viernes'] == 1)
                              {

                                  echo 'X';

                              }else{

                                    echo '';
                              }
                              ?></td>               
                              <td data-label="Sab:"><?=''; if($row['sabado'] == 1)
                              {

                                    echo 'X';

                              }else{

                                    echo '';
                              }
                              ?></td>               
                              <td data-label="Dom:"><?=''; if($row['domingo'] == 1)
                              {

                                   echo 'X';

                              }else{

                                    echo '';
                              }
                              ?></td>               
                              
                              <td data-label="Cant Aprendices:"><?=$row['cantidad_aprendizes']?></td>
                              
                              </tr>
                              <?php }?>
                        </tbody>
                  </table>
                  <a href="../reporte.php"><button onClick>GENERAR EXCEL</button></a>
                           
            </div> 
      </div> 


</body>
</html>

