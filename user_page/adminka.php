<?php
$page_title = "админка";

require_once "../scripts/database_connect.php";

require_once "about_user.php";

require_once "header.php";
?>
<style>
.content {
	float: none;
	width: 90%;
	margin-left: 5%;
}
.content h4 {
	margin: 0;
	padding: 0;
	margin-top: 20px;
	font-family: "impact";
	font-size: 24px;
}
.content h5 {
	margin: 0;
	padding: 0;
	margin: 10px 0px;
	font-family: "courier new";
	font-size: 20px;
	font-weight: bold;
	padding-left: 20px;
}
.content p {
	display: inline-block;
	margin: 0;
	padding: 0;
	margin-top: -30px;
	font-family: "courier new";
	font-size: 16px;
	padding-left: 20px;
}
.content form {
	display: inline-block;
	padding-left: 20px;
	padding-top: 10px;
}
.content form  select {
	display: inline-block;
	font-family: "courier new";
	font-size: 18px;
	background-color: transparent;
	border: none;
	width: 30%;
	min-width: 150px;
	border-bottom: 1px solid rgba(0, 83, 138, 1);
}
.content form  input[type=submit] {
	margin-left: 10px;
	padding: 5px 15px;
	font-family: "courier new";
	font-size: 18px;
	text-transform: uppercase;
	background-color: transparent;
	border: 1px solid rgba(0, 83, 138, 1);
	transition: 0.5s;
}
.content form  input[type=submit]:hover {
	color: white;
	background-color: rgba(0, 83, 138, 1);
	cursor: pointer;
	transition: 0.5s;
}
.questions h5 {
	display: block;
	margin: 20px 0px;
}
.questions p {
	display: block;
	margin: 20px 0px;
}
.questions p span {
	color: rgba(0, 83, 138, 1);
}
.questions textarea {
	min-width: 400px;
	border: 1px solid rgba(0, 83, 138, 1);
	min-height: 100px;
	overflow: auto;
	margin-bottom: 10px;
}
.questions form input[type=submit] {
	margin-left: 0px;
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
			<h1><span>Администрирование</span><br><?php echo $user_name;?> <?php echo $user_patronymic;?></h1>
		</div>
	</div>

	<div class="content">
<?php
$i = 1;
$sql_new_user = "SELECT user_name,
user_surname,
user_patronymic,
user_place_of_work,
user_position,
user_email,
user_phone,
user_login,
user_password FROM new_users";
$result_new_user = mysqli_query($link, $sql_new_user);

$result_isset_new_user = mysqli_query($link, $sql_new_user);
$row_isset_new_user = mysqli_fetch_array($result_isset_new_user);
if ($row_isset_new_user) {
	echo "<h4>Пользователи, запросившие авторизацию:<br></h4>";
};

while ($row_new_user = mysqli_fetch_array($result_new_user)) {
	echo "<h5>".$i.". ".$row_new_user["user_surname"]." ".$row_new_user["user_name"]." ".$row_new_user["user_patronymic"].".</h5><br>
	<p>Работающий на предприятии: ".$row_new_user["user_place_of_work"].", в должности: ".$row_new_user["user_position"].".<br>
	Телефон - ".$row_new_user["user_phone"].", электронная почта - ".$row_new_user["user_email"].".<br>
	Запросил регистрацию. <i>Установите уровень доступа и нажмите \"ОДОБРИТЬ\" или нажмите \"ОТКАЗАТЬ\"</i></p><br>";
	$user_name_new = $row_new_user["user_name"];
	$user_surname_new = $row_new_user["user_surname"];
	$user_patronymic_new = $row_new_user["user_patronymic"];
	$user_place_of_work_new = $row_new_user["user_place_of_work"];
	$user_position_new = $row_new_user["user_position"];
	$user_email_new = $row_new_user["user_email"];
	$user_phone_new = $row_new_user["user_phone"];
	$user_login_new = $row_new_user["user_login"];
	$user_password_new = $row_new_user["user_password"];
	echo "
	<form action=\"admin_scripts/add_new_user.php\" method=\"post\">
		<select name=\"new_user_type\" title=\"установить уровень доступа\">
			<option value=\"guest\">Гость</option>
			<option value=\"worker\">Рабочий</option> 
			<option value=\"controller\">Контролер</option>
			<option value=\"master\">Мастер</option>
			<option value=\"technolog\">Технолог</option>
			<option value=\"admin\">Админ</option>
		</select>
			<input type=\"hidden\" name=\"new_user_name\" value=\"".$user_name_new."\">
			<input type=\"hidden\" name=\"new_user_surname\" value=\"".$user_surname_new."\">
			<input type=\"hidden\" name=\"new_user_patronymic\" value=\"".$user_patronymic_new."\">
			<input type=\"hidden\" name=\"new_user_place_of_work\" value=\"".$user_place_of_work_new."\">
			<input type=\"hidden\" name=\"new_user_position\" value=\"".$user_position_new."\">
			<input type=\"hidden\" name=\"new_user_email\" value=\"".$user_email_new."\">
			<input type=\"hidden\" name=\"new_user_phone\" value=\"".$user_phone_new."\">
			<input type=\"hidden\" name=\"new_user_login\" value=\"".$user_login_new."\">
			<input type=\"hidden\" name=\"new_user_password\" value=\"".$user_password_new."\">
		<input type=\"submit\" value=\"одобрить\">
	</form>
	<form action=\"admin_scripts/delete_new_user.php\" method=\"post\">
		<input type=\"hidden\" name=\"new_user_login\" value=\"".$user_login_new."\">
		<input type=\"submit\" value=\"отказать\">
	</form>
	";
$i++;
};



$sql_is_question = "SELECT id, user_id,
user_question,
user_question_date
FROM user_questions WHERE answer_to_user=''";
$result_is_question = mysqli_query($link, $sql_is_question);
$row_is_question = mysqli_fetch_array($result_is_question);
if ($row_is_question) {
echo "<div class=\"questions\"><h5>Вопросы от пользователей:</h5>";
};
$j = 1;
$sql_user_question = "SELECT id, user_id,
user_question,
user_question_date
FROM user_questions WHERE answer_to_user=''";
$result_user_question = mysqli_query($link, $sql_user_question);
while ($row_user_question = mysqli_fetch_array($result_user_question)) {
	$user_q_login = $row_user_question["user_id"];
	$sql_q_user = "SELECT user_patronymic, user_name, user_email FROM users WHERE user_login='{$user_q_login}'";
	$result_q_user = mysqli_query($link, $sql_q_user);
	$row_q_user = mysqli_fetch_array($result_q_user);
	$user_q_name = $row_q_user["user_name"];
	$user_q_patronymic = $row_q_user["user_patronymic"];
	$user_q_email = $row_q_user["user_email"];
	echo "<p>".$j." ".$user_q_name." ".$user_q_patronymic." <span>(".$row_user_question["user_question_date"].")</span><br>
	Интересуется: ".$row_user_question["user_question"].".</p>";
	echo "<form action=\"admin_scripts/admin_answer.php\" method=\"post\">
	<textarea name=\"answer_to_user\"></textarea><br>
	<input type=\"hidden\" name=\"user_q_email\" value=\"".$user_q_email."\">
	<input type=\"hidden\" name=\"user_q_login\" value=\"".$row_user_question["id"]."\">
	<input type=\"submit\" value=\"Ответить\">
	</form>
	";
	$j++;
};
echo "</div>";


?>
	</div>
	
	
	<div class="clearfix">
	</div>
	<!--<a href="admin_scripts/dumpBD.php">Создать дамп бд</a>-->
	<!--<a href="admin_scripts/revBD.php">Восстановить бд</a>-->
	
<?php
require_once "footer.php";
?>