<?php
if (!isset($_SESSION['usuario'])) {
	header('Location: login.php');
}

require_once  'funciones.php';

// try {
// 	$conexion = new PDO('mysql:host=us-cdbr-east-04.cleardb.com;dbname=heroku_dac2725609cda16', 'b0cf9691cfb528', 'b1c76ddc');
// } catch (PDOException $e) {
// 	echo "ERROR: " . $e->getMessage();
// 	die();
// }
$datos = [];
$datos = $_SESSION['resultado'];

$id_usuario = $datos["id"];
$rol = $datos["Roll"];

// $usuario = obtener_tipo_usuario($conexion, $id_usuario);

// if (!$usuario) {
// 	header('Location: login.php');
// }

// $usuario = $usuario[0];

// $rol = $usuario["Roll"];

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>CenterMedicine</title>
	<link rel="stylesheet" href="css/estilos.css">
	<link href="https://fonts.googleapis.com/css?family=Antic" rel="stylesheet">
	<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
	<link rel="icon" type="image/x-icon" href="img/favicon.png">
</head>

<body>
	<header>
		<div class="wrapp">
			<?php
			if ($rol == "cliente") { ?>
				<aside class="aside_front">
					<div class="widget">
					
						<a href="#" title="Institucion">Institucion</a>


						<a href="#" title="Servicios">Servicios</a>
						<a href="#" title="Citas">Citas</a>
						<a href="#" title="Noticias">Noticias</a>

						<a href="#" title="Galeria">Galeria</a>
						<a href="#" title="Normatividad">Normatividad</a>
						<a href="#" title="Encuentranos">Encuentranos</a>
						<a href="#" title="Reclamos">Reclamos</a>
					</div>
				</aside>
			<?php } else if ($rol == "admin") { ?>

				<a href="index.php" title="CenterMedicine">Centro<a class="bordes" href="index.php" title="Centro Medicine">Medico</a><span>V1</span></a>
				
			<?php } ?>


			<div class="usuario">
					<a href="cerrar.php" title="Cerrar Sesion"> Salir</a>
				</div>

		</div>
	</header>