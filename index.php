<?php
// Validamos si ya se ejecuto el instaldor ya se ejecuto.
    // Revisado si el archivo instaldo.txt se encuentra creado en la carpeta config
    
    if (!file_exists("config/stl.text")){
        
        // Si el archivo no esxiste ejecutamos el instalador.
        header('Location: instalador/v-instalador.php');

    }else{
include_once('class/Csesiones.php');
Csesiones::verificar_sesion();

$menu = "vistas/v-menu.php";

include("plantillas/plantilla-2.php");

}
