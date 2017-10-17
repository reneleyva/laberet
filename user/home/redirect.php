<?php 

//Checo que tipo de Usuario es y si debería de estar aquí. 
session_start();
if (!isset($_SESSION['type'])) {
	header("location: ../../");
} 

$tipo = $_SESSION['type'];

if ($tipo == 'libreria') {
	//NO debería de estar aquí redirijo
	header("location: ../../libreria/home");
	exit();
} else if ($tipo == 'invitado') {
	header("location: ../../");	
	exit();
}  