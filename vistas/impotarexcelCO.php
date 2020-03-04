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
					<a class="btn btn-default" href="clientesconcrud.php">Registrar Clientes</a>
					<a class="btn btn-default" href="impotarexcelCO.php">Importar Excel</a>
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
			echo  "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 12px;color: #000000; font-weight: bold;' <b>Contacto</b></td> \n";
			echo  "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 12px;color: #000000; font-weight: bold;' <b>Teléfono</b></td> \n";
			echo  "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 12px;color: #000000; font-weight: bold;' <b>Celular</b></td> \n";
			echo  "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 12px;color: #000000; font-weight: bold;' <b>Email 1</b></td> \n";
			echo  "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 12px;color: #000000; font-weight: bold;' <b>Email 2</b></td> \n";
			echo  "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 12px;color: #000000; font-weight: bold;' <b>Observaciones al contacto</b></td> \n";
			echo  "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 12px;color: #000000; font-weight: bold;' <b>Fecha de Inicio</b></td> \n";
			echo  "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 12px;color: #000000; font-weight: bold;' <b>Fecha Fin</b></td> \n";
			echo  "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 12px;color: #000000; font-weight: bold;' <b>Contraseña KEY</b></td> \n";
			echo  "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 12px;color: #000000; font-weight: bold;' <b>Contraseña CER</b></td> \n";

			for ($i=5; $i <= 35; $i++) { 

				$rfc = $objPHPExcel->getActiveSheet ()->getCell('B'.$i)->getCalculatedValue();
				$contacto= $objPHPExcel->getActiveSheet ()->getCell('C'.$i)->getCalculatedValue();
				$telefono = $objPHPExcel->getActiveSheet ()->getCell('D'.$i)->getCalculatedValue();
				$celular = $objPHPExcel->getActiveSheet ()->getCell('E'.$i)->getCalculatedValue();
				$email1 = $objPHPExcel->getActiveSheet ()->getCell('F'.$i)->getCalculatedValue();
				$email2 = $objPHPExcel->getActiveSheet ()->getCell('G'.$i)->getCalculatedValue();
				$obs = $objPHPExcel->getActiveSheet ()->getCell('H'.$i)->getCalculatedValue();
				$fechai = $objPHPExcel->getActiveSheet ()->getCell('I'.$i)->getCalculatedValue();
				$fechaf = $objPHPExcel->getActiveSheet ()->getCell('J'.$i)->getCalculatedValue();
				$contrakey = $objPHPExcel->getActiveSheet ()->getCell('K'.$i)->getCalculatedValue();
				$contracer = $objPHPExcel->getActiveSheet ()->getCell('L'.$i)->getCalculatedValue();


				echo '<tr>';
				echo "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 10px;color: #000000; font-weight: bold;'>".$rfc."</td>";
				echo "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 10px;color: #000000; font-weight: bold;'>".$contacto."</td>";
				echo "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 10px;color: #000000; font-weight: bold;'>".$telefono."</td>";
				echo "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 10px;color: #000000; font-weight: bold;'>".$celular."</td>";
				echo "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 10px;color: #000000; font-weight: bold;'>".$email1."</td>";
				echo "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 10px;color: #000000; font-weight: bold;'>".$email2."</td>";
				echo "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 10px;color: #000000; font-weight: bold;'>".$obs."</td>";
				echo "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 10px;color: #000000; font-weight: bold;'>".$fechai."</td>";
				echo "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 10px;color: #000000; font-weight: bold;'>".$fechaf."</td>";
				echo "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 10px;color: #000000; font-weight: bold;'>".$contrakey."</td>";
				echo "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 10px;color: #000000; font-weight: bold;'>".$contracer."</td>";
				echo '</tr>';

				$sql = "INSERT INTO cliente_envio (CLIENTE_CG_RFC,CLIENTE_CON_NOMBRE,CLIENTE_CON_TELEFONO,CLIENTE_CON_CELULAR,CLIENTE_CON_EMAIL_UNO,CLIENTE_CON_EMAIL_DOS,CLIENTE_CON_OBSERVACIONES,CLIENTE_CON_FECHA_INICIO,CLIENTE_CON_FECHA_FIN,CLIENTE_CON_CONTRASEÑA_KEY,CLIENTE_CON_CONTRASEÑA_CER) VALUES 
				('$rfc','$contacto','$telefono','$celular','$email1','$email2','$obs','$fechai','$fechaf','$contrakey','$contracer')";

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
			document.getElementById("op15").style.background='#3498DB';
		}
</script>
<?php 
}else{
	header("location:../index.php");
}
?>