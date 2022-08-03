
<?php

include("../class/eliminar.php");

if (isset($_GET['id']) & isset($_GET['tabla']) & isset($_GET['id_campo'])) {
    $id = $_GET['id'];
    $tabla = $_GET['tabla'];
    $campo = $_GET['id_campo'];
    eliminar_t($tabla, $campo, $id);
}
