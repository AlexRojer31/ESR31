<?php
require_once "../scripts/database_connect.php";

$user_login = $_POST["user_login"];
$user_password = $_POST["user_password"];

session_start();
$_SESSION["user_login"] = $user_login;
$_SESSION["user_password"] = $user_password;

$sql_validate = "SELECT user_password FROM users WHERE user_login='{$user_login}';";
$result_validate = mysqli_query($link, $sql_validate)
	or die("Error ".mysqli_error($link));
$row_validate = mysqli_fetch_array($result_validate);
if ($row_validate[0] == null) {
		header("Location: ../message_page/incorrect_login.php");
		exit;
} else {
	if ($row_validate[0] == $user_password) {
		header("Location: ../user_page/user_page.php");	
		exit;	
	} else {
		header("Location: ../message_page/incorrect_login.php");
		exit;		
	};
};
?>
