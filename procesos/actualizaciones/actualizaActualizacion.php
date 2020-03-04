<?php 

	require_once "../../clases/Conexion.php";
	require_once "../../clases/Actualizaciones.php";

	$obj=new actualizaciones;

    $datos=array($_POST['idActualizacion'],$_POST['claveU'],
    			$_POST['precioU'],$_POST['noserieU'],$_POST['facturaU'],$_POST['nominaU'],$_POST['contabilidadU'],$_POST['restriccionesU']);

    echo $obj->actualizaActualizacion($datos);


 ?>