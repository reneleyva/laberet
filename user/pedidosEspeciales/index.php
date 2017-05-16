<?php 
	include "../../temp/Libro.php";
	session_start();
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
	<link rel="stylesheet" href="../../css/navbar-user.css"> 
	<link rel="stylesheet" href="../../css/pedidosEspeciales-style.css"> 
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
			<h2><b>Pedidos Especiales</b></h2>
			<h4>Si no has encontrado el libro que buscabas en nuestro <br>catálogo nosotros lo buscamos por ti. </h4>

			<form action="pedidosEspeciales.php" method="post" accept-charset="utf-8" class="">
				<div class="form-group ">
					 <label for="isbn" class="col-form-label">ISBN (opcional)</label>
					 <input type="text" name = "isbn" class="form-control" id="isbn" placeholder="0803287682">
					 <label for="autor" class="col-form-label">Autor</label>
					 <input type="text" name="autor" required class="form-control" id="autor" placeholder="Julio Verne">
					 <label for="titulo" required class="col-form-label">Título</label>
					 <input type="text" name = "titulo" class="form-control" id="titulo" placeholder="...">
					 <label for="descripcion" class="col-form-label">Descripción (Opcional)</label>
					 <p>Si buscas un libro en una edición en particular descríbenosla. </p>
					 <textarea class="form-control" name="descripcion" rows="5" id="descripcion"></textarea>
					 <button class="btn btn-default" type="submit"><b>Enviar</b></button>
				</div>
				
			</form>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="../../js/bootstrap.min.js"></script>

</body>
</html>