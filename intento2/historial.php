<?php
include 'conexion.php';

$conexion = Conex::conectar();

$fruta = $_GET['frutas'];
$color = $_GET['color'];

if ($fruta == 'no' & $color == 'no') {
    $sql = "SELECT *
		from fruta";
}

if ($fruta != 'no') {
    $sql = "SELECT *
		from fruta where id='$fruta'";
}

if ($color != 'no') {
    $sql = "SELECT *
		from fruta where id_color='$color'";
}



if (isset($_GET['fecha']) & $_GET['fecha'] != '') {
    $f = $_GET['fecha'];
    $sql = "SELECT *
    from fruta where '$f' between f_pedido and r_pedido";
}
if ($color != 'no'  & $_GET['fecha'] != '') {
    $sql = "SELECT *
       from fruta where id_color='$color' and  '$f' between f_pedido and r_pedido";
}
if ($fruta != 'no'  & $_GET['fecha'] != '') {
    $sql = "SELECT *
       from fruta where id='$fruta' and  '$f' between f_pedido and r_pedido ";
}

if ($fruta != 'no' & $color != 'no' & $_GET['fecha'] != '') {
    $sql = "SELECT *
   from fruta where id='$fruta' and id_color='$color' and  '$f' between f_pedido and r_pedido";
}






$result = $conexion->query($sql);

if (mysqli_num_rows($result) == 0) {
    echo '<script language="javascript">alert("no hay resultados");window.location.href="index.php";</script>';
} else {
    $cadena = "";

    while ($valores = mysqli_fetch_array($result)) {

        $cadena .= "<tr class='articulo'>
            <td>
                " . $valores['id'] . "
            </td>
            <td>
                " . $valores['fut'] . " 
            </td>
            <td>
                " . $valores['precio'] . " 
            </td>
            <td>
                " . $valores['f_pedido'] . "/" . $valores['r_pedido'] . " 
            </td>";
        $color = $conexion->query("SELECT * FROM color where id_color='" . $valores['id_color'] . "'");
        $colores = mysqli_fetch_array($color);
        $cadena .= "<td>
                " . $colores['colr'] . " 
            </td>
        </tr>";
    }
    echo  $cadena;
}
// var_dump($cadena);
