<?php 

	require_once "../../clases/Conexion.php";
	require_once "../../clases/ClienteF.php";

	$obj=new clientesf;

    $datos= array($_POST['idClienteF'],$_POST['rfcU'],$_POST['calleU'],$_POST['noextU'],$_POST['nointU'],$_POST['coloniaU'],$_POST['localidadU'],$_POST['municipioU'],$_POST['cpU'],$_POST['entfedU']);

    echo $obj->actualizaClienteF($datos);


 ?>