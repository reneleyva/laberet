<?php
include '../../conexion.php';

$correo = $_POST['correo'];

$sql = "SELECT * FROM Usuario WHERE correo = '".$correo."';";
$result = $pdo->query($sql);
$row = $result->fetch();

if (!$row) {
	header("Location: ./?correo=".$correo);
} else {
	/*** ENVIAR CORREO AQUI**/
	include "enviado.html";
}