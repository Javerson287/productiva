<?php

//include ("consulta.php");
//include ("cla_borrar.php");
//include ("insertar_programas.php");



//consulta
if (isset($_GET['tabla']))
{
    $sql=consulta::consultar_tabla($_GET['tabla']);
    echo consulta::imprime_tabla($sql);
}


//borrar datos-------------------------------------------------------------------------------------------------------
if (isset($_GET['tabla'], $_GET['campo'], $_GET['dato']))
{
    $sql= cla_borrar::borrar($_GET['tabla'], $_GET['campo'], $_GET['dato']);
    echo $sql;
}


//actualizar datos----------------------------------------------------------------------------------------------------

if (isset($_GET['tabla'], $_GET['campo'], $_GET['dato'], $_GET['no_campo'], $_GET['no_dato']))
{
    include ("actualizar.php");
    $sql = actualizar::actualiza($_GET['tabla'], $_GET['campo'], $_GET['dato'], $_GET['no_campo'], $_GET['no_dato']);
    echo $sql;
}

//--------------------------------------------------------------------------------------------------------------------
if (isset($_GET['cede'], $_GET['nom_aula']))
{
    include ("ambientes.php");
    $sql = ambientes::ingresar_ambientes($_GET['cede'], $_GET['nom_aula']);
    echo $sql;
} 


// ingresar valores a la tabla programa-----------------------------------------------------------------------------

if (isset($_GET['ficha'], $_GET['nom_programa'], $_GET['No_documento']))
{
   include ("insertar_programas.php");
   $sql = insertar_programa::insertar($_GET['ficha'], $_GET['nom_programa'], $_GET['No_documento']);
   echo $sql;
}

//ingresar valores a la tabla ambientes*----------------------------------------------------------------------------------


/*
//ingresar valores a la tabla prestamo ambientes
include ("prestamo.php");
$sql = prestamos::ingresar_prestamo($_GET['fecha_prestamo'], $_GET['fecha_devolucion']. $_GET['hora_ingreso'], $_GET['hora_salida'], $_GET['observaciones']);
echo $sql; */

