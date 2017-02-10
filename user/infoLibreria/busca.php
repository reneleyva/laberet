<?php
include '../../conexion.php';
if (!isset($_GET['id'])) {
	echo "PENE";
	exit();
}
if(isset($_POST['keyword'])){
    try{
    	// Busca primero en tags 
	    $keyword = $_POST['keyword'];
	    $id = $_GET['id'];
		$sql = "SELECT titulo,autor, fotoFrente,fotoAtras,precio,idLibro from Libro where (lower(tags) 
		        like lower('%".$keyword."%') or lower(titulo) like lower('%".$keyword."%') 
		        or lower(autor) like lower('%".$keyword."%') ) and 
		        LibreriaidLibreria = ".$id.";";
		$result = $pdo->query($sql);
		$vacio = True;
		$books = Null;
		while ($row = $result->fetch()){
			$vacio = False;
			$books[] = array('titulo' => $row['titulo'],'autor' => $row['autor'], 'fotoFrente' => $row['fotoFrente'],'fotoAtras' => $row['fotoAtras'],
				  'precio' => $row['precio'],'id' => $row['idLibro']);
		}
		include 'muestraBusqueda.html.php';
		echo 'PENEEEEE';
		exit();
	} catch (PDOException $e) {
		$error = 'Error fetching books: ' . $e->getMessage();
		echo $error;
		exit();
	}
}