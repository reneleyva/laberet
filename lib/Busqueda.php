<?php 
include_once 'Libro.php';
include_once 'Libreria.php';
/**
* Clase para Libro. 
*/
class Busqueda {
	function __construct() {}

	// Regresa todos los pedidos que se han realizado
	function getPedidos (){
		include "../conexion.php";
		$sql = "SELECT p.id id,p.fecha fecha, p.status status,COUNT(DISTINCT(l.idLibroVendido)) libros, FORMAT(SUM(l.precio),2) precio 
				FROM pedido_entrega p INNER JOIN librovendido l
			    on p.id = l.Entregaid 
			    and l.vendidoLinea = 1
			    GROUP BY p.id,p.fecha,p.status ";
	    $query = mysqli_query($con, $sql);
		return $query;
	}

	// Regresa todos los libros asociados a ese pedido
	function getDetalle ($id) {
		include "../conexion.php";
		$sqlAux = " SET NAMES UTF8;";
		mysqli_query($con, $sqlAux);
		$sql = "SELECT  l.precio costo ,lib.nombre libreria,l.titulo titulo
				FROM pedido_entrega p INNER JOIN librovendido l INNER JOIN libreria lib
			    on p.id = l.Entregaid 
			    and p.id = ".$id."
			    and l.vendidoLinea = 1
			    and l.idLibreria = lib.idLibreria";
		$query = mysqli_query($con, $sql);
		// El JSON que regresará.
		$json = array();
		// Si hay resultados.
		if ($query) {
			while ($row = mysqli_fetch_array($query)){
				$titulo = $row['titulo'];
				$costo = $row['costo'];
				$libreria  = $row['libreria'];
				$arr = array ('titulo'=>$titulo,'costo'=>$costo,'libreria'=>$libreria);
				array_push($json, array ('info'=>$arr));
			}
		}
    	return $json;
	}


	//Busca en todo si keyword="" regresa todos los libros ;)
	function buscaGeneral($keyword){
		include "../conexion.php";
		$sql = "SELECT * FROM libro WHERE lower(tags) like lower('%".$keyword."%');";
		$query = mysqli_query($con, $sql);
		$books = array();
		while ($row = mysqli_fetch_array($query)){
			$book = new Libro();
			$book->fill($row);
			array_push($books,$book);
		}
		return $books;
	}

	// Busca por autor.
	function buscaAutor($autor) {
		include "../conexion.php";
		$sql = "SELECT * FROM libro WHERE lower(autor) like lower('%".$autor."%');";
		$query = mysqli_query($con, $sql);
		$books = array();
		while ($row = mysqli_fetch_array($query)){
			$book = new Libro();
			$book->fill($row);
			array_push($books,$book);
		}
		return $books;
	}

	// Busca por titulo.
	function buscaTitulo($titulo) {
		include "../conexion.php";
		$sql = "SELECT * FROM libro WHERE lower(titulo) like lower('%".$titulo."%');";
		$query = mysqli_query($con, $sql);
		$books = array();
		while ($row = mysqli_fetch_array($query)){
			$book = new Libro();
			$book->fill($row);
			array_push($books,$book);
		}
		return $books;
	}

	// Busca relacionados
	public function getLibrosRelacionados($id){
		include "../conexion.php";
		 // Seleccionamos el libro que nos pasan como ref.
		$book = Libro::getLibro($id);
		// Donde se guardarán los libros relacionados.
		$books = array();
		// Variable auxiliar. 
		$booksAux = array();
		// Búsqueda por tags (Incluye ya el autor).
		$titulo = $book->getTitulo();
		$tags = explode(" ", trim($book->getTags(), " "));
		// Para regresar 10 libros solamente.
		$count = 0;
		// Itera sobre cada tag.
		foreach ($tags as $tag) {
			// No sé por que mete tags vacíos.
			if ($tag=="") {
				continue;
			}
			$sql = "SELECT * FROM libro WHERE lower(tags) like lower('%".$tag."%') and not titulo =  '$titulo';";
			$query = mysqli_query($con, $sql);
			while ($row = mysqli_fetch_array($query) and $count < 10){
				$book = new Libro();
				$book->fill($row);
				if (!($book->inArray($books))){
					array_push($books,$book);
				}
			}
		}
		return $books;
	}

	public function getLibrosUsuario($idUsuario){
		include "../conexion.php";
		include_once "Usuario.php";
		$usuario = new Usuario();
		// Se consigue el usuario.
		$usuario->getUsuario($idUsuario);
		// Arreglo donde se guardarán los libros.
		$librosComprados = array();
		$tags = array();
		// Se hace la consulta de los libros que ha comprado.
		$sql = "SELECT * FROM libroVendido WHERE idUsuario = ".$usuario->getId().";";
		$query = mysqli_query($con, $sql);

		if ($query) {
			// itera sobre los libros que compró.
			while ($row = mysqli_fetch_array($query) ) {
				$book = new Libro();
				$book->fill($row);
				$tags = explode(" ", trim($book->getTags(), " "));
				// Se podría hacer aquí. but a ro nou.
				array_push($librosComprados, $book);
			}
		}
		$libros = array();
		// Si ya ha comprado libros.
		if (!empty($librosComprados)) {
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
		include "../conexion.php";
		$sql = "SELECT * FROM libro order by fechaAdicion desc";
		$query = mysqli_query($con, $sql);
		$books = array();
		while ($row = mysqli_fetch_array($query)){
			$book = new Libro();
			$book->fill($row);
			array_push($books,$book);
		}
		return $books;
	}

	function getLibrerias(){
		include "../conexion.php";
		$sql = "SELECT * FROM libreria order by nombre desc";
		$query = mysqli_query($con, $sql);
		$librerias = array();
		while ($row = mysqli_fetch_array($query)) {
			$l = new Libreria();
			$l->fill($row);
			array_push($librerias, $l);
		}
		return $librerias;
	}	
}