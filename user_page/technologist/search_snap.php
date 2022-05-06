<?php
require_once "../../scripts/database_connect.php";

require_once "../about_user.php";

$search = $_POST["search"];
$page = $_POST["page"];

$search = mb_strtoupper($search);
$search_array = explode("*", $search);

$result_search_array = [];
$j = 0;

$sql_search = "SELECT 
id,
size,
drawing,
type,
diameter
FROM snap";
$result_search = mysqli_query($link, $sql_search);
while ($row_search = mysqli_fetch_array($result_search)) {
	$str_search = $row_search[1].$row_search[2].$row_search[3].$row_search[4];
	$count_search = 0;
	for ($i = 0; $i < count($search_array); $i++) {
		if (strripos(mb_strtoupper($str_search), $search_array[$i]) === FALSE) {
			
		} else {
			$count_search = $count_search + 1;
		};
	};
	if ($count_search == count($search_array)) {
		$result_search_array[$j] = $row_search[0]; 
		$j++;
	};
};

session_start();
$_SESSION["result_search_array"] = $result_search_array;

header("location:../$page.php");
?>

