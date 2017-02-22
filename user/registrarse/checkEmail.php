<?php 

include "../../conexion.php";
$correo = $_REQUEST['correo'];
$sql = "SELECT * FROM Usuario WHere correo = '".$correo."';";
$result = $pdo->query($sql);
$row = $result->fetch();
echo json_encode($row);