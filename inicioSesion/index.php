<?php 
	session_start(); 
	if (!isset($_SESSION['tipo'])) {
		//Nuevo en la página 
		$_SESSION['tipo'] = 'visitante'; 
	} else if ($_SESSION['tipo'] != 'visitante') {
		//Ya inició sesión 
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
	 <link rel="icon" href="http://res.cloudinary.com/dzu2umeba/image/upload/h_32/v1513531736/ew6ufbaqaopvxokmjmdc.png">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<!-- Google Analytics -->
	<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

	ga('create', 'UA-111545043-1', 'auto');
	ga('send', 'pageview');
	</script>
	<!-- End Google Analytics -->

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-111545043-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-111545043-1');
	</script>
</head>
<body>
	<?php 
		$current_page = "inicio_sesion"; 
		include '../components/navbar-visitante.php';
	?>

	<div class="container">
		<div class="row">
			<!-- MORUBIO ESTE ES EL FORMULARIO. HAY UN DIV AQUÍ CON id="user-ivalid" que muestra el error puedes generar ese div para avisarle al usuario que está por la baby.-->
			<form id="iniciar" action="<?php if (isset($_GET['idLibro'])) {echo "iniciasesion.php?idLibro=".$_GET['idLibro'];} else {echo "iniciasesion.php";}?>" method="post" accept-charset="utf-8" class="form-group" onsubmit="return check()">
				<h1>Iniciar Sesión</h1>
				<?php if (isset($_GET['correo'])) {
					echo "<div id='user-invalid' class='form-control err-msg'>La contraseña o correo no coincide con ninguna cuenta.</div>";
				} ?>
				
				<label for="correo">Correo</label>
				<input id="correo" required type="text" name="correo" value="<?php if (isset($_GET['correo'])) {
					echo htmlspecialchars($_GET['correo'], ENT_QUOTES, 'UTF-8');
				} ?>" placeholder="" class="form-control" maxlength="30" size="30">
				<div id="correo-invalido" class="form-control err-msg">Correo No Válido.</div>
			    <label for="password">Contraseña</label>
				<input id="password" required type="password" name="password" value="" placeholder="" class="form-control" maxlength="30" size="30">
				<div id="pass-invalid" class="form-control err-msg">Contraseña no válida.</div>
	
				<button id="enviar" type="submit" class="btn btn-default">Iniciar Sesión</button>
				<p>¿No tienes una cuenta? <a href="../registrarse" title="">Registrate</a></p>
				<p>¿Olvidaste tu contraseña? <a href="../reestablecer" title="">Reestablézcala</a></p>
			</form>	
		</div>
	</div>


	<!-- FIN ELEMENTOS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/validationInicarSesion.js"></script>

</body>
</html>