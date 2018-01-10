<?php 
include_once '../lib/Libro.php';
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
	<link rel="stylesheet" href="../css/historialCompra.css"> 
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
		$current_page = 'historialCompras';
		include '../components/navbar-user.php';
	?>
	
	<div class="container">
		<h2 class=""><b>Historial De Compras </b></h2>
		<div class="row muestra"> <!-- INICIO MUESTRA -->
			
			<div class="hl col-lg-12 col-md-12 col-sm-12 col-xs-12"></div>
			<!-- Incluye busqueda para obtener los libros. -->
			<?php 
			include '../lib/Busqueda.php'; 
			include '../pagination.php';

			$id = $_SESSION['id'];
			$libros = array();
			$libros = Busqueda::getHistorialCompras($id); 
			$count = 1; 

			// Para paginación 
			$total = 0; //Total de libros ya generados
			$numLibros = count($libros);
			$numPaginas = ceil($numLibros/12); //Num de páginas
			for ($i = ($page-1)*12; $i < $numLibros and $total < 12;$i++) { 
				$libro = $libros[$i];
			?>
			<div class="thumbnail row libro col-lg-6 col-md-6 col-sm-12">
				<div class="caption">
					<img class="book-cover col-lg-6 col-md-6 col-sm-6 col-xs-6" src="<?php echo $libro->getFotoFrente(); ?>" alt="Brave Men">
					<div class="info col-lg-6 col-md-6 col-sm-6 col-xs-6">
						<p class="book-title"><?php echo $libro-> getTitulo(); ?></p>
						<a class="book-author" href="#"><?php echo $libro->getAutor(); ?></a>
						<p class="book-price"><b>Precio: </b>$<?php echo $libro->getPrecio(); ?> MXN</p>
						<!-- Para el ISBN -->
						<?php 
						$isbn = $libro ->getIsbn();
						// Si sí existe el isbn.
						if ($isbn):
						?>
							<p><b>ISBN: </b><?php echo $isbn; ?></p>
						<?php
						endif;
						?>
						<p><b>Fecha de Compra: </b>12/07/2017</p>
					</div>
				</div>
			</div>

				<?php if($count % 2 == 0): ?>
					<!-- Separador -->
					<div class="hl col-lg-12 col-md-12 col-sm-12 col-xs-12"></div>			
				<?php endif; ?>

			<?php $count+=1; ?>
			<?php $total++; }?>
			

			<div class="paginas text-center col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<nav class="" aria-label="Page navigation" id="pagination">
					<ul class="pagination">
						
						<?php 
							showPagination($libros, $page, 12);
						 ?>

					</ul>
				</nav>
			</div>
		</div> <!-- FIN MUESTRA DE LIBROS -->
			
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>

</body>
</html>