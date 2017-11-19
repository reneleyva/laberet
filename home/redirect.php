<?php 

//Checo que tipo de Usuario es y si debería de estar aquí. 
session_start();
if (!isset($_SESSION['tipo'])) {
	header("location: ../");
} 

$tipo = $_SESSION['tipo'];

if ($tipo == 'libreria') {
	//NO debería de estar aquí redirijo
	header("location: ../homeLibreria/");
	exit();
} else if ($tipo == 'invitado') {
	header("location: ../");	
	exit();
} 