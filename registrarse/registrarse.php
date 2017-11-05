<?php  
include "../conexion.php";

	$pass = md5($_POST['password']."teamolizzteamoluz");
	$correo = $_POST['correo'];
	$nombre = $_POST['nombre'];

	$sql = "SELECT * FROM usuario WHERE correo = '".$correo."';";
	$query = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($query);
	if ($row) {
		//Ya hay una cuenta asociada con este usaurio
		header("location: .?nombre=".$nombre."&correo=".$correo."");
		exit();
		
	} else {
		// Prueba para enviar un correo de confirmación
		// Mensaje a enviar
		// $msg = "Test mandando correo";
		// $msg = wordwrap($msg, 70);
		// $header = 'From: luispuli2@ciencias.unam.mx';
		// mail($correo,"Confirmación",$msg,$header);
		// $msg = wordwrap($msg,70);
		// $headers = 'From: lugia365@gmail.com' . "\r\n" .
  //          'Reply-To: lugia365@gmail.com' . "\r\n" .
  //          'X-Mailer: PHP/' . phpversion();
		// mail($correo,"Confirmación",$msg,$headers);
		// echo "Exito, perro";
		
		$sql = "INSERT INTO usuario SET
		nombre ='".$nombre."',
		correo ='".$correo."',
		password ='".$pass."';";
		$res = mysqli_query($con, $sql); 
		if (!$res) {
			exit();
		}

		session_start();
		$_SESSION['nombre'] = $nombre;
		$_SESSION['tipo'] = 'usuario';
		$sql = "SELECT idUsuario FROM usuario Where correo = '".$correo."';";
		$query = mysqli_query($con, $sql);
		$row = mysqli_fetch_array($query);
		$_SESSION['id'] = $row['idUsuario'];
		$_SESSION['carrito'] = array();
		$_SESSION['first'] = True; //Primera vez iniciando sesión;
		header("location: ../user/home");
		exit();

	}
?>