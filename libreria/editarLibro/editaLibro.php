<?php 

include '../../conexion.php';

$id = $_POST['id'];
$titulo = $_POST['titulo'];
$autor =  $_POST['autor'];
$isbn = $_POST['isbn'];
$precio = $_POST['precio'];
$tags = $_POST['tags'];



$date = 'SELECT fechaAdicion FROM Libro WHERE idLibro = "'.$id.'";';
$result = $pdo->query($date);
$row = $result->fetch();
$fechaAdicion = $row['fechaAdicion'];

$sql = 'UPDATE Libro SET
			titulo ="' . $titulo . '",
			autor = "'.$autor.'",
			isbn = "'.$isbn.'",
            fechaAdicion = "'.$fechaAdicion.'",
			precio = "'.$precio.'",
			tags = "'.$tags.'",
			idLibreria = 1
		WHERE idLibro = "'.$id.'";' ;     

// echo $sql;
$pdo->exec($sql);
header('Location: ../homeLibreria');
exit();