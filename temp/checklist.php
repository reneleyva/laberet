<?php 

$json = $_POST['json'];
$fp = fopen('checklist.json', 'w');
fwrite($fp, json_encode($json));
fclose($fp);