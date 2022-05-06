<?php
$user_name = $_GET["user_name"];
$user_surname = $_GET["user_surname"];
$user_patronymic = $_GET["user_patronymic"];
$user_place_of_work = $_GET["user_place_of_work"];
$user_position = $_GET["user_position"];
$user_email = $_GET["user_email"];
$user_phone = $_GET["user_phone"];
$user_login = $_GET["user_login"];
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
	<link rel="stylesheet" href="style/registration_page.css">
	<style>
h2 span {
	color: red;
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
			<li><a href="updates.php">обновления</a></li>
			<!--<li><a href="contact.php">контакты</a></li>-->
			</ul>
		</div>
	</div>
	
	<div class="desctop">
		<div class="container">
			<h1>Добро пожаловать на страницу регистрации<br><span>заполните все поля и нажмите "Зарегистрироваться"</span></h1>
			<a href="index.php">на главную</a>
		</div>
	</div>

	<div class="registration">
		<div class="container">
			<form action="enter/registration_user.php" method="post">
				<h2>форма регистрации <span></span></h2>
				<h3>ФИО:</h3>
				<ul>
					<li>
				<label for="surname">Фамилия</label><br>
				<input pattern="[А-Я]{1}[а-я]{0,30}" required type="text" name="user_surname" id="surname" placeholder="Иванов" value="<?php echo $user_surname;?>"><br>
					</li>
					<li>
				<label for="name">Имя</label><br>
				<input pattern="[А-Я]{1}[а-я]{0,30}" required type="text" name="user_name" id="name" placeholder="Иван" value="<?php echo $user_name;?>"><br>
					</li>
					<li>
				<label for="patronymic">Отчество</label><br>
				<input pattern="[А-Я]{1}[а-я]{0,30}" required type="text" name="user_patronymic" id="patronymic" placeholder="Иванович" value="<?php echo $user_patronymic;?>"><br>
					</li>
					<div class="clearfix">
					</div>
				</ul>
					<br>
					<h3>Сведения о работе:</h3>
				<ul>
					<li>
				<label for="place">Место работы</label><br>
				<input required type="text" name="user_place_of_work" id="place" placeholder="Энергомаш" value="<?php echo $user_place_of_work;?>"><br>
					</li>
					<li>
				<label for="position">Должность</label><br>
				<input required type="text" name="user_position" id="position" placeholder="Сталевар" value="<?php echo $user_position;?>"><br>
					</li>
					<div class="clearfix">
					</div>
				</ul>
					<br>
					<h3>Контактные данные:</h3>
				<ul>
					<li>
				<label for="phone">Телефон</label><br>
				<input pattern="[0-9]{4,20}" required type="tel" name="user_phone" id="phone" placeholder="88002005050" value="<?php echo $user_phone;?>"><br>
					</li>
					<li>
				<label for="email">Электронная почта</label><br>
				<input required type="email" name="user_email" id="email" placeholder="exemple@mail.ru" value="<?php echo $user_email;?>"><br>
					</li>
					<div class="clearfix">
					</div>
				</ul>
					<br>
					<h3>Данные для входа:</h3>
				<ul>
					<li>
				<label for="login">Придумайте логин</label><br>
				<input pattern="{6,20}" required type="text" name="user_login" id="login" value="<?php echo $user_login;?>"><br>
					</li>
					<li>
				<label for="password">Придумайте пароль</label><br>
				<input required type="password" name="user_password" id="password"><br>
					</li>
					<li>
				<label for="password_repeat">Повторите пароль</label><br>
				<input required type="password" name="user_password_repeat" id="password_repeat"><br>
					</li>
					<div class="clearfix">
					</div>
				</ul>
					<br>
				<input type="submit" value="зарегистрироваться"><br>
				<input type="reset" value="Сбросить">
				</ul>
			</form>
		</div>
	</div>

	
	<div class="clearfix">
	</div>
	
	<div class="footer">
		<ul>
			<li><a href="index.php">главная</a></a></li>
			<li><a href="articles.php">Статьи</a></a></li>
			<li><a href="updates.php">Обновления</a></a></li>
			<!--<li><a href="contact.php">Контакты</a></a></li>-->
		</ul>
		<hr>
		<p><a href="#"><?php require_once "scripts/political_config.php"; echo $political_text; ?></a></p>
	</div>
</body>
</html>