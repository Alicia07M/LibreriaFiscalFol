<?php
	$mysqli=new mysqli("localhost","root","","erplibreria"); 
	
	if(mysqli_connect_errno()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	}
?>