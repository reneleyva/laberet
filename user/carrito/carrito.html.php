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
	    <a class="navbar-brand navbar-left" href="#"><img id="icon" src="../../img/logo.png" alt=""></a>
		<!-- <a class="navbar-brand navbar-left laberet" href="#"><b>LABERET</b></a> -->
	  </div>

	  <!-- Collect the nav links, forms, and other content for toggling -->
	  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	    <div id="search" class="col-lg-4 col-md-4 col-sm-3 ">
	        <form class="navbar-form" role="search">
	        <div class="input-group">
	            <input type="text" class="form-control" placeholder="Search" name="q">
	            <div class="input-group-btn">
	                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
	            </div>
	        </div>
	        </form>
	    </div>
	    <div id="list" class="col-lg-6 col-md-6 col-sm-7">
	    	<ul class="nav navbar-nav navbar-right">
		   	  <li class="active" id="cart"><a href="#"><img src="../../img/grey-cart.png" alt=""><b>(0)</b></a></li>	
		      <li><a href="#">Pedidos Especiales</a></li>
		      <li class="dropdown">
		        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Cuenta</b> <b class="caret"></b></a>
		        <ul class="dropdown-menu">
		          <li><a href="#">Configurar Cuenta</a></li>
		          <li><a href="#">Historial de Compras</a></li>
		          <li class="divider"></li>
		          <li><a href="#">Salir</a></li>
		        </ul>
		      </li>
			</ul>
	    </div>	
	    
	  </div><!-- /.navbar-collapse -->
</nav> <!-- END NAV -->
	
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
				  	$cart_books = $_SESSION['cart'];
				  	if(!$cart_books)
				  	{
				  		include "carrito-vacio.html";
				  		exit();
				  	}
				  	foreach ($cart_books as $book): ?>

					<tr class="item">
						<th scope="row">1</th>
						<td><img class="portada" src="../../<?php echo $book.getFotoFrente();?>" alt=""></td>
						<td><?php echo $book.getTitulo();?></td>
						<td><a href="#"><?php echo $book.getAutor();?></a></td>
						<td class="price" data-price="<?php echo $book.getPrecio();?>"><b><?php echo $book.getPrecio();?></b></td>
						<td class="eliminar">
							<button type="button">
								<span class="glyphicon glyphicon-remove"></span>
							</button>
						</td>
					</tr>
				  </tbody>
			</table>
			<div class="continue row">
				<h4><b>Envío(Sólo envíos locales): +$100</b></h4>
				<h2 id="total"><b>Total: $0</b></h2>
				<button class="btn btn-default btn-lg disabled "><b>Proceder a Pago</b></button>
			</div>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="../../js/bootstrap.min.js"></script>
	<script src="../../js/carrito.js"></script>

</body>
</html>