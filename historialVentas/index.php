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
	<link rel="stylesheet" href="../css/historialVentas.css"> 
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
		$current_page = 'ventas'; 
		include '../components/navbar-libreria.php';
		include '../lib/Busqueda.php';
		session_start();
		$idLibreria = $_SESSION['id'];
	?>
	
	<div class="container">

		<div class="row muestra"> <!-- INICIO MUESTRA -->
			<h2 class="text-center">Historial De Ventas </h2>
			<h4 class="text-center" id="total_compras">Total Compras en Linea: $</h4>
			<div class="hl col-lg-12 col-md-12 col-sm-12 col-xs-12"></div>
			<!-- Inicio Libros Vendidos -->
			<ul class="nav nav-tabs" id="myTab" role="tablist">
			  <li class="nav-item">
			    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Vendidos en Línea:</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Vendidos en Tienda: </a>
			  </li>
			</ul>
		<div class="tab-content pill-content" id="myTabContent">
		  <div class="tab-pane fade show active pill-pane" id="home" role="tabpanel" aria-labelledby="home-tab">
		  	<!-- Inicio Vendido en Línea -->
		  	<?php 
				$ventas = Busqueda::getLibrosVendidos($idLibreria);
				// Para mostrar el total de vendidos
				$total_ventas = 0;
				if ($ventas):
					// Para hacer las divisiones (líneas).
					$contador = 0;
					foreach ($ventas as $venta):
						$total_ventas += $venta->getPrecio();
						if ($contador == 2): 
							$contador =0;
			?> 
				<!-- Esta es la división -->
				<div class="hl col-lg-12 col-md-12 col-sm-12 col-xs-12"></div>
			<?php
						endif;
			?>	
				<div class="thumbnail row libro col-lg-6 col-md-6 col-sm-12">
					<div class="caption">
						<img class="book-cover col-lg-6 col-md-6 col-sm-6 col-xs-6" src="<?php echo $venta->getFotoFrente(); ?>" alt="Img">
						<div class="info col-lg-6 col-md-6 col-sm-6 col-xs-6">
							<p class="book-title"><?php echo $venta->getTitulo();?></p>
							<p class="book-author" href="#"><?php echo $venta->getAutor();?></p>
							<p class="book-price"><b>Precio: </b>$<?php echo $venta->getPrecio();?></p>
							<?php 
								$isbn = $venta->getIsbn();
								// Para mostrarlo si existe.
								if ($isbn):
							?>
							<p><b>ISBN: </b><?php  echo $isbn ?></p>
							<?php 
								endif;
							?>
							<p><b>Fecha de Venta: </b><?php echo $venta->getFechaVenta();?></p>
						</div>
					</div>
				</div>
			<?php 
					$contador++;
					endforeach;
				endif;
			?>
		  	<!-- Fin Vendido en Línea -->
		  </div>
		  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
		  	<!-- Inicio Vendido en Tienda -->
		  	<?php 
				// $idLibreria = $_SESSION['id'];
				$ventas = Busqueda::getLibrosVendidosTienda($idLibreria);
				if ($ventas):
					// Para hacer las divisiones (líneas).
					$contador = 0;
					foreach ($ventas as $venta):
						if ($contador == 2): 
							$contador =0;
			?> 
				<!-- Esta es la división -->
				<div class="hl col-lg-12 col-md-12 col-sm-12 col-xs-12"></div>
			<?php
						endif;
			?>	
				<div class="thumbnail row libro col-lg-6 col-md-6 col-sm-12">
					<div class="caption">
						<img class="book-cover col-lg-6 col-md-6 col-sm-6 col-xs-6" src="<?php echo $venta->getFotoFrente(); ?>" alt="Img">
						<div class="info col-lg-6 col-md-6 col-sm-6 col-xs-6">
							<p class="book-title"><?php echo $venta->getTitulo();?></p>
							<p class="book-author" href="#"><?php echo $venta->getAutor();?></p>
							<p class="book-price"><b>Precio: </b>$<?php echo $venta->getPrecio();?></p>
							<?php 
								$isbn = $venta->getIsbn();
								// Para mostrarlo si existe.
								if ($isbn):
							?>
							<p><b>ISBN: </b><?php  echo $isbn ?></p>
							<?php 
								endif;
							?>
							<p><b>Fecha de Venta: </b><?php echo $venta->getFechaVenta();?></p>
						</div>
					</div>
				</div>
			<?php 
					$contador++;
					endforeach;
				endif;
			?>
		  	<!-- Fin Vendido en Tienda -->
		  </div>
		</div>
		<!-- Para calcular el total de ventas en línea -->
		<input type="hidden" id="precio_total" value="<?php echo $total_ventas ?>">

		</div> <!-- FIN MUESTRA DE LIBROS -->
		<div class="hl col-lg-12 col-md-12 col-sm-12 col-xs-12"></div>
	</div>
	
	<?php include '../components/footer-libreria.php'; ?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/historialVentas.js"></script>
</body>
</html>