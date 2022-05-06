<?php
require_once "../../scripts/database_connect.php";

require_once "../about_user.php";

$id_order = $_POST["id_order"];

$sql_remove_order = "DELETE FROM launch_orders WHERE id=$id_order";
$result_remove_order = mysqli_query($link, $sql_remove_order) or die("error ".mysqli_error($link));

header("location:../master.php");

?>