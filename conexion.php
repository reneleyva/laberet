<?php
/* Aquí ponen ustedes su contraseña, perros! */
$con = @mysqli_connect('localhost', 'root', 'root', 'laberet');
// Para los acentos.
$sql = " SET NAMES UTF8;";
mysqli_query($con, $sql);

if (!$con) {
    echo "Error: " . mysqli_connect_error();
	exit();
}