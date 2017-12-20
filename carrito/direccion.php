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
	} else if (count($_SESSION['carrito']) == 0) {
		header("location: .");	
	}
	include "../lib/Libro.php";	
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
	<link rel="stylesheet" href="../css/direccion-style.css">
	<link rel="stylesheet" href="../css/navbar-user.css">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
	
	<?php 
		$current_page = 'direccion';
		include '../components/navbar-user.php';
		include 'direccionUsuario.php';
	?>
	
	<div class="container">
		<div class="row">
		<?php if($direccion): ?>
			<form id="formulario" action="agregar-direccion.php" method="post" accept-charset="utf-8" class="form-group" onsubmit="return check()">
				<h1><b>Dirección de envío</b></h1>
				<h3>Solo envíos en la CDMX.</h3>
				<label for="nombre">Nombre Completo</label>
				<input id="nombre" required type="text" name="nombre"  placeholder="Luis Alberto" class="form-control" value="<?php echo $_SESSION['nombre']; ?>">
				<label for="cp">Código Postal</label>
				<input value="<?php echo htmlspecialchars($direccion['cp'], ENT_QUOTES, 'UTF-8') ?>" id="cp" maxlength="6" required type="text" name="cp"  placeholder="09200" class="form-control">
				<!-- <div id="correo-invalido" class="form-control err-msg">¡Correo no válido!</div> -->
			    <label for="Delegación">Delegación</label>
			    <select name="delegacion" id="delegacion" class="form-control" data-choosen="<?php echo htmlspecialchars($direccion['delegacion'], ENT_QUOTES, 'UTF-8') ?>">
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
				<input  required type="text" name="colonia" value="<?php echo htmlspecialchars($direccion['colonia'], ENT_QUOTES, 'UTF-8') ?>" placeholder="Colonia" class="form-control">
				<label for="calleYNum">Calle y Número</label>
				<input  required type="text" name="calleYNum" value="<?php echo htmlspecialchars($direccion['calleYnumero'], ENT_QUOTES, 'UTF-8'); ?>" placeholder="azulejos #23" class="form-control">
				<label for="descripcion">Descripción extra (Opcional)</label>
				<p>Ej. Numero de edificio y departamento, color de puerta, etc.</p>
				<input type="text" name="descripcion" value="<?php echo htmlspecialchars($direccion['descripcion'], ENT_QUOTES, 'UTF-8') ?>" placeholder="Edificio G4 departamento #32" class="form-control">
				<label for="telefono">Telefono (Celular o De casa)</label>
				<input  required type="text" name="telefono" value="<?php echo htmlspecialchars($direccion['telefono'], ENT_QUOTES, 'UTF-8') ?>" placeholder="04455123456" class="form-control">
				<div class="row">
					<!-- <div id="paypal-button"></div> -->
					<button id="enviar" type="submit" class="btn btn-default">Ir a Pago</button><br><br>
				</div>

				

			</form>	
		<?php else: ?>
			<form id="formulario" action="agregar-direccion.php" method="post" accept-charset="utf-8" class="form-group" onsubmit="return check()">
				<h1><b>Dirección de envío</b></h1>
				<h3>Solo envíos en la CDMX.</h3>
				<label for="nombre">Nombre Completo</label>
				<input id="nombre" required type="text" name="nombre"  placeholder="Luis Alberto" class="form-control" value="<?php echo $_SESSION['nombre']; ?>">
				<label for="cp">Código Postal</label>
				<input value="" id="cp" maxlength="6" required type="text" name="cp"  placeholder="09200" class="form-control">
				<!-- <div id="correo-invalido" class="form-control err-msg">¡Correo no válido!</div> -->
			    <label for="Delegación">Delegación</label>
			    <select name="delegacion" id="delegacion" class="form-control" data-choosen="">
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
				<input type="text" name="descripcion" value="" placeholder="Edificio G4 departamento #32" class="form-control">
				<label for="telefono">Telefono (Celular o De casa)</label>
				<input  required type="text" name="telefono" value="" placeholder="04455123456" class="form-control">
				<div class="row">
					<!-- <div id="paypal-button"></div> -->
					<button id="enviar" type="submit" class="btn btn-default">Ir a Pago</button><br><br>
				</div>


			</form>	
		<?php endif; ?>
			
		</div>
	</div>
	


	<!-- FIN ELEMENTOS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="../js/direccion.js"></script>
	<script src="../js/bootstrap.min.js"></script>
</body>
</html>