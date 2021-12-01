<?php
if (!isset($_SESSION['usuario'])) {
	header('Location: login.php');
}


$datos = [];
$datos = $_SESSION['resultado'];

$id_usuario = $datos["id"];
$roll = $datos["Roll"];


?>

<?php include 'plantillas/header.php'; ?>
	<section class="main">
		<div class="wrapp">

			<?php 
				if ($rol == "admin") {
				include 'plantillas/nav.php';
				}
			 ?>
			
				<article>
					<div class="mensaje">
						<h2>Sistema de Gestion de Centro Medico</h2>
					</div>
						<p><img src="img/icono.svg">
						</p><br/><br/>
						<p>Bienvenido a <b>CenterMedicine</b>! un Sistema de Citas Medicas util para consultorios medicos y/o medicos independientes.</p>
						<br/><br/>
						<h3>Nuestras funciones</h3><br/>
						<p>	- Gestion de Citas <br/>
							- Gestion de Medicos <br/>
							- Gestion de Pacientes <br/>
							- Gestion de Consultorios <br/>
							- Gestion de Usuarios con Acceso al Sistema <br/>
						</p>
				</article>
	</section>
	<?php include 'plantillas/footer.php'; ?>
</body>
</html>