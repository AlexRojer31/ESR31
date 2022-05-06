<?php
session_start();
$user_login = $_SESSION["user_login"];
require_once "../scripts/database_connect.php";

require_once "../user_page/about_user.php";

$new_user_password= $_POST["new_user_password"];
$new_user_password_control= $_POST["new_user_password_control"];

if ($user_password != $user_password_db) {
	header("location: ../error_page/error_change_pas3.php");
	exit;
};

if ($new_user_password == $user_password) {
	header("location: ../error_page/error_change_pas2.php");
	exit;
};

if ($new_user_password != $new_user_password_control) {
	header("location: ../error_page/error_change_pas.php");
	exit;
};


$sql_change = "UPDATE users SET user_password='{$new_user_password}' where user_login='{$user_login}'";
$result_change = mysqli_query($link,$sql_change);
session_start();
$_SESSION["user_password"] = $new_user_password;

header("location: ../message_page/change_pas_ok.php");
?>