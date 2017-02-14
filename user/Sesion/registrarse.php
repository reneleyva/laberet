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
		echo "404";
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
?>