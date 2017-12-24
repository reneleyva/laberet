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

	<title>Laberet</title>
	<!-- Bootstrap css -->
	<link rel="stylesheet" href="../css/bootstrap.min.css"> 
	<link rel="stylesheet" href="../css/editarPerfil-libreria-style.css"> 
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.0.0/sweetalert2.min.css">
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

	ga('create', 'UA-XXXXX-Y', 'auto', 'myTracker', {
	  userId: <?php echo $_SESSION['id']; ?>
	});
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
	$current_page = 'editarPeril';
	include '../components/navbar-libreria.php'; 
	include 'perfil.php';
	?>
	<div class="container">
		<h2>Editar Perfil</h2>

		<div class="fotos col-lg-12" style="background: url(<?php echo $libreria->getFotoPortada(); ?>) no-repeat no-repeat center center; 
		  -webkit-background-size: cover;
		  -moz-background-size: cover;
		  -o-background-size: cover;
		  background-size: cover;" data-image="<?php echo $libreria->getFotoPortada() ?>">
			<div class="row-fluid">
				<div>
					<div id="box">
						
						<div class="circle" style="background: url(<?php echo $libreria->getFotoPerfil()?>) no-repeat no-repeat center center;" data-image="<?php echo $libreria->getFotoPerfil() ?>"></div>
						<div class="row text-center">
							<button id="cambiar-perfil" type="button" class="btn btn-default"><b> <span class="glyphicon glyphicon-camera"></span> Cambiar Foto Perfil</b></button>
							<div class="row">
								<button style="display: none;" type="button" class="btn btn-default" id="cancelar-perfil">Cancelar</button>
								<button style="display: none;" id="guardar-perfil" type="button" class="btn btn-default"><b><span class="glyphicon glyphicon-ok"></span> Guardar</b></button>

							</div>
							
						</div>
						
						<!-- Formulario Escondido para subir foto de perfil -->
						<form hidden action="actualizarFotoPerfil.php" method="post" enctype="multipart/form-data">
							<input id="input-foto-perfil" type="file" accept="image/x-png,image/gif,image/jpeg" name="foto-perfil">
							<button type="submit"></button>
						</form>

					</div>
				</div>
				
				<!-- Formulario Escondido para subir foto de portada -->
				<form hidden action="actualizarFotoPortada.php" method="post"  enctype="multipart/form-data">
					<input id="input-foto-portada" type="file" accept="image/x-png,image/gif,image/jpeg" name="foto-portada" value="">
					<input type="submit" name="submit" hidden>
				</form>

				<div class="row text-center">
					<button id="cambiar-portada" type="button" class="btn btn-default"><b> <span class="glyphicon glyphicon-camera"></span> Cambiar Foto De Portada</b></button>
					<div class="row">
						<button style="display: none;" type="button" class="btn btn-default" id="cancelar-portada">Cancelar</button>
						<button style="display: none;" id="guardar-portada" type="button" class="btn btn-default"><b><span class="glyphicon glyphicon-ok"></span> Guardar</b></button>
					</div>
					
				</div>
			</div>
		</div> <!-- Fin fluid -->

		<table class="table" id="table-info">
			<tr>
				<td><b>Nombre Librería</b></td>
				<td class="value"><?php echo $libreria->getNombre(); ?></td>
				<td><a class="editar" href="#"><span class="glyphicon glyphicon-pencil"></span> editar</a></td>
			</tr>
			<tr>
				<td><b>Dirección</b></td>
				<td class="value"><?php echo $libreria->getDireccion() ?></td>
				<td><a class="editar" href="#"><span class="glyphicon glyphicon-pencil"></span> editar</a></td>
			</tr>
			<tr>
				<td><b>Correo</b></td>
				<td class="value"><?php echo $libreria->getCorreo(); ?></td>
				<td><a class="editar" href="#"><span class="glyphicon glyphicon-pencil"></span> editar</a></td>
			</tr>
			<tr>
				<td><b>Contraseña</b></td>
				<td class="value">******</td>
				<td><a class="editar" href="#"><span class="glyphicon glyphicon-pencil"></span> editar</a></td>
			</tr>
		</table>
		<form id="form-info" action="actualizaInfo.php" method="post" accept-charset="utf-8">
			<table class="table" hidden="true" id="forma">
				<tr>
					<td><b>Nombre Librería</b></td>
					<td class="value"><input required name="nombre" id="nombre" type="text" value="<?php echo $libreria->getNombre(); ?>" placeholder=""></td>
				</tr>
				<tr>
					<td><b>Dirección</b></td>
					<td class="value"><input required name="direccion" id="direccion" type="text" value="<?php echo $libreria->getDireccion() ?>" placeholder=""></td>
				</tr>
				<tr>
					<td><b>Correo</b></td>
					<td class="value"><input required name="correo" type="email" value="<?php echo $libreria->getCorreo(); ?>" placeholder=""></td>
				</tr>
				<tr>
					<td><b>Contraseña</b></td>
					<td class="value"><input required name="password" type="password" id="pass1" value="" placeholder="******"><p hidden class="err-msg" id="corta">Contraseña muy corta</p></td>
				</tr>

				<tr>
					<td><b>Repetir Contraseña</b></td>
					<td class="value"><input type="password" id="pass2" value="" placeholder="******"><p hidden class="err-msg" id="coiciden">Las contraseñas no coinciden</p></td>
				</tr>

				<tr>
					<td></td>
					<td><button id="cancelar" type="button" class="btn btn-default">Cancelar</button><button type="submit" id="guardar" class="btn btn-default">Guardar</button></td>
				</tr>
			</table>
			
		</form>
		<a id="eliminar" class="btn btn-danger" href="#"><span class="glyphicon glyphicon-remove"></span> Eliminar Perfil</a>
		

	
	</div>
	
	<?php include '../components/footer-libreria.php'; ?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.0.0/sweetalert2.min.js"></script>
	<script src="../js/editarPerfil-libreria.js"></script>

</body>
</html>