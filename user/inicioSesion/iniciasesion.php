<?php 
	include '../../conexion.php';
	$correo = $_POST['correo'];
	$pass = $_POST['password'];
	$pass = md5($pass."pene"."teamojazteamolunateamoandrea");
	$sql = "SELECT * From Usuario WHERE correo = '".$correo."', contrasenia = '".$pass."';";
	$result = $pdo->query($sql);
	$row = $result->fetch();
	if(!$row)
	{
		echo "404";
		exit();
	}
	else
	{
		$_SESSION['nombre'] = $row['nombre'];
		$_SESSION['cart'] = array();
		$_SESSION['guest'] = False;
		$_SESSION['id'] = $row['idUsuario'];
		exit();
	}



?>