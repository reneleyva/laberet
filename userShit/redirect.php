<?php

if (!isset($_SESSION['type'])) {
	header("location: ../../");
}

$tipo = $_SESSION['type'];

if ($tipo != 'user') {
	if ($tipo == 'libreria') {
		header('location: ../../');
	} else if ($tipo == 'visitante') {
		header("location: ../../");
	}
}