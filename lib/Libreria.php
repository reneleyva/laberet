<?php 

/**
* Clase Para Librería
*/
class Libreria
{
	
	private $id;
	private $nombre;
	private $correo;
	private $fotoPerfil;
	private $fotoPortada;
	private $telefono;
	private $direccion;
	private $facebook;
	private $twitter;
	private $instagram;
	private $coordenadas;

	function __construct(){}

	function fill(array $row) {
		$this->id = $row['idLibreria'];
		$this->nombre = $row['nombre'];
		$this->correo = $row['correo'];
		$this->fotoPerfil = $row['fotoPerfil'];
		$this->fotoPortada = $row['fotoPortada'];
		$this->telefono = $row['telefono'];
		$this->direccion = $row['direccion'];
		$this->coordenadas = $row['coordenadas'];
		if (isset($row['facebook']))
			$this->facebook = $row['facebook'];
		if (isset($row['twitter']))
			$this->twitter = $row['twitter'];
		if (isset($row['instagram']))
			$this->instagram = $row['instagram'];
	}

	//Regresa una libreria haciendo una consulta por id. 
	//Regresa NULL sino se encontró.
	function getLibreria($id) {
		include "../conexion.php";
		$sql = "SELECT * FROM libreria WHERE idLibreria = ".$id.";";
		$query = mysqli_query($con, $sql);
		$row = mysqli_fetch_array($query);

		if (!$row) {
			return Null;
		} else {
			$lib = new Libreria();
			$lib->fill($row);
			return $lib;
		}
	}

	/* Regresa un arreglo de los libros 
	 * que pertenecen a esta libreria.*/
	function getLibros() {
		include "../conexion.php";
		include_once "../lib/Libro.php";
		$books = array();
		$sql = "SELECT * FROM libro WHERE idLibreria = ".$this->id.";";
		$query = mysqli_query($con, $sql);

		while ($row = mysqli_fetch_array($query)) {
			$book = new Libro();
			$book->fill($row);
			array_push($books, $book);
		}

		return $books;
	}

	/* Regresa en numero de libros en catálogo*/
	function getNumLibros() {
		include "../conexion.php";
		$sql = "SELECT COUNT(idLibro) as num from libro where idLibreria = ".$this->id.";";
		$query = mysqli_query($con, $sql);
		$num = 0;
		if ($row = mysqli_fetch_array($query)) {
			$num = $row['num'];
		}
		return $num;
	}

	/*Busca todo en tienda */
	function buscaTodo($keyword) {
		include "../conexion.php";
		include_once "../lib/Libro.php";

		$sql = "SELECT * FROM libro WHERE lower(tags) like lower('%".$keyword."%') OR titulo like lower('%".$keyword."%') OR autor like lower('%".$keyword."%') AND idLibreria = ".$this->id.";";

		$query = mysqli_query($con, $sql);
		$books = array();
		while ($row = mysqli_fetch_array($query)){
			$book = new Libro();
			$book->fill($row);
			array_push($books,$book);
		}
		return $books;
	}

	/*Busca por titulo en tienda */
	function buscaTitulo($titulo) {
		include "../conexion.php";
		include_once "../lib/Libro.php";

		$sql = "SELECT * FROM libro WHERE lower(titulo) like lower('%".$titulo."%') AND idLibreria = ".$this->id.";";
		$query = mysqli_query($con, $sql);
		$books = array();
		while ($row = mysqli_fetch_array($query)){
			$book = new Libro();
			$book->fill($row);
			array_push($books, $book);
		}
		return $books;
	}

	// Busca por autor.
	function buscaAutor($autor) {
		include "../conexion.php";
		include_once "../lib/Libro.php";

		$sql = "SELECT * FROM libro WHERE lower(autor) like lower('%".$autor."%') AND idLibreria=".$this->id.";";
		$query = mysqli_query($con, $sql);
		$books = array();
		while ($row = mysqli_fetch_array($query)){
			$book = new Libro();
			$book->fill($row);
			array_push($books,$book);
		}
		return $books;
	}



	//GETTERS AND SETTERS
	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function getCorreo() {
		return $this->correo;
	}

	public function setCorreo($correo) {
		$this->correo = $correo; 
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function getFotoPerfil(){
		return $this->fotoPerfil;
	}

	public function setFotoPerfil($fotoPerfil){
		$this->fotoPerfil = $fotoPerfil;
	}

	public function getFotoPortada(){
		return $this->fotoPortada;
	}

	public function setFotoPortada($fotoPortada){
		$this->fotoPortada = $fotoPortada;
	}

	public function getTelefono(){
		return $this->telefono;
	}

	public function setTelefono($telefono){
		$this->telefono = $telefono;
	}

	public function getDireccion(){
		return $this->direccion;
	}

	public function setDireccion($direccion){
		$this->direccion = $direccion;
	}

	public function getCoordenadas(){
		return $this->coordenadas;
	}

	public function setCoordenadas($coordenadas){
		$this->coordenadas = $coordenadas;
	}

	public function getFacebook(){
		return $this->facebook;
	}

	public function setFacebook($facebook){
		$this->facebook = $facebook;
	}

	public function getTwitter(){
		return $this->twitter;
	}

	public function setTwitter($twitter){
		$this->twitter = $twitter;
	}

	public function getInstagram(){
		return $this->instagram;
	}

	public function setInstagram($instagram){
		$this->instagram = $instagram;
	}
}

// $lib = Libreria::getLibreria(14);
// echo $lib->getNombre();
