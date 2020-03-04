<?php 

	require_once "../../clases/Conexion.php";
	require_once "../../clases/ClienteCO.php";

	$obj=new clientesco;

    $datos= array($_POST['idClienteCO'],$_POST['rfcU'],$_POST['nombreU'],$_POST['telefonoU'],$_POST['celularU'],$_POST['email1U'],$_POST['email2U'],$_POST['obsU']);

    echo $obj->actualizaClienteCO($datos);


 ?>