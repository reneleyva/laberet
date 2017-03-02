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
	$id = $row['idLibro'];
	if (!$row) {
		echo "404";
	}
	//La libreria que vende el libro. 
	$idLibreria = $row['idLibreria'];
	$sql = "SELECT * FROM Libreria WHERE idLibreria = ".$idLibreria.";";
	$result = $pdo->query($sql);
	$libreria = $result->fetch();
	$nombreLibreria = $libreria['nombre'];
	$fotoPerfil = $libreria['fotoPerfil'];
	$direccion = $libreria['direccion']; 
	$fotoPerfil = $libreria['fotoPerfil'];

	//Libros relacionados

	// //Busca autor
	// $sql = "SELECT autor,titulo,fotoFrente,idLibro,precio FROM Libro WHERE autor = '".mysql_real_escape_string($autor)."' AND titulo != '".mysql_real_escape_string($titulo)."';";
	// $result = $pdo->query($sql);
	// $books = Null;
	// $titulos = Null;
	// while ($libro = $result->fetch()) {
	// 	$titulos[] = $libro['titulo'];
	// 	$books[] =array('titulo' => $libro['titulo'],'autor' => $libro['autor'], 
	// 		            'fotoFrente' => $libro['fotoFrente'],'precio' => $libro['precio'],
	// 		            'id' => $libro['idLibro']);
	// }

	//Separa los tags
	if(!$books){
		$tags = Null;
		$titulos[] = Null;
	}
	$tags = explode(" ", trim($row['tags'], " ")); 
	foreach ($tags as $tag) {
		if ($tag != ""){
			$sql = "SELECT * FROM Libro WHERE lower(tags) LIKE 
			        lower('%".$tag."%') AND titulo != '".mysql_real_escape_string($titulo)."';";
			$result = $pdo->query($sql);
			while ($libro = $result->fetch()) {
				// Verifica que no se repita el título
				//Gerardo estaría decepcionado de nosotros </3
				if (!(in_array($libro['titulo'], $titulos))){
					$books[] =array('titulo' => $libro['titulo'],'autor' => $libro['autor'], 
			            'fotoFrente' => $libro['fotoFrente'],'precio' => $libro['precio'],
			            'id' => $libro['idLibro']);
				} 
			}
		}
	}

} catch (PDOException $e) {
	$error = 'Error fetching books: ' . $e->getMessage();
	echo $e->getMessage();
	exit();
}
