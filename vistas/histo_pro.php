<?php
include("../class/conexion.php");
$mysqli = Conex::conectar();
$sql = "select * from programas";
$conteo=0;


if (isset($_POST['buscar'])) {
    $bus=$_POST['buscar'];
    if ($bus != "") {
       $conteo=1; 
        $sql .=" where (ficha  LIKE '%$bus%' or n_programa LIKE '%$bus%')";
    } 
}

if (isset($_POST['buscar_p'])) {
  $bus_prof=$_POST['buscar_p'];
  if ($bus_prof !="") {
    $sql .= ($conteo==0) ? " WHERE" : " AND" ;
  $sql .=" id_nivel LIKE '%$bus_prof%' ";
  }


}


$nivel="";
$formacion="";
$consul = "";
$result = mysqli_query($mysqli, $sql);
while ($row = mysqli_fetch_object($result)) {
    $consul .= "<tr><td data-label='ficha:''>$row->ficha</td>
    <td data-label='Nombre del programa:'>$row->n_programa</td>
    <td data-label='cant aprendices:'>$row->cantidad_aprendizes</td>";


    if (isset($row->id_nivel)) {
        $sql1 = "select * from nivel where id_nivel='$row->id_nivel'";
        $result1 = mysqli_query($mysqli, $sql1);
        $row1 = mysqli_fetch_object($result1);
        $nivel=$row1->n_nivel;
    }
    $consul .="<td data-label='nivel:'>$nivel</td>";

    if ($row->id_formacion=="") {
        $formacion="";}else{
      $sql2 = "select * from tipo_formacion where id_formacion='$row->id_formacion'";
      $result2 = mysqli_query($mysqli, $sql2);
      $row2 = mysqli_fetch_object($result2);
      $formacion=$row2->t_formacion;
     }
     $consul .="<td data-label='nTipo de formación:'>$formacion</td>";
     $pp1 = 'imprimir6("' . $row->ficha . '","' . $row->n_programa . '", "' . $row->id_formacion . '","' . $row->cantidad_aprendizes . '", "' . $row->id_nivel . '")';
    $consul .= "<td data-label='Opcion'><button onclick='$pp1'>Actualizar</button></td></tr>";
}
echo $consul."<script src='../js/paginador.js'></script>";
