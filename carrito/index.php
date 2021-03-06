<?php 
	include "../lib/Libro.php";
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
	<link rel="stylesheet" href="../css/carrito-style.css"> 
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
		function resize($url, $size) {
			return join("upload/h_".$size, explode("upload", $url));
		};
		$current_page = 'carrito';
		include '../components/navbar-user.php';
	  	$cart_books = $_SESSION['carrito'];
	  	if(!$cart_books)
	  	{
	  		include "carrito-vacio.html";
	  	}
	 ?>

<?php if($cart_books) : ?>
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
						<td><img class="portada" src="<?php echo resize($book->getFotoFrente(), 130);?>" alt=""></td>
						<td><a href="<?php echo "../infoLibro/?id=".$book->getId(); ?>" title=""><?php echo $book->getTitulo();?></a></td>
						<td><p><?php echo $book->getAutor();?></p></td>
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
				<h4><b>Envío(Sólo envíos locales): +$<span id="envio">0</span></b></h4>
				<h2 id="total"><b>Total: $0</b></h2>
				<a id="proceder" href="direccion.php" class="btn btn-default btn-lg "><b>Proceder a Pago</b></a>
			</div>
		</div>
	</div>
<?php endif; ?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/carrito.js"></script>

</body>
</html>