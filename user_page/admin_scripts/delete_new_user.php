<?php
$page_title = "админка";

require_once "../../scripts/database_connect.php";

require_once "../about_user.php";


$new_user_login = $_POST["new_user_login"];

$sql_clear = "DELETE FROM new_users WHERE user_login='{$new_user_login}'";
$result_clear = mysqli_query($link, $sql_clear);

header("Location: ../adminka.php");

?>