<?php 
	include "../lib/Libro.php";
	session_start();
	if (!isset($_SESSION['pago'])){
		//NO debería estar aquí! 
		header("Location: .");
		exit();
	} else if (!$_SESSION['pago']) {
		//Ya pagó 
		header("Location: .");
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
	<link rel="stylesheet" href="../css/pago-style.css">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
	
	
	<?php 
		function resize($url, $size) {
			return join("upload/h_".$size, explode("upload", $url));
		};
		$current_page = 'pago';
		include '../components/navbar-user.php';
	?>
	
	<div class="container">
		<?php 
			include "compruebaLibros.php"; 
			$cart_books = $_SESSION['carrito'];
		?>
		<div class="checkout">
			<h2><strong>Orden:</strong> #<?php echo $numOrden ?></h2>
			<table class="table">
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
						<td><img class="portada" src="<?php echo resize($book->getFotoFrente(), 130);?>" alt=""></td>
						<td><p><?php echo $book->getTitulo();?></p></td>
						<td><p><?php echo $book->getAutor();?></p></td>
						<td class="price" data-price="<?php echo $book->getPrecio();?>"><b>$<?php echo $book->getPrecio();?></b></td>
						<!-- <td class="eliminar">
							<button type="button">
								<span class="glyphicon glyphicon-remove"></span>
							</button>
						</td> -->
					</tr>
					<?php $i++; ?>
					<?php endforeach; ?>
				  </tbody>
			</table>
			<div class="continue row">
				<h4><b>Envío: +$<?php echo $envio; ?></b></h4>
				<h2 id="total"><b>Total: $<?php echo $total; ?></b></h2>
			<div class="row">
				<div id="paypal-button"></div>
				<!-- <button id="enviar" type="submit" class="btn btn-default">Ir a Pago</button><br><br> -->
			</div>
					
		</div>
	</div>
	


	<!-- FIN ELEMENTOS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://www.paypalobjects.com/api/checkout.js"></script>
	<script src="../js/paypal.js"></script>
	<script src="../js/bootstrap.min.js"></script>
</body>
</html>