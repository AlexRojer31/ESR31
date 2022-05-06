<?php
session_start();
$user_login = $_SESSION["user_login"];
$user_password = $_SESSION["user_password"];

if ($user_login == null) {
	header("location:../error_page/404_error.php");
	exit;
};

$sql_user = "SELECT user_type, user_name, user_surname, user_patronymic, user_place_of_work, user_position, user_email, user_phone, user_password FROM users WHERE user_login='{$user_login}'";
$result_user = mysqli_query($link, $sql_user);
$row_user = mysqli_fetch_array($result_user);

$user_password_db = $row_user["user_password"];

if ($user_password != $user_password_db) {
	header("location:../error_page/404_error.php");
	exit;
}

$user_type = $row_user["user_type"];
$user_name = $row_user["user_name"];
$user_surname = $row_user["user_surname"];
$user_patronymic = $row_user["user_patronymic"];
$user_place_of_work = $row_user["user_place_of_work"];
$user_position = $row_user["user_position"];
$user_email = $row_user["user_email"];
$user_phone = $row_user["user_phone"];
?>