<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600|Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <title>instructor</title>
    <link rel="stylesheet" href="../css/instructor.css">
 
   
</head>

<body>
    <?php

    
    ?>
    <form action="../controladores/r_instructor.php" method="POST" id="form">

        <fieldset>
            <div class="titulo">Ingresar Instructor</div>
            <input type="number" name="CC" id="impe" placeholder="Numero de Identificacion" required>
            <input type="text" name="nombre" id="impe" placeholder="Nombres y Apellidos" required />
           
            <?php
            include("../class/conexion.php");
            $mysqli = Conex::conectar();
            ?>

            <select name='profecion' class="form-control" required>
                <option value="">PROFECIÓN</option>
                <?php
                //Vincular con la tabla y extraer datos
                $query = $mysqli->query("SELECT * FROM profesiones");
                while ($valores = mysqli_fetch_array($query)) {
                    echo '<option value="' . $valores['id_profesiones'] . '">' . $valores['n_profesiones'] . '</option>';
                }
                ?>
                <!--fin select-->
            </select>

            <input type="submit" class="next action-button" name="Enviar" value="Enviar">



        </fieldset>
    </form>

    <div class="editar">
        <div class="titulo2"> instructores registrados</div>

        <table class="table">
            <thead>
                <th>No Documento</th>
                <th>Nombre y Apellidos</th>
                <th>profeción</th>
                <th>Opcion</th>
            </thead>
            <tbody>
                <?php
                $sql = "select * from instructores";

                $result = mysqli_query($mysqli, $sql);
                while ($row = mysqli_fetch_object($result)) {
                  $sql = "select n_profesiones from profesiones where id_profesiones ='$row->id_profesiones'";
                          $row1 = mysqli_fetch_object(  mysqli_query($mysqli, $sql));
                         
                     ?>
                    <tr>
                        <?php

                        $documento = $row->documento; ?>


                        <td data-label="No documento:"><?php echo $documento; ?></td>
                        <td data-label="Nombre y Apellidos:"><?php echo $row->n_instructor; ?></td>
                     



                        <td data-label="Nombre y Apellidos:"><?php echo $row1->n_profesiones; ?></td>
                        <?php $pp1="imprimir6('".$row->n_instructor."', '".$documento."' , '".$row->id_profesiones."')"; ?>
                        <td data-label="Opcion"> <?php echo '<button onclick="'.$pp1.'">actualizar</button>';?></td>



                    </tr>

                <?php } ?>
        </table>
    </div>

    <div  class="overlay5" id="overlay5">
        <?php
        include('../controladores/edi_instructor.php');
          ?>

    </div>
    <script src="../js/popup3.js"></script>
</body>

</html>