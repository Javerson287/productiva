<?php
include("../class/conexion.php");
$mysqli = Conex::conectar();
$sql = "select * from profesiones";
if (isset($_POST['buscar'])) {
    $bus=$_POST['buscar'];
    if ($bus != "") {
        $sql .=" where n_profesiones  LIKE '%$bus%'";
    }
    
    
}



$consul = "";
$result = mysqli_query($mysqli, $sql);
while ($row = mysqli_fetch_object($result)) {
    $consul .= "<tr><td data-label='profecion:'>$row->n_profesiones</td>";
    $pp1 = 'edi_prof("'.$row->id_profesiones.'", "'.$row->n_profesiones.'")';
    $consul .= "<td data-label='Opcion'><button onclick='$pp1'>Actualizar</button></td></tr>";
}
echo $consul.'<script src="../js/paginador.js"></script>';
