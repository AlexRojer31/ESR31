<?php

require_once "../../scripts/database_connect.php";

require_once "../about_user.php";

$user_q_email = $_POST["user_q_email"];
$user_q_login = $_POST["user_q_login"];
$answer_to_user = $_POST["answer_to_user"];
$answer_to_user_date = date("d-m-y H:i");

$sql_update_question = "UPDATE user_questions SET
answer_to_user = '{$answer_to_user}',
answer_to_user_date = '{$answer_to_user_date}'
WHERE id='{$user_q_login}'
";
$result_update_question = mysqli_query($link, $sql_update_question);

mail($user_q_email, "Ответ на вопрос: ", "$answer_to_user. С уважением, администратор платформы - $user_surname $user_name."); 

header("Location: ../adminka.php");
exit;
?>