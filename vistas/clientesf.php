<?php 
session_start();
if (isset($_SESSION['usuario'])) {
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Clientes Fiscales</title>
		<?php require_once "menu.php" ?>
	</head>
	<body>
		<div class="container">
			<h1>Datos de Clientes Fiscales</h1>
			<div class="row">
				<div class="col-sm-12">
					<a class="btn btn-default" href="clientesfcrud.php">Registrar Clientes</a>
					<a class="btn btn-default" href="impotarexcelF.php">Importar Excel</a>
				</div>
			</div>
		</div>
	</body>
	</html>
	<script type="text/javascript">
		window.onload = function(){
			document.getElementById("op11").style.background='#3498DB';
			document.getElementById("op13").style.background='#3498DB';
		}
	</script>
	
	<?php 
}else{
	header("location:../index.php");
}
?>