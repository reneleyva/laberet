<?php

inlclude "../../conexion.php";

$newpass = md5($_POST['password'].'pene');
$sql = 'INSERT INTO usuario SET
		nombre =" '.$_POST['nombre'].'",
		correo ="'.$_POST['correo']'",
		contrasenia ="'.$newpass.'";';
$pdo->exec($sql);
header('Location : http://localhost/laberet');
exit();
