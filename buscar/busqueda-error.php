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
	<link rel="stylesheet" href="../css/busqueda-style.css"> 
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
	
	<div class="container">
		<h1 class="face text-center">(>_<)</h1>
		<h3 class="not-found text-center">Ningún libro encontrado. </h3>
		<h4 class="not-found text-center">Prueba nuestro servicio de pedidos especiales 
		<?php 
			  if ($_SESSION['tipo'] == 'usuario') {
			  	echo "<a href='../pedidosEspeciales'>aquí</a>";
			  }	else {
			  	echo "<a href='../inicioSesion'>aquí</a>";
			  }
		 ?>. </h4>
		
	</div>


	<!-- FIN ELEMENTOS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/optionHack.js"></script>
</body>
</html>