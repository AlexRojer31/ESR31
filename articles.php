<?php
require_once "scripts/database_connect.php";
$page_title = "articles";
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<title>Статьи</title>
	<meta charset="window-1251">
	<meta name="description" content="Раздел со статьями ЭШП">
	<meta name="keywords" content="Приложение, ООО Белэнергомаш-БЗЭМ, ЭШП, Производство труб">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="icon" href="img/logo.png" type="image/x-icon">
	<link rel="stylesheet" href="style/index.css">
	<style>
.sidebar {
	display: none;
}
.content {
	width: 90%;
	margin-left: 5%;
}
.desctop form {
	padding-top: 20px;
}
.desctop h1 {
	padding-top: 20px;
}
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
			<li><a href="index.php">главная</a></li>
			<li><a href="articles.php" class="active">статьи</a></li>
			<li><a href="updates.php">обновления</a></li>
			<!--<li><a href="contact.php">контакты</a></li>-->
			</ul>
		</div>
	</div>
	
	<div class="desctop">
		<div class="container">
			<h1>Статьи по ЭШП<br><span>войдите или зарегистрируйтесь</span></h1>
			<form action="enter/verification_user.php" method="post">
				<input type="text" name="user_login" placeholder="Введите логин">
				<input type="password" name="user_password" placeholder="Введите пароль">
				<input type="submit" value="ВОЙТИ">
			</form>
			<!--<a href="registration.php">регистрация</a>-->
		</div>
	</div>

	<div class="content">
		<h2>Все статьи</h2>
		<ul>
<?php
require_once "user_page/require_all_posts.php";
?>
		</ul>
		<br>
	</div>
	
	<div class="clearfix">
	</div>
	
	<div class="footer">
		<ul>
			<li><a href="index.php">главная</a></a></li>
			<li><a href="articles.php" class="active">Статьи</a></a></li>
			<li><a href="updates.php">Обновления</a></a></li>
			<!--<li><a href="contact.php">Контакты</a></a></li>-->
		</ul>
		<hr>
		<p><a href="#"><?php require_once "scripts/political_config.php"; echo $political_text; ?></a></p>
	</div>
</body>
</html>
