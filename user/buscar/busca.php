<?php
// Conexión.
include '../../conexion.php';
if(isset($_POST['keyword'])) {
	// Si se selecciona una opción de búsqueda.
	$selection = 'Todo';
	if(isset($_POST['selection'])){
		$selection = $_POST['selection'];
	}  
    try{
    	$keyword = $_POST['keyword'];
    	// Se decide que buscar dependiendo la opción seleccionada.
		switch ($selection) {
			//mysql_real_escape_string elimina caracteres de escape de sql como '' que salía error. 
		    case 'Todo':
		        $sql = "SELECT titulo,autor, fotoFrente,fotoAtras,precio,idLibro from Libro where     lower(tags) like lower('%".mysql_real_escape_string($keyword)."%') or lower(titulo) like lower('%".mysql_real_escape_string($keyword)."%') or lower(autor) like lower('%".mysql_real_escape_string($keyword)."%');";
		        break;
		    case 'Autor':
		        $sql = "SELECT titulo,autor, fotoFrente,fotoAtras,precio,idLibro from Libro where    lower(autor) like lower('%".mysql_real_escape_string($keyword)."%');";
		        break;
		    case 'Titulo':
		        $sql = "SELECT titulo,autor, fotoFrente,fotoAtras,precio,idLibro from Libro where    lower(titulo) like lower('%".mysql_real_escape_string($keyword)."%');";
		        break;
		    case 'Categoria':
		    	$sql = "SELECT titulo,autor, fotoFrente,fotoAtras,precio,idLibro from Libro where lower(tags) like lower('%".mysql_real_escape_string($keyword)."%');";
		}
		$result = $pdo->query($sql);
		$vacio = True;
		$books[] = Null;
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