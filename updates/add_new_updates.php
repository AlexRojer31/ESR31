<?php
$page_title = "новое обновление";

require_once "../scripts/database_connect.php";

require_once "../user_page/about_user.php";

require_once "../user_page/access_control.php";

$title = $_POST["title"];
$overview = $_POST["overview"];
$text = $_POST["text"];
$today = $_POST["today"];
$autor = $_POST["autor"];

$sql_post = "INSERT INTO updates (
title,
overview,
text,
today,
autor
) VALUES (
'{$title}',
'{$overview}',
'{$text}',
'{$today}',
'{$autor}'
);";
$result_post = mysqli_query($link, $sql_post);
header("location:../user_page/user_page.php");
?>