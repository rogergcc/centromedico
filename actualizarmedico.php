<?php session_start();
	if(!isset($_SESSION['usuario'])){
	header('Location: login.php');
	}
	
	require_once  'funciones.php';
	
	try{
		// $conexion = new PDO('mysql:host=us-cdbr-east-04.cleardb.com;dbname=heroku_dac2725609cda16','b0cf9691cfb528','b1c76ddc');
		$conexion = conexion();
	}catch(Exception $e){
		echo "ERROR: " . $e->getMessage();
		die();
	}
	
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$id = limpiarDatos($_POST['id']);
		$identificacion = limpiarDatos($_POST['identificacion']);
		$nombres = limpiarDatos($_POST['nombres']);
		$apellidos = limpiarDatos($_POST['apellidos']);
		$correo = limpiarDatos($_POST['correo']);
		$telefono = limpiarDatos($_POST['telefono']);
		$especialidad = limpiarDatos($_POST['especialidad']);
		
		$statement = $conexion->prepare(
		"UPDATE medicos
        SET medidentificacion = :identificacion, 
		mednombres =:nombres, 
		medapellidos =:apellidos, 
		medEspecialidad =:especialidad, 
		medtelefono =:telefono, 
		medcorreo =:correo 
		WHERE idMedico = :id");

		$statement ->execute(array(
        ':identificacion'=>$identificacion, 
		':nombres'=>$nombres, 
		':apellidos'=>$apellidos, 
		':especialidad'=>$especialidad, 
		':telefono'=>$telefono, 
		':correo'=>$correo,
        ':id'=> $id
        ));
        header('Location: medicos.php');
	}else{
		$id_medico = id_numeros($_GET['idMedico']);
		if(empty($id_medico)){
			header('Location: medicos.php');
		}
		$medico = obtener_medico_id($conexion,$id_medico);
		
		if(!$medico){
			header('Location: medicos.php');
		}
		$medico =$medico[0];
	}
	require 'vista/actulizarmedico_vista.php';
?>