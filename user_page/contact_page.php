<?php
$page_title = "контакты";

require_once "../scripts/database_connect.php";

require_once "about_user.php";

require_once "header.php";
?>
<style>
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
	<div class="desctop">
		<div class="container">
			<form action="../index.php" method="post">
				<input type="submit" name="user_name" value="выход">
			</form>
			<form action="change_password.php" method="post">
				<input type="submit" value="изменить пароль">
			</form>
			<h1>Контакты</h1>
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
	<a href=\"tel:".$row_contcat["user_phone"]."\" title=\"".$row_contcat["user_phone"]."\">Телефон : ".$row_contcat["user_phone"]."</a>
	</blockquote>
	";
};
?>
	</div>
	
	<div class="clearfix">
	</div>
	
<?php
require_once "footer.php";
?>