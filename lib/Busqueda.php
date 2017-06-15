<?php 
include_once 'Libro.php';
include_once 'Libreria.php';
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

	// Busca relacionados
	public function getLibrosRelacionados($id){
		include "../../conexion.php";
		 // Seleccionamos el libro que nos pasan como ref.
		$book = Libro::getLibro($id);
		// Donde se guardarán los libros relacionados.
		$books = array();
		// Variable auxiliar. 
		$booksAux = array();
		// Búsqueda por tags (Incluye ya el autor).
		$tags = explode(" ", trim($book->getTags(), " "));
		// Para regresar 10 libros solamente.
		$count = 0;
		// Itera sobre cada tag.
		foreach ($tags as $tag) {
			$sql = "SELECT * FROM Libro WHERE lower(tags) like lower('%".$tag."%');";
			$result = $pdo->query($sql);
			while ($row = $result->fetch() and $count < 10){
				$book = new Libro();
				$book->fill($row);
				if (!($book->inArray($books))){
					array_push($books,$book);
				}
			}
		}
		// Si no encontró ninguno relacionado.
		if (empty($books)) {
			return Busqueda::buscaGeneral("");		
		}
		return $books;
	}

	public function getLibrosUsuario($idUsuario){
		include "../../conexion.php";
		include_once "Usuario.php";
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
		} catch(Exception $e) {
			// echo 'No compró libros :(  ';
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

	//Busca en todo si keyword="" regresa todos los libros ;)
	function ultimosAgregados(){
		include "../../conexion.php";
		$sql = "SELECT * FROM Libro order by fechaAdicion desc";
		$result = $pdo->query($sql);
		$books = array();
		while ($row = $result->fetch()){
			$book = new Libro();
			$book->fill($row);
			array_push($books,$book);
		}
		return $books;
	}

	function getLibrerias(){
		include "../../conexion.php";
		$sql = "SELECT * FROM Libreria order by nombre desc";
		$result = $pdo->query($sql);
		$librerias = array();
		while ($row = $result->fetch()) {
			$l = new Libreria();
			$l->fill($row);
			array_push($librerias, $l);
		}
		return $librerias;
	}	
}