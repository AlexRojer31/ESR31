<?php
$page_title = "главная";

require_once "../scripts/database_connect.php";

require_once "about_user.php";

require_once "header.php";
?>

	<div class="desctop">
		<div class="container">
			<form action="../index.php" method="post">
				<input type="submit" name="user_name" value="выход">
			</form>
			<form action="change_password.php" method="post">
				<input type="submit" value="изменить пароль">
			</form>
			<h1><span>Добро пожаловать</span><br><?php echo $user_name;?> <?php echo $user_patronymic;?></h1>
		</div>
	</div>

	<div class="content">
		<h2>Новые статьи</h2>
		<ul>
<?php
require_once "require_index_posts.php";
?>	
		</ul>
		<br>
		<hr>
		<a href="articles_page.php">Все статьи</a>
	</div>
	
	<div class="sidebar">
		<h2>Последние обновления</h2>
		<ul>
<?php
require_once "require_index_updates.php";
?>
		</ul>
		<a href="updates_page.php">Все обновления</a>
	</div>
	
	<div class="clearfix">
	</div>
	
<?php
require_once "footer.php";
?>