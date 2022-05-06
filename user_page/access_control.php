<?php
$sql_access = "SELECT access FROM user_pages where title='{$page_title}'";
$result_access = mysqli_query($link, $sql_access);
$row_access = mysqli_fetch_array($result_access);
$access = $row_access["access"];
$j = 0;
$access_array = explode(" ", $access);
$length_access = count($access_array);
$i = 0;
while ($i < $length_access) {
	if ($access_array[$i] == $user_type) {
		$j = 1;
	};
	$i++;
};
if ($j == 0) {
	header("location: user_page.php");
	exit;
};
?>