<?php
/* Aquí ponen ustedes su contraseña, perros! */
$user = getenv('SQL_USER');
$pass = getenv('SQL_PASS');

$con = @mysqli_connect('localhost', $user, $pass, 'laberet');
// Para los acentos.
$sql = " SET NAMES UTF8;";
mysqli_query($con, $sql);

if (!$con) {
    echo "Error: " . mysqli_connect_error();
	exit();
}