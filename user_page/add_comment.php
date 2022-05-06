<?php
$page_title = "статьи";

require_once "../scripts/database_connect.php";

require_once "about_user.php";

$text = $_POST["text"];
$autor = $_POST["autor"];
$topic_id = $_POST["topic_id"];

$sql_add_comment = "INSERT INTO comments (
text,
autor,
topic_id
) VALUES (
'{$text}',
'{$autor}',
'{$topic_id}'
);";
$result_add_comment = mysqli_query($link, $sql_add_comment);

header("location: show_post.php?post_id=$topic_id");
?>