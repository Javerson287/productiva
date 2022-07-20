<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600|Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <link rel="stylesheet" type="text/css" href="../css/edi_sede.css">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Oswald" rel="stylesheet">
</head>

<body>
    <?php
    $id = $_GET['id'];
    include("../class/function.php");
    include('form_insert.php');

    ?>
     <button id="volver"> <a href="../vistas/editar_sede.php">Volver</a></button>
    
    <div class="sede">
        <div>
            <?php
            $sede = select_id('sede', 'id_sede', $id);
            $row = mysqli_fetch_array($sede);
            echo $n1= $row['n_sede'];
            $pp1=" imprimir4('".$n1."')";
            ?>
        </div>

        <?php echo '<button onclick="'.$pp1.'">editar</button>';?>

        <button id="btn-abrir-popup" class="btn-abrir-popup">agregar bloque</button>
        

    </div>
    <!-- aui se realiza el formulario para ingresar nuevos bloques a la sede -->


    <!-- se traen los respetibo bloques con sus pisos y salones -->

    <div class="centra">
        <?php
        $bloque = select_id('bloque', 'id_sede', $id, '0');
        
        while ($row = mysqli_fetch_array($bloque)) {
        ?>
            <div class="sentra">
                <div class="bloque">
                    <?php
                   
                    echo $row['n_bloque'];
                    $id_bloque= $row['id_bloque'] ;
                    echo '<button><a  href="../controladores/eliminar.php?id=' . $row['id_bloque'] . '&tabla=bloque&sede=' . $id . '" class="eliminar">eliminar</a></button>
                    ';
                    ?>

                </div>
               
                <!-- el siguiente es el espacio para los pisos-->
                <div class="cortar">


                    <?php
                    $piso = select_id('piso', 'id_bloque', $row['id_bloque']);

                    while ($row = mysqli_fetch_array($piso)) { ?>
                        <div class="na">


                            <div class="piso">
                                <?php
                                echo $row['n_piso'];
                                $id_piso= $row['id_piso'] ;
                                echo '<button  class="eliminar"><a href="../controladores/eliminar.php?id=' . $row['id_piso'] . '&tabla=piso&bloque=' . $row['id_bloque'] . '&sede=' . $id . '" class="eliminar">eliminar</a></button>';
                                ?>

                            </div>
                            <!-- el siguiente es el espacio para los ambientes -->
                            <?php
                            $ambiente = select_id('ambiente', 'id_piso', $row['id_piso']);
                            while ($row = mysqli_fetch_array($ambiente)) { ?>

                                <div class="ambiente">
                                    <?php
                                    echo $n=$row['n_ambiente'];
                                    $id_a =$row['id_ambiente'];
                                   $pp=" imprimir3('".$id_a."','".$n."')";
                                   
                                   
                                    ?>
                                    <div class="eli">

                                    
                                        <?php
                                         
                                        echo '<button onclick="'.$pp.'">editar</button>';
                                        echo '<button class="eliminar"><a href="../controladores/eliminar.php?id=' . $row['id_ambiente'] . '&tabla=ambiente&piso=' . $row['id_piso'] . '&sede=' . $id . '" class="eliminar">eliminar</a></button>';
                                        ?>
                                    </div>
                                </div><?php } 
                            
                                 echo '<button onclick="imprimir2('.$id_piso.')"> agregar ambiente</button>';?>
                                
                                
                        </div>
                    <?php }
                    
                    echo '<button onclick="imprimir('.$id_bloque.')"> agregar piso</button>';?>
                   
                </div> 
            </div>
                                
        <?php }
        ?>


    </div>
    <!-- este es el espacio del formulario de insertar bloques -->
    <div class="overlay" id="overlay">
        <?php 
        insert_bloque($id); ?>
    </div>
    
    <div  class="overlay2" id="overlay2">
        <?php insert_piso($id) ?>

    </div>
    <div  class="overlay3" id="overlay3">
        <?php insert_ambiente($id) ?>

    </div>
    <div  class="overlay4" id="overlay4">
        <?php edid($id) ?>

    </div>
    <div  class="overlay5" id="overlay5">
        <?php edid2($id) ?>

    </div>
    <!-- fin del formulario -->
    <script src="../js/popup.js"></script>
    <script src="../js/popup2.js"></script>
    <script src="../js/comando.js"></script>


</body>

</html>