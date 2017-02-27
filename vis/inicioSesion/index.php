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
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
		          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
		            <span class="sr-only">Toggle navigation</span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		          </button>
		          <a class="navbar-brand navbar-left" href="#"><img src="img/laberet_icon.png" alt=""></a>
		          <a class="navbar-brand" href="#"><b>LABERET</b></a>
        	</div>

        	<div id="navbar" class="navbar-collapse collapse">
        		
        		<ul class="nav navbar-nav navbar-right">
        			<li><a href="#">Inicio</a></li>
		            <li><a href="#">Catálogo</a></li>
		            <li><a href="#">Librerías</a></li>
		            <li><a href="registrarse.html">Registrarse</a></li>
		            <li class="active"><a href="iniciarSesion.html">Iniciar Sesión</a></li>
		            
          		</ul>
        	</div>
		</div>
	</nav> <!-- END NAV -->

	<div class="container">
		<div class="row">
			<!-- MORUBIO ESTE ES EL FORMULARIO. HAY UN DIV AQUÍ CON id="user-ivalid" que muestra el error puedes generar ese div para avisarle al usuario que está por la baby.-->
			<form id="iniciar" action="iniciasesion.php" method="post" accept-charset="utf-8" class="form-group" onsubmit="return check()">
				<h1>Iniciar Sesión</h1>
				<?php if (isset($_GET['correo'])) {
					echo "<div id='user-invalid' class='form-control err-msg'>La contraseña o correo no coincide con ninguna cuenta.</div>";
				} ?>
				
				<label for="correo">Correo</label>
				<input id="correo" required type="text" name="correo" value="<?php if (isset($_GET['correo'])) {
					echo htmlspecialchars($_GET['correo'], ENT_QUOTES, 'UTF-8');
				} ?>" placeholder="" class="form-control">
				<div id="correo-invalido" class="form-control err-msg">Correo No Válido.</div>
			    <label for="password">Contraseña</label>
				<input id="password" required type="password" name="password" value="" placeholder="" class="form-control">
				<div id="pass-invalid" class="form-control err-msg">Contraseña no válida.</div>
	
				<button id="enviar" type="submit" class="btn btn-default">Iniciar Sesión</button>
				<p>¿Olvidaste tu contraseña? <a href="resgistrarse.html" title="">Reestablézcala</a></p>
			</form>	
		</div>
	</div>


	<!-- FIN ELEMENTOS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="../../js/bootstrap.min.js"></script>
	<script src="../../js/validationInicarSesion.js"></script>

</body>
</html>