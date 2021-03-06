<?php 
include_once 'Libro.php';
include_once 'Libreria.php';
/**
* Clase para Libro. 
*/
class Busqueda {
	function __construct() {}

	// Regresa todos los libros que ha vendido una librería en línea
	function getLibrosVendidos($idLibreria) {
		include "../conexion.php";
		include_once "../lib/LibroVendido.php";
		$sql = "SELECT * FROM librovendido l INNER JOIN libreria lib ON l.idLibreria = lib.idLibreria
				WHERE l.idLibreria = ".$idLibreria." AND l.vendidoLinea = 1 ;";
		$ventas = array();
		$query = mysqli_query($con, $sql);
		// Si hay resultados.
		if ($query) {
			while ($row = mysqli_fetch_array($query)){
				$book = new LibroVendido();
				$book->fill($row);
				array_push($ventas,$book);
			}
		}
		return $ventas;
	}

	// Regresa todos los libros que ha vendido una librería en tienda
	function getLibrosVendidosTienda($idLibreria) {
		include "../conexion.php";
		include_once "../lib/LibroVendido.php";
		$sql = "SELECT * FROM librovendido l INNER JOIN libreria lib ON l.idLibreria = lib.idLibreria
				WHERE l.idLibreria = ".$idLibreria." AND l.vendidoLinea = 0;";
		$ventas = array();
		$query = mysqli_query($con, $sql);
		// Si hay resultados.
		if ($query) {
			while ($row = mysqli_fetch_array($query)){
				$book = new LibroVendido();
				$book->fill($row);
				array_push($ventas,$book);
			}
		}
		return $ventas;
	}

	// Regresa todos los pedidos que se han realizado
	function getPedidos (){
		include "../conexion.php";
		$sql = "SELECT p.id id,p.fecha fecha, p.status status,COUNT(DISTINCT(l.idLibroVendido)) libros, FORMAT(SUM(l.precio),2) precio 
				FROM entrega p INNER JOIN librovendido l
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
		// Debería ser pedido_entrega
		$sql = "SELECT  l.precio costo ,lib.nombre libreria,l.titulo titulo 
				FROM entrega p INNER JOIN librovendido l INNER JOIN libreria lib
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


	// Busca en todo si keyword="" regresa todos los libros ;)
	function buscaGeneral($keyword){
		include "../conexion.php";
		$sql = "SELECT * FROM libro WHERE lower(tags) like lower('%".$keyword."%')
				OR lower(titulo) like lower('%".$keyword."%') ;";
		$query = mysqli_query($con, $sql);
		$books = array();
		while ($row = mysqli_fetch_array($query)){
			$book = new Libro();
			$book->fill($row);
			array_push($books,$book);
		}
		return $books;
	}

	// Método auxiliar para buscar por medio de tags
	function busquedaPorTags($tags){
		include "../conexion.php";
		// Limit 10, prro
		$books = array();
		// Consulta
		$sql = "SELECT DISTINCT(idLibro),titulo,precio,autor,fotoFrente,fotoAtras,idLibreria,fechaAdicion,tags,isbn FROM libro WHERE ";
		// Itera sobre cada tag para llenar la consulta.
		foreach ($tags as $tag) {
			// No sé por que mete tags vacíos.
			if ($tag=="") {
				continue;
			}
			$sql.= " lower(tags) like lower('%".$tag."%') ";
			$sql.= " OR";
		}
		$sql = substr($sql, 0, -2);
		// Para que solo traiga 10.
		$sql .= "LIMIT 10;" ;
		$query = mysqli_query($con, $sql);
		while ($row = mysqli_fetch_array($query)){
			$book = new Libro();
			$book->fill($row);
			if (!($book->inArray($books))){
				array_push($books,$book);
			}
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

	// Los libros que ha comprado un usuario.
	public function getLibrosComprados($idUsuario){
		include "../conexion.php";
		include_once "../lib/LibroVendido.php";
		$compras = array();		
		// Cambiar por inner join
		$sql = "SELECT * FROM librovendido l INNER JOIN libreria lib ON l.idLibreria = lib.idLibreria
				WHERE idUsuario = ".$idUsuario." LIMIT 10;";
		$query = mysqli_query($con, $sql);
		if ($query) {
			while ($row = mysqli_fetch_array($query)){
				$book = new LibroVendido();
				$book->fill($row);
				array_push($compras,$book);
			}
		}
		return $compras;
	}

	// Básicamente los mismo de "getLibrosComprados" pero sin limites
	public function getHistorialCompras($idUsuario){
		include "../conexion.php";
		include_once "../lib/LibroVendido.php";
		$compras = array();		
		$sql = "SELECT * FROM librovendido l INNER JOIN libreria lib ON l.idLibreria = lib.idLibreria
				WHERE idUsuario = ".$idUsuario.";";
		$query = mysqli_query($con, $sql);
		if ($query) {
			while ($row = mysqli_fetch_array($query)){
				$book = new LibroVendido();
				$book->fill($row);
				array_push($compras,$book);
			}
		}
		return $compras;
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