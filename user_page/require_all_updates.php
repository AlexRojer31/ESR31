<?php
$sql_updates = "SELECT id, title, overview, today, autor FROM updates ORDER BY id DESC";
$result_updates = mysqli_query($link, $sql_updates);
$q = 0;
while ($row_updates = mysqli_fetch_array($result_updates)) {
	$autor = $row_updates["autor"];
	$sql_autor = "SELECT user_surname, user_patronymic, user_name FROM users WHERE user_login='{$autor}'";
	$result_autor = mysqli_query($link, $sql_autor);
	$row_autor = mysqli_fetch_array($result_autor);
	$autor_name = $row_autor["user_name"];
	$autor_patronymic = $row_autor["user_patronymic"];
	$autor_surname = $row_autor["user_surname"];
	$update_id = $row_updates["id"];
	echo "<li><h3>".$row_updates["title"]."<br><span>(".$row_updates["today"].") ".$autor_surname."</span></h3>
		<p>".$row_updates["overview"]."</p>";
	if ($page_title == "updates") {	
		echo "<a href=\"error_page/guest_show_error.php\">читать</a>";
	} else {
		echo "<a href=\"show_updates.php?topic_id=$update_id\">читать</a>";
	};
	echo "</li>";
};
?>