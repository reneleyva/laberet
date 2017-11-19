<?php 
/*Si el usuario ya inició sesión lo redirige a su página principal,
 * sino inicia sesión como invitado (El invitado no tiene carrito por ahora).
*/ 
session_start();
if (!isset($_SESSION['tipo'])) {
	//Primera vez en la página debería guardar una cookie? 
	$_SESSION['tipo'] = 'invitado';

} else if ($_SESSION['tipo'] == 'usuario') {
	//Es usuario registrado
	header("location: home");
} else if ($_SESSION['tipo'] == 'libreria') {
	header("location: homeLibreria");
}