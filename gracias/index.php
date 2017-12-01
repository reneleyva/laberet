<?php 
	include "../lib/Libro.php";
	session_start();
	if (!isset($_SESSION['pago'])){
		//NO debería estar aquí! 
		header("Location: .");
		exit();
	} 

	if (!isset($_SESSION['tipo'])) {
		header("location: ../");
	} 

	$tipo = $_SESSION['tipo'];
	if ($tipo == 'libreria') {
		//NO debería de estar aquí redirijo
		header("location: ../homeLibreria/");
		exit();
	} else if ($tipo == 'invitado') {
		header("location: ../");	
		exit();
	} 
 ?>
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
	<link rel="stylesheet" href="../css/gracias-style.css">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
	
	
	<?php 
		$current_page = 'pago';
		include '../components/navbar-user.php';
	?>
	
	<div class="container">
	<h1><b>Gracias por tu compra</b></h1>
	<h3>Las librerías han sido notificadas de tu compra y te llegará lo más pronto posible.</h3>
	
	</div>
	


	<!-- FIN ELEMENTOS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
</body>
</html>