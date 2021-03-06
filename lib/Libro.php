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
		include "../conexion.php";
		$sql = "SELECT * FROM libro WHERE idLibro = ".$id.";";
		$query = mysqli_query($con, $sql);
		$row = mysqli_fetch_array($query);

		if (!$row) {
			return Null;
		} else {
			$book = new Libro();
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

	public function setAsLibroVendido($idUsuario, $idEntrega) {
		include "../conexion.php";
		//lo quito de la tabla libro
		$sql="DELETE FROM libro WHERE idLibro=".$this->getId().";";
		mysqli_query($con, $sql);

		// //LO agrego a libro vendido
		$sql = "INSERT INTO librovendido SET 
				autor='".$this->getAutor()."',
				titulo='".$this->getTitulo()."',
				isbn='".$this->getIsbn()."',
				precio=".$this->getPrecio().",
				fotoFrente='".$this->getFotoFrente()."',
				vendidoLinea=1,
				tags='".$this->getTags()."',
				fechaVenta=CURDATE(),
				idLibreria=".$this->getIdLibreria().",
				idUsuario=".$idUsuario.",
				Entregaid=".$idEntrega.",
				visto=0;";
		mysqli_query($con, $sql);
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
