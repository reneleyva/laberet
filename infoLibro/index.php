<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- <link rel="icon" href="../../favicon.ico"> -->
   
	<title>Laberet</title>
	<!-- Bootstrap css -->
	<link rel="stylesheet" href="../css/bootstrap.min.css"> 
	<link rel="stylesheet" type="text/css" href="../slick/slick.css"/>
	<link rel="stylesheet" type="text/css" href="../slick/slick-theme.css"/>
	<link rel="stylesheet" href="../css/infoLibro-style.css"> 
	<link rel="stylesheet" type="text/css" href="../css/navbar-vis.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
		session_start();
		$current_page = "infoLibro";
		if (!isset($_SESSION['tipo'])) {
			//Nuevo en la página
			$_SESSION['tipo'] = 'invitado';
			include '../components/navbar-visitante.php';

		} else if ($_SESSION['tipo'] == 'invitado') {
			
			include '../components/navbar-visitante.php';
		} else if ($_SESSION['tipo'] == 'usuario') {
			//Es usuario registrado
			include '../components/navbar-user.php';
		} else {
			include '../components/navbar-libreria.php';
		}

	?>

	<div class="container">
		<?php include 'info.php'; ?>
		<div class="row bookInfo" data-id="<?php echo $book->getId();?>">

			<div class="photos col-lg-4 col-md-4 col-sm-6 col-xs-6">
				<div class="cover">
					<img src="<?php echo $book->getFotoFrente();?>" alt="">					
				</div>
				<div class="back">
					<img src="<?php echo $book->getFotoAtras();?>" alt="">
				</div>
			</div>
			
			<div class="info col-lg-4 col-md-4 col-sm-6 col-xs-6">
				<p class="title"> 
				<?php echo $book->getTitulo();?></p>

				<p><b>Autor: </b><a class="author" href="../buscar/?q=<?php echo $book->getAutor();?>&s=autor">
					<?php echo $book->getAutor();?>
				</a></p>
				<p><b>Precio: </b> <b>$<?php echo $book->getPrecio();?></b></p>
				<p><b>Ubicación:</b> <a href="../infoLibreria/?id=<?php echo $libreria->getId();?>">
					<?php echo $libreria->getNombre();?>
				</a></p>
				<?php if($book->getIsbn()): ?>
					<p><b>ISBN: </b> <?php echo $book->getIsbn();?></p>
				<?php endif; ?>
				<p><b>Tags: </b> 
				<?php 
				$tags = explode(" ", trim($book->getTags(), " "));
				for ($i=0; $i < count($tags); $i++) { 
					if ($tags[$i] != '')
						echo '<a href="../buscar/?term='.$tags[$i].'&s=todo" class="label label-default">'.$tags[$i].'</a> ';
				} 
				?><!-- Fin php -->
		
				</p>
				<img src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/cc-badges-ppmcvdam.png" alt="Credit Card Badges"><br>
				
				<?php $idLibro = $_GET['id']; ?>
				<?php if(isset($_SESSION['carrito'][$idLibro])) : ?>
					<button id="added-cart" type="button" class="btn btn-md"><b> <span class="glyphicon glyphicon-ok"></span> Añadido al carrito </b></button>
				<?php else: ?>
					<button id="add-cart" type="button" class="btn btn-md"><b> <span class="glyphicon glyphicon-shopping-cart"></span> Añadir al carrito </b></button>
				<?php endif; ?>
				
				
				
			</div>

			<div class="libreria col-lg-4 col-md-4 hidden-sm hidden-xs">
				<div class="perfil">
					<div id="box">
						<div class="row text-center">
							<h4 class="col-lg-12"><b><?php echo $libreria->getNombre(); ?></b></h4>
						</div>
						<div class="circle" style="background: url(<?php echo $libreria->getFotoPerfil()?>) no-repeat no-repeat center center;"></div>
						<div class="row text-center">
							<a href="../infoLibreria/?id=<?php echo $libreria->getId(); ?>"><button type="" class="btn btn-sm">Ver Perfil</button></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Modal -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="titulo">Imágenes</h4>
			      </div>
			      <div class="modal-body">
			        <div class="row">
			        	<div class="modal-cover col-lg-6 col-md-6 col-sm-6 col-xs-12">
			        		<img src="<?php echo htmlspecialchars($book->getFotoFrente(), ENT_QUOTES, 'UTF-8');?>" alt="">
			        	</div>
			        	<div class="modal-back col-lg-6 col-md-6 col-sm-6 col-xs-12">
			        		<img src="<?php echo htmlspecialchars($book->getFotoAtras(), ENT_QUOTES, 'UTF-8');?>" alt="">
			        	</div>
			        </div>
			      </div>
			      
			    </div>
			  </div>
			</div>
		<h3 class="text-center" id="libros-relacionados"><b>Libros Relacionados</b></h3>

		<div class="row card">
			
			<div id="prev-relacionados" class="prev col-lg-2 col-md-2 col-sm-2 col-xs-2">
				<span class="glyphicon glyphicon-menu-left"></span>
			</div>
			
			<?php if(!$relacionados) {
				echo "<b class='text-center'>NO HAY LIRBOS RELACIONADOS</b>";
				// exit();
			} ?>
			<div  id="carousel-relacionados" class="row col-lg-8 col-md-6 col-sm-8 col-xs-8	" data-num-libros="<?php echo count($relacionados); ?>">

			<?php 

			
			foreach ($relacionados as $book): ?>
				
				
				<div class="thumbnail libro relacionado">
					<div class="caption">
						<a href="#"><img class="book-cover" src="<?php echo $book->getFotoFrente();?>"></a>
						 <div class="info">
							<p class="book-title"><?php echo $book->getTitulo();?><br></p>
							<p class="book-author" href="#"><?php echo $book->getAutor();?></p>
							<p class="book-price"><b><?php echo '$'.$book->getPrecio().' MXN';?></b></p>
						</div> 
						<input type="text" class="id" hidden="true" value="<?php echo htmlspecialchars($book->getId(), ENT_QUOTES, 'UTF-8');?>">
					</div>
				</div>

				

			<?php endforeach; ?>
			</div>
				<div id="next-relacionados" class="next col-lg-2 col-md-2 col-sm-2 col-xs-2">
				<span class="glyphicon glyphicon-menu-right"></span>
			</div>
				
			</div><!-- Fin Carousel -->
			
		</div>
		
		

			
	</div>
	
	<?php 
		if ($_SESSION['tipo'] == 'invitado') {
			include '../components/footer-visitante.html';
		} else if ($_SESSION['tipo'] == 'usuario') {
			include '../components/footer-user.php';
		}

	?>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../slick/slick.min.js"></script>
	<script src="../js/infoLibro.js"></script>
	<script src="../js/linkLibro.js"></script>
</body>
</html>