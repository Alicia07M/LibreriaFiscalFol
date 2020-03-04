<?php 

	require_once "../../clases/Conexion.php";
	require_once "../../clases/ClienteC.php";

	$obj=new clientesc;

    $datos= array($_POST['idClienteC'],$_POST['rfcU'],$_POST['descuentoU'],$_POST['ivaU'],$_POST['tasaivaU'],$_POST['tasaisrU'],$_POST['iepsU'],$_POST['implocalU'],$_POST['agendaU'],$_POST['complementoU']);

    echo $obj->actualizaClienteC($datos);


 ?>