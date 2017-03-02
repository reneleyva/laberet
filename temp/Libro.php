<?php 

/**
* Clase para Libro. 
*/
class Libro {

	private $id;
	private $autor;
	private $titulo;
	private $isbn;
	private $fechaAdicion;
	private $precio;
	private $fotoFrente;
	private $fotoAtras;
	private $tags;
	private $idLibreria;

	//Vacio 
	function __construct() {}

	//Recibe un row producto de un SELECT * y contruye el libro. 
	function fill(array $row) {
		$this->id = $row['idLibro'];
		$this->autor = $row['autor'];
		$this->titulo = $row['titulo'];
		$this->isbn = $row['isbn'];
		$this->fechaAdicion = $row['fechaAdicion'];
		$this->precio = $row['precio'];
		$this->fotoFrente = $row['fotoFrente'];
		$this->fotoAtras = $row['fotoAtras'];
		$this->tags = $row['tags']; 
		$this->idLibreria = $row['idLibreria'];
	}

	//A mano (No hay multiples constructores)
	function contruct($id, $autor, $titulo, $isbn, $fechaAdicion, 
		$precio, $fotoFrente, $fotoAtras, $tags, $idLibreria)
	{
		$this->$id = $id;
		$this->$autor = $autor;
		$this->$titulo = $titulo;
		$this->$isbn = $isbn;
		$this->$fechaAdicion = $fechaAdicion;
		$this->$precio = $precio;
		$this->$fotoFrente = $fotoFrente;
		$this->$fotoAtras = $fotoAtras;
		$this->$tags = $tags;
		$this->idLibreria = $idLibreria;
	}

	//Regresa un libro haciendo una consulta por id. 
	//Regresa NULL sino se encontró.
	function getLibro($id) {
		include "../../conexion.php";
		$sql = "SELECT * FROM Libro WHERE idLibro = ".$id.";";
		$result = $pdo->query($sql);
		$row = $result->fetch();

		if (!$row) {
			return Null;
		} else {
			$book = new Libro();
			$book->fill($row);
			return $book;
		}

	}

	public function getLibrosRelacionados($id) {
		include "../../conexion.php";
		 // Seleccionamos el libro que nos pasan como ref.
		$book = getLibro($id);
		// Donde se guardarán los libros relacionados
		$books = new array(); 
		// Se busca por autor
		// $sql = "SELECT * FROM Libro WHERE autor = '".$book->getAutor()."' AND 
		//         titulo != '".$book->getTitulo()."';";
		// $result = $pdo->query($sql);
		// while ($libro = $result->fetch()){
		// 	$bookAux = new Libro();
		// 	$bookAux->fill($libro);
		// 	//LO agregas 
		// 	if(!in_array($bookAux, $books)) {
		// 		array_push($books, $book);
		// 	}
		// }
		// Separa los tags
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
			    		//Agrega libro again
			    	}
			    }
			}
		}
		return $books;
	}

	//GETTERS Y SETTERS. 
	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getAutor(){
		return $this->autor;
	}

	public function setAutor($autor){
		$this->autor = $autor;
	}

	public function getTitulo(){
		return $this->titulo;
	}

	public function setTitulo($titulo){
		$this->titulo = $titulo;
	}

	public function getIsbn(){
		return $this->isbn;
	}

	public function setIsbn($isbn){
		$this->isbn = $isbn;
	}

	public function getFechaAdicion(){
		return $this->fechaAdicion;
	}

	public function setFechaAdicion($fechaAdicion){
		$this->fechaAdicion = $fechaAdicion;
	}

	public function getPrecio(){
		return $this->precio;
	}

	public function setPrecio($precio){
		$this->precio = $precio;
	}

	public function getFotoFrente(){
		return $this->fotoFrente;
	}

	public function setFotoFrente($fotoFrente){
		$this->fotoFrente = $fotoFrente;
	}

	public function getFotoAtras(){
		return $this->fotoAtras;
	}

	public function setFotoAtras($fotoAtras){
		$this->fotoAtras = $fotoAtras;
	}

	public function getTags(){
		return $this->tags;
	}

	public function setTags($tags){
		$this->tags = $tags;
	}

	public function getIdLibreria(){
		return $this->idLibreria;
	}

	public function setIdLibreria($idLibreria){
		$this->idLibreria = $idLibreria;
	}

}


//EJEMPLO:
// $book = Libro::getBookById(2);
// echo $book->getAutor();
