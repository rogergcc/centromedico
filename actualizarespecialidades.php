<?php session_start();
	if(!isset($_SESSION['usuario'])){
	header('Location: login.php');
	}
	
	require_once  'funciones.php';
	
	try{
		$conexion = new PDO('mysql:host=us-cdbr-east-04.cleardb.com;dbname=heroku_dac2725609cda16','b0cf9691cfb528','b1c76ddc');
	}catch(PDOException $e){
		echo "ERROR: " . $e->getMessage();
		die();
	}
	
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$id = limpiarDatos($_POST['id']);
		$nombres = limpiarDatos($_POST['nombre']);
		
		$statement = $conexion->prepare(
		"UPDATE especialidades SET 
		espNombre =:nombres
        WHERE idespecialidad = :id");

		$statement ->execute(array(':id'=>$id, ':nombres'=>$nombres));
        header('Location: especialidades.php');
	}else{
		$id_especialidad = id_numeros($_GET['idespecialidad']);
		if(empty($id_especialidad)){
			header('Location: especialidades.php');
		}
		$especialidad = obtener_especialidad_id($conexion,$id_especialidad);
		
		if(!$especialidad){
			header('Location: especialidades.php');
		}
		$especialidad =$especialidad[0];
	}
	require 'vista/actualizarespecialidades_vista.php';
?>