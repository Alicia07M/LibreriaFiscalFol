<?php 

	require_once "../../clases/Conexion.php";
	require_once "../../clases/Revistas.php";

	$obj = new revistas;

	$datos=array($_POST['idRevista'],$_POST['claveU'],$_POST['revistaU'],
				$_POST['precioU'],$_POST['anoU'],
				$_POST['editorialU'],$_POST['tipoU'],
				$_POST['mesU']);

	echo $obj->actualizaRevista($datos);

 ?>