<?php
include_once '../backside/core/init.inc.php';
$current_page = $_SERVER['PHP_SELF'];
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?echo $description;?>">
    <meta name="keywords" content="<?echo $keywords;?>">
    <meta name="author" content="mercile55">
    <title><?php echo $title;?></title>
	
	<!-- core CSS -->
    <link rel="icon" href="icons/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="icons/favicon.ico" type="image/x-icon">
    <link href="/frontside/css/bootstrap.min.css" rel="stylesheet">
    <link href="frontside/css/font-awesome.min.css" rel="stylesheet">
    <link href="frontside/css/animate.min.css" rel="stylesheet">
    <link href="frontside/css/pretty-photo.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
    <link href="frontside/css/responsive.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/rotating-card.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="frontside/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="frontside/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="frontside/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="frontside/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="frontside/images/ico/apple-touch-icon-57-precomposed.png">
    <script src="frontside/js/jquery.js"></script>
</head><!--/head-->
<body class="homepage">

    <header id="header">
        <div class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="top-number">
                        <p class="text-grey"><i class="fa fa-phone-square"></i>  8 (8352) 21-77-66</p>
                        <p class="text-grey hidden-xs"><i class="fa fa-phone-square"></i>  8 (8352) 21-66-99</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                       <div class="social">
                            <a href="registry" class="btn btn-default registry-button">ЗАПИСАТЬСЯ НА ПРИЕМ СЕЙЧАС!</a>
                       </div>
                    </div>
                </div>
            </div><!--/.container-->
        </div><!--/.top-bar-->

        <nav class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index"><img src="images/endo-logo.png" alt="Эндоскопический центр"></a>
                </div>
                
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li <?php if ($current_page == '/index.php'){echo "class='active'";}?>"><a href="index">Главная</a></li>
                        <li <?php if ($current_page == '/about.php'){echo "class='active'";}?>"><a href="about">О поликлинике</a></li>
                        <li <?php if ($current_page == '/pricelist.php'){echo "class='active'";}?>"><a href="pricelist">Услуги и цены</a></li>
                        <li <?php if ($current_page == '/documents.php'){echo "class='active'";}?>"><a href="documents">Документы</a></li>
                        <li <?php if ($current_page == '/preparation.php'){echo "class='dropdown active'";}?>">
                            <a href="preparation" class="dropdown-toggle" data-toggle="dropdown">Подготовка <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="fgds-preparation">ФГДС</a></li>
                                <li><a href="fks-preparation">Колоноскопия</a></li>
                                <li><a href="proctology-preparation">Проктология</a></li>
                            </ul>
                        </li>
                        <li <?php if ($current_page == '/contacts.php'){echo "class='active'";}?>><a href="contacts">Контакты</a></li>                        
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
        
    </header><!--/header-->