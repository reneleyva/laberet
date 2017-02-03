<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Inserción Realizada</title>
	</head>
	<body>
		<p>Se registró el siguiente libro: </p>
		<blockquote>
			<p><?php echo htmlspecialchars('Titulo: '.$titulo.' ', ENT_QUOTES, 'UTF-8');
					 echo htmlspecialchars('Autor: '.$autor.' ', ENT_QUOTES, 'UTF-8');
				     echo htmlspecialchars('Lenguaje: '.$lenguaje, ENT_QUOTES, 'UTF-8');
			?> </p>
		</blockquote>
		<p><a href="?return"> Regresar al inicio. </a></p>
	</body>
</html>