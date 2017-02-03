<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Libros</title>
	</head>
	<body>
		<p>Aquí están todos los libros registrados en la base de datos de Laberet: </p>
		<?php if(!$books){return;}
		foreach ($books as $book): ?>
		<blockquote>
			<p>
				<?php
						echo htmlspecialchars($book['titulo'], ENT_QUOTES, 'UTF-8');
				?>
				<br> <?php
				echo htmlspecialchars($book['autor'], ENT_QUOTES, 'UTF-8');
				?> <br>
				
				<img src="<?php echo 'portada/'.$book['fotoFrente']?>">
				<img src="<?php echo 'portada/'.$book['fotoAtras']?>">
			</p>
		</blockquote>
		<?php endforeach; ?>
	</body>
</html>