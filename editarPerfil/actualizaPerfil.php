<?php 
include_once '../conexion.php';
include  '../lib/Usuario.php';

session_start();
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$pass = md5($_POST['password']."teamolizzteamoluz");
$id = $_SESSION['id'];

$inserta = Usuario::actualizaUsuario($id,$nombre,$correo,$pass);
if ($inserta) {
	header("location: /laberet/");
} else {
	header("location: /laberet/error");
}

// header("location: /laberet/");

?>