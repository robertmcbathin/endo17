<?php 
$dbhost  = '185.84.108.3';    // Unlikely to require changing                    //$dbhost  = 'localhost';  
$dbname  = 'b79069_endoadmin'; // Modify these...                    //$dbname  = 'endoadmin'; 
$dbuser  = 'u79069';     // ...variables according                    //$dbuser  = 'root';     
$dbpass  = 'vxK2YJT7-m';     // ...to your installation                    //$dbpass  = '';     

$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if($mysqli->connect_error)
{
  die('Connect error(' . $mysqli->connect_errno . ')' . $mysqli::connect_error);
}
$mysqli->query("SET NAMES 'utf8'");
$mysqli->set_charset('utf8');
?>
