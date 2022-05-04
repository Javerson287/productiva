<?php
include('conexion.php');
function db_query($query) {
   
	
	$connection=Conex::conectar();
    $result = mysqli_query($connection,$query);
  
    return $result;
}

function edit($tblname,$form_data,$field_id,$id){
	$sql = "UPDATE ".$tblname." SET ";
	$data = array();

	foreach($form_data as $column=>$value){

		$data[] =$column."="."'".$value."'";

	}
	$sql .= implode(',',$data);
	$sql.=" where ".$field_id." = ".$id."";
	
	//echo $sql;
	return db_query($sql); 
	
}
function editar($tblname,$form_data,$field_id,$field_id2,$id,$id2){
	$sql = "UPDATE ".$tblname." SET ";
	$data = array();

	foreach($form_data as $column=>$value){

		$data[] =$column."="."'".$value."'";

	}
	$sql .= implode(',',$data);
	$sql.=" where ".$field_id." = ".$id." ";
	$sql.=" and ".$field_id2."="."$id2";
	echo $sql;
	return db_query($sql); 
	
}


function select_id($tblname,$field_name,$field_id){
	$sql = "Select * from ".$tblname." where borrar='0' and ".$field_name." = ".$field_id."";
	$db=db_query($sql);
	//$GLOBALS['row'] = mysqli_fetch_object($db);
	
	return $db;

}
?>
