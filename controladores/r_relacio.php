<?php

    include("../class/relaciones.php");
    $ficha = $_POST[ 'programa' ];
    $No_documento= $_POST['instructor'];
  
    if ($ficha == true &&    $No_documento== true )
    {

        insertar_programa::insertar($ficha, $No_documento);
    }
    else{
       
       //header( "location:agregar_relacion.php" );
    }