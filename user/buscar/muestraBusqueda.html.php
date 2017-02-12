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
	<link rel="stylesheet" href="../../css/busqueda-style.css"> 
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- <script>
		function showHint(str) {
			if (str.length == 0) {
				document.getElementById("txtHint").innerHTML = "";
				return;
			} else {
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("txtHint").innerHTML = this.responseText;
					}
				};
				xmlhttp.open("GET", "gethint.php?q=" + str, true);
				xmlhttp.send();
				}
		}
		</script> -->

</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
		          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
		            <span class="sr-only">Toggle navigation</span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		          </button>
		          <a class="navbar-brand navbar-left" href="../../"><img src="../../img/logo.png" alt=""></a>
		          <!-- <a class="navbar-brand" href="#"><b>LABERET</b></a> -->
        	</div>

        	<div id="navbar" class="navbar-collapse collapse">
        		<ul class="nav navbar-nav navbar-right">
        			<li><a href="../../">Inicio</a></li>
		            <li class="active"><a href="#">Catálogo</a></li>
		            <li><a href="../../#librerias">Librerías</a></li>
		            <li><a href="registrarse.html">Registrarse</a></li>
		            <li ><a href="iniciarSesion.html">Iniciar Sesión</a></li>
		            
          		</ul>
        	</div>
		</div>
	</nav> <!-- END NAV -->

	<div class="container">

		<div class="row">
			
			<form action="busca.php" class="form-inline" method="post" accept-charset="utf-8">
				<div class="form-group">
					<div class="input-group">
						<input type="text" name = "keyword" id = "keyword" class="form-control" placeholder="Search for...">       
						<span class="input-group-btn">
							<button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
						</span>
				    </div>
				    
				<select name="" class="form-control">
					  <option>TODO</option>
					  <option>Autor</option>
					  <option>Titulo</option>
					  <option>Categoria</option>
				</select>
				    
				</div>
			</form>

			<h3 class="resultado">Resultados para: <span><?php echo htmlspecialchars($keyword, ENT_QUOTES, 'UTF-8');?></span></h3>
		</div>
		
		<div class="row muestra"> <!-- INICIO MUESTRA -->
			<?php if(!$books){
				//BBB
				include 'busqueda-error.html';
				exit();
			}

			foreach ($books as $book): ?>

			<div class="thumbnail libro col-lg-3 col-md-6">
				<div class="caption">
					<a href="#"><img class="book-cover" src="../../<?php echo $book['fotoFrente']?>" alt=""></a>
					<div class="info">
						<p class="book-title">
							<?php echo htmlspecialchars($book['titulo'], ENT_QUOTES, 'UTF-8');?>
						</p>
						<a class="book-author" href="#">
							<?php echo htmlspecialchars($book['autor'], ENT_QUOTES, 'UTF-8');?>
						</a>
						<p class="book-price">
							$<?php echo htmlspecialchars($book['precio'], ENT_QUOTES, 'UTF-8');?>
						</p>
					</div>
				</div>
				<input type="text" class="id" hidden="true" value="<?php echo htmlspecialchars($book['id'], ENT_QUOTES, 'UTF-8');?>">
			</div>
			<?php endforeach; ?>

			<nav class="text-center col-lg-12 col-md-12 col-sm-12" aria-label="Page navigation">
			  <ul class="pagination">
			    <li>
			      <a href="#" aria-label="Previous">
			        <span aria-hidden="true">&laquo;</span>
			      </a>
			    </li>
			    <li class="active"><a href="#">1</a></li>
			    <li><a href="#">2</a></li>
			    <li><a href="#">3</a></li>
			    <li><a href="#">4</a></li>
			    <li><a href="#">5</a></li>
			    <li>
			      <a href="#" aria-label="Next">
			        <span aria-hidden="true">&raquo;</span>
			      </a>
			    </li>
			  </ul>
			</nav>
		</div> <!-- FIN MUESTRA DE LIBROS -->
	</div>


	<!-- FIN ELEMENTOS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="../../js/bootstrap.min.js"></script>
	<script src="../../js/linkLibro.js"></script>
</body>
</html>