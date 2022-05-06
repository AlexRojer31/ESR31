<?php
require_once "scripts/database_connect.php";
$page_title = "updates";
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<title>Обновления</title>
	<meta charset="window-1251">
	<meta name="description" content="Раздел со статьями ЭШП">
	<meta name="keywords" content="Приложение, ООО Белэнергомаш-БЗЭМ, ЭШП, Производство труб">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="icon" href="img/logo.png" type="image/x-icon">
	<link rel="stylesheet" href="style/index.css">
	<style>

.sidebar {
	width: 90%;
	margin-left: 5%;
}
.desctop form {
	padding-top: 20px;
}
.desctop h1 {
	padding-top: 20px;
}
@media all and (max-width: 900px) {
	.sidebar {
	display: block;
	}
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
			<li><a href="articles.php">статьи</a></li>
			<li><a href="updates.php" class="active">обновления</a></li>
			<!--<li><a href="contact.php">контакты</a></li>-->
			</ul>
		</div>
	</div>
	
	<div class="desctop">
		<div class="container">
			<h1>Обновления приложения<br><span>войдите или зарегистрируйтесь</span></h1>
			<form action="enter/verification_user.php" method="post">
				<input type="text" name="user_login" placeholder="Введите логин">
				<input type="password" name="user_password" placeholder="Введите пароль">
				<input type="submit" value="ВОЙТИ">
			</form>
			<!--<a href="registration.php">регистрация</a>-->
		</div>
	</div>

	<div class="sidebar">
		<h2>все обновления</h2>
		<ul>
			<li>
<?php
require_once "user_page/require_all_updates.php";
?>
		</ul>
	</div>
	
	<div class="clearfix">
	</div>
	
	<div class="footer">
		<ul>
			<li><a href="index.php">главная</a></a></li>
			<li><a href="articles.php">Статьи</a></a></li>
			<li><a href="updates.php" class="active">Обновления</a></a></li>
			<!--<li><a href="contact.php">Контакты</a></a></li>-->
		</ul>
		<hr>
		<p><a href="#"><?php require_once "scripts/political_config.php"; echo $political_text; ?></a></p>
	</div>
</body>
</html>