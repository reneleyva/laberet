<?php
// Conexión.
include '../../conexion.php';
if(isset($_POST['keyword'])){
	// Si se selecciona una opción de búsqueda.
	$selection = 'Todo';
	if(isset($_POST['selection'])){
		$selection = $_POST['selection'];
	}  
    try{
    	$keyword = $_POST['keyword'];
    	// Se decide que buscar dependiendo la opción seleccionada.
		switch ($selection) {
		    case 'Todo':
		        $sql = "SELECT titulo,autor, fotoFrente,fotoAtras,precio,idLibro from Libro where     lower(tags) like lower('%".$keyword."%') or lower(titulo) like lower('%"    .$keyword."%') or lower(autor) like lower('%".$keyword."%');";
		        break;
		    case 'Autor':
		        $sql = "SELECT titulo,autor, fotoFrente,fotoAtras,precio,idLibro from Libro where    lower(autor) like lower('%".$keyword."%');";
		        break;
		    case 'Titulo':
		        $sql = "SELECT titulo,autor, fotoFrente,fotoAtras,precio,idLibro from Libro where    lower(titulo) like lower('%".$keyword."%');";
		        break;
		    case 'Categoria':
		    	$sql = "SELECT titulo,autor, fotoFrente,fotoAtras,precio,idLibro from Libro where    lower(tags) like lower('%".$keyword."%');";
		    default:
		        $sql = "SELECT titulo,autor,fotoFrente,fotoAtras,precio,idLibro from Libro where    lower(tags) like lower('%Pene%');";
		}
		$result = $pdo->query($sql);
		$vacio = True;
		$books = Null;
		while ($row = $result->fetch()){
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