<?php
require_once "../scripts/database_connect.php"; 

$user_name = $_POST["user_name"];
$user_surname = $_POST["user_surname"];
$user_patronymic = $_POST["user_patronymic"];
$user_email = $_POST["user_email"];
$user_phone = $_POST["user_phone"];
$user_login = $_POST["user_login"];

$sql_user = "SELECT user_name, user_surname, user_patronymic, user_email, user_phone, user_password FROM users WHERE user_login='{$user_login}'";
$result_user = mysqli_query($link, $sql_user)
	or die("error".mysqli_error($link));
$row_user = mysqli_fetch_array($result_user);

if (!isset($row_user)) {
	header("Location: ../error_page/recovery_error.php?user_login=$user_login");
	exit;
};

$db_user_name = $row_user["user_name"];
$db_user_surname = $row_user["user_surname"];
$db_user_patronymic = $row_user["user_patronymic"];
$db_user_email = $row_user["user_email"];
$db_user_phone = $row_user["user_phone"];
$db_user_password = $row_user["user_password"];

if ($db_user_surname != $user_surname) {
	header("Location: ../error_page/recovery_error.php?user_login=$user_login");
	exit;	
};

if ($db_user_name != $user_name) {
	header("Location: ../error_page/recovery_error.php?user_login=$user_login");
	exit;	
};
if ($db_user_patronymic != $user_patronymic) {
	header("Location: ../error_page/recovery_error.php?user_login=$user_login");
	exit;	
};
if ($db_user_email != $user_email) {
	header("Location: ../error_page/recovery_error.php?user_login=$user_login");
	exit;	
};
if ($db_user_phone != $user_phone) {
	header("Location: ../error_page/recovery_error.php?user_login=$user_login");
	exit;	
};

header("Location: ../message_page/recovery_success.php?user_name=$db_user_name&user_patronymic=$db_user_patronymic&user_email=$db_user_email");
mail("$db_user_email", "Восстановление пароля", "$db_user_name $db_user_patronymic, Ваш пароль для входа в систему - $db_user_password");
exit;

?>
