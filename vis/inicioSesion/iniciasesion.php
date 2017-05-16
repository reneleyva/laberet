<?php 
	include '../../conexion.php';
	$correo = $_POST['correo'];
	$pass = $_POST['password'];
	$pass = md5($pass."pene"."teamojazteamolunateamoandrea");
	$sql = "SELECT * From Usuario WHERE correo = '".$correo."' AND password = '".$pass."';";
	$result = $pdo->query($sql);
	$row = $result->fetch();

	if(!$row)
	{
		//Revisar si es Libreria.
		$sql = "SELECT * From Administrador WHERE nombreUsuario = '".$correo."' AND password = '".$pass."';";
		$result = $pdo->query($sql);
		$row = $result->fetch();

		if (!$row) {
			header("location: .?correo=".$correo."");
			exit();
		} else {
			//ES LIBRERIA
			session_start();
			$_SESSION['nombre'] = $correo;
			$_SESSION['type'] = "libreria"; //Tipo usuario
			$_SESSION['id'] = $row['idLibreria'];
			header("location: ../../libreria/home"); 
			exit();
		}
	}
	else
	{
		session_start();
		$_SESSION['nombre'] = $row['nombre'];
		$_SESSION['type'] = "user"; //Tipo usuario
		$_SESSION['cart'] = array();
		$_SESSION['id'] = $row['idUsuario'];
		$_SESSION['first'] = True; //Primera vez iniciando sesión;
		if(isset($_GET['idLibro'])) {
			header("location: ../infoLibro/?id=".$_GET['idLibro']); 
		} else {
			header("location: ../../libreria/home"); 
		}
		exit();
	}
?>