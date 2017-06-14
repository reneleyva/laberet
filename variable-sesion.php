<?php 
/*Si el usuario ya inició sesión lo redirige a su página principal,
 * sino inicia sesión como invitado (El invitado no tiene carrito por ahora).
*/ 
session_start();
if (isset($_SESSION['nombre'])) {
	if ($_SESSION['nombre'] != 'invitado') {
		//NO DEBERÍA DE ESTAR AQUI REDIRIJO A HOME RESPECTIVO
		if ($_SESSION['type'] == 'user') {
			header("location: user/home");
		} else {
			header("location: libreria/home");
		}

	} 
} else {
	//PRIMERA VEZ EN LA PAGINA
	$_SESSION['type'] = 'invitado';
	//Agregar al Log. 
}		