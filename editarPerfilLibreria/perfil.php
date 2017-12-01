<?php 
	$id = $_SESSION['id'];

	include '../lib/Libreria.php';

	$libreria = Libreria::getLibreria($id);
?>