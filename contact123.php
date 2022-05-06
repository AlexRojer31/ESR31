<?php
require_once "scripts/database_connect.php"
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<title>Контакты</title>
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

.content {
	width: 90%;
	margin-left: 5%;
	border-top: 1px solid rgba(0, 83, 138, 1);
	border-bottom: 1px solid rgba(0, 83, 138, 1);
}
.content blockquote {
	border-left: 2px solid rgba(0, 83, 138, 1);
	padding-left: 20px;
}
.content h4 {
	font-family: "impact";
	font-size: 24px;
	margin: 0;
}
.content h4 span {
	color: rgba(0, 83, 138, 1);
	font-family: "courier new";
	font-size: 16px;
}
.content a {
	display: inline-block;
	margin: 5px 0px;
	font-family: "courier new";
	font-size: 18px;
	text-transform: uppercase;
	text-decoration: none;
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
			<li><a href="contact.php" class="active">контакты</a></li>
			</ul>
		</div>
	</div>
	
	<div class="desctop">
		<div class="container">
			<h1>Контакты<br><span>войдите или зарегистрируйтесь</span></h1>
			<form action="enter/verification_user.php" method="post">
				<input type="text" name="user_login" placeholder="Введите логин">
				<input type="password" name="user_password" placeholder="Введите пароль">
				<input type="submit" value="ВОЙТИ">
			</form>
			<a href="registration.php">регистрация</a>
		</div>
	</div>

	<div class="content">
<?php
$sql_contcat = "SELECT user_name, user_surname, user_patronymic, user_place_of_work, user_position, user_email, user_phone FROM users;";
$result_contact = mysqli_query($link, $sql_contcat);
while ($row_contcat = mysqli_fetch_array($result_contact)) {
	echo "
	<blockquote>
	<h4>".$row_contcat["user_surname"]." ".$row_contcat["user_name"]." ".$row_contcat["user_patronymic"]."<br><span>\"".$row_contcat["user_place_of_work"]."\"<br>".$row_contcat["user_position"]."</span></h4>
	<a href=\"mailto:".$row_contcat["user_email"]."\" title=\"".$row_contcat["user_email"]."\">Почта. : ".$row_contcat["user_email"]."</a><br>
	<a href=\"".$row_contcat["user_phone"]."\" title=\"".$row_contcat["user_phone"]."\">Телефон : ".$row_contcat["user_phone"]."</a>
	</blockquote>
	";
};
?>
	</div>
	
	<div class="clearfix">
	</div>
	
	<div class="footer">
		<ul>
			<li><a href="index.php">главная</a></a></li>
			<li><a href="articles.php">Статьи</a></a></li>
			<li><a href="updates.php">Обновления</a></a></li>
			<li><a href="contact.php" class="active">Контакты</a></a></li>
		</ul>
		<hr>
		<p><a href="#"><?php require_once "scripts/political_config.php"; echo $political_text; ?></a></p>
	</div>
</body>
</html>