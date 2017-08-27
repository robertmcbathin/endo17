<?php
session_start();
$current_page = $_SERVER['PHP_SELF'];
?>
<!DOCTYPE html>
<?php 
require_once '../functions.php';
if (isset($_SESSION['user']))
{
  $user = $_SESSION['user'];
  $loggedin = TRUE;
}
else 
{
  $loggedin = FALSE;
    }
 ?>
<html>
<head>
<title>Панель администратора</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=9" />
<meta name="author" content="mercile55">
<link rel="icon" href="../icons/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="icons/favicon.ico" type="image/x-icon">
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,400italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<?php 
if ($current_page == '/reg/administration.php'){
  echo "<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>";
  echo "<link rel='stylesheet' type='text/css' href='../css/registry_style.css'>";
} else {
   echo "<link rel='stylesheet' type='text/css' href='/reg/user-style.css'>";   
}
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<script src="/reg/userjs.js"></script>
<script src="/reg/jquery.form.js"></script>
<!-- Yandex.Metrika counter -->
<script type="text/javascript">
(function (d, w, c) {
    (w[c] = w[c] || []).push(function() {
        try {
            w.yaCounter21858613 = new Ya.Metrika({id:21858613,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true});
        } catch(e) { }
    });

    var n = d.getElementsByTagName("script")[0],
        s = d.createElement("script"),
        f = function () { n.parentNode.insertBefore(s, n); };
    s.type = "text/javascript";
    s.async = true;
    s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

    if (w.opera == "[object Opera]") {
        d.addEventListener("DOMContentLoaded", f, false);
    } else { f(); }
})(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="//mc.yandex.ru/watch/21858613" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</head>
<body>
    <?php
    if ($current_page == '/reg/administration.php'){
        echo <<<_END
  <header style='text-align: center'>
    <img src='../images/logo64.png' align='center'><h1 id='logo'><br/><a class='logo_href' href='http://endoscopy21.ru/'>ЭНДОСКОПИЧЕСКИЙ ЦЕНТР</a></h1>
	<h3 class='name'>ООО ''ЛЕЧЕБНО-ДИАГНОСТИЧЕСКАЯ ПОЛИКЛИНИКА''</h3>
    <h3>ПАНЕЛЬ АДМИНИСТРАТОРА</h3>
   </header>
_END;
    } else {
        echo '<section>';
        if (isset($_GET['view'])) {
            $view = $_GET['view'];
        if ($view == $user){ 
            $name = "Это Ваша Страница, $view";
            echo "<p id='current_user_name'>Вы вошли в систему как <strong>$view<strong> | <a href='logout.php'>Выход</a></p>";
        }}
        echo '</section>';

    }
    ?>