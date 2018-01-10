<?php 
	include '../conexion.php';
	include_once '../lib/Libro.php';
	include_once '../lib/Libreria.php';
	include '../lib/Correo.php';
	session_start(); 
	$carrito = $_SESSION['carrito']; 
	
	function resize($url, $size) {
		return join("upload/h_".$size, explode("upload", $url));
	};

	function getLibroMsg($libro) {
		return '<div style="width: 500px;height: 270px;"><div>    <div>        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;        <br>    </div>    <div>        <div>            <div>                <div>                    <img src="'.resize($libro->getFotoFrente(), 260).'?>" style="padding-right: 5px;float:left;" width="auto" height="260">                        &nbsp;                    <b>                        <span class="colour" style="color:rgb(0, 0, 0);font-size: 17pt;">                            '.$libro->getAutor().'&nbsp;                        </span>                    </b>                    <span class="colour" style="color:rgb(0, 0, 0)">                        &nbsp; &nbsp;&nbsp;                    </span>                    <br>                </div>            </div>        </div>    </div></div><div>    <div style="margin-top: 10px; ">        <span class="colour" style="color:rgb(0, 0, 0);font-size: 17pt;margin-top: 20px; ">            &nbsp;'.$libro->getTitulo().'&nbsp;        </span>        <span class="colour" style="color:rgb(0, 0, 0)">        </span>        <br>    </div>    <div>        <span class="colour" style="color:rgb(0, 0, 0);font-size: 17pt;">            &nbsp;<b>Precio:</b> $'.$libro->getPrecio().' &nbsp;        </span>           <span class="colour" style="color:rgb(153, 153, 153)">        </span>        <br>    </div></div><div>    <div>        <div>            <div>                <div>                    <div>                        <br>                    </div>                </div>                <div>                    <br>                </div>                <div>                    <br>                </div>            </div>        </div>    </div></div><div>    <br></div></div>';
	}
	
 	//Obtengo alguna llave que usaré como id de la orden. 
	//Aseguro categoricamente que este id es único. 
	reset($carrito);
	$first_key = key($carrito);
	$sql = "INSERT INTO entrega SET 
			id=".$first_key.", 
			fecha=CURDATE(),
			status=0,
			idUsuario=".$_SESSION['id'].";";

	mysqli_query($con, $sql);
	/*
		Libreria es un diccionario {idLibreria: [libro1, libro2 ...]}
		Cada llave es el id de la librería y contiene un arreglo de libros que 
		son los libros asociados a la librería en este pedido. 
	*/
	$libreriaCorreo = array();
	$msgUsuario = "";
	foreach ($carrito as $libro) {
		$libro->setAsLibroVendido($_SESSION['id'], $first_key);
		$msgUsuario .= getLibroMsg($libro);
		$idLib = $libro->getIdLibreria(); 
		if (!isset($libreriaCorreo[$idLib])){
			$libreriaCorreo[$idLib] = array($libro);
		} else {
			array_push($libreriaCorreo[$idLib], $libro); 
		}
	}

 
	$orden = "";
	// Mando correo a librería 
	foreach ($libreriaCorreo as $key => $librosLibreria) {
		$msg = "<h2 style='margin-bottom:0px'>¡Los siguientes Libros han sido vendidos en línea!</h2>";
		$msg .= "<p style='margin-top: 0px;font-size:12pt;'>Se recomienda apartarlos para envío</p>";
		foreach ($librosLibreria as $key2 => $libro) {
			
			$libreria = Libreria::getLibreria($libro->getIdLibreria());
			// HTML de libro. 
			$msg .= getLibroMsg($libro);
			$orden .= getLibroMsg($libro);
		}

		Correo::enviaCorrero($libreria->getCorreo(), 
			"¡Libros vendidos en Línea! ", 
			$msg, false);
	}
	
	// Mando correo a usuario. 
	Correo::enviaCorrero($_SESSION['correo'], 
			"[Laberet] Gracias por tu compra.", 
			"<p style='color: black; font-size:12pt'>En este momento las librerías están siendo notificadas de tu compra. <br>
			Aquí tu orden:</p>".$orden, false);


	Correo::enviaCorrero("sinmatonesaporfavor@gmail.com", 
		"¡Libros vendidos en Línea! ", 
		$orden, false);

	Correo::enviaCorrero("lugia365@gmail.com", 
		"¡Libros vendidos en Línea! ", 
		$orden, false);
	echo $orden."<br>";

	$_SESSION['carrito'] = array(); 
	$_SESSION['pago'] = false;
	exit(); 
	// echo "<h2>TODOS LOS LIBROS EN CARRITO HAN SIDO COMPRADOS PRRO!</h2>";
?>