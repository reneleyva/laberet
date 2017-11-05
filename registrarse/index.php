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
	<link rel="stylesheet" href="../css/registrarse-style.css">
	<link rel="stylesheet" href="../css/navbar-vis.css">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
	
	<?php 
		$current_page = "registrarse"; 
		include '../components/navbar-visitante.php';
	?>

	<div class="container">
		<div class="row">
			<form action="registrarse.php" method="post" accept-charset="utf-8" class="form-group" onsubmit="return check()">
				<h1>Registrarse</h1>
				<label for="nombre">Nombre Completo</label>
				<input id="nombre" required type="text" name="nombre" value="<?php if (isset($_GET['nombre'])) {
					echo htmlspecialchars($_GET['nombre'], ENT_QUOTES, 'UTF-8');
				} ?>" placeholder="" class="form-control" maxlength="30" size="30">
				<label for="correo">Correo</label>
				<input id="correo" required type="email" name="correo" value="<?php if (isset($_GET['correo'])) {
					echo htmlspecialchars($_GET['correo'], ENT_QUOTES, 'UTF-8');
				} ?>"  placeholder="" class="form-control" maxlength="30" size="30">
				<div id="correo-invalido" class="form-control err-msg">¡Correo no válido!</div>
				<?php 
					if (isset($_GET['correo'])) {
						echo "<div id='correo-existe' class='form-control err-msg'>Ya Existe una cuenta asociada con este correo.</div>";
					} 
				 ?>

			    <label for="password">Contraseña</label>
				<input id="password" required type="password" name="password" value="" placeholder="" class="form-control" maxlength="20" size="20">
				<div id="pass-invalid" class="form-control err-msg">La contraseña debe contener por lo menos 5 caracteres.</div>
				<label for="password2">Repite contraseña</label>
				<input id="password2" required type="password" name="password2" value="" placeholder="" class="form-control" maxlength="20" size="20">
				<div id="no-coinciden" class="form-control err-msg">Las contraseñas no coinciden!</div>
					<button id="enviar" type="submit" class="btn btn-default">Crear Cuenta</button>
				
				<p>¿Ya tienes cuenta? <a href="../inicioSesion" title="">Iniciar Sesión</a></p>
			</form>	
		</div>
	</div>


	<!-- FIN ELEMENTOS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/validation.js"></script>

</body>
</html>