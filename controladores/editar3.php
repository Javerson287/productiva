<?php
//este es para realzar cambios a los datos de los programas
$ficha_i = $_POST['ficha_i'];
$ficha_f = $_POST['id'];
$programa = $_POST['edi'];
$cp = $_POST['ct_aprendiz'];
$nivel = $_POST['nivel'];
$formacion = $_POST['formacion'];
include("../class/eliminar.php");
editar4($ficha_i, $ficha_f, $programa, $cp, $nivel, $formacion);

header('location: ../vistas/programas.php');
