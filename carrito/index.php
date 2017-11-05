<?php 
	include "../lib/Libro.php";
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
	<link rel="stylesheet" href="../css/bootstrap.min.css"> 
	<link rel="stylesheet" href="../css/carrito-style.css"> 
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

	<?php 
		$current_page = 'inicio';
		include '../components/navbar-user.php';
	  	$cart_books = $_SESSION['carrito'];
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
						<td><img class="portada" src="../<?php echo $book->getFotoFrente();?>" alt=""></td>
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
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/carrito.js"></script>

</body>
</html>