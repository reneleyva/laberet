<?php 
include 'conexion.php';
echo "LOOOL";
$sql = "SELECT * from libro;"; 
$query = mysqli_query($con, $sql);

while ($row = mysqli_fetch_array($query))
{
	echo $row['titulo'];
}

?>