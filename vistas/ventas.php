<?php 
session_start();
if (isset($_SESSION['usuario'])) {
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Ventas</title>
		<?php require_once "menu.php" ?>
	</head>
	<body>
		<div class="container">
			<h1 align="center">Modulo de Ventas</h1>
			<div class="row">
				<div align="center" class="col-sm-12">
					<span class="btn btn-default" id="cotizacionesbtn">Cotizaciones</span>
					<span class="btn btn-default" id="preventasbtn">Pre-Ventas</span>
					<span class="btn btn-default" id="ventasbtn">Ventas</span>
					<span class="btn btn-default" id="facturasbtn">Facturas</span>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div id="cotizaciones"></div>
					<div id="preventas"></div>
					<div id="ventas"></div>
					<div id="facturas"></div>
				</div>
			</div>
		</div>
	</body>
	</html>
		<script type="text/javascript">
			$(document).ready(function(){
				$('#cotizacionesbtn').click(function(){
					esconderSeccion();
					$('#cotizaciones').load('vender/vcotizaciones.php');
					$('#cotizaciones').show();
					$('#ventas').hide();
					$('#facturas').hide();
					$('#preventas').hide();
				});
				$('#preventasbtn').click(function(){
					esconderSeccion();
					$('#preventas').load('vender/vpreventa.php');
					$('#preventas').show();
					$('#ventas').hide();
					$('#facturas').hide();
					$('#cotizaciones').hide();
				});
				$('#ventasbtn').click(function(){
					esconderSeccion();
					$('#ventas').load('vender/vventa.php');
					$('#ventas').show();
					$('#preventas').hide();
					$('#facturas').hide();
					$('#cotizaciones').hide();
				});
				$('#facturasbtn').click(function(){
					esconderSeccion();
					$('#facturas').load('vender/vfactura.php');
					$('#facturas').show();
					$('#preventas').hide();
					$('#ventas').hide();
					$('#cotizaciones').hide();
				});
			});

			function esconderSeccion(){
				$('cotizaciones').hide();
				$('preventas').hide();
				$('ventas').hide();
				$('facturas').hide();
			}
	</script>
	<script type="text/javascript">
		window.onload = function(){
			document.getElementById("op17").style.background='#3498DB';
		}
	</script>

	
	<?php 
}else{
	header("location:../index.php");
}
?>