<!DOCTYPE html>
<html lang="ru">
<head>
	<title>ЭШП ПТ ООО "Белэнергомаш-БЗЭМ"</title>
	<meta charset="window-1251">
	<meta name="description" content="Приложение для технологической подготовки участка электрошлаковой выплавки ПТ Белэнергомаш-БЗЭМ">
	<meta name="keywords" content="Приложение, ООО Белэнергомаш-БЗЭМ, ЭШП, Производство труб">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="icon" href="../img/logo.png" type="image/x-icon">
	<link rel="stylesheet" href="../style/index.css">
	<style>
.error {
	text-align: center;
}
.error a {
	display: inline-block;
	text-align: center;
	color: rgba(0, 83, 138, 0.7);
	margin: 20px;
	font-family: "courier new";
	font-size: 16px;
}
.error h2 {
	font-family: "impact";
	font-size: 24px;
}
.error p {
	font-family: "courier new";
	font-size: 16px;
}
.desctop {
	background: url("../img/error.jpg") no-repeat center;
}
	</style>
</head>
<body>
	<div class="header container">
		<div class="logo">
			<img src="../img/logo1.png">
			<span>E</span>lectro<br>
			<span>S</span>lag<br>
			<span>R</span>emelting
		</div>
		<div class="menu">
			<a href="../index.php">главная</a>
			<a href="../articles.php">статьи</a>
			<a href="../updates.php">обновления</a>
		</div>
	</div>
	
	<div class="desctop">
		<div class="container">
			<h1>Упс!<br><span>доступ ограничен</span></h1>
			<form action="../enter/verification_user.php" method="post">
				<input type="text" name="user_name" placeholder="Введите логин">
				<input type="text" name="user_password" placeholder="Введите пароль">
				<input type="submit" name="user_name" value="ВОЙТИ">
			</form>
			<a href="../registration.php">регистрация</a>
		</div>
	</div>

	<div class="error">
		<h2>ограничение доступа просмотра</h2>
		<p>Просмотр статьи незарегистрированными пользователями недоступен.<br> Пожалуйста <a href="../index.php">войдите</a> или <a href="../registration.php">зарегистрируйтесь</a>.</p>
		<br>
		<hr>
		<a href="../index.php">на главную</a>
	</div>
	
	<div class="clearfix">
	</div>
	
	<div class="footer">
		<ul>
			<li><a href="../index.php">главная</a></a></li>
			<li><a href="../articles.php">Статьи</a></a></li>
			<li><a href="../updates.php">Обновления</a></a></li>
		</ul>
		<hr>
		<p><a href="#"><?php require_once "../scripts/political_config.php"; echo $political_text; ?></a></p>
	</div>
</body>
</html>