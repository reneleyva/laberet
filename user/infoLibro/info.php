<?php 

include '../../conexion.php';

if (!isset($_REQUEST['id'])) {
	echo "404";
	exit();
}

$id = $_REQUEST['id'];

try {
	$sql = "SELECT * FROM Libro WHERE idLibro = ".$id.";";
	$result = $pdo->query($sql);
	$row = $result->fetch();
	$autor = $row['autor'];

	if (!$row) {
		echo "404";
	}
	$tags = explode(" ", trim($row['tags'], " ")); //TAGS
	//La libreria que vende el libro. 
	$idLibreria = $row['LibreriaidLibreria'];
	$sql = "SELECT * FROM Libreria WHERE idLibreria = ".$idLibreria.";";
	$result = $pdo->query($sql);
	$libreria = $result->fetch();
	$nombreLibreria = $libreria['Nombre']; 

	//Busca autor
	$sql = "SELECT * FROM Libro WHERE LibreriaidLibreria = '".$idLibreria."' AND titulo != '".$row['titulo']."';";
	$result = $pdo->query($sql);
	while ($libro = $result->fetch()) {
		$books[] =array('titulo' => $row['titulo'],'autor' => $row['autor'], 
			            'fotoFrente' => $row['fotoFrente'],'precio' => $row['precio']);
	}

		
		//Por tags. 
		// echo "COUNT: ".count($tags);
	for ($i=0; $i < count($tags)-1; $i++) { 
		if ($tags[$i] == "")
			continue;
		$sql = "SELECT * FROM Libro WHERE tags LIKE '%".$tags[$i]."%' AND titulo != '".$row['titulo']."';";
		// echo $sql."<br>";
		$result = $pdo->query($sql);
		while ($libro = $result->fetch()) {
			array_push($relacionados, $libro);
		}
	}


	} catch (PDOException $e) {
		$error = 'Error fetching books: ' . $e->getMessage();
		echo $e->getMessage();
		// include 'error.html.php';
		exit();
	}
