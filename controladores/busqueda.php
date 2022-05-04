<?php
include('../class/conexion.php');
//funcion para la conexion
function db_query($query) {
	$connection=Conex::conectar();
    $result = mysqli_query($connection,$query);
    return $result;
}

//funcion para insertar una sede
function insert($sede){
   
     $sql="INSERT INTO sede(n_sede, borrar)  VALUES ('$sede',0)";
    
    return db_query($sql);

}//funcion para insertar un bloque
function insert_b($bloque,$sede){
   
    $sql="INSERT INTO bloque (n_bloque, id_sede,borrar)  VALUES ('$bloque','$sede','0')";
    //echo $sql;
    return db_query($sql);
}
function insert_p($piso,$id_bloque){
   
    $sql="INSERT INTO piso (n_piso, id_bloque,borrar)  VALUES ('$piso','$id_bloque','0')";
   // echo $sql. $id_bloque;
    return db_query($sql);
}
function insert_a($ambiente,$id_piso){
   
    $sql="INSERT INTO ambiente (n_ambiente, id_piso,borrar)  VALUES ('$ambiente','$id_piso','0')";
    //echo $sql;
    return db_query($sql);
}

// funciones de busqueda--------------------------------------------------------
//funcion para realizar una busqueda
function sede($buscar)
{
    //$conexion=mysqli_connect("localhost", "root", "","db_nueva");
    $sql="SELECT * FROM `sede` where n_sede='$buscar'";
    $resultado=db_query($sql);
    $fila = mysqli_fetch_array($resultado);  
    
    return $fila['id_sede'];
}
//funcion para realizar una busqueda de un bloque
function bloque($bloque, $id_sede)
{
    //$conexion=mysqli_connect("localhost", "root", "","db_nueva");
    $sql="SELECT * FROM `bloque` where n_bloque='$bloque' and id_sede='$id_sede'";
    $resultado=db_query($sql);
    $fila = mysqli_fetch_array($resultado);  
    //echo $sql;
    return $fila['id_bloque'];
}
function piso ($piso, $id_bloque)
{
    //$conexion=mysqli_connect("localhost", "root", "","db_nueva");
    $sql="SELECT * FROM `piso` where n_piso='$piso' and id_bloque='$id_bloque'";
    $resultado=db_query($sql);
    $fila = mysqli_fetch_array($resultado);  
    //echo $sql;
    return $fila['id_piso'];
}

function ambiente ($ambiente, $id_piso)
{
    //$conexion=mysqli_connect("localhost", "root", "","db_nueva");
    $sql="SELECT * FROM `ambiente` where n_ambiente='$ambiente' and id_piso='$id_piso'";
    $resultado=db_query($sql);
    $fila = mysqli_fetch_array($resultado);  
    
    return $fila['id_ambiente'];
}




