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
		"UPDATE consultorios SET
		conNombre = :nombres
		WHERE idConsultorio =:id");

		$statement ->execute(array(
			':id'=>$id,
			':nombres'=>$nombres
			));
        header('Location: consultorios.php');
	}else{
		$id_consultorio = id_numeros($_GET['idConsultorio']);
		if(empty($id_consultorio)){
			header('Location: consultorios.php');
		}
		$consultorio = obtener_consultorio_id($conexion,$id_consultorio);
		
		if(!$consultorio){
			header('Location: consultorios.php');
		}
		$consultorio =$consultorio[0];
	}
	require 'vista/actualizarconsultorio_vista.php';
?>