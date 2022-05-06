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
	background: url("../img/is_user.jpg") no-repeat center;
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
			<h1>Упс!<br><span><?php echo $user_name." ".$user_patronymic;?>, пользователь с логином <?php echo $user_login?> уже существует, придумайте другой логин.</span></h1>
			<form action="../registration.php" method="get">
				<input type="hidden" name="user_name" value="<?php echo $user_name;?>">
				<input type="hidden" name="user_surname" value="<?php echo $user_surname;?>">
				<input type="hidden" name="user_patronymic" value="<?php echo $user_patronymic;?>">
				<input type="hidden" name="user_place_of_work" value="<?php echo $user_place_of_work;?>">
				<input type="hidden" name="user_position" value="<?php echo $user_position;?>">
				<input type="hidden" name="user_email" value="<?php echo $user_email;?>">
				<input type="hidden" name="user_phone" value="<?php echo $user_phone;?>">
				<input type="submit" value="повторить регистрацию">
			</form>
			<a href="../index.php">на главную</a>
		</div>
	</div>

</body>
</html>