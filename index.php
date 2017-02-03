<?php
$Bienvenida = 'Bienvenido a Laberet';

if (get_magic_quotes_gpc()){
	$process = array(&$_GET, &$_POST, &$_COOKIE, &$_REQUEST);
	while (list($key, $val) = each($process)) {
		foreach ($val as $k => $v){
			unset($process[$key][$k]);
			if (is_array($v)){
				$process[$key][stripslashes($k)] = $v;
				$process[] = &$process[$key][stripslashes($k)];
			} else {
				$process[$key][stripslashes($k)] = stripslashes($v);
			}
		}
	}
	unset($process);
}


/* Se establece la conexión */

include 'conexion.php';

if (isset($_GET['showbook'])){
	/* Se muestran los resultados de la consulta de la base de datos */
	try{
		$sql = 'SELECT titulo,autor,fotoFrente,fotoAtras FROM Libro';
		$result = $pdo->query($sql);
		while ($row = $result->fetch()){
				$books[] = array('titulo' => $row['titulo'],'autor' => $row['autor'], 'fotoFrente' => $row['fotoFrente'],'fotoAtras' => $row['fotoAtras']);
		}
	} catch (PDOException $e) {
		$error = 'Error fetching books: ' . $e->getMessage();
		include 'error.html.php';
		exit();
	}
	include 'muestraLibros.html.php';
    exit();
}


if (isset($_GET['addbook'])){
	include 'agregaLibros.html.php';
    exit();
}

if (isset($_GET['return'])){
	include 'welcome.html.php';
    exit();
}

/* Agregar libros */
if(isset($_POST['titulo'])){
	include 'agregaLibro.php';
}

include 'welcome.html.php';