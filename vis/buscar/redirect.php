<?php 

//Checo que tipo de Usuario es y si debería de estar aquí. 

session_start();
if (!isset($_SESSION['type'])) {
	header("location: ../../");
	
} 

$keyword = ""; //Palabra clave. 
$selection = ""; //selection

if (isset($_GET['q']) or isset($_GET['s'])) {
	$keyword = $_GET['q']; //Palabra clave. 
	$selection = $_GET['s']; //selection
}
$tipo = $_SESSION['type'];
if ($tipo != 'invitado') {
	if ($tipo == 'libreria') {
		header("location: ../../libreria/buscar?q=".$keyword."&s=".$selection);
	} else if ($tipo == 'user') {
		header("location: ../../user/buscar?q=".$keyword."&s=".$selection);
	} 
} 