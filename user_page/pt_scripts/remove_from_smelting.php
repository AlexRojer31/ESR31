<?php
require_once "../../scripts/database_connect.php";

require_once "../about_user.php";

$id_smelting = $_POST["id_smelting"];

$sql_about_casting = "SELECT num_order, size, steel FROM smelting WHERE id=$id_smelting";
$result_about_casting = mysqli_query($link, $sql_about_casting);
$row_sql_about_casting = mysqli_fetch_array($result_about_casting);

$new_order = $row_sql_about_casting["num_order"];
$steel_array = explode("Ш", $row_sql_about_casting["steel"]);
$size = $row_sql_about_casting["size"]." ".$steel_array[0]." Ш";
$user = $user_login;



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

$sql_remove_from_amelting = "DELETE FROM smelting WHERE id=$id_smelting";
$result_remove_from_amelting = mysqli_query($link, $sql_remove_from_amelting);

header("location:../master.php");


?>