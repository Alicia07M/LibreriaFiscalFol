<?php 

	require_once "../../clases/Conexion.php";
	require_once "../../clases/Usuarios.php";

	$obj=new usuarios;

    $datos=array($_POST['idUsuario'],$_POST['nombreU'],$_POST['apellidoU'],$_POST['rolU'],$_POST['usuarioU'],$_POST['passwordU']);

    echo $obj->actualizaUsuario($datos);

 ?>