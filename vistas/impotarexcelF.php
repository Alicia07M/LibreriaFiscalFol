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
					<a class="btn btn-default" href="clientesfcrud.php">Registrar Clientes</a>
					<a class="btn btn-default" href="impotarexcelF.php">Importar Excel</a>
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
			echo  "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 12px;color: #000000; font-weight: bold;' <b>Calle</b></td> \n";
			echo  "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 12px;color: #000000; font-weight: bold;' <b>No. Ext.</b></td> \n";
			echo  "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 12px;color: #000000; font-weight: bold;' <b>No. Int.</b></td> \n";
			echo  "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 12px;color: #000000; font-weight: bold;' <b>Colonia</b></td> \n";
			echo  "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 12px;color: #000000; font-weight: bold;' <b>Localidad</b></td> \n";
			echo  "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 12px;color: #000000; font-weight: bold;' <b>Municipio o Delegación</b></td> \n";
			echo  "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 12px;color: #000000; font-weight: bold;' <b>C.P.</b></td> \n";
			echo  "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 12px;color: #000000; font-weight: bold;' <b>Ent. Fed.</b></td> \n";

			for ($i=5; $i <= 35; $i++) { 

				$rfc = $objPHPExcel->getActiveSheet ()->getCell('B'.$i)->getCalculatedValue();
				$calle= $objPHPExcel->getActiveSheet ()->getCell('C'.$i)->getCalculatedValue();
				$noext = $objPHPExcel->getActiveSheet ()->getCell('D'.$i)->getCalculatedValue();
				$noint = $objPHPExcel->getActiveSheet ()->getCell('E'.$i)->getCalculatedValue();
				$colonia = $objPHPExcel->getActiveSheet ()->getCell('F'.$i)->getCalculatedValue();
				$localidad = $objPHPExcel->getActiveSheet ()->getCell('G'.$i)->getCalculatedValue();
				$munidel = $objPHPExcel->getActiveSheet ()->getCell('H'.$i)->getCalculatedValue();
				$codigo = $objPHPExcel->getActiveSheet ()->getCell('I'.$i)->getCalculatedValue();
				$entfed = $objPHPExcel->getActiveSheet ()->getCell('J'.$i)->getCalculatedValue();


				echo '<tr>';
				echo "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 10px;color: #000000; font-weight: bold;'>".$rfc."</td>";
				echo "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 10px;color: #000000; font-weight: bold;'>".$calle."</td>";
				echo "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 10px;color: #000000; font-weight: bold;'>".$noext."</td>";
				echo "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 10px;color: #000000; font-weight: bold;'>".$noint."</td>";
				echo "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 10px;color: #000000; font-weight: bold;'>".$colonia."</td>";
				echo "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 10px;color: #000000; font-weight: bold;'>".$localidad."</td>";
				echo "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 10px;color: #000000; font-weight: bold;'>".$munidel."</td>";
				echo "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 10px;color: #000000; font-weight: bold;'>".$codigo."</td>";
				echo "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 10px;color: #000000; font-weight: bold;'>".$entfed."</td>";
				echo '</tr>';

				$sql = "INSERT INTO cliente_fiscales (CLIENTE_CG_RFC,CLIENTE_FIS_CALLE,CLIENTE_FIS_NO_EXT,CLIENTE_FIS_NO_INT,CLIENTE_FIS_COLONIA,CLIENTE_FIS_LOCALIDAD,CLIENTE_FIS_MUNICIPIO,CLIENTE_FIS_CODIGO_POSTAL,CLIENTE_FIS_ENTIDAD_FEDERATIVA) VALUES('$rfc','$calle','$noext','$noint','$colonia','$localidad','$munidel','$codigo','$entfed')";

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
			document.getElementById("op13").style.background='#3498DB';
		}
</script>
<?php 
}else{
	header("location:../index.php");
}
?>