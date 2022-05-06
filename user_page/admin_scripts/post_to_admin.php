<?php

require_once "../../scripts/database_connect.php";

require_once "../about_user.php";

$user_question = $_POST["user_question"];
$user_q_login = $_POST["user_login"];
$page = $_POST["page"];

$date_question = date("d-m-y H:i");
$sql_insert_question = "INSERT INTO user_questions (
user_question,
user_question_date,
user_id
) VALUES (
'{$user_question}',
'{$date_question}',
'{$user_q_login}'
)";
$result_insert_question = mysqli_query($link, $sql_insert_question);

$sql_q_user = "SELECT user_email, user_name, user_patronymic FROM users WHERE user_login='{$user_q_login}'";
$result_q_user = mysqli_query($link, $sql_q_user);
$row_q_user = mysqli_fetch_array($result_q_user);
$user_q_email = $row_q_user["user_email"];
$user_q_name = $row_q_user["user_name"];
$user_q_patronymic = $row_q_user["user_patronymic"];

mail($user_email, "Вопрос к администратору", "$user_q_name $user_q_patronymic,\r\n Ваш запрос направлен администратору. В ближайшее время Вам будет направлен ответ на почтовый адресс, указанный при регистрации."); 

header("Location: ../$page.php");
exit;

?>

<!--
user_questions
user_question 
user_question_date 
answer_to_user 
answer_to_user_date 
user_id

user_name
user_surname
user_patronymic 