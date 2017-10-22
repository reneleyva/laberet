<?php 

/**
* Clase para libro vendido. 
*/
class LibroVendido {

	private $id;
	private $autor;
	private $titulo;
	private $isbn;
	private $precio;
	private $fotoFrente;
	private $tags;
	private $idLibreria;
	private $idUsuario;
	private $libreria;

	//Vacio 
	function __construct() {}

	//Recibe un row producto de un SELECT * y contruye el libro vendido. 
	function fill(array $row) {
		$this->id = $row['idLibroVendido'];
		$this->autor = $row['autor'];
		$this->titulo = $row['titulo'];
		$this->isbn = $row['isbn'];
		$this->precio = $row['precio'];
		$this->fotoFrente = $row['fotoFrente'];
		$this->tags = $row['tags']; 
		$this->idLibreria = $row['idLibreria'];
		$this->idUsuario = $row['idUsuario'];
		$this->libreria = $row['nombre'];
	}

	//A mano (No hay multiples constructores)
	function contruct($id, $autor, $titulo, $isbn, $fechaAdicion, 
		$precio, $fotoFrente, $fotoAtras, $tags, $idLibreria,$libreria)
	{
		$this->$id = $id;
		$this->$autor = $autor;
		$this->$titulo = $titulo;
		$this->$isbn = $isbn;
		$this->$precio = $precio;
		$this->$fotoFrente = $fotoFrente;
		$this->$tags = $tags;
		$this->idLibreria = $idLibreria;
		$this->idUsuario = $idUsuario;
		$this->libreria = $libreria;
	}


	//Regresa un libro haciendo una consulta por id. 
	//Regresa NULL sino se encontró.
	function getLibro($id) {
		include "../../conexion.php";
		$sql = "SELECT * FROM LibroVendido WHERE idLibroVendido = ".$id.";";
		$result = $pdo->query($sql);
		$row = $result->fetch();

		if (!$row) {
			return Null;
		} else {
			$book = new LibroVendido();
			$book->fill($row);
			return $book;
		}

	}
	
	// función equals.
	public function equals($book) {
		return ($this->id == $book->getId());
	}

	// Función que regresa verdadero si el libro está en un arreglo.
	public function inArray($books){
		foreach ($books as $book) {
			if ($this->equals($book)) {
				return true;
			}
		}
		return False;
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

	public function getIdUsuario(){
		return $this->idUsuario;
	}

	public function setIdUsuario($idUsuario){
		$this->idUsuario = $idUsuario;
	}

	public function getLibreria(){
		return $this->libreria;
	}

	public function setLibreria($libreria){
		$this->$libreria = $libreria;
	}
}


//EJEMPLO:
// $book = Libro::getBookById(2);
// echo $book->getAutor();
