<?php
require_once "../../scripts/database_connect.php";

require_once "../about_user.php";

$id = $_POST["id"]; 
$page = $_POST["page"]; 

$sql_remove_card = "DELETE FROM cards WHERE id=$id";
$result_remove_card = mysqli_query($link, $sql_remove_card) or die("asdasdsad");

session_start();
if (!isset($_SESSION["result_search_cards"])) {
	$result_search_cards = [];
} else {
	$result_search_cards = $_SESSION["result_search_cards"];
	for ($i = 0; $i < count($result_search_cards); $i++) {
		if ($result_search_cards[$i] == $id) {
			unset($result_search_cards[$i]);
		};
	};
$_SESSION["$result_search_cards"] = $result_search_cards;
};
header("location:../$page.php");

?>