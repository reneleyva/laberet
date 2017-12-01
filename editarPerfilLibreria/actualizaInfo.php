<?php 
	include '../conexion.php';
	session_start(); 

	$id = $_SESSION['id'];

	$nombre = $_POST['nombre'];
	$direccion = $_POST['direccion'];
	$correo = $_POST['correo'];
	$password = $_POST['password'];
	$password = md5($password."teamolizzteamoluz");

	$sql = "UPDATE libreria SET 
			nombre='".$nombre."',
			direccion='".$direccion."',
			correo='".$correo."'
			WHERE idLibreria=".$id." ;";

	mysqli_query($con, $sql);

	$sql = "UPDATE administradorlibreria SET 
			password='".$password."' 
			WHERE idLibreria =".$id.";";

	mysqli_query($con, $sql);
	header("Location: .");
	exit();

?> 