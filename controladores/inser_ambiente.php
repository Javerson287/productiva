<?php
$sede = $_GET['sede'];

$piso = $_GET['piso'];
$a = 1;
$b=1;
$p=1;
$b_ambientes = "";

include('busqueda.php');

$id_sede = $sede;


//busac si tiene pisos en bloque

        //busca si tiene ambientes el piso
        while ($a <= 50) {

            if (isset($_GET["ambiente$b$p$a"])) {
                $ambiente = $_GET["ambiente$b$p$a"];
                insert_a($ambiente, $piso);
            }
            $a++;
        }
        $a = 0;
header('location: ../vistas/bloques.php?id=' . $sede);
