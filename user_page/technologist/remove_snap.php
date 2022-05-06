<?php
require_once "../../scripts/database_connect.php";

require_once "../about_user.php";

$id = $_POST["id"]; 
$page = $_POST["page"]; 

$sql_remove_snap = "DELETE FROM snap WHERE id=$id";
$result_remove_snap = mysqli_query($link, $sql_remove_snap) or die("asdasdsad");


session_start();
$result_search_array = $_SESSION["result_search_array"];

for ($i = 0; $i < count($result_search_array); $i++) {
	if ($result_search_array[$i] == $id) {
		unset($result_search_array[$i]);
	};
};

session_start();
$_SESSION["result_search_array"] = $result_search_array;

header("location:../$page.php");

?>