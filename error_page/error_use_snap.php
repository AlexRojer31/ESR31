<?php
require_once "../scripts/database_connect.php";

require_once "../user_page/about_user.php";

?>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../style/user_page.css">
	<style>
.header:hover {
	height: 100px;
}
.desctop {
	background: url("../img/error1.jpg") no-repeat center;
	background-size: contain;
	min-height: 300px;
}
	</style>
</head>
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
			<form action="../user_page/worker.php" method="post">
				<input type="submit" value="назад">
			</form>
			<h1>Оснастка, которую Вы пытаетесь применить, отсутствует в базе данных Обратитесь к мастеру.</h1>
		</div>
	</div>