<?php 

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
	<link rel="stylesheet" href="../../css/perfilLibreria-style.css"> 
	<link rel="stylesheet" type="text/css" href="../../css/navbar-user.css">
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
	    <div id="search" class="col-lg-4 col-md-4 col-sm-3 ">
	        <form action="../buscar" method="GET" class="navbar-form" role="search">
		        <div class="input-group">
		            <input type="text" class="form-control" placeholder="Search" name="q">
		            <input type="text" hidden name="s" value="todo">
		            <div class="input-group-btn">
		                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
		            </div>
		        </div>
	        </form>
	    </div> 
	    <div id="list" class="col-lg-6 col-md-6 col-sm-7">
	    	<ul class="nav navbar-nav navbar-right">
		   	  <li id="cart"><a href="../carrito"><img src="../../img/grey-cart.png" alt=""><b>(<?php echo count($_SESSION['cart'])?>)</b></a></li>	
		      <li><a href="../pedidosEspeciales">Pedidos Especiales</a></li>
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
						<a href="#"><img src="../../img/facebook.png" alt=""></a>
						<a href="#"><img src="../../img/twitter.png" alt=""></a>
						<a href="#"><img src="../../img/instagram.png" alt=""></a>
						<a href="#"><img src="../../img/maps.png" alt=""></a>
					</div>
				</div>
			</div>
		</div>
	</div> <!-- Fin fluid -->

	
	<div id="muestra" class="container">
		<div class="row">
			<form action=".#muestra" class="form-inline" method="get" accept-charset="utf-8">
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
				
				<!-- Para javascript -->
				<?php if (isset($_GET['s'])) {
					echo "<input type='text' id='selected' hidden value='".$_GET['s']."'>";
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
			echo "<h3 class='resultado'>Resultados para: <span>".$_GET['q']."</span></h3>";
		}

		$total = 0; //Total de libros ya generados
		$numLibros = count($books);
		$numPaginas = ceil($numLibros/12); //Num de páginas

		for ($i = ($page-1)*12; $i < $numLibros and $total < 12;$i++) { 
				$book = $books[$i]; ?>

			<div class="thumbnail libro col-lg-3 col-md-6">
				<div class="caption">
				<a href="#"><img class="book-cover" src="../../<?php echo $book->getFotoFrente();?>" alt=""></a>
					<div class="info">
						<p class="book-title"><?php
				        	echo htmlspecialchars($book->getTitulo(), ENT_QUOTES, 'UTF-8');
				        ?></p>
						<a class="book-author" href="#"><?php
							echo htmlspecialchars($book->getAutor(), ENT_QUOTES, 'UTF-8');
						?></a>
						<p class="book-price"><b><?php
							echo htmlspecialchars('$'.$book->getPrecio(), ENT_QUOTES, 'UTF-8');
						?> MXN</b></p>
					</div>
				</div>
				<input type="text" class="id" hidden="true" value="<?php echo htmlspecialchars($book->getId(), ENT_QUOTES, 'UTF-8');?>">
			</div>
		<?php $total++; } //END For ?>

			

			<nav class="text-center col-lg-12 col-md-12 col-sm-12" aria-label="Page navigation">
			  <ul class="pagination">
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
</body>
</html>