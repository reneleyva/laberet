<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- <link rel="icon" href="../../favicon.ico"> -->

	<title>Laberet</title>
	<!-- Bootstrap css -->
	<link rel="stylesheet" href="../css/bootstrap.min.css"> 
	<link rel="stylesheet" href="../css/librerias-style.css"> 
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
	<?php 
		session_start();
		$current_page = "infoLibreria";
		if (!isset($_SESSION['tipo'])) {
			//Nuevo en la página
			$_SESSION['tipo'] = 'invitado';
			include '../components/navbar-visitante.php';

		} else if ($_SESSION['tipo'] == 'invitado') {
			
			include '../components/navbar-visitante.php';
		} else if ($_SESSION['tipo'] == 'usuario') {
			//Es usuario registrado
			include '../components/navbar-user.php';
		} else {
			include '../components/navbar-libreria.php';
		}

	?>
	<?php include "librerias.php" ?>
	<div class="container muestra">

	
	<?php foreach ($librerias as $libreria): ?>
			
		<div class="libreria col-lg-4 col-md-4 col-sm-6 col-xs-6" data-id="<?php echo $libreria->getId() ?>">
			<div class="wrap">
				<div class="imagen" style="background: url(../<?php echo $libreria->getFotoPerfil(); ?>) no-repeat no-repeat center center;">
					<h3><?php echo $libreria->getNombre(); ?></h3>
				</div>
				<div class="info">
					<p><b><?php echo $libreria->getDireccion() ?></b></p>
					<p>Tel. <?php echo $libreria->getTelefono() ?></p>
					<p><b><?php echo $libreria->getNumLibros() ?></b> libros en catálogo</p>
				</div>
			</div>
		</div>

	<?php endforeach; ?>
	</div>
	<?php 
		if ($_SESSION['tipo'] == 'invitado') {
			include '../components/footer-visitante.html';
		} else if ($_SESSION['tipo'] == 'usuario') {
			include '../components/footer-user.php';
		}

	 ?>

	<!-- FIN ELEMENTOS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/linkLibreria.js"></script>

</body>
</html>