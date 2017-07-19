<?php include 'redirect.php'; ?>
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
	<link rel="stylesheet" href="../../css/jquery-ui.min.css"> 
	<link rel="stylesheet" href="../../css/perfilLibreria-style.css"> 
	<link rel="stylesheet" type="text/css" href="../../css/navbar-vis.css">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
	<nav class="navbar navbar-default" role="navigation">
		  <!-- Brand and toggle get grouped for better mobile display -->
		  <div class="navbar-header col-lg-2 col-md-2">
		    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapse-target">
		      <span class="sr-only">Toggle navigation</span>
		      <span class="icon-bar"></span>
		      <span class="icon-bar"></span>
		      <span class="icon-bar"></span>
		    </button>
		    <a class="navbar-brand navbar-left" href="../../"><img id="icon" src="../../img/logo.png" alt=""></a>
			<!-- <a class="navbar-brand navbar-left laberet" href="#"><b>LABERET</b></a> -->
		  </div>

		  <!-- Collect the nav links, forms, and other content for toggling -->
		  <div class="collapse navbar-collapse" id="collapse-target">
		   
		   <div id="list" class="col-lg-10 col-md-10">
		   		<ul class="nav navbar-nav navbar-right">
			            <li><a href="../buscar">Catálogo</a></li>
			            <li><a href="../librerias">Librerías</a></li>
			            <li><a href="../registrarse">Registrarse</a></li>
			            <li>
			              <p class="navbar-btn">
			                <a href="../inicioSesion" class="btn btn-success">Iniciar Sesión</a>
			              </p>
		            	</li> 
				</ul>
		   </div>
		    
		  </div><!-- /.navbar-collapse -->
	</nav> <!-- END NAV -->

	<?php include 'perfil.php';?>
	<div class="container-fluid" style="background: url(../../<?php echo $libreria->getFotoPortada()?>) no-repeat no-repeat center center;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover; background-size: cover;">
		<div class="row-fluid" >
			<div>
				<div id="box">
					<div class="row text-center">
						<h3 class="col-lg-12"><b><?php echo $libreria->getNombre() ?></b></h3>
						<p><?php echo $libreria->getDireccion() ?></p>
					</div>
					<div class="circle" style="background: url(../../<?php echo $libreria->getFotoPerfil();?>) no-repeat no-repeat center center;"></div>
					<p><?php echo "Tel: ".$libreria->getTelefono(); ?></p>

					<div class="hl text-center"></div>
					<div class="row text-center redes-sociales">
						<?php if($libreria->getFacebook()): ?>
							<a target="_blank" href="<?php echo $libreria->getFacebook() ?>"><img src="../../img/facebook.png" alt=""></a>
						<?php endif; ?>
						<?php if($libreria->getTwitter()): ?>
							<a target="_blank" href="<?php echo $libreria->getTwitter() ?>"><img src="../../img/twitter.png" alt=""></a>
						<?php endif; ?>
						<?php if($libreria->getInstagram()): ?>
							<a target="_blank" href="<?php echo $libreria->getInstagram() ?>"><img src="../../img/instagram.png" alt=""></a>
						<?php endif; ?>
						<a target="_blank" href="http://www.google.com/maps/place/<?php echo $libreria->getCoordenadas() ?>"><img src="../../img/maps.png" alt=""></a>
					</div>
				</div>
			</div>
		</div>
	</div> <!-- Fin fluid -->

	
	<div id="muestra" class="container">
		<div class="row">
			<!-- <form action=".#muestra" class="form-inline" method="get" accept-charset="utf-8">
				<h2 class="text-center"><b>Catálogo en Tienda.</b></h2>
				<div id="search-form" class="form-group">
					<div class="input-group">
						<input type="hidden" name="id" value="<?php
							echo $_GET['id']; ?>">
						<input type="text" class="form-control" name="q" placeholder="Search for...">
						<span class="input-group-btn">
							<button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
						</span>
				    </div>
				    
				<select name="s" class="form-control">
					  <option value="todo">Todo</option>
					  <option value="autor">Autor</option>
					  <option value="titulo">Titulo</option>
					  <option value="categoria">Categoria</option>
				</select>
				
				<?php if (isset($_GET['s'])) {
					echo "<input type='text' id='selected' hidden value='".$_GET['s']."'>";
				} ?>


				</div>
			</form> -->

			<form action=".#muestra" class="row form-inline" method="get" accept-charset="utf-8">
				<h2 class="text-center"><b>Catálogo en Tienda.</b></h2>
				<div id="search-form" class="form-group">
					<div class="input-group">
					<input type="hidden" name="id" value="<?php
							echo htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8');  ?>">
						<!-- BUSQUEDA -->
						<input type="text" name="q" maxlength="40" id="keyword" class="form-control" placeholder="Buscar...">       
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
		</div>

		
		<div class="row muestra"> <!-- INICIO MUESTRA -->

		
		<?php
		include "busca.php";
		include './pagination.php';

		if(!$books) {
			include '../buscar/busqueda-error.html';
			exit();
		}
		
		if (isset($_GET['q'])) {
			echo "<h3 class='resultado'>Resultados para: <span>".htmlspecialchars($_GET['q'], ENT_QUOTES, 'UTF-8')."</span></h3>";
		}

		$total = 0; //Total de libros ya generados
		$numLibros = count($books);
		$numPaginas = ceil($numLibros/12); //Num de páginas

		for ($i = ($page-1)*12; $i < $numLibros and $total < 12;$i++) { 
				$book = $books[$i]; ?>

			<div class="thumbnail libro col-lg-3 col-md-6 col-sm-6 col-xs-12">
				<div class="caption">
				<a href="#"><img class="book-cover" src="../../<?php echo $book->getFotoFrente();?>" alt=""></a>
					<div class="info">
						<p class="book-title"><?php
				        	echo htmlspecialchars($book->getTitulo(), ENT_QUOTES, 'UTF-8');
				        ?></p>
						<p class="book-author"><?php
							echo htmlspecialchars($book->getAutor(), ENT_QUOTES, 'UTF-8');
						?></p>
						<p class="book-price"><b><?php
							echo htmlspecialchars('$'.$book->getPrecio(), ENT_QUOTES, 'UTF-8');
						?> MXN</b></p>
					</div>
				</div>
				<input type="text" class="id" hidden="true" value="<?php echo htmlspecialchars($book->getId(), ENT_QUOTES, 'UTF-8');?>">
			</div>
		<?php $total++; } //END For ?>

			

			<nav class="text-center col-lg-12 col-md-12 col-sm-12 col-xs-12" id="pagination" aria-label="Page navigation">
			  <ul class="pagination" >
			    <?php 
					showPagination($books, $page, 12);
				?>
			  </ul>

			</nav>
		</div> <!-- FIN MUESTRA DE LIBROS -->
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="../../js/bootstrap.min.js"></script>
	<script src="../../js/linkLibro.js"></script>
	<script src="../../js/optionHack.js"></script>
	<script src="../../js/truncateLibros.js"></script>
	<script src="../../js/jquery-ui.min.js"></script>
	<script src="../../js/busca.js"></script>
</body>
</html>