<?php
require_once "../../scripts/database_connect.php";

require_once "../about_user.php";

$new_order = $_POST["new_order"];
$size = $_POST["size"]; 
$user = $_POST["user"];
$page = $_POST["page"];
$num = $_POST["num"];

for ($j = 0; $j < $num; $j++) {
$sql_add_order = "INSERT INTO launch_orders (
new_order,
size,
user
) VALUES (
'{$new_order}',
'{$size}',
'{$user}'
)";
$result_add_order = mysqli_query($link, $sql_add_order) or die("error ".mysqli_error($link));
};

header("location:../master.php");

?>