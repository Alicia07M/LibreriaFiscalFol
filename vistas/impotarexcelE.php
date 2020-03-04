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
					<a class="btn btn-default" href="clientesecrud.php">Registrar Clientes</a>
					<a class="btn btn-default" href="impotarexcelE.php">Importar Excel</a>
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
			echo  "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 12px;color: #000000; font-weight: bold;' <b>Calle de Envio</b></td> \n";
			echo  "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 12px;color: #000000; font-weight: bold;' <b>No. Ext.</b></td> \n";
			echo  "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 12px;color: #000000; font-weight: bold;' <b>No. Int.</b></td> \n";
			echo  "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 12px;color: #000000; font-weight: bold;' <b>Colonia</b></td> \n";
			echo  "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 12px;color: #000000; font-weight: bold;' <b>Localidad</b></td> \n";
			echo  "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 12px;color: #000000; font-weight: bold;' <b>Municipio</b></td> \n";
			echo  "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 12px;color: #000000; font-weight: bold;' <b>C.P.</b></td> \n";
			echo  "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 12px;color: #000000; font-weight: bold;' <b>Ent. Fed.</b></td> \n";
			echo  "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 12px;color: #000000; font-weight: bold;' <b>País</b></td> \n";
			echo  "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 12px;color: #000000; font-weight: bold;' <b>Teléfono</b></td> \n";
			echo  "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 12px;color: #000000; font-weight: bold;' <b>Celular</b></td> \n";
			echo  "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 12px;color: #000000; font-weight: bold;' <b>Observaciones</b></td> \n";

			for ($i=5; $i <= 35; $i++) { 

				$rfc = $objPHPExcel->getActiveSheet ()->getCell('B'.$i)->getCalculatedValue();
				$calle= $objPHPExcel->getActiveSheet ()->getCell('C'.$i)->getCalculatedValue();
				$noext = $objPHPExcel->getActiveSheet ()->getCell('D'.$i)->getCalculatedValue();
				$noint = $objPHPExcel->getActiveSheet ()->getCell('E'.$i)->getCalculatedValue();
				$colonia = $objPHPExcel->getActiveSheet ()->getCell('F'.$i)->getCalculatedValue();
				$localidad = $objPHPExcel->getActiveSheet ()->getCell('G'.$i)->getCalculatedValue();
				$municipio = $objPHPExcel->getActiveSheet ()->getCell('H'.$i)->getCalculatedValue();
				$codigo = $objPHPExcel->getActiveSheet ()->getCell('I'.$i)->getCalculatedValue();
				$entfed = $objPHPExcel->getActiveSheet ()->getCell('J'.$i)->getCalculatedValue();
				$pais = $objPHPExcel->getActiveSheet ()->getCell('I'.$i)->getCalculatedValue();
				$telefono = $objPHPExcel->getActiveSheet ()->getCell('J'.$i)->getCalculatedValue();
				$celular = $objPHPExcel->getActiveSheet ()->getCell('I'.$i)->getCalculatedValue();
				$obs = $objPHPExcel->getActiveSheet ()->getCell('J'.$i)->getCalculatedValue();


				echo '<tr>';
				echo "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 10px;color: #000000; font-weight: bold;'>".$rfc."</td>";
				echo "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 10px;color: #000000; font-weight: bold;'>".$calle."</td>";
				echo "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 10px;color: #000000; font-weight: bold;'>".$noext."</td>";
				echo "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 10px;color: #000000; font-weight: bold;'>".$noint."</td>";
				echo "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 10px;color: #000000; font-weight: bold;'>".$colonia."</td>";
				echo "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 10px;color: #000000; font-weight: bold;'>".$localidad."</td>";
				echo "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 10px;color: #000000; font-weight: bold;'>".$municipio."</td>";
				echo "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 10px;color: #000000; font-weight: bold;'>".$codigo."</td>";
				echo "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 10px;color: #000000; font-weight: bold;'>".$entfed."</td>";
				echo "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 10px;color: #000000; font-weight: bold;'>".$pais."</td>";
				echo "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 10px;color: #000000; font-weight: bold;'>".$telefono."</td>";
				echo "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 10px;color: #000000; font-weight: bold;'>".$celular."</td>";
				echo "<td style='font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 10px;color: #000000; font-weight: bold;'>".$obs."</td>";
				echo '</tr>';

				$sql = "INSERT INTO cliente_fiscales (CLIENTE_CG_RFC,CLIENTE_CE_CALLE,CLIENTE_CE_NUMERO_EXTERIOR,CLIENTE_CE_NUMERO_INTERIOR,CLIENTE_CE_COLONIA,CLIENTE_CE_LOCALIDAD,CLIENTE_CE_MUNICIPIO,CLIENTE_CE_CODIGO_POSTAL,CLIENTE_CE_ENTIDAD,CLIENTE_CE_PAIS,CLIENTE_CE_TELEFONO,CLIENTE_CE_CELULAR,CLIENTE_CE_OBSERVACIONES) VALUES('$rfc','$calle','$noext','$noint','$colonia','$localidad','$municipio','$codigo','$entfed','$pais','$telefono','$celular','$obs')";

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
			document.getElementById("op16").style.background='#3498DB';
		}
</script>
<?php 
}else{
	header("location:../index.php");
}
?>