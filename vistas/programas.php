<!DOCTYPE html>
<html lang="en">

<head>
    
   
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600|Open+Sans" rel="stylesheet">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <script src="../js/jquery-3.1.1.min.js"></script>
    <title>programas</title>
    <link rel="stylesheet" href="../css/instructor.css">
 
   
</head>

<body>
    <?php

    
    ?>
    <form action="../controladores/r_programas.php" method="POST" id="form">

        <fieldset>
            <div class="titulo">Ingresar Programa</div>
            <input type="number" name="ficha" id="impe" placeholder="ficha" required>
            <input type="text" name="programa" id="impe" placeholder="Nombres del programa" required />
            <input type="number" name="cp" id="impe" placeholder="cantidad de aprendises" required>
            <?php
            header('Content-Type: text/html; charset=UTF-8');
            include("../class/conexion.php");
            $mysqli = Conex::conectar();
            ?>

            <select name='nivel' class="form-control" required>
                <option value="">nivel del programa</option>
                <?php
                //Vincular con la tabla y extraer datos
                  
                $query = $mysqli->query("SELECT * FROM nivel");
                while ($valores = mysqli_fetch_array($query)) {
                    echo '<option value="' . $valores['id_nivel'] . '">' . $valores['n_nivel'] . '</option>';
                }
                ?>
                <!--fin select-->
            </select>
            <!--lista de los tipos de formacion-->
            <select name='t_formacion' class="form-control" required>
                <option value="">tipo de formacion</option>
                <?php
                //Vincular con la tabla y extraer datos
                $query = $mysqli->query("SELECT * FROM tipo_formacion");
                while ($valores = mysqli_fetch_array($query)) {
                    echo '<option value="' . $valores['t_formacion'] . '">' . $valores['t_formacion'] . '</option>';
                }
                ?>
                <!--fin select-->
            </select>

            <input type="submit" class="next action-button" name="Enviar" value="Enviar">



        </fieldset>
    </form>

    <div class="editar">
        <div class="titulo2"> programas registrados</div>

        <table class="table">
            <thead>
                <th>ficha</th>
                <th>nombre del programa</th>
                <th>cant aprendices</th>
                <th>nivel del programa</th>
                <th>tipo de formacion</th>
                <th>Opcion</th>
            </thead>
            <tbody>
                <?php
                $sql = "select * from programas";

                $result = mysqli_query($mysqli, $sql);
                while ($row = mysqli_fetch_object($result)) {
                  $sql = "select n_nivel from nivel where id_nivel ='$row->id_nivel'";
                          $row1 = mysqli_fetch_object(  mysqli_query($mysqli, $sql));
                         
                     ?>
                        <td data-label="ficha:"><?php echo $row->ficha; ?></td>
                        <td data-label="Nombre del programa:"><?php echo $row->n_programa; ?></td>
                        <td data-label="cant aprendices:"><?php echo $row->cantidad_aprendizes; ?></td>
                        <td data-label="nivel:" id="nivel"><?php echo $row1->n_nivel; ?></td>
                        <td data-label="formacion:"><?php echo $row->t_formacion; ?></td>
                        <?php $pp1="imprimir6('".$row->ficha."','".$row->n_programa."', '".$row->t_formacion."','".$row->cantidad_aprendizes."', '".$row->id_nivel."')"; ?>
                        <td data-label="Opcion"> <?php echo '<button onclick="'.$pp1.'">actualizar</button>';?></td>



                    </tr>

                <?php } ?>
        </table>
    </div>

    <div  class="overlay_pro" id="overlay_pro">
        <?php
        include('../controladores/edi_programas.php');
          ?>

    </div>
    <script src="../js/popup4.js"></script>
</body>

</html>