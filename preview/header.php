<!DOCTYPE html>
<?php include_once 'preloader.php'?>
<html>
<head>
<?php 
  include 'functions.php';
//разбор текущей страницы
  $current_page = $_SERVER['PHP_SELF'];
?>
<title>Эндоскопический центр</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=9" />
<meta name="description" content="ЛДП">
<meta name="keywords" content="эндоскопия, эндоскопический центр, эндоскопический центр чебоксары, фгдс, ЛДП, ЛЕЧЕБНО-ДИАГНОСТИЧЕСКАЯ ПОЛИКЛИНИКА,
 ФГДС на дому, пройти обследование, консультация, консультация фгдс, фкс, ррс, Консультация гастроэнтеролога, гастроэнтерология, клизма, 
 проктология, лечение внутреннего геморроя, геморрой вылечить, тромбэктомия, иссечение перинатальных бахром, склерозирование внутренних узлов, 
 эндоскопи, эндоскопи21, эндоскопи 21, эндоскопи двадцать один">
<meta name="author" content="mercile55">
<link rel="icon" href="icons/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="icons/favicon.ico" type="image/x-icon">
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,400italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/slider_style.css">
<?php 
if ($current_page == '/registry'){
echo "<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>";
echo "<link rel='stylesheet' type='text/css' href='css/registry_style.css'>";
}
?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script type="text/javascript" src="scripts/script.js"></script>
<script type="text/javascript" src="scripts/less-1.3.3.min.js"></script>
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
 <script type="text/javascript">
     $(document).ready(function() {
         setInterval(rotateImages, 4000);
     });

     function rotateImages(){
         $("#photoShow").animate({marginLeft: "-940px"}, 1500).delay(5000);

         $("#photoShow").animate({marginLeft: "-1880px"}, 1500).delay(5000);

         $("#photoShow").animate({marginLeft: "-2820px"}, 1500).delay(5000);

         $("#photoShow").animate({marginLeft: "-3760px"}, 1500).delay(5000);

         $("#photoShow").animate({marginLeft: "0px"}, 1500).delay(4000);
     }
     </script>
<noscript><div><img src="//mc.yandex.ru/watch/21858613" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</head>
<body>
<div class="row" id="header_row">
  <header>
    <div id="header_logo">
    <img src="images/logo64.png" align='center'><h1 id="logo"><br/><a class="logo_href" href="http://endoscopy21.ru/">ЭНДОСКОПИЧЕСКИЙ ЦЕНТР</a></h1>
	<h3 class="name">ООО "ЛЕЧЕБНО-ДИАГНОСТИЧЕСКАЯ ПОЛИКЛИНИКА"</h3></br>
	</div>
	<div id="header_info">
	 <a class="button" href="registry">ЗАПИСАТЬСЯ НА ПРИЁМ СЕЙЧАС!</a>
	</div>
      <nav>
	    <?php //разбор текущей страницы
		$current_page = $_SERVER['PHP_SELF'];
		?>
        <ul id="nav">
          <li><a href="index" <?php if ($current_page == '/index.php'){echo "class='attivo'";} ?>>ГЛАВНАЯ</a></li>
		<!--<li><a href="gallery" <?php /*if ($current_page == '/gallery.php'){echo "class='attivo'";} */?>>ФОТОГАЛЕРЕЯ</a></li>-->
		  <li><a href="employees" <?php if ($current_page == '/employees.php'){echo "class='attivo'";} ?>>СОТРУДНИКИ</a></li>
          <li><a href="documents" <?php if ($current_page == 'documents.php'){echo "class='attivo'";} ?>>ДОКУМЕНТЫ</a></li>
          <li><a href="contacts" <?php if ($current_page == '/contacts.php'){echo "class='attivo'";} ?>>КОНТАКТЫ</a></li>
		  <li><a href="services" <?php if ($current_page == '/services.php'){echo "class='attivo'";} ?>>УСЛУГИ И ЦЕНЫ</a></li>
		  <li><a href="preparation" <?php if ($current_page == '/preparation.php'){echo "class='attivo'";} ?>>ПОДГОТОВКА К ПРОЦЕДУРАМ</a></li>
		  <li><a href="info" <?php if ($current_page == '/info.php'){echo "class='attivo'";} ?>>ЭТО ИНТЕРЕСНО</a></li>
          </ul>
      </nav>
  </header>
  </div>