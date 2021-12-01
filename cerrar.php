<?php session_start();

if (!isset($_SESSION['usuario'])) {
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

disconnect($conexion);
session_destroy();

$_SESSION = array();
header('Location: login.php');
die();

?>