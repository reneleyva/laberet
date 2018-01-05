<?php 
//Revisa la sesión
session_start();
if (!isset($_SESSION['tipo'])) {
	//NO ha iniciado sesión
	header("location: ../");
} else if ($_SESSION['tipo'] != 'libreria') {
	//No es una libreria
	header("location: ../home");	
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
	<link rel="stylesheet" href="../css/homeLibreria-style.css"> 
	<link rel="stylesheet" href="../css/jquery-ui.min.css"> 
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.0.0/sweetalert2.min.css">
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
		$current_page = 'inicio';
		include '../components/navbar-libreria.php'; 
	?>
	
    <?php include 'libreria.php';?>

	<div class="container-fluid" style="background: url(<?php echo $libreria->getFotoPortada()?>) no-repeat no-repeat center center;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover; background-size: cover;">
		<div class="row-fluid">
			<div>
				<div id="box">
					<div class="circle" style="background: url(<?php echo $libreria->getFotoPerfil()?>) no-repeat no-repeat center center;"></div>
					<div class="row text-center">
						<h2 class="col-lg-12"><b><?php echo $libreria->getNombre();?></b></h2>
						<p><?php echo $libreria->getDireccion();?></p>
						<p><?php echo 'Tel: '.$libreria->getTelefono();?></p>
					</div>
				</div>
			</div>
		</div>
	</div> <!-- Fin fluid -->
	

	<div class="container">
		<div class="row">
			
			<form action=".#muestra" class="form-inline row" method="get" accept-charset="utf-8">
				<h2 class="text-center"><b>Catálogo en Tienda.</b></h2>
				<div class="form-group">
					<div class="input-group">
						<input type="text" id="keyword" class="form-control" placeholder="Search for..." name="term">
						<span class="input-group-btn">
							<button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
						</span>
				    </div>
				    
				</div>

				<a id="agregar-nuevo" class="btn btn-default" href="../agregarLibro"><b> <span class="glyphicon glyphicon-plus-sign"></span> Agregar Nuevo Libro</b></a>
			</form>
		</div>

		
		<div class="row muestra" id="muestra"> <!-- INICIO MUESTRA -->
			<?php if(isset($_GET['term'])): ?>
				
				<h2>Resultados para: <b><?php echo  $_GET['term'] ?></b></h2>				
			<?php endif; ?>
			<div class="hl col-lg-12 col-md-12 col-sm-12 col-xs-12"></div>
			<?php 
				include "../pagination.php";

				if (!$books) {
					include 'busqueda-error.php';
					//exit();
				} 
			?>
			<?php 
				$flag = FALSE; //PAra que imprima cada 2 veces una linea horizontal
				$total = 0; //Total de libros ya generados
				$numLibros = count($books);
				$booksPerPage = 6;
				$numPaginas = ceil($numLibros/$booksPerPage); //Num de páginas
				
				for ($i = ($page-1)*$booksPerPage; $i < $numLibros and $total < $booksPerPage;$i++) { 
					$book = $books[$i]; 

			?>

				<div class="thumbnail row libro col-lg-6 col-md-6 col-sm-12" data-id="<?php echo $book->getId(); ?>">
				<div class="caption">
					<img class="book-cover col-lg-6 col-md-6 col-sm-6 col-xs-6" src="<?php echo resize($book->getFotoFrente())?>" alt="Foto">
					<div class="info col-lg-6 col-md-6 col-sm-6 col-xs-6">
						<p class="book-title">
							<?php echo $book->getTitulo(); ?>
						</p>
						<p class="book-author">
							<?php echo $book->getAutor();?>
						</p>
						<?php if($book->getIsbn()): ?>
							<p><?php
				        		echo "<b>ISBN: </b>".$book->getIsbn();?></p>
							<p>
						<?php endif; ?>
						
				        	<p class="book-price">
							<?php echo "<b>$".$book->getPrecio()." MXN</b>";?>
						</p>
					</div>
				</div>
				<div class="row botones text-center col-lg-12 col-md-12 col-sm-12">
					<button id="editar" class="btn btn-default"><b><span class="glyphicon glyphicon-pencil"></span> Editar</b></button>
					<button id="" class="btn btn-default vendido"><b><span class="glyphicon glyphicon-ok"></span> Vendido En Tienda</b></button>
					<button id="eliminar" class="btn btn-default"><b><span class="glyphicon glyphicon-remove"></span> Eliminar</b></button>
				</div>
			</div>
			
			<?php 
				//Some shady shit right here.
				//Preguntar a René si no sabes que pedo. 
				if ($flag) {
					echo "<div class='hl col-lg-12 col-md-12 col-sm-12 col-xs-12'></div>";
					$flag = FALSE;
				} else {
					$flag = TRUE;
				} //END IF ELSE 
				$total++; 
			 } //END MAIN FOR...

			 ?>				
			
			<nav class="text-center col-lg-12 col-md-12 col-sm-12" aria-label="Page navigation">
			  <ul class="pagination">
			   		<?php 
			   			showPagination($books, $page, 6);
			   		 ?>
			  </ul>
			</nav>
		</div> <!-- FIN MUESTRA DE LIBROS -->
		

		
	</div>
	
	<?php 
	include '../components/footer-libreria.php';
	include 'vendidosEnLinea.php';
	 ?>
	
	<?php if ($librosVendidos): ?>
		<div class="modal fade" id="modal-venta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h3 class="modal-title" id="titulo"><b>¡Venta en Linea!</b></h3>
		      </div>
		      <div class="modal-body">
		        <div>
		        	<h3><b>Los siguientes Libros han sido vendidos en linea.</b></h3>
		        	<h4>Se recomienda apartar estos libros para envio.</h4>
					
					<?php foreach ($librosVendidos as $row): ?>
						<div class="libro col-lg-12" data-id="<?php echo $row['idLibroVendido']; ?>">
				        	<div class="book-cover col-lg-4">
				        		<img src="<?php echo $row['fotoFrente']; ?>" alt="Foto" />
				        	</div>

							<div class="info col-lg-8">
								<p class="book-title"><b>Titulo: </b><?php echo $row['titulo']; ?></p>
								<p class="book-author" href="#"><b>Autor: </b><?php echo $row['autor']; ?></p>
								<?php if ($row['isbn']): ?>
									<p><b>ISBN:</b> <?php echo $row['isbn']; ?></p>
								<?php endif ?>
								
								<p class="book-price"><b>Precio: </b>$<?php echo $row['precio']; ?></p>
							</div>
				       	</div>
					<?php endforeach ?>

		        	

		        </div>

		        <div class="modal-footer">
		        	<h3 id="total"><b>Total: $<?php echo $totalVendidos; ?><b></h3>
	                <button style="font-size: 15pt;" type="button" class="btn btn-default" data-dismiss="modal"><b>Cerrar</b></button>
	            </div>

		      </div>
		      
		    </div>
		  </div>
		</div> <!-- END Modal -->
	<?php endif ?>
	<!-- Modal -->
	

	<!-- Modal -->
	<div class="modal fade" id="modal-pedido" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h3 class="modal-title" id="titulo"><b>Pedido Especial</b></h3>
	      </div>
	      <div class="modal-body">
	        <div>
	        	
	        	<h4>Si tiene alguno de los siguientes libros cataloguelos y se le notificará al usuario.</h4>

	        	<div class="pedido">
	        		<p><b>El usuario Luna Andrea Jazz ha solicitado el siguiente libro</b></p>
					<p><b>Autor: </b> Miguel Cervantes</p>
					<p><b>Título: </b> El Quijote</p>
					<p><b>Descripción: </b> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore amet soluta quos provident illum officia id beatae, quam aperiam aut dolores iusto ipsa ex atque dicta commodi. Itaque, aperiam, repellendus! </p>
					
					<div class="text-right">
						<a href="#" class="reportar">Reportar</a>
					</div>
					<button type="button" class="btn btn-default center-block"><b>Surtir Libro</b></button>
	        	</div>
				
				<div class="pedido">
	        		<p><b>El usuario Luna Andrea Jazz ha solicitado el siguiente libro</b></p>
					<p><b>Autor: </b> Miguel Cervantes</p>
					<p><b>Título: </b> El Quijote</p>
					<p><b>Descripción: </b> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore amet soluta quos provident illum officia id beatae, quam aperiam aut dolores iusto ipsa ex atque dicta commodi. Itaque, aperiam, repellendus! </p>
					
					<div class="text-right">
						<a href="#" class="reportar">Reportar</a>
					</div>
					<button type="button" class="btn btn-default center-block"><b>Surtir Libro</b></button>
	        	</div>
	        </div>

	        <div class="modal-footer">
                <button style="font-size: 15pt; background-color: #D2D2D2;" type="button" class="btn btn-default" data-dismiss="modal"><b>Cerrar</b></button>
            </div>

	      </div>
	      
	    </div>
	  </div>
	</div> <!-- END Modal -->
	

	<!-- FIN ELEMENTOS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<!-- SWEET ALERT -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.0.0/sweetalert2.min.js"></script>
	<script src="../js/homeLibreria.js"></script>
	<script src="../js/notificacionesLibreria.js"></script>
	<script src="../js/jquery-ui.min.js"></script>
	<script src="../js/busca.js"></script>
</body>
</html>