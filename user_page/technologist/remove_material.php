<?php
require_once "../../scripts/database_connect.php";

require_once "../about_user.php";

$id = $_POST["id_material"]; 
$page = $_POST["page"]; 

$sql_remove_snap = "DELETE FROM material WHERE id=$id";
$result_remove_snap = mysqli_query($link, $sql_remove_snap) or die("asdasdsad");


header("location:../$page.php");

?>