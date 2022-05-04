<?php
include( "../class/Csesiones.php" );
Csesiones::iniciar_sesion();
$_SESSION[ 'usuario' ] = "";
$seccion = "../vistas/v-iniciar_seccion.php";




include("../vistas/v-plantilla.php");

//header( "location: respuesta_registrarse.php" );