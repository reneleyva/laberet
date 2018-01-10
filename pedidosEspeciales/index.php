<?php 
	include "../lib/Libro.php";
	include 'redirect.php';
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
	<link rel="stylesheet" href="../css/pedidosEspeciales-style.css"> 
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
		$current_page = 'inicio';
		include '../components/navbar-user.php';
	?>
	<div class="container">
		<div class="row">
			<h2><b>Pedidos Especiales</b></h2>
			<h4>Si no has encontrado el libro que buscabas en nuestro <br>catálogo nosotros lo buscamos por ti. </h4>

			<form action="pedidosEspeciales.php" method="post" accept-charset="utf-8" class="">
				<div class="form-group ">
					 <label for="isbn" class="col-form-label">ISBN (opcional)</label>
					 <input type="text" name = "isbn" class="form-control" id="isbn" placeholder="0803287682">
					 <label for="autor" class="col-form-label">Autor</label>
					 <input type="text" name="autor" required class="form-control" id="autor" placeholder="Julio Verne">
					 <label for="titulo" required class="col-form-label">Título</label>
					 <input type="text" name = "titulo" class="form-control" id="titulo" placeholder="...">
					 <label for="descripcion" class="col-form-label">Descripción (Opcional)</label>
					 <p>Si buscas un libro en una edición en particular descríbenosla. </p>
					 <textarea class="form-control" name="descripcion" rows="5" id="descripcion"></textarea>
					 <button class="btn btn-default" type="submit"><b>Enviar</b></button>
				</div>
				
			</form>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="../../js/bootstrap.min.js"></script>

</body>
</html>