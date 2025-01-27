<?php session_start();

if (isset($_SESSION['usuario'])){
	header('Location: index.php');
}

if($_SERVER['REQUEST_METHOD']=='POST'){
	$usuario = filter_var(strtolower($_POST['usuario']),FILTER_SANITIZE_STRING);
	$password = $_POST['password'];
	$password = hash('sha512', $password);
	$errores ='';	
	try{
		$conexion = new PDO('mysql:host=us-cdbr-east-04.cleardb.com;dbname=heroku_dac2725609cda16','b0cf9691cfb528','b1c76ddc');
	}catch(PDOException $e){
		echo "Error: ". $e->getMessage();
	}
	$statement = $conexion -> prepare(
			'SELECT * FROM usuarios WHERE usuario = :usuario AND pass= :password');

	$statement ->execute(array(':usuario'=> $usuario,':password'=> $password));

	$resultado = $statement->fetch();
	if($resultado !==false){
		$_SESSION['usuario'] = $usuario;
		$_SESSION['resultado'] = $resultado;
		header('Location: index.php');
	}else{
		$errores .= 'Datos incorrectos y/o invalidos!';
	}
}
	require 'vista/login.php';
?>