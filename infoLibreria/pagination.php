<?php
//Paginacion. 

	//Pagina actual para paginacion. 
	$page = 1; 
	if (isset($_GET['page'])) {
		$page = $_GET['page'];
	} 

	if (!isset($_GET['id'])) {
		echo "404";
		exit();
	}

	
	
	/*recibe el arreglo de la consulta $books; 
	* $numPaginas es el numero de 
	* $page es numero de página actual que se da por get.
	* $booksPerPage es el num de libros a mostrar por página. 
	*/
	function showPagination($books, $page, $booksPerPage) {
		$numLibros = count($books); 
		$numPaginas = ceil($numLibros/$booksPerPage); //Num de páginas
		$id = $_GET['id'];
		/* Genera los links de las páginas según el numero de 
		libros y la página actual*/

		// Checa si el num de página es válido. 
		if ($page > $numPaginas or $page < 1) {
			echo "";
			// echo "numPaginas: ".$numPaginas;
			// echo "page: ".$page;
			// exit();
		}
		//Flecha <<
		if ($page-1 > 0) {
			echo "<li><a href='?id=".$id."&page=".($page-1)."#muestra' aria-label='Previous'>
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
			echo "<li><a href='?id=".$id."&page=".($page+1)."#muestra' aria-label='Next'>
			<span aria-hidden='true'>&raquo;</span></a></li>";
		}
	}

	//Imprime normal los links. (sin saltos). Ej. << 1 2 3 4 5 >>
	function imprimeLineal($numPaginas, $page) {
		$id = $_GET['id'];
		for ($i=1; $i <= $numPaginas; $i++) {
			if ($i == $page) {
				echo "<li class='active'><a href='?id=".$id."&page=".$i."#muestra'>".$i."</a></li>";
			} else {
				echo "<li><a href='?id=".$id."&page=".$i."#muestra'>".$i."</a></li>";
			}
		}
	}

	//Imprime a saltos. Ej. << 1 2 3 ... 16 >>
	function imprimeSaltos($numPaginas, $page) {
		$id = $_GET['id'];
		if ($page < 4) {
			// Ej. << 1 2 3 ... 16 >>
			imprimeLineal(3, $page);
			echo "<li><a href='?id=".$id."&page=4#muestra'>...</a></li>";
			echo "<li><a href='?id=".$id."&page=".$numPaginas."#muestra'>".$numPaginas."</a></li>";
		} else if (($numPaginas - $page) < 3) {
			//Ej. << 1 ... 4 5 6 >>
			echo "<li><a href='?id=".$id."&page=1#muestra'>1</a></li>";
			echo "<li><a href='?id=".$id."&page=4#muestra'>...</a></li>";
			//Imprime ultimas 3.
			for ($i=$numPaginas-2; $i <= $numPaginas; $i++) { 
				if ($i == $page) {
					echo "<li class='active'><a href='?id=".$id."&page=".$i."#muestra'>".$i."</a></li>";
				} else {
					echo "<li><a href='?id=".$id."&page=".$i."#muestra'>".$i."</a></li>";
				}
			}

		} else {
			//Ej. << 1 ... 4 5 6 ... n >>
			echo "<li><a href='?id=".$id."&page=1#muestra'>1</a></li>";
			echo "<li><a href='?id=".$id."&page=3#muestra'>...</a></li>";
			$bloque = findNextMultipleOfThree($page);
			for ($i=$bloque-2; $i <= $bloque; $i++) { 
				if ($i == $page) {
					echo "<li class='active'><a href='?id=".$id."&page=".$i."#muestra'>".$i."</a></li>";
				} else {
					echo "<li><a href='?id=".$id."&page=".$i."#muestra'>".$i."</a></li>";
				}
			}
			$next = $bloque+1;
			echo "<li><a href='?id=".$id."&page=".$next."#muestra'>...</a></li>";
			echo "<li><a href='?id=".$id."&page=".$numPaginas."#muestra'>".$numPaginas."</a></li>";
		}
	}

	function findNextMultipleOfThree($n) {
		if ($n % 3 == 0){
			return $n;
		} else {
			return findNextMultipleOfThree($n+1);
		}
	}