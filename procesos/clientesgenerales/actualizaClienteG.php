<?php 

	require_once "../../clases/Conexion.php";
	require_once "../../clases/ClienteG.php";

	$obj=new clientesg;

    $datos= array($_POST['idClienteG'],$_POST['rfcU'],$_POST['nombreU'],$_POST['tipoU'],$_POST['nomcomercialU'],$_POST['telefonoU'],$_POST['email1U'],$_POST['email2U'],$_POST['curpU'],$_POST['monedaU'],$_POST['clasificacionU'],$_POST['fechaU'],$_POST['obsU']);

    echo $obj->actualizaClienteG($datos);


 ?>