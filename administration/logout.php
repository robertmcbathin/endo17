<?php
include_once 'admin_header.php';
if (isset($_SESSION['user']))
{
	destroySession();
	echo "<div id='logout'><p align=center>Вы вышли из системы.</p>
	<p align=center><a class='post_href' href='http://endoscopy21.ru'>Кликните здесь</a> для перехода на главную страницу.</p></div>";
}
else echo "<div id='logout'><p align=center>Вы не авторизованы в системе</p></div>";
include_once "admin_footer.php";
?>
