<?php
$sql_posts = "SELECT id, title, overview, today, autor FROM posts ORDER BY id DESC";
$result_posts = mysqli_query($link, $sql_posts);
$q = 0;
while ($row_posts = mysqli_fetch_array($result_posts)) {
	$autor = $row_posts["autor"];
	$sql_autor = "SELECT user_surname, user_patronymic, user_name FROM users WHERE user_login='{$autor}'";
	$result_autor = mysqli_query($link, $sql_autor);
	$row_autor = mysqli_fetch_array($result_autor);
	$autor_name = $row_autor["user_name"];
	$autor_patronymic = $row_autor["user_patronymic"];
	$autor_surname = $row_autor["user_surname"];
	$post_id = $row_posts["id"];
	echo "<li><h3>".$row_posts["title"]."<br><span>".$row_posts["today"]." ".$autor_surname." ".$autor_name." ".$autor_patronymic."</span></h3>
		<p>".$row_posts["overview"]."</p>";
	if ($page_title == "index") {	
		echo "<a href=\"error_page/guest_show_error.php\">читать</a>";
	} else {
		echo "<a href=\"show_post.php?post_id=$post_id\">читать</a>";
	};
	echo "</li>";
	$q++;
	if ($q > 4) {
		break;
	};
};
?>