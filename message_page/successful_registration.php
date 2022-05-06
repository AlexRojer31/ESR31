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
  	<link rel="icon" href="../img/logo.png" type="image/x-icon">
	<link rel="stylesheet" href="../style/index.css">
	<style>
.header:hover {
	height: 100px;
}
.desctop {
	background: url("../img/ok.jpg") no-repeat center;
	background-size: contain;
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
	</div>
	
	<div class="desctop">
		<div class="container">
			<h1>Ура!<br><span><?php echo $user_name." ".$user_patronymic;?>, регистрация прошла успешно! Решение о Вашем уровне доступа будет направлено на указанную Вами почту</span></h1>
			<form action="../index.php" method="get">
				<input type="submit" value="вернуться на главную">
			</form>
		</div>
	</div>

</body>
</html>