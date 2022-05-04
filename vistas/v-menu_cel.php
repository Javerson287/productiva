<html>

<head>


<title></title>



</head>

<body>

        <div class="header">
		<ul class="nav">
			<li><a href="../controladores/c-iniciar_seccion.php">Iniciar sesion</a></li>
			<li><a href="../controladores/c-menu_cel.php">Realizar otra Busqueda</a></li>
		</ul>
	</div> 
       <br>
	<form action="../controladores/c-menu_cel.php" method="POST">
             
                  <div class="field" id="buscar">
                        <input type="text" id="buscar" name= "buscar" placeholder="Buscar Registro"/>
                  </div>
            
      </form> 
      <div class="container">
            <div>
                  
                   <table class="table" >

                        <thead><br>
                              
                              <th>Bloque</th>
                              <th>Piso</th>
                             
                              <th>ambiente</th>
                              <th>Fecha</th>
                              <th>Horario</th>
                              <th>Ficha</th>
                              <th>Programa</th>
                              <th>Lunes</th>
                              <th>Martes</th>
                              <th>Miercoles</th>
                              <th>Jueves</th>
                              <th>Viernes</th>
                              <th>Sabado</th>
                              <th>Domingo</th>
                              <th>Cant Aprendices</th>
                            
                        </thead>
                        <tbody>
                        <?php

                              include "v-busqueda.php";
                              while($row= mysqli_fetch_array($sql_query)){?>
                              <tr>
                              <td data-label="Bloque"><?=$row['n_bloque'] ?></td>
                              <td data-label="Piso"><?=$row['n_piso'] ?></td>
                              
                              <td data-label="ambiente"><?=$row['n_ambiente']?></td>
                              <td data-label="Fecha:"><?=$row['fecha_inicio'].' / '.$row['fecha_fin']?></td>
                              <td data-label="Horario:"><?=$row['hora_inicio'].' / '.$row['hora_fin']?></td>
                              <td data-label="Ficha:"><?=$row['ficha']?></td>
                              <td data-label="Programa"><?=$row['n_programa']?></td>
                              <td data-label="Lunes:"><?=''; if($row['lunes'] == 1)
                              {

                                    echo 'X';

                              }else{

                                    echo '';
                              }
                              ?></td>                   
                              <td data-label="Martes:"><?=''; if($row['martes'] == 1)
                              {

                                    echo 'X';

                              }else{

                                    echo '';
                              }
                              ?></td>               
                              <td data-label="Miercoles:"><?=''; if($row['miercoles'] == 1)
                              {

                                    echo 'X';

                              }else{

                                    echo '';
                              }
                              ?></td>               
                              <td data-label="Jueves:"><?=''; if($row['jueves'] == 1)
                              {

                                    echo 'X';

                              }else{

                                    echo '';
                              }
                              ?></td>               
                              <td data-label="Viernes:"><?=''; if($row['viernes'] == 1)
                              {

                                    echo 'X';

                              }else{

                                    echo '';
                              }
                              ?></td>               
                              <td data-label="Sabado:"><?=''; if($row['sabado'] == 1)
                              {

                                    echo 'X';

                              }else{

                                    echo '';
                              }
                              ?></td>               
                              <td data-label="Domingo:"><?=''; if($row['domingo'] == 1)
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
                  
                           
            </div> 
      </div> 


</body>
</html>