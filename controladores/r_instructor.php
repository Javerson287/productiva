<?php

    include("../class/instructores.php");
      $No_documento = $_POST[ 'CC' ];
     $nom_instructor = $_POST[ 'nombre' ];
    $n_profecion = $_POST[ 'profecion' ];
  
    if ($No_documento == true && $nom_instructor== true && $n_profecion == true)
    {
      
        insertar_instructores::insertar($No_documento, $nom_instructor,$n_profecion);
        
       
        
    }
    else{
       
      
       header( "location: ../vistas/instructor.php" );
    }