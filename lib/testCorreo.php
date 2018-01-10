<?php 

	include "../conexion.php";
	include '../lib/Correo.php';
	include_once '../lib/Libro.php';

	function resize($url, $size) {
		return join("upload/h_".$size, explode("upload", $url));
	};

	$libro = Libro::getLibro(29);
	$msg = "<h2 style='margin-bottom:0px'>¡Los siguientes Libros han sido vendidos en línea!</h2>";
	$msg .= "<p style='margin-top: 0px;font-size:12pt;'>Se recomienda apartarlos para envío</p>";
	$msg .= '<div style="width: 500px;height: 270px;"><div>    <div>        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;        <br>    </div>    <div>        <div>            <div>                <div>                    <img src="'.resize($libro->getFotoFrente(), 260).'?>" style="padding-right: 5px;float:left;" width="auto" height="260">                        &nbsp;                    <b>                        <span class="colour" style="color:rgb(0, 0, 0);font-size: 17pt;">                            '.$libro->getAutor().'&nbsp;                        </span>                    </b>                    <span class="colour" style="color:rgb(0, 0, 0)">                        &nbsp; &nbsp;&nbsp;                    </span>                    <br>                </div>            </div>        </div>    </div></div><div>    <div style="margin-top: 10px; ">        <span class="colour" style="color:rgb(0, 0, 0);font-size: 17pt;margin-top: 20px; ">            &nbsp;'.$libro->getTitulo().'&nbsp;        </span>        <span class="colour" style="color:rgb(0, 0, 0)">        </span>        <br>    </div>    <div>        <span class="colour" style="color:rgb(0, 0, 0);font-size: 17pt;">            &nbsp;<b>Precio:</b> $'.$libro->getPrecio().' &nbsp;        </span>           <span class="colour" style="color:rgb(153, 153, 153)">        </span>        <br>    </div></div><div>    <div>        <div>            <div>                <div>                    <div>                        <br>                    </div>                </div>                <div>                    <br>                </div>                <div>                    <br>                </div>            </div>        </div>    </div></div><div>    <br></div></div>';

	Correo::enviaCorrero("sinmatonesaporfavor@gmail.com", 
			"TEST", 
			$msg, false);
?>