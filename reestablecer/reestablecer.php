<?php
include '../conexion.php';

$correo = $_POST['correo'];

$sql = "SELECT * FROM usuario WHERE correo = '".$correo."';";
$query = mysqli_query($con, $sql);
$row = mysqli_fetch_array($query);

if (!$row) {
	header("Location: ./?correo=".$correo);
} else {
	/*** ENVIAR CORREO AQUI**/
	include "enviado.php";
}