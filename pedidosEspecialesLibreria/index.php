<?php 
	//Revisa la sesión
	session_start();
	if (!isset($_SESSION['tipo'])) {
		//NO ha iniciado sesión
		header("location: ../");
	} else if ($_SESSION['tipo'] != 'libreria') {
		//No es una libreria
		header("location: ../home");	
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
	<title>Pedidos Especiales</title>
	<!-- Bootstrap css -->
	<link rel="stylesheet" href="../css/bootstrap.min.css"> 
	<link rel="stylesheet" href="../css/navbar-libreria.css"> 
	<link rel="stylesheet" href="../css/homeLibreria-style.css"> 
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>
<body>
	
	<?php 
		$current_page = 'pedidosEspeciales'; 
		include '../components/navbar-libreria.php';
	 ?>

	<div class="container"> <!-- Muestra de los pedidos especiales. -->
		<div class="row">
				<h2 class="text-center"><b>Pedidos Esepciales.</b></h2>
		</div>
	</div>

	<!-- FIN ELEMENTOS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/homeLibreria.js"></script>
</body>
</html>