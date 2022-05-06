<?php
$page_title = "админка";

require_once "../../scripts/database_connect.php";

require_once "../about_user.php";

$new_user_name = $_POST["new_user_name"];
$new_user_surname = $_POST["new_user_surname"];
$new_user_patronymic = $_POST["new_user_patronymic"];
$new_user_place_of_work = $_POST["new_user_place_of_work"];
$new_user_position = $_POST["new_user_position"];
$new_user_email = $_POST["new_user_email"];
$new_user_phone = $_POST["new_user_phone"];
$new_user_login = $_POST["new_user_login"];
$new_user_password = $_POST["new_user_password"];
$new_user_type = $_POST["new_user_type"];

$insert_users = "INSERT INTO users (
user_name,
user_surname,
user_patronymic,
user_place_of_work,
user_position,
user_email,
user_phone,
user_login,
user_password,
user_type
) VALUES (
'{$new_user_name}',
'{$new_user_surname}',
'{$new_user_patronymic}',
'{$new_user_place_of_work}',
'{$new_user_position}',
'{$new_user_email}',
'{$new_user_phone}',
'{$new_user_login}',
'{$new_user_password}',
'{$new_user_type}'
)";
$result_insert_users = mysqli_query($link, $insert_users);

$sql_clear = "DELETE FROM new_users WHERE user_login='{$new_user_login}'";
$result_clear = mysqli_query($link, $sql_clear);

mail($new_user_email, "Регистрация пройдена", "Уважаемый $new_user_name $new_user_patronymic, Вам одобрена регистрация в системе http://esr31.ru \r\n Для входа воспользуйтесь логином и паролем, указанными Вами при регистрации. 
"); 

header("Location: ../adminka.php");

?>

