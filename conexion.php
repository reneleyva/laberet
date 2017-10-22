<?php
/* Aquí ponen ustedes su contraseña, perros! */
$con = @mysqli_connect('localhost', 'root', 'root', 'laberet');

if (!$con) {
    echo "Error: " . mysqli_connect_error();
	exit();
}