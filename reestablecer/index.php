<?php
	session_start(); 
	if (!isset($_SESSION['tipo'])) {
		//Nuevo en la página 
		$_SESSION['tipo'] = 'visitante'; 
	} else if ($_SESSION['tipo'] != 'visitante') {
		//Ya inicio sesión 
		$tipo = $_SESSION['tipo']; 
		if ($tipo == 'usuario') {
			header("Location: ../home/");
		} else if ($tipo == 'libreria') {
			header("Location: ../homeLibreria/");
		}
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
	<link rel="stylesheet" href="../css/reestablecer-style.css"> 
	<link rel="stylesheet" href="../css/navbar-vis.css"> 
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
	<?php 
		$current_page = "reestablecer"; 
		include '../components/navbar-visitante.php';
	?>

	<div class="container">
		<div class="row">
			<!-- MORUBIO ESTE ES EL FORMULARIO. HAY UN DIV AQUÍ CON id="user-ivalid" que muestra el error puedes generar ese div para avisarle al usuario que está por la baby.-->
			<form id="iniciar" action="reestablecer.php" method="post" accept-charset="utf-8" class="form-group" onsubmit="return check()">
				<h1>Reestablecer contraseña de Laberet</h1>
				<h4>Escriba su correo y le enviaremos un enlace
					para reestablecer su .contraseña</h4>
				
				
				<input id="correo" required type="email" placeholder="ejemplo@mail.com" name="correo" value="<?php if (isset($_GET['correo'])) {
					echo htmlspecialchars($_GET['correo'], ENT_QUOTES, 'UTF-8');
				} ?>" placeholder="" class="form-control">
				<?php if (isset($_GET['correo'])) {
					echo "<div id='user-invalid' class='form-control err-msg'>El correo no coincide con ninguna cuenta</div>";
				} ?>
				<button id="enviar" type="submit" class="btn btn-default">Enviar</button>

			</form>	
		</div>
	</div>


	<!-- FIN ELEMENTOS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<!-- <script src="../../js/validationInicarSesion.js"></script> -->

</body>
</html>