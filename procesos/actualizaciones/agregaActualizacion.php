<?php 

	require_once "../../clases/Conexion.php";
	require_once "../../clases/Actualizaciones.php";

	$clave=$_POST['clave'];
	$clavesat=$_POST['clavesat'];
	$unidadsat=$_POST['unidadsat'];
	$precio=$_POST['precio'];
	$noserie=$_POST['noserie'];
	$factura=$_POST['factura'];
	$nomina=$_POST['nomina'];
	$contabilidad=$_POST['contabilidad'];
	$restricciones=$_POST['restricciones'];

	$datos=array($clave,$clavesat,$unidadsat,$precio,$noserie,$factura,$nomina,$contabilidad,$restricciones);

	$obj= new actualizaciones();

	echo $obj->agregaActualizacion($datos);

 ?>