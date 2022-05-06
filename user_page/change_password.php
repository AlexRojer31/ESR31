<?php
require_once "../scripts/database_connect.php";

require_once "about_user.php";

require_once "header.php";
?>

	<div class="desctop">
		<div class="container">
			<form action="../enter/action_change_pas.php" method="post">
				<input type="text" name="user_login" value="<?php echo $user_login?>" readonly>
				<input type="password" name="user_password" placeholder="старый пароль" required>
				<input type="password" name="new_user_password" placeholder="новый пароль" required>
				<input type="password" name="new_user_password_control" placeholder="Повторите новый пароль" required>
				<input type="submit" value="изменить">
			</form>
			<h1>изменение пароля</h1>
		</div>
	</div>
