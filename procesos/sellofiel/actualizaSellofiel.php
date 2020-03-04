<?php 

	require_once "../../clases/Conexion.php";
	require_once "../../clases/Sellofiel.php";

	$obj=new sellofiel;

    $datos=array($_POST['idSellofiel'],$_POST['claveU'],$_POST['clavesatU'],$_POST['unidadsatU'],
    			$_POST['precioU']);

    echo $obj->actualizaSellofiel($datos);


 ?>