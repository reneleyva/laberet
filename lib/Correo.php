<?php
// Librerías.
require '../vendor/autoload.php';
use Mailgun\Mailgun;

class Correo {
	private static $firma = '<br><br><div> <div> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; <br> </div> <div> <div> <div> <div> <img src="http://res.cloudinary.com/dzu2umeba/image/upload/h_64/v1513531736/ew6ufbaqaopvxokmjmdc.png" style="border-right: 1px solid grey;padding-right: 5px;float:left;" width="51" height="51"> &nbsp; <b> <span class="colour" style="color:rgb(102, 102, 102)"> Atención a cliente Laberet&nbsp; </span> </b> <span class="colour" style="color:rgb(102, 102, 102)"> &nbsp; &nbsp;&nbsp; </span> <br> </div> </div> </div> </div> </div> <div> <div> <span class="colour" style="color:rgb(102, 102, 102)"> &nbsp;La tienda en línea de las mejores librerías&nbsp; </span> <span class="colour" style="color:rgb(102, 102, 102)"> </span> <br> </div> <div> <span class="colour" style="color:rgb(102, 102, 102)"> &nbsp;5548919138 |&nbsp; </span> <a href="http://www.laberet.com" style="text-decoration:none;"> <span class="colour" style="color:rgb(102, 102, 102)"> www.laberet.com </span> </a> <span class="colour" style="color:rgb(153, 153, 153)"> </span> <br> </div> </div> <div> <div> <div> <div> <div> <div> <br> </div> </div> <div> <br> </div> <div> <br> </div> </div> </div> </div> </div> <div> <br> </div> ';

	/* Variable $conFirma es un booleano para indicar si concatenar 
		la firma de atención a cliente.
	*/
	function enviaCorrero ($correo, $sub, $mensaje, $conFirma){
		// Llave y dominio para entrar.
		$mgClient = new Mailgun('key-bff1ca8ab7d13267c65de4e6d5abc225');
		$domain = "mg.laberet.com";
		if ($conFirma) {
			$mensaje = $mensaje.self::$firma;
		}

		$result = $mgClient->sendMessage("$domain",
		          array('from'    => 'Laberet <info@laberet.com>',
		                'to'      => 'User <'.$correo.'>',
		                'subject' => $sub,
		                'html'    =>  $mensaje));

	}
}
?>
