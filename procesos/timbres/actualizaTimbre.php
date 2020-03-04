<?php 

	require_once "../../clases/Conexion.php";
	require_once "../../clases/Timbres.php";

	$obj=new timbres;

    $datos=array($_POST['idTimbre'],$_POST['claveU'],
    				$_POST['facturaU'],$_POST['nominaU'],
    				$_POST['retencionesU'],$_POST['precioU'],
    			);

    echo $obj->actualizaTimbre($datos);


 ?>