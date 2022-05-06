<?php
$page_title = "обновления";

require_once "../scripts/database_connect.php";

require_once "about_user.php";

require_once "header.php";

$update_id = $_GET["topic_id"];

$sql_require_update = "SELECT title, text, today, autor FROM updates WHERE id='{$update_id}'";
$result_require_update = mysqli_query($link, $sql_require_update);
$row_require_update = mysqli_fetch_array($result_require_update);
$theme_title = $row_require_update["title"];
$theme_text = $row_require_update["text"];
$theme_today = $row_require_update["today"]; 
$theme_autor = $row_require_update["autor"];

$sql_theme_autor = "SELECT user_surname, user_name FROM users WHERE user_login='{$theme_autor}'";
$result_theme_autor = mysqli_query($link, $sql_theme_autor);
$row_theme_autor = mysqli_fetch_array($result_theme_autor);
$this_autor = $row_theme_autor["user_surname"]." ".$row_theme_autor["user_name"];
?>
<style>
.comment {
	width: 90%;
	margin-left: 5%;
	margin-bottom: 20px;
}
.comment p {
	font-family: "courier new";
	font-size: 20px;
	color: black;
	width: 80%;
	margin: 0;
	margin-left: 20%;
	text-align: right;
}
.comment p span {
	font-size: 16px;
	font-style: italic;
	color: rgba(0, 83, 138, 1);
}
.comment form {
	text-align: right;
}
.comment input[type=text] {
	width: 30%;
	padding: 5px;
	font-family: "Courier new";
	font-size: 16px;
	border: none;
	border-bottom: 1px solid rgba(0, 83, 138, 0.5);
	margin-right: 20px;
	transition: 0.5s;
}
.comment input[type=text]:focus {
	width: 50%;
	border-bottom: 1px solid rgba(0, 83, 138, 1);
	transition: 0.5s;
}
.comment input[type=submit] {
	padding: 5px 20px;
	font-family: "Courier new";
	font-size: 20px;
	border: 1px solid rgba(0, 83, 138, 1);
	transition: 0.5s;
}
.comment input[type=submit]:hover {
	background-color: rgba(0, 83, 138, 1);
	color: white;
	cursor: pointer;
	transition: 0.5s;
}
</style>
	<div class="desctop">
		<div class="container">
			<form action="../index.php" method="post">
				<input type="submit" name="user_name" value="выход">
			</form>
			<h1><?php echo $theme_title?></h1>
		</div>
	</div>
	
	<div class="post">
		<h2><?php echo $theme_title?><br><span><?php echo "(".$theme_today.") ".$this_autor?></span></h2>
		<?php echo $theme_text?>
	</div>

	<div class="comment">
<?php
$sql_require_comment = "SELECT text, autor FROM comments_update WHERE topic_id='{$update_id}' ORDER BY id";
$result_require_comment = mysqli_query($link, $sql_require_comment);
while ($row_require_comment = mysqli_fetch_array($result_require_comment)) {
	echo "<p>".$row_require_comment["text"]."<br><span>".$row_require_comment["autor"]."</span></p><br>";
};
?>

<?php
if ($user_type == "guest") {
	echo "<p>Извините, Ваш уровень доступа не позволяет оставлять комментарии.</p>";
} else {
	echo "
			<form action=\"add_comment_update.php\" method=\"post\">
				<input type=\"text\" name=\"text\" placeholder=\"Ваш комментарий\">
				<input type=\"hidden\" name=\"autor\" value=\"".$user_surname." ".$user_name."\">
				<input type=\"hidden\" name=\"topic_id\" value=\"".$update_id."\">
				<input type=\"submit\" value=\"добавить\">
			</form>	
	";
};
?>	

	</div>
	
	<div class="clearfix">
	</div>
	
<?php
require_once "../user_page/footer.php";
?>