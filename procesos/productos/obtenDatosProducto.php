<?php 

	require_once "../../clases/Conexion.php";
	require_once "../../clases/Productos.php";

	$obj= new productos;

	echo json_encode($obj->obtenDatosProducto($_POST['idproducto']));

 ?>