<?php
	include '../../conexion.php';
	include '../../temp/Libro.php';
	try{
		$sql = 'SELECT * FROM Libro order by fechaAdicion DESC';
		$result = $pdo->query($sql);
		$books = array();
		while ($row = $result->fetch()) {
				$book = new Libro();
				$book->fill($row);
				array_push($books,$book);
		}
	
	} catch (PDOException $e) {
		$error = 'Error fetching books: ' . $e->getMessage();
	 	$e->getMessage();
		exit();
	}


	



