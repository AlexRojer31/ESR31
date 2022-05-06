<?php
$page_title = "статьи";

require_once "../scripts/database_connect.php";

require_once "about_user.php";

require_once "header.php";
?>
<style>
.content {
	float: none;
	width: 90%;
	margin-left: 5%;
}
</style>
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
		<h2>Все статьи</h2>
		<ul>
<?php
require_once "require_all_posts.php";
?>	
		</ul>
		<br>
	</div>
	
	<div class="clearfix">
	</div>
	
<?php
require_once "footer.php";
?>