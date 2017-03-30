<?php include_once('../redirect.php'); ?>
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
	<link rel="stylesheet" href="../../css/bootstrap.min.css"> 
	<link rel="stylesheet" href="../../css/registrarse-style.css">
	<link rel="stylesheet" href="../../css/navbar-vis.css">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
	<nav class="navbar navbar-default" role="navigation">
		  <!-- Brand and toggle get grouped for better mobile display -->
		  <div class="navbar-header col-lg-2 col-md-2">
		    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapse-target">
		      <span class="sr-only">Toggle navigation</span>
		      <span class="icon-bar"></span>
		      <span class="icon-bar"></span>
		      <span class="icon-bar"></span>
		    </button>
		    <a class="navbar-brand navbar-left" href="../../"><img id="icon" src="../../img/logo.png" alt=""></a>
			<!-- <a class="navbar-brand navbar-left laberet" href="#"><b>LABERET</b></a> -->
		  </div>

		  <!-- Collect the nav links, forms, and other content for toggling -->
		  <div class="collapse navbar-collapse" id="collapse-target">
		   
		   <div id="list" class="col-lg-10 col-md-10">
		   		<ul class="nav navbar-nav navbar-right">
						<li><a href="#">Inicio</a></li>
			            <li><a href="../buscar">Catálogo</a></li>
			            <li><a href="../librerias">Librerías</a></li>
			            <li class="active"><a href="../registrarse">Registrarse</a></li>
			            <li><a href="../inicioSesion">Iniciar Sesión</a></li>
				</ul>
		   </div>
		    
		  </div><!-- /.navbar-collapse -->
	</nav> <!-- END NAV -->

	<div class="container">
		<div class="row">
			<!-- MORUBIO ESTE ES EL FORMULARIO SOLO SE VAN A ENVIAR UNA VEZ QUE SE COMPRUEBEN LOS DATOS ASÍ QUE SUPON QUE LOS DATOS SON BUENOS SOLO GUARDALOS -->
			<form action="registrarse.php" method="post" accept-charset="utf-8" class="form-group" onsubmit="return check()">
				<h1>Registrarse</h1>
				<label for="nombre">Nombre</label>
				<input id="nombre" required type="text" name="nombre" value="<?php if (isset($_GET['nombre'])) {
					echo htmlspecialchars($_GET['nombre'], ENT_QUOTES, 'UTF-8');
				} ?>" placeholder="" class="form-control">
				<label for="correo">Correo</label>
				<input id="correo" required type="email" name="correo" value="<?php if (isset($_GET['correo'])) {
					echo htmlspecialchars($_GET['correo'], ENT_QUOTES, 'UTF-8');
				} ?>"  placeholder="" class="form-control">
				<div id="correo-invalido" class="form-control err-msg">¡Correo no válido!</div>
				<?php 
					if (isset($_GET['correo'])) {
						echo "<div id='correo-existe' class='form-control err-msg'>Ya Existe una cuenta asociada con este correo.</div>";
					} 
				 ?>

			    <label for="password">Contraseña</label>
				<input id="password" required type="password" name="password" value="" placeholder="" class="form-control">
				<div id="pass-invalid" class="form-control err-msg">La contraseña debe contener por lo menos 5 caracteres.</div>
				<label for="password2">Repite contraseña</label>
				<input id="password2" required type="password" name="password2" value="" placeholder="" class="form-control">
				<div id="no-coinciden" class="form-control err-msg">Las contraseñas no coinciden!</div>
				<button id="enviar" type="submit" class="btn btn-default">Enviar</button>
				<p>¿Ya tienes cuenta? <a href="../inicioSesion" title="">Iniciar Sesión</a></p>
			</form>	
		</div>
	</div>


	<!-- FIN ELEMENTOS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="../../js/bootstrap.min.js"></script>
	<script src="../../js/validation.js"></script>

</body>
</html>