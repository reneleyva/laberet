<?php 
	session_start();
	include "../../lib/Libro.php";
	include_once('../redirect.php');
	
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
	<link rel="stylesheet" href="../../css/bootstrap.min.css"> 
	<link rel="stylesheet" href="../../css/direccion-style.css">
	<link rel="stylesheet" href="../../css/navbar-user.css">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
	<nav class="navbar navbar-default" role="navigation">
	  <!-- Brand and toggle get grouped for better mobile display -->
	  <div class="navbar-header col-lg-2 col-md-2 col-sm-2">
	    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	      <span class="sr-only">Toggle navigation</span>
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	    </button>
	    <a class="navbar-brand navbar-left" href="../../"><img id="icon" src="../../img/logo.png" alt=""></a>
		<!-- <a class="navbar-brand navbar-left laberet" href="#"><b>LABERET</b></a> -->
	  </div>

	  <!-- Collect the nav links, forms, and other content for toggling -->
	  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	    <div id="list" class="">
	    	<ul class="nav navbar-nav navbar-right">
		   	  	
		   	  <li><a href="../buscar">Catálogo</a></li>
		      <li><a href="../pedidosEspeciales">Pedidos Especiales</a></li>
		      <li id="cart"><a href="../carrito"><img src="../../img/grey-cart.png" alt=""><b>(<?php echo count($_SESSION['cart'])?>)</b></a></li>
		      <li class="dropdown">
		        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Cuenta</b> <b class="caret"></b></a>
		        <ul class="dropdown-menu">
		          <li><a href="#">Configurar Cuenta</a></li>
		          <li><a href="#">Historial de Compras</a></li>
		          <li class="divider"></li>
		          <li><a href="../salir">Salir</a></li>
		        </ul>
		      </li>
			</ul>
	    </div>	
	    
	  </div><!-- /.navbar-collapse -->
</nav> <!-- END NAV -->

	<div class="container">
		<div class="row">
			<form id="formulario" action="registrarse.php" method="post" accept-charset="utf-8" class="form-group" onsubmit="return check()">
				<h1><b>Dirección de envío</b></h1>
				<h3>Solo envíos en la CDMX.</h3>
				<label for="nombre">Nombre Completo</label>
				<input id="nombre" required type="text" name="nombre"  placeholder="Luis Alberto" class="form-control">
				<label for="cp">Código Postal</label>
				<input id="cp" maxlength="6" required type="text" name="cp"  placeholder="09200" class="form-control">
				<!-- <div id="correo-invalido" class="form-control err-msg">¡Correo no válido!</div> -->
			    <label for="Delegación">Delegación</label>
			    <select name="delegacion" class="form-control">
			    	<option value="Alvaro Obregon">Alvaro Obregon</option>
			    	<option value="Azcapotzalco">Azcapotzalco</option>
			    	<option value="Benito Juárez">Benito Juárez</option>
			    	<option value="Coyoacan">Coyoacan</option>
			    	<option value="Cuajimalpa de Morelos">Cuajimalpa de Morelos</option>
			    	<option value="Cuauhtémoc">Cuauhtémoc</option>
			    	<option value="Gustavo Madero">Gustavo Madero</option>
			    	<option value="Iztacalco">Iztacalco</option>
			    	<option value="Iztapalapa">Iztapalapa</option>
			    	<option value="Magdalena Contreras">Magdalena Contreras</option>
			    	<option value="Miguel Hidalgo">Miguel Hidalgo</option>
			    	<option value="Milpa Alta">Milpa Alta</option>
			    	<option value="Tláhuac">Tláhuac</option>
			    	<option value="Tlalpan">Tlalpan</option>
			    	<option value="Venustiano Carranza">Venustiano Carranza</option>
			    	<option value="Xochimilco">Xochimilco</option>
			    </select>
				
				<label for="colonia">Colonia</label>
				<input  required type="text" name="colonia" value="" placeholder="Colonia" class="form-control">
				<label for="calleYNum">Calle y Número</label>
				<input  required type="text" name="calleYNum" value="" placeholder="azulejos #23" class="form-control">
				<label for="descripcion">Descripción extra (Opcional)</label>
				<p>Ej. Numero de edificio y departamento, color de puerta, etc.</p>
				<input  type="text" name="descripcion" value="" placeholder="Edificio G4 departamento #32" class="form-control">
				<label for="telefono">Telefono (Celular o De casa)</label>
				<input  required type="text" name="telefono" value="" placeholder="04455123456" class="form-control">
				<button id="enviar" type="submit" class="btn btn-default">Ir a Pago</button><br><br>
			</form>	
		</div>
	</div>
	


	<!-- FIN ELEMENTOS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script>
		jQuery(document).ready(function($) {
			$('#formulario').submit(function(event) {
				event.preventDefault();
				alert();
				location.href = "enviado.html";
			});
		});
	</script>
	<script src="../../js/bootstrap.min.js"></script>
	<script src="../../js/validation.js"></script>

</body>
</html>