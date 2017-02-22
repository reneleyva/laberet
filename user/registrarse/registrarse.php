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
		header("location: .?attempt=1");
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
		header("location: ../../");
		exit();
	}
	$_SESSION['name'] = $nombre;
	$_SESSION['guest'] = False;
	$sql = "SELECT idUsuario FROM Usuario Where correo = '".$correo."';";
	$result = $pdo->query($sql);
	$row = $result->fetch();
	$_SESSION['id'] = $row;
?>