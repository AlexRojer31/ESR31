<?php
$sql_pages = "SELECT title, href, access FROM user_pages";
$result_pages = mysqli_query($link, $sql_pages);
while ($row_user = mysqli_fetch_array($result_pages)) {
	$access = substr($row_user["access"],strripos($row_user["access"], $user_type), strlen($user_type));
	if ($access == $user_type) {
	if ($row_user["title"] == $page_title) {
		echo "<li><a href=\"".$row_user["href"]."\" class=\"active\">".$row_user["title"]."</a></li>";
	} else {
		echo "<li><a href=\"".$row_user["href"]."\">".$row_user["title"]."</a></li>";
	};
	};
};
?>