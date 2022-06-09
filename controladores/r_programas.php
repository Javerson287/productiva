
    <?php


    include("../class/programas.php");
    $ficha = $_POST[ 'ficha' ];
    $programa = $_POST[ 'programa' ];
    $cp= $_POST[ 'cp' ];
    $nivel=$_POST['nivel'];
    $t_formacion=$_POST['id_formacion'];
  
    if ($ficha == true && $programa == true && $cp == true && $nivel == true && $t_formacion == true)
    {
      
        insertar_programas::insertar($ficha, $programa,$cp, $nivel, $t_formacion);
        
       
        
    }
    else{
       
      
       header( "location: ../vistas/programas.php" );
    }