<?php  
include "../../conexion.php";

	$pass = md5($_POST['password']."pene"."teamojazteamolunateamoandrea");
	$correo = $_POST['correo'];
	$nombre = $_POST['nombre'];

	$sql = "SELECT * FROM Usuario WHere correo = '".$correo."';";
	$result = $pdo->query($sql);
	$row = $result->fetch();
	if ($row) {
		//Ya hay una cuenta asociada con este usaurio
		header("location: .?nombre=".$nombre."&correo=".$correo."");
		exit();
		
	} else {
		// Prueba para enviar un correo de confirmación
		// Mensaje a enviar
		$msg = "Pene de Vannesa\n Te amo Jaz";
		// use wordwrap() if lines are longer than 70 characters
		$msg = wordwrap($msg,70);
		$headers = 'From: lugia365@gmail.com' . "\r\n" .
           'Reply-To: lugia365@gmail.com' . "\r\n" .
           'X-Mailer: PHP/' . phpversion();
		mail($correo,"Confirmación",$msg,$headers);
		echo "Exito, perro";
		/*
		$sql = "INSERT INTO Usuario SET
		nombre ='".$nombre."',
		correo ='".$correo."',
		password ='".$pass."';";
		$s = $pdo->prepare($sql);
		$s->execute();
		*/
	}
	/*
	session_start();
	$_SESSION['nombre'] = $nombre;
	$_SESSION['type'] = 'user';
	$sql = "SELECT idUsuario FROM Usuario Where correo = '".$correo."';";
	$result = $pdo->query($sql);
	$row = $result->fetch();
	$_SESSION['id'] = $row['idUsuario'];
	$_SESSION['cart'] = array();
	header("location: ../../user/home");
	exit();
	*/
?>