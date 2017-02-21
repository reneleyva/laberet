<?php
	include '../../conexion.php';

	//Pagina actual para paginacion. 
	$page = 1; 
	if (isset($_GET['page'])) {
		$page = $_GET['page'];
	}

	try{
		$sql = 'SELECT idLibro,titulo,autor,precio,fotoFrente,fotoAtras FROM Libro order by fechaAdicion DESC';
		$result = $pdo->query($sql);
		while ($row = $result->fetch()) {
				$books[] = array('id' => $row['idLibro'], 'titulo' => $row['titulo'],'autor' => $row['autor'], 'precio' => $row['precio'],'fotoFrente' => $row['fotoFrente'],'fotoAtras' => $row['fotoAtras']);
		}
	
	} catch (PDOException $e) {
		$error = 'Error fetching books: ' . $e->getMessage();
		exit();
	}


	//Paginacion. 
	$numLibros = count($books); 
	$numPaginas = ceil($numLibros/16); //Num de páginas
	/* Genera los links de las páginas según el numero de 
	libros y la página actual*/

	// Checa si el num de página es válido. 
	if ($page > $numPaginas or $page < 1) {
		echo "404";
		// echo "numPaginas: ".$numPaginas;
		// echo "page: ".$page;
		exit();
	}

	function showPagination($numPaginas, $page) {
		//Flecha <<
		if ($page-1 > 0) {
			echo "<li><a href='?page=".($page-1)."' aria-label='Previous'>
			<span aria-hidden='true'>&laquo;</span></a></li>";
		}
		//Libros a mostrar por pagina: 16. 
		// // echo $numPaginas;
		// echo "NumPgainas: ".$numPaginas;
		// echo "actual: ".$page;
		if ($numPaginas < 6) {
			imprimeLineal($numPaginas, $page); //imprime normal.
		} else {
			imprimeSaltos($numPaginas, $page);
		}
		
		//Flecha >>
		if ($page+1 <= $numPaginas) {
			echo "<li><a href='?page=".($page+1)."' aria-label='Next'>
			<span aria-hidden='true'>&raquo;</span></a></li>";
		}
	}

	//Imprime normal los links. (sin saltos). Ej. << 1 2 3 4 5 >>
	function imprimeLineal($numPaginas, $page) {
		for ($i=1; $i <= $numPaginas; $i++) {
			if ($i == $page) {
				echo "<li class='active'><a href='?page=".$i."'>".$i."</a></li>";
			} else {
				echo "<li><a href='?page=".$i."'>".$i."</a></li>";
			}
		}
	}

	//Imprime a saltos. Ej. << 1 2 3 ... 16 >>
	function imprimeSaltos($numPaginas, $page) {
		if ($page < 4) {
			// Ej. << 1 2 3 ... 16 >>
			imprimeLineal(3, $page);
			echo "<li><a href='?page=4'>...</a></li>";
			echo "<li><a href='?page=".$numPaginas."'>".$numPaginas."</a></li>";
		} else if (($numPaginas - $page) < 3) {
			//Ej. << 1 ... 4 5 6 >>
			echo "<li><a href='?page=1'>1</a></li>";
			echo "<li><a href='?page=4'>...</a></li>";
			//Imprime ultimas 3.
			for ($i=$numPaginas-2; $i <= $numPaginas; $i++) { 
				if ($i == $page) {
					echo "<li class='active'><a href='?page=".$i."'>".$i."</a></li>";
				} else {
					echo "<li><a href='?page=".$i."'>".$i."</a></li>";
				}
			}

		} else {
			//Ej. << 1 ... 4 5 6 ... n >>
			echo "<li><a href='?page=1'>1</a></li>";
			echo "<li><a href='?page=3'>...</a></li>";
			$bloque = findNextMultipleOfThree($page);
			for ($i=$bloque-2; $i <= $bloque; $i++) { 
				if ($i == $page) {
					echo "<li class='active'><a href='?page=".$i."'>".$i."</a></li>";
				} else {
					echo "<li><a href='?page=".$i."'>".$i."</a></li>";
				}
			}
			$next = $bloque+1;
			echo "<li><a href='?page=".$next."'>...</a></li>";
			echo "<li><a href='?page=".$numPaginas."'>".$numPaginas."</a></li>";
		}
	}

	function findNextMultipleOfThree($n) {
		if ($n % 3 == 0){
			return $n;
		} else {
			return findNextMultipleOfThree($n+1);
		}
	}



