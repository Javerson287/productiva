
<!DOCTYPE html>
<html>
<head>
<title>
</title>
<link rel="stylesheet" type="text/css" href="../css/select2.css">
<script src="../js/jquery-3.1.1.min.js"></script>
<script src="../js/select2.full.min.js"></script>
</head>
<body>

                               <select id="buscador" name="programas">
                                        <?php
                                                //se realiza la conexion con la base de datos
                                                include('../class/conexion.php');
                                                $conexion = Conex::conectar();
                                                $sql = "select * from programas";
                                                //echo $sql;
                                                $resultado= $conexion->query($sql);
                                                //se crea l alista de los ambientes
                                                while($fila = mysqli_fetch_array($resultado) )
                                                {
                                                    $fase2 = $fila[ 'n_programa'].' ';

                                                   
                                                    $fase = $fila[ 'ficha'];


                                    
                                                    
                                                   
                                                    echo "<option value ='$fase'> $fase2 </option>";
                                                }
                                                
                                            ?>
                                       </select> </td>

                                      <div id="competencia"> </div>


                                      


                                       
<script src="../js/lista_pro.js"></script> 
<!-- <script src="../js/listaP.js"></script>  -->
<script src="../js/buscador_lista.js"></script>

</body>
</html>