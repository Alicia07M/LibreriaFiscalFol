<?php 

	require_once "../../clases/Conexion.php";
	require_once "../../clases/Otros.php";

	$obj=new otros;

    $datos=array($_POST['idOtro'],$_POST['otroU'],
    			$_POST['descripcionU'],$_POST['precioU'],
    			$_POST['claveU']);

    echo $obj->actualizaOtro($datos);


 ?>