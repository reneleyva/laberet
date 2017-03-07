<?php 

/**
* Clase para Libro. 
*/
class Busqueda {
	function __construct() {}

	//Busca en todo si keyword="" regresa todos los libros ;)
	function buscaGeneral($keyword){
		include "../../conexion.php";
		$sql = "SELECT * FROM Libro WHERE lower(tags) like lower('%".$keyword."%');";
		$result = $pdo->query($sql);
		$books = array();
		while ($row = $result->fetch()){
			$book = new Libro();
			$book->fill($row);
			array_push($books,$book);
		}
		return $books;
	}

	// Busca por autor.
	function buscaAutor($autor) {
		include "../../conexion.php";
		$sql = "SELECT * FROM Libro WHERE lower(autor) like lower('%".$autor."%');";
		$result = $pdo->query($sql);
		$books = array();
		while ($row = $result->fetch()){
			$book = new Libro();
			$book->fill($row);
			array_push($books,$book);
		}
		return $books;
	}

	// Busca por titulo.
	function buscaTitulo($titulo) {
		include "../../conexion.php";
		$sql = "SELECT * FROM Libro WHERE lower(titulo) like lower('%".$titulo."%');";
		$result = $pdo->query($sql);
		$books = array();
		while ($row = $result->fetch()){
			$book = new Libro();
			$book->fill($row);
			array_push($books,$book);
		}
		return $books;
	}

	public function getLibrosRelacionados($id){
		include "../../conexion.php";
		 // Seleccionamos el libro que nos pasan como ref.
		$book = getLibro($id);
		// Donde se guardarán los libros relacionados
		$books[] = array(); 
		// Se busca por autor
		$sql = "SELECT * FROM Libro WHERE autor = '".$book->getAutor()."' AND 
		        titulo != '".$book->getTitulo()."';";
		$result = $pdo->query($sql);
		$titulos = array();
		while ($libro = $result->fetch()){
			$bookAux = new Libro();
			$bookAux->fill($libro);
			array_push($books,$bookAux);
		}
		// // Separa los tags
		// if(!$books){
		// 	$tags = Null;
		// 	$titulos[] = Null;
		// }
		$tags = explode(" ", trim($book->getTags(), " "));
		foreach ($tags as $tag) {
			if ($tag != "") {
				$sql = "SELECT * FROM Libro WHERE lower(tags) LIKE 
			        lower('%".$tag."%') AND titulo != '".$book->getTitulo()."';";
			    $result = $pdo->query($sql);
			    while ($libro = $result->fetch()){
			    	// Verifica que no se repita el título
			    	if (!(in_array($book->getTitulo(), $titulos))){
			    		array_push($books,$libro);
			    	}
			    }
			}
		}
	}

	public function getLibrosUsuario($idUsuario){
		include "../../conexion.php";
		include "Usuario.php";
		$usuario = new Usuario();
		// Se consigue el usuario.
		$usuario->getUsuario($idUsuario);
		// Arreglo donde se guardarán los libros.
		$librosComprados = array();
		$tags = array();
		// Se hace la consulta de los libros que ha comprado.
		$sql = "SELECT * FROM LibroVendido WHERE idUsuario = ".$usuario->getId().";";
		try{
			$result = $pdo->query($sql);
		}catch(Exception $e){
			echo 'No compró libros :(  ';
			//include '../buscar/muestraLibros.php';
			return null;
		}
		// itera sobre los libros que compró.
		while ($row = $result->fetch()){
			$book = new Libro();
			$book->fill($row);
			$tags = explode(" ", trim($book->getTags(), " "));
			// Se podría hacer aquí. but a ro nou.
			array_push($librosComprados, $book);
		}
		$libros = array();
		// Si no ha comprado libros.
		if (empty($librosComprados)) {
			echo "Pene de Vanessa";
			$sql = "SELECT * FROM Libro ORDER BY fechaAdicion DESC";
			$result = $pdo->query($sql);
			while ($row = $result->fetch()){
				$book = new Libro();
				$book->fill($row);
				array_push($libros,$book);
			}
		} else {
			$librosNuevos = array();
			foreach ($tags as $tag) {
				$librosNuevos = $this -> buscaGeneral($tag);
				array_unique(array_merge($libros, $librosNuevos));
			}	
		}
		return $libros;
	}
}