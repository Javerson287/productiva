<?php
$sede = $_GET['sede'];
 $bloque = $_GET['bloque'];
$b = 1;
$p = 1;
$a = 1;

$b_ambientes = "";

include('busqueda.php');

$id_sede = $sede;


//busac si tiene pisos en bloque
while ($p <= 50) {


    if (isset($_GET["piso$b$p"])) {
        $piso = $_GET["piso$b$p"];

        insert_p($piso, $bloque);
        $id_piso = piso($piso, $bloque);


        //busca si tiene ambientes el piso
        while ($a <= 50) {

            if (isset($_GET["ambiente$b$p$a"])) {
                $ambiente = $_GET["ambiente$b$p$a"];
                insert_a($ambiente, $id_piso);
            }
            $a++;
        }
        $a = 0;
    }
    $p++;
}
header('location: ../vistas/bloques.php?id=' . $sede);
