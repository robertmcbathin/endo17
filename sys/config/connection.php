<?php // rnfunctions.php
$dbhost  = '185.84.108.3';    // Unlikely to require changing
$dbname  = 'b79069_endoadmin'; // Modify these...
$dbuser  = 'u79069';     // ...variables according
$dbpass  = 'vxK2YJT7-m';     // ...to your installation

$server = mysql_connect($dbhost, $dbuser, $dbpass) or die(mysql_error());
mysql_select_db($dbname) or die(mysql_error());
$db = @mysql_connect($dbhost, $dbuser, $dbpass);
if (!$db)  {
echo "<center>Сервер базы данных не доступен,сообщите администратору по e-mail: mercile55@yandex.ru</center>";
exit();
}
if (!@mysql_select_db($dbname, $db))  {
echo "<center>Сервер базы данных не доступен,сообщите администратору по e-mail: mercile55@yandex.ru</center>";
exit();
}
$query = mysql_query("SET NAMES 'utf8'");
?>
