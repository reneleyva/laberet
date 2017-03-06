<?php 

/**
* Clase para Libro. 
*/
class Busqueda {
	function __construct() {}

	function buscaGeneral($key){
		include "../../conexion.php";
		$sql = "SELECT * FROM Libro;";
		$result = $pdo->query($sql);
		$row = $result->fetch();
		$books[] = array();
		while ($row = $result->fetch()){
			//$vacio = False;
			$book = new Libro();
			$book->fill($row);
			array_push($books,$book);
		}
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
		$titulos[] = Null;
		while ($libro = $result->fetch()){
			$bookAux = new Libro();
			$bookAux->fill($libro);
			array_push($books,$bookAux);
		}
		// Separa los tags
		if(!$books){
			$tags = Null;
			$titulos[] = Null;
		}
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
}