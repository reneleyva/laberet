<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Agregar libros</title>
		<style type="text/css">
		textarea {
		display: block;
		width: 300px;
		}
		</style>
	</head>
	<?php echo 'El id máximo es el siguiente, perro.'; ?>
	<body>
		<form action="?" method="post" enctype="multipart/form-data">
			<div>
				<label for="titulo">Ingresa el titulo: </label>
				<textarea id="titulo" name="titulo" rows="3" cols="10">
				</textarea>
			</div>
			<div>
				<label for="autor"> Autor: </label>
				<textarea id="autor" name="autor" rows="3" cols="10">
				</textarea>
			</div>
			<div>
				<label for="lenguaje">Lenguaje: </label>
				<textarea id="lenguaje" name="lenguaje" rows="3" cols="10">
				</textarea>
			</div>
			<div>
				<label for="isbn">Isbn: </label>
				<textarea id="isbn" name="isbn" rows="3" cols="10">
				</textarea>
			</div>
			<div>
				<label for="precio">Precio: </label>
				<textarea id="precio" name="precio" rows="3" cols="10">
				</textarea>
			</div>
			<div>
				<label for="tags">Tags: </label>
				<textarea id="tags" name="tags" rows="3" cols="10">
				</textarea>
			</div>
			<div>
				<br>
				<input type="file" name="fotoFrente" id="fotoFrente" size="25" />
				</br>
			</div>
			<div>
				<br>
				<input type="file" name="fotoAtras" id="fotoAtras" size="25" />
				</br>
			</div>
			<div>
				<br>
				<input type="submit" value="Agregar">
				</br>
			</div>
		</form>
	</body>
</html>