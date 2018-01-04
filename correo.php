<?php
// Librerías.
require 'vendor/autoload.php';
use Mailgun\Mailgun;


class Correo {
	// Recibe el correo y el mensaje a enviar.
	function enviaCorrero ($correo,$mensaje){
		// Llave y dominio para entrar.
		$mgClient = new Mailgun('key-bff1ca8ab7d13267c65de4e6d5abc225');
		$domain = "mg.laberet.com";

		$result = $mgClient->sendMessage("$domain",
		          array('from'    => 'Laberet <info@laberet.com>',
		                'to'      => 'User <'.$correo.'>,René <lugia365@gmail.com>',
		                'subject' => 'Bienvenido a Laberet',
		                'text'    =>  $mensaje));
		// echo "Resultado " + $result;
	}
}


echo "Comienza el envío de correo...";
// Envía el correo
Correo::enviaCorrero("luispuli2@ciencias.unam.mx","Prueba para el brou <3");
echo "\nFinalizó envío de correo";
?>
