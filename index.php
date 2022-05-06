<?php
$page_title = "index";
require_once "scripts/database_connect.php";
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<title>ЭШП ПТ ООО "Белэнергомаш-БЗЭМ"</title>
	<meta charset="window-1251">
	<meta name="description" content="Приложение для технологической подготовки участка электрошлаковой выплавки ПТ Белэнергомаш-БЗЭМ">
	<meta name="keywords" content="Приложение, ООО Белэнергомаш-БЗЭМ, ЭШП, Производство труб">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="icon" href="img/logo.png" type="image/x-icon">
	<link rel="stylesheet" href="style/index.css">
	<style>

	</style>
</head>
<body>
	<div class="header container">
		<div class="logo">
			<img src="img/logo1.png">
			<span>E</span>lectro<br>
			<span>S</span>lag<br>
			<span>R</span>emelting
		</div>
		<div class="menu">
			<ul>
			<li><a href="index.php" class="active">главная</a></li>
			<li><a href="articles.php">статьи</a></li>
			<li><a href="updates.php">обновления</a></li>
			<!--<li><a href="contact.php">контакты</a></li>-->
			</ul>
		</div>
	</div>
	
	<div class="desctop">
		<div class="container">
			<h1>Электрошлаковый переплав<br><span>анализ, совершенствование и контроль</span></h1>
			<form action="enter/verification_user.php" method="post">
				<input type="text" name="user_login" placeholder="Введите логин">
				<input type="password" name="user_password" placeholder="Введите пароль">
				<input type="submit" value="ВОЙТИ">
			</form>
			<!--<a href="registration.php">регистрация</a>-->
		</div>
	</div>

	<div class="content">
		<h2>Новые статьи</h2>
		<ul>
<?php
require_once "user_page/require_index_posts.php";
?>			
		</ul>
		<br>
		<hr>
		<a href="articles.php">Все статьи</a>
	</div>
	
	<div class="sidebar">
		<h2>Последние обновления</h2>
		<ul>
<?php
require_once "user_page/require_index_updates.php";
?>
		</ul>
		<a href="updates.php">Все обновления</a>
	</div>
	
	<div class="clearfix">
	</div>
	
	<div class="footer">
		<ul>
			<li><a href="index.php" class="active">главная</a></a></li>
			<li><a href="articles.php">Статьи</a></a></li>
			<li><a href="updates.php">Обновления</a></a></li>
			<!--<li><a href="contact.php">Контакты</a></a></li>-->
		</ul>
		<hr>
		<p><a href="#qwerty"><?php require_once "scripts/political_config.php"; echo $political_text; ?></a></p>
		<p><a href="http://vk.com/"><?php require_once "scripts/political_config.php"; echo $political_text; ?></a></p>
		<p><a href="http://app12/"><?php require_once "scripts/political_config.php"; echo $political_text; ?></a></p>
	</div>
</body>
</html>
