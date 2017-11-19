<?php 
	session_start();
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
	<link rel="stylesheet" href="../css/editarPerfil-style.css">
	<link rel="stylesheet" href="../css/navbar-user.css">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
	<?php 
		$current_page = 'editarPerfil';
		include '../components/navbar-user.php';
	?>
	
	<div class="container">
		<h2>Editar Perfil</h2>
		<table class="table">
			<tr>
				<td><b>Nombre</b></td>
				<td class="value">Jazmin Luna Andrea</td>
				<td><a class="editar" href="#"><span class="glyphicon glyphicon-pencil"></span> editar</a></td>
			</tr>
			<tr>
				<td><b>Correo</b></td>
				<td class="value">luis@mail.com</td>
				<td><a class="editar" href="#"><span class="glyphicon glyphicon-pencil"></span> editar</a></td>
			</tr>
			<tr>
				<td><b>Contraseña</b></td>
				<td class="value">******</td>
				<td><a class="editar" href="#"><span class="glyphicon glyphicon-pencil"></span> editar</a></td>
			</tr>
		</table>

		<form action="stuff.php" method="post" accept-charset="utf-8">
			<table class="table" hidden="true" id="forma">
				<tr>
					<td><b>Nombre</b></td>
					<td class="value"><input required id="nombre" type="text" value="" placeholder=""></td>
				</tr>
				<tr>
					<td><b>Correo</b></td>
					<td class="value"><input required type="email" value="" placeholder=""></td>
				</tr>
				<tr>
					<td><b>Contraseña</b></td>
					<td class="value"><input required type="password" id="pass1" value="penis" placeholder=""><p hidden class="err-msg" id="corta">Contraseña muy corta</p></td>
				</tr>

				<tr>
					<td><b>Repetir Contraseña</b></td>
					<td class="value"><input type="password" id="pass2" value="" placeholder=""><p hidden class="err-msg" id="coiciden">Las contraseñas no coinciden</p></td>
				</tr>

				<tr>
					<td></td>
					<!-- <td><button type="button" id="cancelar" class="btn btn-default">Cancel</button></td> -->
					<td><button type="submit" id="guardar" class="btn btn-default">Guardar</button></td>
				</tr>
			</table>
			
		</form>
		<a id="eliminar" class="btn btn-danger" href="#"><span class="glyphicon glyphicon-remove"></span> Eliminar Perfil</a>
		

	</div>
	<?php 
		include '../components/footer-user.php';
	?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/editarPerfil.js"></script>
</body>
</html>