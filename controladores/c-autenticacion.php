<?php

    include( "../class/consulta.php" );
    include( "../class/Csesiones.php" );
    include( "../class/Vimprimir.php" );
    Csesiones::iniciar_sesion();

    $usuario = $_POST[ 'usuario' ];
    $clave = $_POST[ 'clave' ];

    //echo $usuario." ".$clave;

    $r = consulta::autenticacion( $usuario, $clave );

//var_dump($r->fetch_all(MYSQLI_ASSOC));

    //echo ($r->num_rows); 
    
    if (($r->num_rows) == 1)
    {
        $_SESSION[ 'usuario' ] = $r->fetch_all()[0][0];
        header( "location: ../index.php" );
        //echo "valido";
      
    }
    else{
       
        header( "location: c-iniciar_seccion.php" );







    }

    $files= $r->fetch_all(MYSQLI_ASSOC);
    //echo ($files[0]["id"]);
     die();

    //$r = Vimprimir::imprimir( $r, 1 ); 
    //echo $r;
    
    //Imprimir si estamos autenticados o no.
   