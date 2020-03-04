<?php 

	require_once "../../clases/Conexion.php";
	require_once "../../clases/ClienteE.php";

	$obj=new clientese;

    $datos= array($_POST['idClienteE'],$_POST['rfcU'],$_POST['callenU'],$_POST['noextU'],$_POST['nointU'],$_POST['coloniaU'],$_POST['localidadU'],$_POST['municipioU'],$_POST['codpostalU'],$_POST['entfederativaU'],$_POST['paisU'],$_POST['telefonoU'],$_POST['celularU'],$_POST['obsU']);

    echo $obj->actualizaClienteE($datos);


 ?>