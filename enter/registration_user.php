<?php
require_once "../scripts/database_connect.php"; // подключаем БД

// получаем результаты ПОСТ запроса
$user_name = $_POST["user_name"];
$user_surname = $_POST["user_surname"];
$user_patronymic = $_POST["user_patronymic"];
$user_place_of_work = $_POST["user_place_of_work"];
$user_position = $_POST["user_position"];
$user_email = $_POST["user_email"];
$user_phone = $_POST["user_phone"];
$user_login = $_POST["user_login"];
$user_password = $_POST["user_password"];
$user_password_repeat = $_POST["user_password_repeat"];

if ($user_password != $user_password_repeat) {
	header("Location: ../message_page/incorrect_password.php?user_name=$user_name&user_surname=$user_surname&user_surname=$user_surname&user_patronymic=$user_patronymic&user_place_of_work=$user_place_of_work&user_position=$user_position&user_email=$user_email&user_phone=$user_phone&user_login=$user_login");
	exit;
}; // условие на совпадение паролей

/*
echo $user_surname." ".$user_name." ".$user_patronymic."<br>
Работает на предприятии \"".$user_place_of_work."\", в должности - ".$user_position." .<br>
телефон: ".$user_phone.", email - ".$user_email.".<br>
выбран логин - ".$user_login.", пароль - ".$user_password;
*/

$count = 0; // создали счетчик
$sql_users = "SELECT user_login FROM users"; // запрос к БД в поиске похожего логина
$result_users = mysqli_query($link, $sql_users); // отправка запроса
while ($row_users = mysqli_fetch_array($result_users)) { 
	if ($user_login == $row_users["user_login"]) {
		$count++;
	} else {
		$count = $count;
	};
}; // получаем массив и выполняем его переборку если есть похожий логин счетчик будет расти
if ($count > 0) {
	header("Location: ../message_page/is_user.php?user_name=$user_name&user_surname=$user_surname&user_surname=$user_surname&user_patronymic=$user_patronymic&user_place_of_work=$user_place_of_work&user_position=$user_position&user_email=$user_email&user_phone=$user_phone&user_login=$user_login");
	exit;
}; // условие на вывод есть или нет такой юзер


$insert_users = "INSERT INTO new_users (
user_name,
user_surname,
user_patronymic,
user_place_of_work,
user_position,
user_email,
user_phone,
user_login,
user_password
) VALUES (
'{$user_name}',
'{$user_surname}',
'{$user_patronymic}',
'{$user_place_of_work}',
'{$user_position}',
'{$user_email}',
'{$user_phone}',
'{$user_login}',
'{$user_password}'
)";
$result_insert_users = mysqli_query($link, $insert_users);

//	or die(header("Location: ../message_page/error_registration.php?user_name=$user_name&user_surname=$user_surname&user_surname=$user_surname&user_patronymic=$user_patronymic&user_place_of_work=$user_place_of_work&user_position=$user_position&user_email=$user_email&user_phone=$user_phone&user_login=$user_login&error=".mysqli_error($link)."\"");

header("Location: ../message_page/successful_registration.php?user_name=$user_name&user_surname=$user_surname&user_surname=$user_surname&user_patronymic=$user_patronymic&user_place_of_work=$user_place_of_work&user_position=$user_position&user_email=$user_email&user_phone=$user_phone&user_login=$user_login"); // отправляемся на страницу сообщения об удачной регистрации

mail(MAIN_EMAIL, "Регистрация нового пользователя", "$user_surname $user_name $user_patronymic \r\n Работает на предприятии $user_place_of_work, в должности - $user_position \r\n Контактные данные: телефон - $user_phone, email - $user_email. \r\n Логин - $user_login Пароль - $user_password.
"); 

exit; // отправляемся на страницу сообщения об удачной регистрации

?>

