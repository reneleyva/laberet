<?php 
	include '../../conexion.php';
	$correo = $_POST['correo'];
	$pass = $_POST['password'];
	$pass = md5($pass."pene"."teamojazteamolunateamoandrea");
	$sql = "SELECT * From Usuario WHERE correo = '".$correo."' AND contrasenia = '".$pass."';";
	$result = $pdo->query($sql);
	$row = $result->fetch();
	echo $row['contrasenia'];
	if(!$row)
	{
		header("location: .?correo=".$correo."");
		exit();
	}
	else
	{
		session_start();
		$_SESSION['nombre'] = $row['nombre'];
		$_SESSION['cart'] = array();
		$_SESSION['id'] = $row['idUsuario'];
		header("location: ../home"); 
		exit();
	}
?>