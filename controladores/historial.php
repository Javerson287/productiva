
<?php
include '../class/conexion.php';

$conexion = Conex::conectar();

$programa = $_GET['programa'];
$instructor = $_GET['instructor'];
$sql = " SELECT * FROM
programas INNER JOIN prestamo_ambientes AS prestamo on programas.ficha=prestamo.ficha
INNER JOIN instructores on prestamo.documento= instructores.documento";
$cont = 0;

if ($programa != 'no' & $programa != 'undefined') {
    $sql .= " where programas.ficha ='$programa'";
    $cont++;
}

if ($instructor != 'no' & $instructor != 'undefined') {
    if ($cont == 1) {
        $sql .= " and ";
    } else {
        $sql .= " where ";
        $cont++;
    };

    $sql .= " prestamo.documento ='$instructor'";
}

if (isset($_GET['fecha']) & $_GET['fecha'] != '') {
    if ($cont == 1) {
        $sql .= " and ";
    } else {
        $sql .= " where ";
        $cont++;
    };
    $f = $_GET['fecha'];
    $sql .= " '$f' BETWEEN prestamo.fecha_inicio and prestamo.fecha_fin";
}
$sql .= " ORDER BY prestamo.fecha_fin DESC";
$result = $conexion->query($sql);


if (mysqli_num_rows($result) == 0) {
    echo '<script language="javascript">
    visible1();
    alert("no hay resultados");
    </script>';

    $result = $conexion->query($sql);
} else {
    $cadena = "";
    $n = 1;

    while ($valores = mysqli_fetch_array($result)) {
if ($valores['id_formacion'] != "") {
            $sql1 = "SELECT * FROM tipo_formacion where id_formacion=" . $valores['id_formacion'];
            $result1 = $conexion->query($sql1);
            $form = mysqli_fetch_array($result1);
            $formacion = $form['t_formacion'];
        } else {
            $formacion = "";
        }

        $cadena .= "<tr id='cuenta'>
            <td data-label='TIPO DE FORMACION'> " . $formacion . "</td>
            <td data-label='Programa'>" . $valores['ficha'] . "-" . $valores['n_programa'] . " </td>";
            //desición que ayuda amostrar la fase que se programo
        if ($valores['id_fase'] != "") {
            $sql1 = "SELECT * FROM fase where id_fase=" . $valores['id_fase'];
            $result1 = $conexion->query($sql1);
            $fas = mysqli_fetch_array($result1);
            $fase = $fas['id_fase'] . "-" . $fas['fase_proyecto'];
        } else {
            $fase = "";
        }

        $cadena .= " <td data-label='FASE DEL PROYECTO'>" . $fase . " </td>";
        if ($valores['id_producto'] != "") {
            $sql1 = "SELECT * FROM producto_fase where id_producto=" . $valores['id_producto'];
            $result1 = $conexion->query($sql1);
            $pro = mysqli_fetch_array($result1);
            $producto = $pro['id_producto'] . "-" . $pro['producto'];
        } else {
            $producto = "";
        }
        $cadena .="
            <td data-label='PRODUCTO DE LA FASE'>" . $producto .  " </td>";
            if ($valores['id_competencia'] != "") {
                 error_log("¡La base de datos de Oracle no está disponible!", 0);
                $sql2 = "SELECT * FROM competencicas where id_competencia=" . $valores['id_competencia'];
                $result2 = $conexion->query($sql2);
                $com = mysqli_fetch_array($result2);
                $competencia = $com['id_competencia'] . "-" . $com['competencia'];
            } else {
                $competencia = "";
            }
            $cadena .="
            <td data-label='COMPETENCIA'>" .$competencia . " </td>
            <td data-label='ID RAP'>" . $valores['id_resultado'] . " </td>";

            if ($valores['id_ambiente'] != "") {
                $sql3 = "SELECT * FROM ambiente
                INNER JOIN piso ON piso.id_piso = ambiente.id_piso
                INNER JOIN bloque ON bloque.id_bloque = piso.id_bloque
                INNER JOIN sede ON sede.id_sede = bloque.id_sede
                where ambiente.id_ambiente=" . $valores['id_ambiente'];

                $result3 = $conexion->query($sql3);
                $re = mysqli_fetch_array($result3);
                $sede = $re['n_sede'] ;
                $bloque =$re['n_bloque'];
                $piso=$re['n_piso'];
                $ambiente=$re['n_ambiente'];
            } else {
         $sede="";
         $bloque="";
         $piso="";
         $ambiente="";
         
            }
            
            $cadena .="
            <td data-label='CEDE'>" . $sede . " </td>
            <td data-label='BLOQUE'>" . $bloque . " </td>
            <td data-label='PISO' id='micelda'>" . $piso . " </td>
            <td data-label='AMBIENTE'>" . $ambiente . " </td>
            <td data-label='fecha'>" . $valores['fecha_inicio'] . " / " . $valores['fecha_fin'] . " 
            <td data-label='HORARIO'>" . $valores['hora_inicio'] . " / " . $valores['hora_fin'] . " </td>
            <td data-label='FICHA'>" . $valores['ficha'] . " </td>
            <td data-label='INSTRUCTOR'>" . $valores['n_instructor'] . " </td>";
        if ($valores['lunes'] == 1) {
            $lun = 'X';
        } else {
            echo $lun = '';
        }
        $cadena .= "<td data-label='LUN'>" . $lun . " </td>";
        if ($valores['martes'] == 1) {
            $m = 'X';
        } else {
            $m = '';
        }
        $cadena .= "<td data-label='MAR'>" . $m . " </td>";
        if ($valores['miercoles'] == 1) {
            $mi = 'X';
        } else {
            $mi = '';
        }
        $cadena .= "<td data-label='MIR'>" . $mi . " </td>";
        if ($valores['jueves'] == 1) {
            $j = 'X';
        } else {
            $j = '';
        }
        $cadena .= "<td data-label='MAR'>" . $j . " </td>";
        if ($valores['viernes'] == 1) {
            $v = 'X';
        } else {
            $v = '';
        }
        $cadena .= "<td data-label='MAR'>" . $v . " </td>";
        if ($valores['sabado'] == 1) {
            $s = 'X';
        } else {
            $s = '';
        }
        $cadena .= "<td data-label='SAB'>" . $s . " </td>";
        if ($valores['domingo'] == 1) {
            $d = 'X';
        } else {
            $d = '';
        }
        $script = 'alerta("' . $valores['id_prestamo'] . '")';
        $scrip = 'editar("' . $valores['id_prestamo'] . '")';
        $cadena .= "<td data-label='DOM'>" . $d . "</td>
            <td data-label='CANT APRENDICES:'>" . $valores['cantidad_aprendizes'] . " </td>
            <td data-label='opsiones:' onclick='$scrip'><button id='editar'>editar</button></td>
            <td data-label='opsiones:'><button onclick='$script' id='eliminar'>eliminar</button></td>
            <td class='semana" . $n . "' id='com" . $n . "'></td> ";
        // comando para realizar la conexion del java para que realice las operaciones correspondientes (calculo de los dias trabajados)

        $cadena .= "  <script>
     visible();
                meses2('" . $valores['fecha_inicio'] . "',
                    '" . $valores['fecha_fin'] . "',
                    '" . $valores['hora_inicio'] . "',
                    '" . $valores['hora_fin'] . "',
                    '" . $valores['lunes'] . "',
                    '" . $valores['martes'] . "',
                    '" . $valores['miercoles'] . "',
                    '" . $valores['jueves'] . "',
                    '" . $valores['viernes'] . "',
                    '" . $valores['sabado'] . "',
                    '" . $valores['domingo'] . "',
                'semana" . $n . "');

            </script>";
        $cadena .= "</tr> ";
        $n++;
    }
    echo  $cadena . "<script src='../js/paginador.js'>";
}
?>




