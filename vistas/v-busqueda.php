<?php



$inst = "";
$pro="";
$fecha="";


if(isset($_POST['instructor'])){
    $inst = $_POST['instructor'];
}
if(isset($_POST['programa'])){
    $pro = $_POST['programa'];
}
if(isset($_POST['fecha'])){
    $fecha = $_POST['fecha'];
}


include '../class/conexion.php';
$conexion = Conex::conectar();

$SQL_READ = "SELECT * FROM
programas INNER JOIN prestamo_ambientes AS prestamo on programas.ficha=prestamo.ficha
INNER JOIN ambiente ON ambiente.id_ambiente = prestamo.id_ambiente
INNER JOIN piso ON piso.id_piso = ambiente.id_piso
INNER JOIN bloque ON bloque.id_bloque = piso.id_bloque
INNER JOIN sede ON sede.id_sede = bloque.id_sede
INNER JOIN instructores ON instructores.documento = prestamo.documento

";

$cont = 0;
if ($pro != '' & $pro != 'undefined' & $pro !='no') {
    $SQL_READ  .= " where programas.ficha ='$pro'";
    $cont++;
}

if ($inst != '' & $inst != 'undefined' & $inst != 'no') {
    if ($cont == 1) {
        $SQL_READ  .= " and ";
    } else {
        $SQL_READ  .= " where ";
        $cont++;
    };

    $SQL_READ  .= " prestamo.documento ='$inst'";
}

if ( $fecha != '') {
    if ($cont == 1) {
        $SQL_READ  .= " and ";
    } else {
        $SQL_READ  .= " where ";
        $cont++;
    };
    
    $SQL_READ  .= " '$fecha' BETWEEN prestamo.fecha_inicio and prestamo.fecha_fin";
}
$SQL_READ .=" ORDER BY prestamo.fecha_fin DESC";

$sql_query = $conexion->query($SQL_READ);
 



$cadena = "";
if (mysqli_num_rows($sql_query) == 0) {
    echo '<script language="javascript">
    visible1();
    alert("no hay resultados");
    </script>';
 
    $sql_query = $conexion->query($SQL_READ );
} 


 


    while ($valores = mysqli_fetch_array($sql_query )) {

        $cadena .= "<tr id='cuenta'> 
            <td data-label='Programa'>" . $valores['ficha'] ."-". $valores['n_programa'] . " </td>
            <td data-label='INSTRUCTOR'>" . $valores['n_instructor'] . " </td>
            <td data-label='CEDE'>" . $valores['n_sede'] . " </td>
            <td data-label='BLOQUE'>" . $valores['n_bloque'] . " </td>
            <td data-label='PISO' id='micelda'>" . $valores['n_piso'] . " </td>
            <td data-label='AMBIENTE'>" . $valores['n_ambiente'] . " </td>
            <td data-label='fecha'>" . $valores['fecha_inicio'] . " / " . $valores['fecha_fin'] . " 
            <td data-label='HORARIO'>" . $valores['hora_inicio'] . " / " . $valores['hora_fin'] . " </td>
            <td data-label='FICHA'>" . $valores['ficha'] . " </td>";
            if ($valores['lunes'] == 1) {$lun = 'X';} else {echo $lun = ''; }
            $cadena .= "<td data-label='LUN'>" . $lun . " </td>";
            if ($valores['martes'] == 1) { $m = 'X';} else {$m = '';}
            $cadena .= "<td data-label='MAR'>" . $m . " </td>";
            if ($valores['miercoles'] == 1) { $mi = 'X'; } else {  $mi = ''; }
            $cadena .= "<td data-label='MIR'>" . $mi . " </td>";if ($valores['jueves'] == 1) { $j = 'X';} else {$j = ''; }
            $cadena .= "<td data-label='MAR'>" . $j . " </td>";
            if ($valores['viernes'] == 1) { $v = 'X';} else { $v = '';}
            $cadena .= "<td data-label='MAR'>" . $v . " </td>";
            if ($valores['sabado'] == 1) { $s = 'X';} else {$s = ''; }
            $cadena .= "<td data-label='SAB'>" . $s . " </td>";
            if ($valores['domingo'] == 1) { $d = 'X';} else { $d = '';}
            $script='alerta("'.$valores['fecha_registro'].'")';
            $scrip='editar("'.$valores['fecha_registro'].'")';
            $cadena .= "<td data-label='DOM'>" . $d . "</td>
            <td data-label='CANT APRENDICES:'>" . $valores['cantidad_aprendizes'] . " </td>";
            // comando para realizar la conexion del java para que realice las operaciones correspondientes (calculo de los dias trabajados)
            $cadena .= "</tr><script>visible();</script> ";
         
           
    }
     echo $cadena ."<script src='../js/paginador.js'>";


?>
 
    