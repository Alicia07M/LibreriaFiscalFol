<?php 
session_start();
if (isset($_SESSION['usuario'])) {
	?>
<!DOCTYPE html>
<html>
<head>
	<title>Importacion de Archivos Excels</title>
	<?php require_once "menu.php" ?>
</head>
<body>
	<div class="container">
		<div class="row">
		<div class="col-sm-12">
					<a class="btn btn-default" href="clientesgcrud.php">Registrar Clientes</a>
					<a class="btn btn-default" href="impotarexcelG.php">Importar Excel</a>
				</div>
				</div>
		<br><br>
		<h2 align="center">Sistema Interno Librería Fiscal Fol</h2>
		<br>
		<div class="row">
			<p>
				<div align="center">
					<form method="post" action="" enctype="multipart/form-data">
						<input type="file" name="excel" data-buttonText="Seleccione el Archivo" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
						<br><br>
						<input type="submit" name="enviar" action="">
					</form>
				</div>
			</p>
		</div>
	</div>
	<?php
	if (isset($_POST['enviar'])) {
		


		$archivo = $_FILES['excel']['name'];
		$archivocopi = $_FILES['excel']['tmp_name'];
		$archivog = "".$archivo;

		if (copy($archivocopi, $archivog)) {

			if (file_exists($archivog)) {
			}else{
			}
			require 'PHPExcel/Classes/PHPExcel/IOFactory.php ';
			require_once 'conexion.php';

			$objPHPExcel = PHPExcel_IOFactory::load($archivog);
			$objPHPExcel->setActiveSheetIndex(0);
			//$numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();

			echo '<br>';

			echo '<center><table border=2>';
			echo  "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 12px;color: #000000; font-weight: bold;' <b>RFC</b></td> \n";
			echo  "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 12px;color: #000000; font-weight: bold;' <b>NOMBRE</b></td> \n";
			echo  "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 12px;color: #000000; font-weight: bold;' <b>TIPO</b></td> \n";
			echo  "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 12px;color: #000000; font-weight: bold;' <b>NOMBRE COMERCIAL</b></td> \n";
			echo  "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 12px;color: #000000; font-weight: bold;' <b>TELEFONO</b></td> \n";
			echo  "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 12px;color: #000000; font-weight: bold;' <b>EMAIL 1</b></td> \n";
			echo  "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 12px;color: #000000; font-weight: bold;' <b>EMAIL 2</b></td> \n";
			echo  "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 12px;color: #000000; font-weight: bold;' <b>CURP</b></td> \n";
			echo  "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 12px;color: #000000; font-weight: bold;' <b>MONEDA</b></td> \n";
			echo  "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 12px;color: #000000; font-weight: bold;' <b>CLASIFICACION</b></td> \n";
			echo  "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 12px;color: #000000; font-weight: bold;' <b>FECHA ALTA</b></td> \n";
			echo  "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 12px;color: #000000; font-weight: bold;' <b>OBSERVACIONES</b></td> \n";

			for ($i=5; $i <= 35; $i++) { 

				$rfc = $objPHPExcel->getActiveSheet ()->getCell('B'.$i)->getCalculatedValue();
				$nombre= $objPHPExcel->getActiveSheet ()->getCell('C'.$i)->getCalculatedValue();
				$tipo = $objPHPExcel->getActiveSheet ()->getCell('D'.$i)->getCalculatedValue();
				$nombrec = $objPHPExcel->getActiveSheet ()->getCell('E'.$i)->getCalculatedValue();
				$telefono = $objPHPExcel->getActiveSheet ()->getCell('F'.$i)->getCalculatedValue();
				$emailu = $objPHPExcel->getActiveSheet ()->getCell('G'.$i)->getCalculatedValue();
				$emaild = $objPHPExcel->getActiveSheet ()->getCell('H'.$i)->getCalculatedValue();
				$curp = $objPHPExcel->getActiveSheet ()->getCell('I'.$i)->getCalculatedValue();
				$moneda = $objPHPExcel->getActiveSheet ()->getCell('J'.$i)->getCalculatedValue();
				$clasificacion = $objPHPExcel->getActiveSheet ()->getCell('K'.$i)->getCalculatedValue();
				$fecha = $objPHPExcel->getActiveSheet ()->getCell('L'.$i)->getCalculatedValue();
				$obs = $objPHPExcel->getActiveSheet ()->getCell('M'.$i)->getCalculatedValue();


				echo '<tr>';
				echo "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 10px;color: #000000; font-weight: bold;'>".$rfc."</td>";
				echo "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 10px;color: #000000; font-weight: bold;'>".$nombre."</td>";
				echo "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 10px;color: #000000; font-weight: bold;'>".$tipo."</td>";
				echo "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 10px;color: #000000; font-weight: bold;'>".$nombrec."</td>";
				echo "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 10px;color: #000000; font-weight: bold;'>".$telefono."</td>";
				echo "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 10px;color: #000000; font-weight: bold;'>".$emailu."</td>";
				echo "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 10px;color: #000000; font-weight: bold;'>".$emaild."</td>";
				echo "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 10px;color: #000000; font-weight: bold;'>".$curp."</td>";
				echo "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 10px;color: #000000; font-weight: bold;'>".$moneda."</td>";
				echo "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 10px;color: #000000; font-weight: bold;'>".$clasificacion."</td>";
				echo "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 10px;color: #000000; font-weight: bold;'>".$fecha."</td>";
				echo "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 10px;color: #000000; font-weight: bold;'>".$obs."</td>";
				echo '</tr>';

				$sql = "INSERT INTO cliente_general (CLIENTE_CG_RFC,CLIENTE_CG_NOMBRE,CLIENTE_CG_TIPO,CLIENTE_CG_NOMBRE_COMERCIAL,CLIENTE_CG_TELEFONO,CLIENTE_CG_EMAIL_UNO,CLIENTE_CG_EMAIL_DOS,CLIENTE_CG_CURP,CLIENTE_CG_MONEDA,CLINETE_CG_CLASIFICACION,CLIENTE_CG_FECHA_ALTA,CLIENTE_CG_OBSERVACIONES) VALUES('$rfc','$nombre','$tipo','$nombrec','$telefono','$emailu','$emaild','$curp','$moneda','$clasificacion','$fecha','$obs')";

					$resultado = $mysqli->query($sql);

			}
			echo '</table></center>';
		}else{
			echo "¡Desbes cargar el Archivo!";
		}
		unlink($archivog);
	} 
	?>
</body>
</html>
<script type="text/javascript">
		window.onload = function(){
			document.getElementById("op11").style.background='#3498DB';
			document.getElementById("op12").style.background='#3498DB';
		}
</script>
<?php 
}else{
	header("location:../index.php");
}
?>