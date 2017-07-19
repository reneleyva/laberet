<?php 

/**
* Clase para Guardar en un log la ip la fecha y hora de visitantes
*/
class Log 
{

	// Function to get the client IP address
	function get_client_ip() {
	    $ipaddress = '';
	    if (getenv('HTTP_CLIENT_IP'))
	        $ipaddress = getenv('HTTP_CLIENT_IP');
	    else if(getenv('HTTP_X_FORWARDED_FOR'))
	        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
	    else if(getenv('HTTP_X_FORWARDED'))
	        $ipaddress = getenv('HTTP_X_FORWARDED');
	    else if(getenv('HTTP_FORWARDED_FOR'))
	        $ipaddress = getenv('HTTP_FORWARDED_FOR');
	    else if(getenv('HTTP_FORWARDED'))
	       $ipaddress = getenv('HTTP_FORWARDED');
	    else if(getenv('REMOTE_ADDR'))
	        $ipaddress = getenv('REMOTE_ADDR');
	    else
	        $ipaddress = 'UNKNOWN';
	    return $ipaddress;
	}

	function guardaVisita() {
		include_once "conexion.php";
		//Hoy
		date_default_timezone_set('America/Mexico_City');
		$anio = date('Y');
	    $mes = date('m');
	    $dia = date('d');
	    $fecha = $anio.'/'.$mes.'/'.$dia;
	    $hora = date('H:i:s');
		$sql = "INSERT INTO registrovisitas (fecha, hora, ip)
				VALUES ('".$fecha."', '".$hora."', '".Log::get_client_ip()."')";
		// echo $sql;
		$pdo->query($sql);
	}
}

?>