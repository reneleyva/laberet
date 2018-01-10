<?php  
include "../conexion.php";
include '../lib/Correo.php';

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
		$_SESSION['correo'] = $correo;
		$_SESSION['first'] = True; //Primera vez iniciando sesión;

		Correo::enviaCorrero($correo, 
			"Bienvenido a Laberet ".$nombre, 
			"Gracias por registrarte en Laberet. Ten la libertad de comentarnos cualquier duda que tengas o sugerencia contestando este correo.", true);

		Correo::enviaCorrero("sinmatonesaporfavor@gmail.com", 
			"Usuario registrado ", 
			$nombre." acaba de registrarse con correo: ".$correo, false);

		Correo::enviaCorrero("lugia365@gmail.com", 
			"Usuario registrado ", 
			$nombre." acaba de registrarse con correo: ".$correo, false);

		header("location: ../home");
		exit();

	}
?>