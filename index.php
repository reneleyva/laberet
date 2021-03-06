<?php include "variable-sesion.php" ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <meta name="description" content="">
    <meta name="author" content="">
    <meta property="og:title" content="Laberet" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="http://www.laberet.com" />
	<meta property="og:image" content="http://res.cloudinary.com/dzu2umeba/image/upload/v1513531736/ew6ufbaqaopvxokmjmdc.png" />
	<meta property="og:description" content="La tienda en línea de las librerías independientes">
    <link rel="icon" href="http://res.cloudinary.com/dzu2umeba/image/upload/h_32/v1513531736/ew6ufbaqaopvxokmjmdc.png">

	<title>Laberet</title>
	<!-- Bootstrap css -->
	<link rel="stylesheet" href="css/bootstrap.min.css"> 
	<link rel="stylesheet" href="css/jquery-ui.min.css">
	<link rel="stylesheet" href="css/navbar-vis.css">
	<link rel="stylesheet" href="css/style.css"> 
	<link rel="stylesheet" type="text/css" href="css/footer.css">
	<link rel="stylesheet" type="text/css" href="slick/slick.css"/>
	<link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
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
	<!-- ****** EMPIEZAN ELEMENTOS ******* -->	
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header col-lg-2 col-md-2">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapse-target">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand navbar-left" href="#"><img id="icon" src="img/logo.png" alt=""></a>
      <!-- <a class="navbar-brand navbar-left laberet" href="#"><b>LABERET</b></a> -->
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="collapse-target">
       
       <div id="list" class="col-lg-10 col-md-10">
          <ul class="nav navbar-nav navbar-right">
                  <li><a href="buscar">Catálogo</a></li>
                  <li><a href="librerias">Librerías</a></li>
                  <li><a href="registrarse">Registrarse</a></li>
                  <li>
                    <p class="navbar-btn">
                      <a href="inicioSesion" class="btn btn-success">Iniciar Sesión</a>
                    </p>
                  </li> 
        </ul>
       </div>
        
      </div><!-- /.navbar-collapse -->
  </nav> <!-- END NAV -->

	<div class="container-fluid">
	<!-- HEADER -->
		<div class="row-fluid">
		<h1 id="element" class="centering text-center">Encuentra Los Libros Que Amas</h1>
		<h2>La tienda en línea de las librerías independientes.</h2>
		<div id="buscar">
			<form action="./buscar/" class="form-inline" method="get" accept-charset="utf-8">
				<div id="search-form" class="form-group">
					<div class="input-group	">
						<!-- BUSQUEDA -->
						<input type="text" name="q" id="busqueda" class="typed form-control" placeholder="...">   
						<input id="keyword" style="display: none;" maxlength="20" class="form-control"  type="text" name="term">    
						<span class="input-group-btn">
							<button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
						</span>
				    </div>
				    
				<select name="s" class="form-control" style="display: none;">
					  <option value="todo">Todo</option>
					  <option value="autor">Autor</option>
					  <option value="titulo">Titulo</option>
					  <option value="categoria">Categoria</option>
				</select>
				
				 
				</div>
			</form>
		</div>
		
	
	 	</div> <!-- FIN HEADER -->
    </div>
	
	<!-- Lo que hacemos -->
	<div class="container">
		<div id="go1" class="hl"></div>
		<h2 class="text-center"><b>Lo que hacemos</b></h2>

		<div class="row" id="lo_que_hacemos">
			
			<div class="card col-lg-4 col-md-4 col-sm-12 col-xs-12">
				<div class="wrap">
					<div class="icono col-lg-12 col-md-12 col-sm-6 col-xs-6">
						<img src="img/enlinea.png">
					</div>
					<div class="texto col-lg-12 col-md-12 col-sm-6 col-xs-6">
						<p> Proporcionamos a las librerías de la ciudad la infraestuctura para catalogar sus mejores libros y venderlos en linea.</p>
					</div>
				</div>
			
			</div>

			<div class="card col-lg-4 col-md-4 col-sm-12 col-xs-12">
				<div class="icono col-lg-12 col-md-12 col-sm-6 col-xs-6">
					<img src="img/libros.png">
				</div>
				<div class="texto col-lg-12 col-md-12 col-sm-6 col-xs-6">
					<p>Ayudamos a las librerías a ordenar su inventario en nuestra base de datos y a llevar un control exacto de sus ventas y su presencia en linea.</p>
				</div>
			</div>
			<div class="card col-lg-4 col-md-4 col-sm-12 col-xs-12">
				<div class="icono col-lg-12 col-md-12 col-sm-6 col-xs-6">
					<img src="img/reading.png">
				</div>
				<div class="texto col-lg-12 col-md-12 col-sm-6 col-xs-6">
					<p>¿No encuentras el libro que buscabas? Prueba nuestro servicio de pedido especial y nosotros lo buscamos por ti. </p>
				</div>
			</div>


		</div>
		<div class="hl"></div>
	</div> <!-- FIN Lo que hacemos -->

	<!-- INICIO Carousel Librerías -->
	<div id="librerias" class="container-fluid">
		<?php include 'librerias.php'; ?>
		<h2 class="text-center">Descubre libros de entre nuestras librerías de la ciudad.</h2>
		 <div class="row carousel"> 
		<?php 
			
			if(!$librerias){
				echo "No Hay Librerias!";
				// exit();
			}
		foreach ($librerias as $libreria): ?>
		
			<div>
				<div id="box">
					<div class="row text-center">
						<h4 class="col-lg-12"><b>
						<?php echo htmlspecialchars($libreria->getNombre(), ENT_QUOTES, 'UTF-8');?>
						</b></h4>
					</div>
					<div style="background: url(
						<?php echo htmlspecialchars(''.$libreria->getFotoPerfil(), ENT_QUOTES, 'UTF-8');?>
					 ) no-repeat no-repeat center center;" class="circle"></div>
					<div class="row text-center">
						<a href="./infoLibreria/?id=<?php echo htmlspecialchars($libreria->getId(), ENT_QUOTES, 'UTF-8');?>"><button type="" class="btn btn-sm">Ver Perfil</button></a>
					</div>
				</div>
			</div>
			<?php endforeach; ?>

		</div> <!-- FIN Carousel -->
		
		<img src="img/prev.png" alt="<" id="prev">
		<img src="img/next.png" alt=">" id="next">

		<div id="ver_catalogo" class="text-center btn-catalogo">
			<a href="./librerias/"><button class="btn btn-default btn-ver">VER TODAS LAS LIBRERIAS</button></a>
		</div>
		
		
		
	</div><!-- FIN Libreria -->
	
	<div class="container">
		<div class="row ultimos-libros">

			<h2 class="text-center">Ultimos Libros Agregados.</h2>

			<?php 
				include 'libros.php';
				if(!$libros){
					echo "No books!";
					exit();
				}
				foreach ($libros as $libro): 
			?>
			<div class="thumbnail libro col-lg-3 col-md-6 col-sm-6 col-xs-12">
				<div class="caption">
					<img class="book-cover" src="<?php echo resize(htmlspecialchars($libro->getFotoFrente(), ENT_QUOTES, 'UTF-8'));?>" alt="Brave Men">
					<div class="info">
						<p class="book-title"><?php echo htmlspecialchars($libro->getTitulo(), ENT_QUOTES, 'UTF-8');?></p>
						<p class="book-author" href="#"><?php echo htmlspecialchars($libro->getAutor(), ENT_QUOTES, 'UTF-8');?></p>
						<p class="book-price"><b>$<?php echo htmlspecialchars($libro->getPrecio(), ENT_QUOTES, 'UTF-8');?> MXN</b></p>
					</div>
				</div>
				<input type="text" class="id" hidden="true" value="<?php echo htmlspecialchars(
				  $libro->getId(), ENT_QUOTES, 'UTF-8');?>">
			</div>
			

			<?php endforeach; ?>	

		</div>
		<div class="row text-center btn-catalogo">
			<a href="./buscar"><button class="btn btn-default btn-ver">VER CATÁLAGO COMPLETO</button></a>
		</div>
					<div id="footer-hl" class="hl"></div>

	</div> <!-- FIN Ultimos Libros -->
	<div class="container-fluid footer">
		<div class="row-fluid text-center">
			<div class="col-lg-4">
				<div class="row">
					<img src="img/logo-white.png" alt="">
					<b>LABERET</b>
				</div>
				<div class="row">
					<p>Made with <img src="img/love.png" alt="Love"> by APSUS</p>
				</div>
			</div>
			<div class="col-lg-4">
			
				<h4 class="hidden-md hidden-sm hidden-xs">Siguenos en redes sociales: </h4>
				<div class="redes-iconos">
					<a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>		
					<a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
					<a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
				</div>
				
			</div>
			<div class="col-lg-4 hidden-md hidden-sm hidden-xs">
				<div class="menu row nav centered">
					<div style="text-align: left">
						<a href>Inicio</a><br>
						<a href="./buscar">Catálogo</a><br>
						<a href="./registrarse">Registrarse</a><br>
						<a href="./inicioSesion">Iniciar Sesión</a>
					</div>
				</div>
			</div>
		</div><!-- FIN Footer -->
	</div>
	<!-- ****** TERMINAN ELEMENTOS ******* -->
	
	<!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="slick/slick.min.js"></script>
    <script src="js/typed.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/linkLibros-index.js"></script>
    <script src="js/autocomplete.js"></script>
    <script src="js/carousel.js"></script>
    <script src="js/truncateLibros.js"></script>
    <script>
    	jQuery(document).ready(function($) {
    		$('#search-form').closest('form').submit(function(event) {
    			// alert($(this).find('#keyword').val());
    			ga('send', {
				  hitType: 'event',
				  eventCategory: 'Search',
				  eventAction: 'search', 
				  eventLabel: $(this).find('#keyword').val()
				});
    		});
    	});
    </script>				
</body>
</html>