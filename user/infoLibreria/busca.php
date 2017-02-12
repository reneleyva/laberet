<?php
include '../../conexion.php';
if (!isset($_POST['id'])) {
	echo "PENE";
	exit();
}

if(isset($_POST['keyword'])){
    try{
    	// Busca primero en tags 
	    $keyword = $_POST['keyword'];
	    $id = $_POST['id'];
		$sql = "SELECT titulo,autor, fotoFrente,fotoAtras,precio,idLibro from Libro where (lower(tags) 
		        like lower('%".$keyword."%') or lower(titulo) like lower('%".$keyword."%') 
		        or lower(autor) like lower('%".$keyword."%') ) and 
		        LibreriaidLibreria = ".$id.";";
		echo $sql;
		$result = $pdo->query($sql);
		$vacio = True;
		$books = Null;
		while ($row = $result->fetch()){
			echo 'Pene';
			$vacio = False;
			$books[] = array('titulo' => $row['titulo'],'autor' => $row['autor'], 'fotoFrente' => $row['fotoFrente'],'fotoAtras' => $row['fotoAtras'],
				  'precio' => $row['precio'],'id' => $row['idLibro']);
		}
		include 'muestraBusqueda.html.php';
		exit();
	} catch (PDOException $e) {
		$error = 'Error fetching books: ' . $e->getMessage();
		echo $error;
		exit();
	}
}