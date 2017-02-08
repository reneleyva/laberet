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
	$titulo = $row['titulo'];

	if (!$row) {
		echo "404";
	}
	//La libreria que vende el libro. 
	$idLibreria = $row['LibreriaidLibreria'];
	$sql = "SELECT * FROM Libreria WHERE idLibreria = ".$idLibreria.";";
	$result = $pdo->query($sql);
	$libreria = $result->fetch();
	$nombreLibreria = $libreria['Nombre']; 

	//Busca autor
	$sql = "SELECT * FROM Libro WHERE autor = '".$autor.
		    "' AND titulo != '".$titulo."';";
	$result = $pdo->query($sql);
	$cont = 0;
	$books = Null;
	$titulos = Null;
	while ($libro = $result->fetch()) {
		$cont ++;
		$titulos[] = $libro['titulo'];
		$books[] =array('titulo' => $libro['titulo'],'autor' => $libro['autor'], 
			            'fotoFrente' => $libro['fotoFrente'],'precio' => $libro['precio']);
	}

	//Separa los tags
	if(!$books){
		return;
	}
	$tags = explode(" ", trim($row['tags'], " ")); 
	foreach ($tags as $tag) {
		if ($tag != ""){
			$sql = "SELECT * FROM Libro WHERE lower(tags) LIKE 
			        lower('%".$tag."%') AND titulo != '".$titulo."';";
			$result = $pdo->query($sql);
			while ($libro = $result->fetch()) {
				// Verifica que no se repita el título
				if (!in_array($libro['titulo'], $titulos)){
					$books[] =array('titulo' => $libro['titulo'],'autor' => $libro['autor'], 
			            'fotoFrente' => $libro['fotoFrente'],'precio' => $libro['precio']);
				}
			}
		}
	}

} catch (PDOException $e) {
	$error = 'Error fetching books: ' . $e->getMessage();
	echo $e->getMessage();
	// include 'error.html.php';
	exit();
}
