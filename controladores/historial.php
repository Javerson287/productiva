<?php
include '../class/conexion.php';

$conexion = Conex::conectar();

$programa = $_GET['programa'];

$instructor = $_GET['instructor'];
$sql = " SELECT * FROM
programas INNER JOIN prestamo_ambientes AS prestamo on programas.ficha=prestamo.ficha
INNER JOIN ambiente ON ambiente.id_ambiente = prestamo.id_ambiente
INNER JOIN piso ON piso.id_piso = ambiente.id_piso
INNER JOIN tipo_formacion ON tipo_formacion.id_formacion = programas.id_formacion
INNER JOIN bloque ON bloque.id_bloque = piso.id_bloque
INNER JOIN sede ON sede.id_sede = bloque.id_sede
INNER JOIN instructores on prestamo.documento= instructores.documento ";
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
$sql .=" ORDER BY prestamo.fecha_fin DESC";
$result = $conexion->query($sql);


if (mysqli_num_rows($result) == 0) {
    echo '<script language="javascript">alert("no hay resultados");</script>';
} else {
    $cadena = "";

    while ($valores = mysqli_fetch_array($result)) {

        $cadena .= "<tr>
            <td data-label='TIPO DE FORMACION'> " . $valores['t_formacion'] . "</td>
            <td data-label='Programa'>" . $valores['n_programa'] . " </td>
            <td data-label='FASE DEL PROYECTO'>" . $valores['id_fase'] . " </td>
            <td data-label='PRODUCTO DE LA FASE'>" . $valores['id_producto'] . " </td>
            <td data-label='ID COMPETENCIA'>" . $valores['id_competencia'] . " </td>
            <td data-label='ID RAP'>" . $valores['id_resultado'] . " </td>
            <td data-label='CEDE'>" . $valores['n_sede'] . " </td>
            <td data-label='BLOQUE'>" . $valores['n_bloque'] . " </td>
            <td data-label='PISO'>" . $valores['n_piso'] . " </td>
            <td data-label='AMBIENTE'>" . $valores['n_ambiente'] . " </td>
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
        $cadena .= "<td data-label='DOM'>" . $d . "</td>
           <td data-label='CANT APRENDICES:'>" . $valores['cantidad_aprendizes'] . " </td>
           <td data-label='opsiones:'><button id='editar'>editar</button></td><td><button id='eliminar'>eliminar</button></td>";
        
        $cadena .= "</tr>";
    }
    echo  $cadena;
}

