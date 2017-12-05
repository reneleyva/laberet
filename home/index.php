<?php 
include 'redirect.php';
include_once '../lib/Libro.php';
include_once '../lib/LibroVendido.php';
include_once '../lib/Busqueda.php';
include_once '../lib/Usuario.php';
// include_once '../pedidosEspeciales/PedidoEspecial.php';
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- <link rel="icon" href="../favicon.ico"> -->

	<title>Laberet </title>
	<!-- Bootstrap css -->
	<link rel="stylesheet" href="../css/jquery-ui.min.css"> 
	<link rel="stylesheet" href="../css/bootstrap.min.css"> 
	<link rel="stylesheet" type="text/css" href="../slick/slick.css"/>
	<link rel="stylesheet" type="text/css" href="../slick/slick-theme.css"/>
	<link rel="stylesheet" href="../css/home-style.css"> 
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
	?>
	<!-- EMPIEZA CAROUSEL -->
	<div class="container">
		<form action="../buscar" class="row form-inline" method="get" accept-charset="utf-8">
				<div id="search-form" class="form-group">
					<div class="input-group">
						<!-- BUSQUEDA -->
						<input required type="text" name="q" maxlength="40" id="keyword" class="form-control" placeholder="Buscar...">       
						<span class="input-group-btn">
							<button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
						</span>

						<select name="s" class="form-control">
							  <option value="todo">Todo</option>
							  <option value="autor">Autor</option>
							  <option value="titulo">Titulo</option>
							  <option value="categoria">Categoria</option>
						</select>
						
				    </div>
				
				<!-- Para javascript -->
				<?php if (isset($_GET['s'])) {
					echo "<input type='text' id='selected' hidden value='".htmlspecialchars($_GET['s'], ENT_QUOTES, 'UTF-8')."'>";
				} ?>
				 
				</div>
			</form>
			<?php 
				if ($_SESSION['first']) {
					echo "<h1>".htmlspecialchars("!Bienvenid@, ".$_SESSION['nombre']."!", ENT_QUOTES, 'UTF-8')."</h1>";
					$_SESSION['first'] = False;
				}
			 ?>
		<div class="row card">
			<h4 class="text-center">Últimos Libros Agregados</h4>
			<!-- <img src="img/back-grey.png" id="prev" class="col-lg-1 col-md-1 col-sm-1"></img> -->
			<div id="prev-libros" class="prev col-lg-1 col-md-2 col-sm-2 col-xs-3">
				<span class="glyphicon glyphicon-menu-left"></span>
			</div>
			<?php 
				$books = Busqueda::ultimosAgregados();
			 ?>
			<div id="carousel-libros" class="col-lg-10 col-md-8 col-sm-8 col-xs-6" data-num-libros="<?php echo count($books); ?>">
				
				<?php 
					
					if(empty($books)){
						echo "No Hay Libros :'(";
						// exit();
					}
				
				foreach ($books as $book):
				?>
				<div class="thumbnail libro">
					<div class="caption">
						<a href="#"><img class="book-cover" src="../<?php echo $book->getFotoFrente();?>" alt=""></a>
						<div class="info">
							<p class="book-title"><?php echo $book->getTitulo();?></p>
							<p class="book-author" href="#"><?php echo $book->getAutor();?></p>
							<p class="book-price"><b>$<?php echo $book->getPrecio();?> MXN</b></p>
						</div>
					</div>
					<input type="text" hidden class="id" name="" value="<?php echo $book->getId()?>">
				</div>
				<?php endforeach;?>			
				</div><!-- Fin Carousel -->

			<!-- <img src="img/next-grey.png" id="next" class="col-lg-1 col-md-1 col-sm-1"></img> -->
			<div id="next-libros" class="next col-lg-1 col-md-2 col-sm-2 col-xs-3">
				<span class="glyphicon glyphicon-menu-right"></span>
			</div>
		</div>
		
		<?php 
			$librerias = Busqueda::getLibrerias();
		 ?>
		<!-- Empieza Carousel Librerías -->
		<div class="row card">
			<h4 class="text-center">Últimas Librerías Agregadas</h4>
			<!-- <img src="img/back-grey.png" id="prev" class="col-lg-1 col-md-1 col-sm-1"></img> -->
			<div id="prev-librerias" class="prev col-lg-1 col-md-1 col-sm-3 col-xs-3">
				<span class="glyphicon glyphicon-menu-left"></span>
			</div>

			<div id="carousel-librerias" class="col-lg-10 col-md-10 col-sm-6 col-xs-6" data-num-librerias="<?php echo count($librerias) ?>">
			<?php 
				
				if(empty($librerias)){
					echo "No Hay Librerias :'(";
					// exit();
				}
			foreach ($librerias as $libreria): ?>	
				<div class="perfil">
					<div class="box">
						<div class="row text-center nombre">
							<h4 class="col-lg-12"><b><?php echo $libreria->getNombre();?></b></h4>
						</div>
						<div class="row foto-perfil">
							<div style="background: url(
							<?php echo htmlspecialchars('../'.$libreria->getFotoPerfil(), ENT_QUOTES, 'UTF-8');?>
						 ) no-repeat no-repeat center center;" class="circle"></div>
						</div>
						
						<div class="row text-center ver-perfil">
							<a href="../infoLibreria/?id=<?php echo $libreria->getId();?>"><button type="" class="btn btn-sm">VER PERFIL</button></a>
						</div>
					</div>
				</div>
			<?php endforeach;?>
				
			</div><!-- Fin Carousel -->

			<!-- <img src="img/next-grey.png" id="next" class="col-lg-1 col-md-1 col-sm-1"></img> -->
			<div id="next-librerias" class="next col-lg-1 col-md-1 col-sm-3 col-xs-3">
				<span class="glyphicon glyphicon-menu-right"></span>
			</div>
		</div>
		

		<!-- Pedido Especial -->
		<?php 
			$libros_surtidos = Usuario::getLibroSurtido($_SESSION['id']);
			if ($libros_surtidos):?>

		<?php 
		foreach ($libros_surtidos as $libro): ?>
			<div class="row card pedido-especial">
				<h3 class="text-center"><b>Librería Aurora ha surtido tu pedido especial.</b></h3>
				<div class="libro">
					<div class="col-lg-2 col-lg-offset-4 col-md-2 col-md-offset-4 col-sm-6 col-sm-offset-0 col-xs-5 col-xs-offset-0">
						<img class="book-cover" src="../img/brave-men.jpg" alt="Brave Men">
					</div>
					<div class="info col-lg-2 col-lg-offset-4 col-md-2 col-md-offset-4 col-sm-6 col-sm-offset-0 col-xs-7 col-xs-offset-0">
						<p class="book-title"><?php echo $libro->getDescripcion();?></p>
						<a class="book-author" href="#">Ernie Pyle</a>
						<p><b>Autor: </b><a href="#">Ernie Pyle</a></p>
						<p><b>Ubicación: </b><a href="#" title="Librería Aurora">Librería Aurora</a></p>
						<p class="book-price">$230</p>
						<button type="" class="btn btn-default"><b>Ver Libro</b></button>
					</div>
				</div>
			</div> <!-- Fin Pedido Especial -->
		<?php endforeach;?>
		<?php endif; ?>

		<?php 
		$compras = Busqueda::getLibrosComprados($_SESSION['id']);
		 // Pero será verdadero
		if ($compras):
			// Para buscar sugerencias.
			$tags = array();
		?>

		<!-- Compras Recientes -->
		<div class="row card compras-recientes">
			<h4 class="text-center"><b>Tus compras recientes.</b></h4>
			<div id="prev-compras" class="prev col-lg-1 col-md-1 col-sm-2 col-xs-2">
					<span class="glyphicon glyphicon-menu-left"></span>
			</div>
			
			<!-- IMPORTANTE! si son menos de 3 elementos ponerle style="float: none;" -->
			<div id="carousel-compras" class="row col-lg-10 col-md-10 col-sm-8 col-xs-8">

			<?php 
				foreach ($compras as $compra): 
					// Va llenando los tags
					$tags = array_merge($tags,explode(" ", trim($compra->getTags(), " ")));
			?>

				<!-- Prueba para Morrú -->
				<div class="cover col-lg-1 col-md-5">
					<img src="../<?php echo $compra->getFotoFrente();?>" alt="">
				</div>

				<div class="info col-lg-5 col-md-5">
					<p style="margin-bottom: 5px;"><b><?php echo $compra->getTitulo();?></b></p>
					<p><b>Autor: </b><?php echo$compra->getAutor();?></p>
					<p><b>Vendedor: </b> <?php echo$compra->getlibreria();?></p>
					<p><b>Precio: </b> $<?php echo$compra->getPrecio();?> MXN</p>
				</div>

				<?php endforeach;
					// Buscamos los libros de interés.
					$books = array();
					$books = Busqueda::busquedaPorTags($tags);
				?>
			</div>

			<div id="next-compras" class="next col-lg-1 col-md-1 col-sm-2 col-xs-2">
			
				<span class="glyphicon glyphicon-menu-right"></span>
			</div>
			<a href="../historialCompras"  title="" class="btn btn-default centered"><b>Ver Todas Las Compras </b></a>
		</div> <!-- Fin Compras Recientes.  -->

		<!-- Si hay libros relacionados -->
		<?php if (!empty($books)): ?>

			<!-- Libros que Quizas le ineteresen -->
			<div class="row card">
				<h4 class="text-center">Libros que Quizás te interesen.</h4>
				<!-- <img src="img/back-grey.png" id="prev" class="col-lg-1 col-md-1 col-sm-1"></img> -->
				<div id="prev-intereses" class="prev col-lg-1 col-md-2 col-sm-2 col-xs-3">
					<span class="glyphicon glyphicon-menu-left"></span>
				</div>

				<div id="carousel-intereses" class="carousel col-lg-10 col-md-8 col-sm-8 col-xs-6	">
				<?php foreach ($books as $book): ?>
					
					<div class="thumbnail libro">
						<div class="caption">
							<a href="#"><img class="book-cover" src="../<?php echo $book->getFotoFrente();?>" alt=""></a>
							<div class="info">
								<p class="book-title"><?php echo $book->getTitulo();?></p>
								<p class="book-author" href="#"><?php echo $book->getAutor();?></p>
								<p class="book-price"><b>$<?php echo $book->getPrecio();?> MXN</b></p>
							</div>
						</div>
						<input type="text" hidden class="id" name="" value="<?php echo $book->getId()?>">
					</div>
				<?php endforeach?>
					
				</div><!-- Fin Carousel -->

				<!-- <img src="img/next-grey.png" id="next" class="col-lg-1 col-md-1 col-sm-1"></img> -->
				<div id="next-intereses" class="next col-lg-1 col-md-2 col-sm-2 col-xs-3">
					<span class="glyphicon glyphicon-menu-right"></span>
				</div>
			</div>  <!-- End Libros Relacionados -->
		<?php endif; ?> 

	<?php else: ?>
		<h1>NO COMPRAS!</h1>
	<?php endif; ?> 
		
	</div>
	<div id="footer-hl">
	</div>
	<?php 
		include '../components/footer-user.php';
	?>
	<!-- FIN ELEMENTOS -->

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../slick/slick.min.js"></script>
	<script src="../js/home-carousel.js"></script>
	<script src="../js/linkLibro.js"></script>
	<script src="../js/jquery-ui.min.js"></script>
	<script src="../js/autocomplete.js"></script>
	<script src="../js/truncateLibros.js"></script>
	
</body>
</html>