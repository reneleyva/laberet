<?php
/* Aquí ponen ustedes su contraseña, perros! */
try{
	$pdo =  new PDO('mysql:host=localhost;dbname=laberet', 'root','*86buzon'); //¡¡Aguas!!
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$pdo->exec('SET NAMES "utf8"');

} catch (PDOException $e) {
	echo $e->getMessage();
	exit();
	
}