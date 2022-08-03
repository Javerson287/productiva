<?php
include("../class/conexion.php");
$mysqli = Conex::conectar();
$sql = "select * from instructores";
$conteo=0;


if (isset($_POST['buscar'])) {
    $bus=$_POST['buscar'];
    if ($bus != "") {
       $conteo=1; 
        $sql .=" where n_instructor  LIKE '%$bus%' ";
    } 
}

if (isset($_POST['buscar_p'])) {
  $bus_prof=$_POST['buscar_p'];
  if ($bus_prof !="") {
    $sql .= ($conteo==0) ? " WHERE" : " AND" ;
  $sql .=" id_profesiones  LIKE '%$bus_prof%' ";
  }


}



$profecion="";

$consul = "";
$result = mysqli_query($mysqli, $sql);
while ($row = mysqli_fetch_object($result)) {
    $consul .= "<tr><td data-label='Documento:'>$row->documento</td>
    <td data-label='Nombre:'>$row->n_instructor</td>";
    if ($row->id_profesiones =="") {
        $profecion="";}else{
        $sql1 = "select * from profesiones where id_profesiones='$row->id_profesiones'";
        $result1 = mysqli_query($mysqli, $sql1);
        $row1 = mysqli_fetch_object($result1);
        $profecion=$row1->n_profesiones;
    }
    $consul .="<td data-label='profesión:'>$profecion</td>";

    $pp1 = 'imprimir6("'.$row->n_instructor.'","'.$row->documento.'","'.$row->id_profesiones.'")';
    $consul .= "<td data-label='Opcion'><button onclick='$pp1'>Actualizar</button></td></tr>";
}
echo $consul."<script src='../js/paginador.js'></script>";

