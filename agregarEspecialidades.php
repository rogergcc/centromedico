<?php session_start();
if(!isset($_SESSION['usuario'])){
	header('Location: login.php');
}

if($_SERVER['REQUEST_METHOD']=='POST'){
	$nombre = filter_var(strtolower($_POST['nombre']),FILTER_SANITIZE_STRING);
	$mensaje='';
		try{
			$conexion = new PDO('mysql:host=us-cdbr-east-04.cleardb.com;dbname=heroku_dac2725609cda16','b0cf9691cfb528','b1c76ddc');
		}catch(PDOException $e){
			echo "Error: ". $e->getMessage();
			die();
		}

	if($mensaje==''){
		$statement = $conexion->prepare("INSERT INTO especialidades values(null,:nombre)");

		$statement ->execute(array( 
		':nombre'=> $nombre
		));
		header('Location: especialidades.php');
	}
}
require 'vista/agg_especialidades_vista.php';
?>