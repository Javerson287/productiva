<?php

include("../class/update_historial.php"); 
    $sede= $_POST[ 'sede' ];
    $bloque = $_POST[ 'bloque' ];
    $piso = $_POST[ 'piso' ];
    $ambiente = $_POST[ 'ambiente' ];
    $h_ingreso = $_POST[ 'h_ingreso' ];
    $h_salida = $_POST[ 'h_salida' ];
    $instructor= $_POST[ 'instructor' ];
    $f_prestamo = $_POST['inicio_prestamo'];
    $f_devolucion = $_POST['fin_prestamo'];
    $ficha = $_POST['ficha'];
    $competencia = $_POST['com'];
    $producto = $_POST['producto'];
    $resutado = $_POST['rap'];
    $fase = $_POST['fase'];
    $id = $_POST['id'];
   
   
  
    
    if ( isset ( $_POST['lunes']) ){$lunes = $_POST['lunes'];}else { $lunes = 0;}
    if ( isset ( $_POST['martes']) ){$martes = $_POST['martes'];}else { $martes = 0;}
    if ( isset ( $_POST['miercoles']) ){$miercoles = $_POST['miercoles'];}else { $miercoles = 0;}
    if ( isset ( $_POST['jueves']) ){$jueves = $_POST['jueves'];}else { $jueves = 0;}
    if ( isset ( $_POST['viernes']) ){$viernes = $_POST['viernes'];}else { $viernes = 0;}
    if ( isset ( $_POST['sabado']) ){$sabado = $_POST['sabado'];}else { $sabado = 0;}
    if ( isset ( $_POST['domingo']) ){$domingo = $_POST['domingo'];}else { $domingo = 0;}

// echo $sede;
// echo $bloque;
// echo $piso;
// echo $ambiente;
//     echo $lunes;
//     echo $martes;
//     echo $miercoles;
//     echo $jueves;
//     echo $viernes;
//     echo $sabado;
//     echo $domingo;
//     echo $miercoles;
//     echo $instructor;
//     echo $h_ingreso;
//     echo $h_salida;
//echo $ficha;
   

    
    if ( $f_prestamo && $f_devolucion )
    {
      
        prestamos::ingresar_prestamo($ficha,$fase,$producto,$resutado,$ambiente,$instructor,$f_prestamo,$f_devolucion,$h_ingreso, $h_salida,$lunes,$martes,$miercoles,$jueves,$viernes,$sabado,$domingo,$competencia,$id);
        
       
        
    }
    else{
       
        echo '<script language="javascript">alert("Tus datos no se guardaron, COMPLETE TODOS LOS CAMPOS");window.location.href="c-prestamo.php";</script>';
    }