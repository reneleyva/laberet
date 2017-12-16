<?php
/* Aquí ponen ustedes su contraseña, perros! */
$user = getenv('SQL_USER');
$pass = getenv('SQL_PASS');
$database = getenv('DB_NAME');
$host = getenv('DB_HOST');

$con = @mysqli_connect($host, $user, $pass, $database);
// Para los acentos.
$sql = " SET NAMES UTF8;";
mysqli_query($con, $sql);

if (!$con) {
    echo "Error: " . mysqli_connect_error();
	exit();
}