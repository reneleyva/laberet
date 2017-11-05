<?php 
	include '../conexion.php';
	$correo = $_POST['correo'];
	$pass = $_POST['password'];
	$pass = md5($pass."teamolizzteamoluz");
	$sql = "SELECT * From usuario WHERE correo = '".$correo."' AND password = '".$pass."';";
	$query = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($query);

	if(!$row)
	{
		//Revisar si es Libreria.
		$sql = "SELECT * From administradorLibreria WHERE nombreUsuario = '".$correo."' AND password = '".$pass."';";
		$query = mysqli_query($con, $sql);
		$row = mysqli_fetch_array($query);

		if (!$row) {
			header("location: .?correo=".$correo."");
			exit();
		} else {
			//ES LIBRERIA
			session_start();
			$_SESSION['nombre'] = $correo;
			$_SESSION['tipo'] = "libreria"; //Tipo usuario
			$_SESSION['id'] = $row['idLibreria'];
			header("location: ../libreria/home"); 
			exit();
		}
	} else {
		session_start();
		$_SESSION['nombre'] = $row['nombre'];
		$_SESSION['tipo'] = "usuario"; //Tipo usuario
		$_SESSION['carrito'] = array();
		$_SESSION['id'] = $row['idUsuario'];
		$_SESSION['first'] = True; //Primera vez iniciando sesión;
		if(isset($_GET['idLibro'])) {
			header("location: ../infoLibro/?id=".$_GET['idLibro']); 
		} else {
			header("location: ../home"); 
		}
		exit();
	}
?>