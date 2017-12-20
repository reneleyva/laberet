<?php 
	
	$nombre = $_POST['nombre'];
	$cp = $_POST['cp'];
	$delegacion = $_POST['delegacion'];
	$colonia = $_POST['colonia'];
	$calleYNum = $_POST['calleYNum'];
	$descripcion = $_POST['descripcion'];
	$telefono = $_POST['telefono'];

	include '../conexion.php';	
	session_start();

	$sql = "SELECT 1 from direccion WHERE idUsuario=".$_SESSION['id'].";";
	$query = mysqli_query($con, $sql);
	$res = mysqli_fetch_array($query);

	if (!$res) {
		//NO tiene direccion
		$sql = "INSERT INTO direccion SET
		cp ='".$cp."',
		ciudad ='CDMX',
		delegacion ='".$delegacion."',
		colonia ='".$colonia."',
		calleYnumero ='".$calleYNum."',
		descripcion ='".$descripcion."',
		telefono ='".$telefono."',
		idUsuario =".$_SESSION['id'].";";

		// delegación  falta

		$res = mysqli_query($con, $sql); 

		if (!$res) {
			echo $sql;
			echo "ERROR INSERT";
			exit();
		} else {
			$_SESSION['pago'] = True; 
			// header("Location: comprarCarrito.php");
			header("Location: pago.php");
		}

	} else {
		// YA tiene direccion 
		$sql = "UPDATE direccion SET
			cp ='".$cp."',
			ciudad ='CDMX',
			delegacion ='".$delegacion."',
			colonia ='".$colonia."',
			calleYnumero ='".$calleYNum."',
			descripcion ='".$descripcion."',
			telefono ='".$telefono."'
			WHERE idUsuario= ".$_SESSION['id'].";";

			$res = mysqli_query($con, $sql); 

			if (!$res) {
				echo "ERROR UPDATE";
				exit();
			} else {
				$_SESSION['pago'] = True; 
				// header("Location: comprarCarrito.php");
				header("Location: pago.php");
				exit();
			}
	}
	
?>