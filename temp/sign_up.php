<?php

inlclude "conexion.php"

if ($_POST['new_username'] == '' or $_POST['new_pass'] or $_POST['new_realname'] == '' or $_POST['new_email'] == '')
{
	error('BALE BERGA LA BIDA');

} 

$sql = "SELECT COUNT(*) FROM usuario WHERE username = '$_POST['new_username']'";
$result = mysql_query($sql);
if(!$result)
{
	error("BALE BERGA LA BIDA");
} 

if(@mysql_result($result,0,0) > 0)
{
	error("BALE BERGA LA BIDA");
}
$sql = "SELECT COUNT(*) FROM usuario WHERE correo = '$_POST['new_email']'"
$result = mysql_query($sql);
if($result)
{
	error("BALE BERGA LA BIDA");
}
else
{
	$newpass = md5("$_POST['new_pass']".'pene');
	$sql = "INSERT INTO user SET
	        username = '$_POST[new_username]'
	        contrasenia = '$newpass'
	        nombre = '$_POST[new_realname]'
	        correo = '$_POST[new_email]'"
	if(!mysql_query($sql))
	{
		error("bale berga la bida")
	}
}