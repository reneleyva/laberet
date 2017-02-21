<?php 
	include '../../conexion.php';
	if(isset($_POST['correo']))
	{
		if(isset($_POST['password']))
		{
			$correo = $_POST['correo'];
			$pass = $_POST['password'];
			$pass = md5(pass.'dick');
			try
			{
				$sql = "SELECT * from usuario Where contrasenia = ".$pass.";";
				$result = $pdo->query($sql);
				$row = $result->fetch();
				if(!$row){
					echo '404';
				}
				$nombre = $row['nombre'];
				$_SESSION['nombre'] = $nombre

			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
				exit();
			}

		}
	}

?>