<?php
require_once "../../scripts/database_connect.php";

require_once "../about_user.php";

$size = $_POST["size"]; 
$drawing = $_POST["drawing"]; 
$type = $_POST["type"]; 
$diameter = $_POST["diameter"]; 

$sql_add_snap = "INSERT INTO snap (
size,
drawing,
type,
diameter,
user
) VALUES (
'{$size}',
'{$drawing}',
'{$type}',
'{$diameter}',
'{$user_login}'
);";
$result_add_snap = mysqli_query($link, $sql_add_snap);

header("location:../../message_page/add_snap_drawing_success.php");

?>