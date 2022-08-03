<?php

    include("../class/profeciones.php");
    echo $n_profecion = $_POST[ 'nombre' ];

    if ( $n_profecion == true)
    {    
        insertar_instructores::insertar_profecion ($n_profecion);   
    }
    else{
       header( "location:../vistas/profecion.php" );
    }