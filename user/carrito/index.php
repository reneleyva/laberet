<?php 
	include "../../lib/Libro.php";
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
	<link rel="stylesheet" href="../../css/carrito-style.css"> 
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
		      <li id="cart" class="active"><a href="../carrito"><img src="../../img/grey-cart.png" alt=""><b>(<?php echo count($_SESSION['cart'])?>)</b></a></li>
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
	<?php 
		
	  	$cart_books = $_SESSION['cart'];
	  	if(!$cart_books)
	  	{
	  		include "carrito-vacio.html";
	  		exit();
	  	}
	 ?>
	<div class="container">
		<div class="row">
			<table class="table table-striped">
				  <thead>
				    <tr>
				      <th>#</th>
				      <th>Portada</th>
				      <th>Titulo</th>
				      <th>Autor</th>
				      <th>Precio</th>
				    </tr>
				  </thead>
				  <tbody>
				  <?php
				  	$i = 1;
				  	foreach ($cart_books as $book): ?>
					<tr class="item" data-id=<?php echo $book->getId() ?>>
						<th scope="row"><?php echo $i ?></th>
						<td><img class="portada" src="../../<?php echo $book->getFotoFrente();?>" alt=""></td>
						<td><?php echo $book->getTitulo();?></td>
						<td><a href="#"><?php echo $book->getAutor();?></a></td>
						<td class="price" data-price="<?php echo $book->getPrecio();?>"><b>$<?php echo $book->getPrecio();?></b></td>
						<td class="eliminar">
							<button type="button">
								<span class="glyphicon glyphicon-remove"></span>
							</button>
						</td>
					</tr>
					<?php $i++; ?>
					<?php endforeach; ?>
				  </tbody>
			</table>
			<div class="continue row">
				<h4><b>Envío(Sólo envíos locales): +$100</b></h4>
				<h2 id="total"><b>Total: $0</b></h2>
				<a id="proceder" href="direccion.php" class="btn btn-default btn-lg "><b>Proceder a Pago</b></a>
			</div>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="../../js/bootstrap.min.js"></script>
	<script src="../../js/carrito.js"></script>

</body>
</html>