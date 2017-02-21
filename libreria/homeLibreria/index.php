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
	<link rel="stylesheet" href="../../css/homeLibreria-style.css"> 
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
	    <a class="navbar-brand navbar-left" href="#"><img id="icon" src="../../img/logo.png" alt=""></a>
		<!-- <a class="navbar-brand navbar-left laberet" href="#"><b>LABERET</b></a> -->
	  </div>

	  <!-- Collect the nav links, forms, and other content for toggling -->
	  <div class="collapse navbar-collapse" id="collapse-target">
	   
	   <div id="list" class="col-lg-9 col-md-9">
	   		<ul class="nav navbar-nav navbar-left">
				<li class="active"><a href="#">Inicio</a></li>
				<li><a href="#">Agregar Libro</a></li>
				<li><a href="#">Ventas</a></li>
				<li><a href="#">Pedidos Especiales</a></li>
				<li><a href="#">Catálogo Universal</a></li>
			</ul>
	   </div>

	    <div id="drop" class="col-lg-1 col-md-1">

	    	<ul class="nav navbar-nav navbar-right">
		      <li class="dropdown">
		        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-cog"><b class="caret"></b></span> </a>
		        <ul class="dropdown-menu">
		          <li><a href="#">Configurar Cuenta</a></li>
		          <li><a href="#">Historial de Ventas</a></li>
		          <li class="divider"></li>
		          <li><a href="#">Salir</a></li>
		        </ul>
		      </li>
			</ul>
	    </div>	
	    
	  </div><!-- /.navbar-collapse -->
</nav> <!-- END NAV -->

    <?php include 'libreria.php';?>
	<div class="container-fluid">
		<div class="row-fluid">
			<div>
				<div id="box">
					<div class="circle"></div>
					<div class="row text-center">
						<h2 class="col-lg-12"><b><?php echo $nombre;?></b></h2>
						<p><?php echo $direccion;?></p>
						<p><?php echo 'Tel: '.$telefono;?></p>
					</div>
				</div>
			</div>
		</div>
	</div> <!-- Fin fluid -->
	


	<div class="container">
		<div class="row">
			
			<form action="" class="form-inline" method="post" accept-charset="utf-8">
				<h2 class="text-center"><b>Catálogo en Tienda.</b></h2>
				<div class="form-group">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Search for...">
						<span class="input-group-btn">
							<button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
						</span>
				    </div>
				    
				<select name="" class="form-control">
					  <option>TODO</option>
					  <option>Suspenso</option>
					  <option>Miedo</option>
					  <option>Matemáticas</option>
				</select>
				    
				</div>

				<button id="agregar-nuevo" class="btn btn-default"><b> <span class="glyphicon glyphicon-plus-sign"></span> Agregar Nuevo Libro</b></button>
			</form>
		</div>

		
		<div class="row muestra"> <!-- INICIO MUESTRA -->
			
			<div class="hl col-lg-12 col-md-12 col-sm-12 col-xs-12"></div>
			<?php 
				include 'libreria.php';
				include "../../pagination.php";

				if (!$books) {
					echo "No hay lisbros! FUCK!";
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

				<div class="thumbnail row libro col-lg-6 col-md-6 col-sm-12" data-id="<?php echo $book['id']; ?>">
				<div class="caption">
					<img class="book-cover col-lg-6 col-md-6 col-sm-6 col-xs-6" src="../../<?php echo $book['fotoFrente']?>" alt="Foto">
					<div class="info col-lg-6 col-md-6 col-sm-6 col-xs-6">
						<p class="book-title">
							<?php echo $book['titulo']; ?>
						</p>
						<a class="book-author" href="#">
							<?php echo $book['autor'];?>
						</a>
						<p><?php
				        	echo "<b>ISBN: </b>".$book['isbn'];?></p>
						<p>
							<?php echo '<b>Adición:</b> '.$book['fechaAdicion'];?>
						</p>
				        	<p class="book-price">
							<?php echo "<b>$".$book['precio']." MXN</b>";?>
						</p>
					</div>
				</div>
				<div class="row botones text-center col-lg-12 col-md-12 col-sm-12">
					<button id="editar" class="btn btn-default"><b><span class="glyphicon glyphicon-pencil"></span> Editar</b></button>
					<button id="vendido" class="btn btn-default"><b><span class="glyphicon glyphicon-ok"></span> Vendido En Tienda</b></button>
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
	
	<div class="container-fluid footer">
		<div class="row-fluid text-center">
				<div class="col-lg-4">
					<div class="row">
						<img src="../../img/logo-white.png" alt="">
						<b>LABERET</b>
					</div>
					<div class="row">
						<p>Made with <img src="../../img/love.png" alt="Love"> by APSUS</p>
					</div>
				</div>
				<div class="col-lg-4"><p><span class="glyphicon glyphicon-phone"></span> Cel. (044) 5556213423 </p>
				<p><span class="glyphicon glyphicon-phone"></span> Cel. (044) 5556213423 </p>
				<p><span class="glyphicon glyphicon-phone"></span> Cel. (044) 5556213423 </p>
				</div>
				<div class="col-lg-4 hidden-md hidden-sm hidden-xs">
					<div class="row nav centered">
						<a href="#">Inicio</a><br>
						<a href="#" title="Catalogo">Registrarse</a><br>
						<a href="#">Iniciar Sesión</a>
					</div>
				</div>
			</div><!-- FIN Footer -->
	</div>
	
	<!-- Modal -->
	<div class="modal fade" id="modal-venta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h3 class="modal-title" id="titulo"><b>Venta en Linea</b></h3>
	      </div>
	      <div class="modal-body">
	        <div>
	        	<h3><b>Los siguientes Libros han sido vendidos en linea.</b></h3>
	        	<h4>Se recomienda apartar estos libros para envio.</h4>

	        	<div class="libro col-lg-12">
		        	<div class="book-cover col-lg-4">
		        		<img src="../../img/brave-men.jpg" alt="Foto" />
		        	</div>

					<div class="info col-lg-8">
						<p class="book-title"><b>Titulo: </b>Brave Men</p>
						<p class="book-author" href="#"><b>Autor: </b>Ernie Pyle</p>
						<p><b>ISBN:</b> 2187168716</p>
						<p class="book-price"><b>Precio: </b>$340</p>
					</div>
		       	</div>

				<div class="libro col-lg-12">
		        	<div class="book-cover col-lg-4">
		        		<img src="../../img/brave-men.jpg" alt="Foto" />
		        	</div>

					<div class="info col-lg-8">
						<p class="book-title"><b>Titulo: </b>Brave Men</p>
						<p class="book-author" href="#"><b>Autor: </b>Ernie Pyle</p>
						<p><b>ISBN:</b> 2187168716</p>
						<p class="book-price"><b>Precio: </b>$340</p>
					</div>
		       	</div>

	        </div>

	        <div class="modal-footer">
	        	<h3 id="total"><b>Total: $230<b></h3>
                <button style="font-size: 15pt; background-color: #D2D2D2;" type="button" class="btn btn-default" data-dismiss="modal"><b>Cerrar</b></button>
            </div>

	      </div>
	      
	    </div>
	  </div>
	</div> <!-- END Modal -->

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
	<script src="../../js/bootstrap.min.js"></script>
	<script src="../../js/homeLibreria.js"></script>
</body>
</html>