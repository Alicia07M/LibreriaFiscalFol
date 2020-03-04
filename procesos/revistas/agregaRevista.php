<?php 

	require_once "../../clases/Conexion.php";
	require_once "../../clases/Revistas.php";

	$obj= new revistas;

	$datos= array($_POST['clave'],$_POST['clavesat'],$_POST['unidadsat'],$_POST['revista'],$_POST['precio'],$_POST['ano'],$_POST['editorial'],$_POST['tipo'],$_POST['mes']);

	echo $obj->agregaRevista($datos);

 ?>