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
					<a class="btn btn-default" href="clientesccrud.php">Registrar Clientes</a>
					<a class="btn btn-default" href="impotarexcelC.php">Importar Excel</a>
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
			echo  "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 12px;color: #000000; font-weight: bold;' <b>Descuento</b></td> \n";
			echo  "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 12px;color: #000000; font-weight: bold;' <b>Tasa Iva.</b></td> \n";
			echo  "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 12px;color: #000000; font-weight: bold;' <b>Tasa Ret. IVA</b></td> \n";
			echo  "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 12px;color: #000000; font-weight: bold;' <b>Tasa Ret. ISR</b></td> \n";
			echo  "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 12px;color: #000000; font-weight: bold;' <b>Tasa Ret. IEPS</b></td> \n";
			echo  "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 12px;color: #000000; font-weight: bold;' <b>Imp. Locales</b></td> \n";
			echo  "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 12px;color: #000000; font-weight: bold;' <b>Agenda</b></td> \n";
			echo  "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 12px;color: #000000; font-weight: bold;' <b>Complemento</b></td> \n";

			for ($i=5; $i <= 35; $i++) { 

				$rfc = $objPHPExcel->getActiveSheet ()->getCell('B'.$i)->getCalculatedValue();
				$descuento= $objPHPExcel->getActiveSheet ()->getCell('C'.$i)->getCalculatedValue();
				$tasaiva = $objPHPExcel->getActiveSheet ()->getCell('D'.$i)->getCalculatedValue();
				$tasaretiva = $objPHPExcel->getActiveSheet ()->getCell('E'.$i)->getCalculatedValue();
				$tasaretisr = $objPHPExcel->getActiveSheet ()->getCell('F'.$i)->getCalculatedValue();
				$tasaretieps = $objPHPExcel->getActiveSheet ()->getCell('G'.$i)->getCalculatedValue();
				$implocales = $objPHPExcel->getActiveSheet ()->getCell('H'.$i)->getCalculatedValue();
				$agenda = $objPHPExcel->getActiveSheet ()->getCell('I'.$i)->getCalculatedValue();
				$complemento = $objPHPExcel->getActiveSheet ()->getCell('J'.$i)->getCalculatedValue();


				echo '<tr>';
				echo "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 10px;color: #000000; font-weight: bold;'>".$rfc."</td>";
				echo "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 10px;color: #000000; font-weight: bold;'>".$descuento."</td>";
				echo "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 10px;color: #000000; font-weight: bold;'>".$tasaiva."</td>";
				echo "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 10px;color: #000000; font-weight: bold;'>".$tasaretiva."</td>";
				echo "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 10px;color: #000000; font-weight: bold;'>".$tasaretisr."</td>";
				echo "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 10px;color: #000000; font-weight: bold;'>".$tasaretieps."</td>";
				echo "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 10px;color: #000000; font-weight: bold;'>".$implocales."</td>";
				echo "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 10px;color: #000000; font-weight: bold;'>".$agenda."</td>";
				echo "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 10px;color: #000000; font-weight: bold;'>".$complemento."</td>";
				echo '</tr>';

				$sql = "INSERT INTO cliente_comerciales (CLIENTE_CG_RFC,CLIENTE_CO_DESCUENTO_UNO,CLIENTE_CO_TASA_IVA,CLIENTE_CO_TASA_RET_IVA,CLIENTE_CO_TASA_RET_ISR,CLIENTE_CO_TASA_RET_IEPS,CLIENTE_CO_IMP_LOCALES,CLIENTE_CO_AGENDA,CLIENTE_CO_COMPLEMENTO) VALUES 
				('$rfc','$descuento','$tasaiva','$tasaretiva','$tasaretisr','$tasaretieps','$implocales','$agenda','$complemento')";

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
			document.getElementById("op14").style.background='#3498DB';
		}
</script>
<?php 
}else{
	header("location:../index.php");
}
?>