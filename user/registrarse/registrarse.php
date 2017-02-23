<?php  
include "../../conexion.php";

	$pass = md5($_POST['password']."pene"."teamojazteamolunateamoandrea");
	$correo = $_POST['correo'];
	$nombre = $_POST['nombre'];

	$sql = "SELECT * FROM Usuario WHere correo = '".$correo."';";
	$result = $pdo->query($sql);
	$row = $result->fetch();
	if ($row)
	{
		header("location: .?nombre=".$nombre."&correo=".$correo."");
		exit();
		
	}
	else
	{
		$sql = "INSERT INTO Usuario SET
		nombre ='".$nombre."',
		correo ='".$correo."',
		contrasenia ='".$pass."',
		DireccionidDireccion=1;";
		$s = $pdo->prepare($sql);
		$s->execute();
		
	}

	session_start();
	$_SESSION['nombre'] = $nombre;
	$sql = "SELECT idUsuario FROM Usuario Where correo = '".$correo."';";
	$result = $pdo->query($sql);
	$row = $result->fetch();
	$_SESSION['id'] = $row['idUsuario'];
	$_SESSION['cart'] = array();
	header("location: ../home");
	exit();
?>