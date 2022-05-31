<?php

 class Conex

 {
	 static function conectar()
 { 
	 return mysqli_connect('localhost', 'root', '', 'frutas');
 } 

 } 

?>