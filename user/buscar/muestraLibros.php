<?php
	include '../../conexion.php';

	try{
		$sql = 'SELECT titulo,autor,precio,fotoFrente,fotoAtras FROM Libro';
		$result = $pdo->query($sql);
		$vacio = True;
		while ($row = $result->fetch()) {
			    $vacio = False;
				$books[] = array('titulo' => $row['titulo'],'autor' => $row['autor'], 'precio' => $row['precio'],'fotoFrente' => $row['fotoFrente'],'fotoAtras' => $row['fotoAtras']);
		}
		if ($vacio) {
			echo 'No hay libros que mostrar.';
			exit();
		}
	} catch (PDOException $e) {
		$error = 'Error fetching books: ' . $e->getMessage();
		include 'error.html.php';
		exit();
	}
	// include 'busqueda.html.php';
    // exit();