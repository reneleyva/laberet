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
	$sql = "INSERT INTO direccion SET
		cp ='".$cp."',
		ciudad ='CDMX',
		delegacion ='".$delegacion."',
		colonia ='".$colonia."',
		calleYnumero ='".$calleYNum."',
		descripcion ='".$descripcion."',
		telefono ='".$telefono."',
		idUsuario =".$_SESSION['id'].";";

	$res = mysqli_query($con, $sql); 

	if (!$res) {
		echo "ERROR";
	} else {
		header("Location: pago.php");
	}
?>