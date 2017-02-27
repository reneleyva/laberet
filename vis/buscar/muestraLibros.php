<?php
	include '../../conexion.php';

	try{
		$sql = 'SELECT DISTINCT idLibro,titulo,autor,precio,fotoFrente,fotoAtras FROM Libro order by fechaAdicion DESC';
		$result = $pdo->query($sql);
		while ($row = $result->fetch()) {
				$books[] = array('id' => $row['idLibro'], 'titulo' => $row['titulo'],'autor' => $row['autor'], 'precio' => $row['precio'],'fotoFrente' => $row['fotoFrente'],'fotoAtras' => $row['fotoAtras']);
		}
	
	} catch (PDOException $e) {
		$error = 'Error fetching books: ' . $e->getMessage();
	 	$e->getMessage();
		exit();
	}


	



