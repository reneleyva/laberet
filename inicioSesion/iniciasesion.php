<?php 
	include '../conexion.php';
	$correo = $_POST['correo'];
	$pass = $_POST['password'];
	$pass = md5($pass."teamolizzteamoluz");
	$sql = "SELECT * From usuario WHERE correo = '".$correo."' AND password = '".$pass."';";
	$query = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($query);

	if(!$row) {
		//Revisar si es Libreria.
		$sql = "SELECT * From administradorlibreria WHERE nombreUsuario = '".$correo."' AND password = '".$pass."';";
		$query = mysqli_query($con, $sql);
		$row = mysqli_fetch_array($query);

		// Intentar con administrador.
		if (!$row) {
			$sql = "SELECT * From administrador WHERE nombreUsuario = '".$correo."' AND password = '".$pass."';";
			$query = mysqli_query($con, $sql);
			$row = mysqli_fetch_array($query);
			if ($row) {
				// ES ADMINISTRADOR
				session_start();
				$_SESSION['nombre'] = $correo;
				$_SESSION['tipo'] = "admin"; //Tipo usuario
				$_SESSION['id'] = $row['id'];	
				header("location: ../admin/");
				echo "Eres Administrador"; 
				exit();
			} else {
				header("location: .?correo=".$correo."");
				exit();
			}
		} else {
			//ES LIBRERIA
			session_start();
			$_SESSION['nombre'] = $correo;
			$_SESSION['tipo'] = "libreria"; //Tipo usuario
			$_SESSION['id'] = $row['idLibreria'];
			$_SESSION['correo'] = $correo;
			header("location: ../homeLibreria/"); 
			exit();
		}
	} else {
		//EXITO!
		session_start();
		$_SESSION['nombre'] = $row['nombre'];
		$_SESSION['tipo'] = "usuario"; //Tipo usuario
		$_SESSION['carrito'] = array();
		$_SESSION['id'] = $row['idUsuario'];
		$_SESSION['correo'] = $correo;
		$_SESSION['first'] = True; //Primera vez iniciando sesión;	
		if(isset($_REQUEST['idLibro'])) {
			include_once '../lib/Libro.php';
			$idLibro = $_REQUEST['idLibro']; 
			//Viene desde infoLibro, agrego el libro a carrito 
			$book = Libro::getLibro($idLibro);
			$_SESSION['carrito'][$idLibro] = $book;
			header("location: ../infoLibro/?id=".$_REQUEST['idLibro']); 

		} else {
			header("location: ../home"); 
		}
		exit();
	}
?>