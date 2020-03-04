<?php 

	require_once "../../clases/Conexion.php";
	require_once "../../clases/Servicios.php";

	$obj=new servicios;

    $datos=array($_POST['idServicio'],$_POST['actualizacionSelectU'],
    				$_POST['claveU'],$_POST['servicioU'],
    				$_POST['fechahoraU'],$_POST['precioU']);

    echo $obj->actualizaServicio($datos);


 ?>