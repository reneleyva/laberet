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
	<link rel="stylesheet" href="../css/jquery-ui.min.css"> 
	<link rel="stylesheet" href="../css/busqueda-style.css"> 
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
	
	<?php 
		session_start();
		$current_page = "buscar";
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
		<div class="row">
			<form action="." class="row form-inline" method="get" accept-charset="utf-8">
				<div id="search-form" class="form-group">
					<div class="input-group">
						<!-- BUSQUEDA -->
						<input required type="text" name="term" maxlength="40" id="keyword" class="form-control" placeholder="Buscar...">       
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
				  include 'busca.php'; 
				  include '../pagination.php';
			?>
			
			
			<?php 
			if (isset($_GET['term'])) {
				echo "<h3 class='resultado'>Resultados para: <span>".htmlspecialchars($keyword, ENT_QUOTES, 'UTF-8')."</span></h3>";

			}

			if(!$books){
				include 'busqueda-error.html';
				exit();
			}

			$total = 0; //Total de libros ya generados
			$numLibros = count($books);
			$numPaginas = ceil($numLibros/16); //Num de páginas

			for ($i = ($page-1)*16; $i < $numLibros and $total < 16;$i++) { 
				$book = $books[$i];
				?>
				<div class="thumbnail libro col-lg-3 col-md-6 col-sm-6 col-xs-12">
					<div class="caption">
						<a href="#"><img class="book-cover" src="../<?php echo htmlspecialchars($book->getFotoFrente(), ENT_QUOTES, 'UTF-8');?>" alt=""></a>
						<div class="info">
							<p class="book-title">
								<?php echo htmlspecialchars($book->getTitulo(), ENT_QUOTES, 'UTF-8'); ?>
							</p>
							<p class="book-author">
								<?php echo htmlspecialchars($book->getAutor(), ENT_QUOTES, 'UTF-8'); ?>
							</p>
							<p class="book-price">
							<b>
								$<?php echo "<b>". htmlspecialchars($book->getPrecio(), ENT_QUOTES, 'UTF-8')."</b> MXN";?>
							</b>
							</p>
						</div>
					</div>
					<input type="text" class="id" hidden="true" value="<?php echo $book->getId();?>">
				</div>
			<?php $total++;} ?>
		
		<div class="paginas text-center col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<nav class="" aria-label="Page navigation" id="pagination">
				<ul class="pagination">
					
					<?php 
						showPagination($books, $page, 16);
					 ?>

				</ul>
			</nav>
		</div>
		

		</div> <!-- FIN MUESTRA DE LIBROS -->
	</div>
	<?php 
		if ($_SESSION['tipo'] == 'invitado') {
			include '../components/footer-visitante.html';
		} else if ($_SESSION['tipo'] == 'usuario') {
			include '../components/footer-user.php';
		}

	 ?>
	<!-- FIN ELEMENTOS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/linkLibro.js"></script>
	<script src="../js/jquery-ui.min.js"></script>
	<script src="../js/busca.js"></script>
	<script src="../js/optionHack.js"></script>
	<script src="../js/truncateLibros.js"></script>
</body>
</html>