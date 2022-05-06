<?php
require_once "../../scripts/database_connect.php";

require_once "../about_user.php";

$str_search = $_POST["str_search"];

$sql_technologist = "SELECT user_email FROM users WHERE user_type='technolog'";
$result_technologist = mysqli_query($link, $sql_technologist);
while ($row_technologist = mysqli_fetch_array($result_technologist)) {
	mail($row_technologist["user_email"], "Нужна ТК", "Прошу Вас разработать ТК для трубы $str_search");
};

header("location: ../../message_page/post_to_technolog_success.php?str_search=$str_search");

?>