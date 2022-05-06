<?php
$page_title = "технолог";

require_once "../scripts/database_connect.php";

require_once "about_user.php";

require_once "header.php";


session_start();
if (!isset($_SESSION["result_search_array"])) {
	$result_search_array = [];
} else {
	$result_search_array = $_SESSION["result_search_array"];	
};
if (!isset($_SESSION["result_search_cards"])) {
	$result_search_cards = [];
} else {
	$result_search_cards = $_SESSION["result_search_cards"];
};
?>

<style>
.content {
	width: 90%;
	margin-left: 5%;
}

.content {
	display: flex;
	justify-content: space-between;
	flex-wrap: wrap;
}
.content .block {
	flex: 1 0 auto;
	max-width: 600px;
	height: 100%;
	box-shadow: 1px 1px 3px rgba(0, 83, 138, 1);
	margin: 20px;
}
.content .block h4 {
	text-align: center;
	font-family: "impact";
	font-size: 24px;
}
.content .block h4 span {
	display: inline-block;
	margin-top: 20px;
	text-align: center;
	font-family: "courier new";
	font-size: 12px;
	text-transform: uppercase;
	font-weight: normal;
	border: 1px solid rgba(0, 83, 138, 1);
	transition: 0.5s;
	padding: 5px 15px;
	padding-right: 50px;
	position: relative;
}
.content .block h4 span:hover {
	color: white;
	cursor: pointer;
	background-color: rgba(0, 83, 138, 1);
	transition: 0.5s;
}
.content .block h4 span::before {
	content: "";
	display: block;
	border: 6px solid rgba(0, 83, 138, 1);
	border-left-color: transparent;
	border-right-color: transparent;
	border-bottom-color: transparent;
	position: absolute;
	top: 8px;
	right: 12px;
	transition: 0.5s;
}
.content .block h4 span:hover::before {
	border: 6px solid white;
	border-left-color: transparent;
	border-right-color: transparent;
	border-bottom-color: transparent;
}
.content .block div[class=main] {
	display: none;
}
.content .block input[type=checkbox] {
	display: none;
}
.content .block input:checked ~ h4 span::before{
	transform: translateY(-5px) rotate(180deg);
	transition: 0.5s;
}
.content .block input:checked ~ div[id=for-first]{
	display: block;
}
.content .block input:checked ~ div[id=for-second]{
	display: block;
}
.content .block input:checked ~ div[id=for-third]{
	display: block;
}
.content .block input:checked ~ div[id=for-fourth]{
	display: block;
}
.content .block input:checked ~ div[id=for-fifth]{
	display: block;
}
.content .block form {
	margin: 10px;
}
.content .block form input, select, label {
	margin: 10px;
	border: 0;
	font-family: "courier new";
	font-size: 16px;
	background-color: transparent;
}
.content .block form label {
	text-transform: uppercase;
	font-weight: bold;
}
.content .block form input, select {
	border-bottom: 1px solid rgba(0, 83, 138, 1);
}
.content .block form input[type=submit] {
	border: 1px solid rgba(0, 83, 138, 1);
	padding: 5px 15px;
	margin: 10px;
	transition: 0.5s;
}
.content .block form input[type=submit]:hover {
	background-color: rgba(0, 83, 138, 1);
	color: white;
	transition: 0.5s;
	cursor: pointer;
}

.search-table {
	font-family: "courier new";
	font-size: 12px;
	border-collapse: collapse;
	margin: 2%;
}
.search-table td, th {
	border: 1px solid rgba(0, 83, 138, 1);
	padding: 2px 5px;
	text-align: center;
}
.content .block .search-table td form {
	margin: 0;
	padding: 0;
}
.content .block .search-table td input[type=submit] {
	padding: 0;
	margin: 0;
	font-size: 12px;
	padding: 2px 5px;
	border: none;
	text-transform: lowercase;
	text-decoration: underline;
	color: rgba(0, 83, 138, 1);
}
.content .block .search-table td input[type=submit]:hover {
	background-color: transparent;
	color: rgba(0, 83, 138, 1);
	cursor: pointer;
}
@media all and (max-width: 600px) {
	.search-table td, th {
	font-size: 8px;
	}
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
			<h1>Блок управления технологией<span>(Технолог)</span></h1>
		</div>
	</div>

	<div class="content">
		<div class="block">
			<input type="checkbox" id="first" <?php if (count($result_search_array) > 0) {echo "checked";} else {echo "";};?>>
			<h4>Технологическая оснастка<br>
			<label for="first"><span>подробнее</span></label></h4>
			<div class="main" id="for-first">
				<form action="technologist/search_snap.php" method="post">
					<input type="text" required name="search" placeholder="Найти оснастку">
					<input type="hidden" name="page" value="technologist">
					<input type="submit" value="поиск">
				</form>
<?php
if (count($result_search_array) > 0) {
	require_once "technologist/result_search_script.php";
} else {
	echo "";
};
?>				
				<hr>
				<form action="technologist/add_snap.php" method="post">
					<label for="size">Типоразмер</lable>
					<input type="text" required name="size" placeholder="630" id="size"><br>
					<label for="drawing">№ чертежа</lable>
					<input type="text" required name="drawing" placeholder="333-0259.00.00.000 СБ" id="drawing"><br>
					<label for="type">Тип оснастки</lable>
					<select id="type" name="type">
						<option value="дорн">дорн</option>
						<option value="кристаллизатор">кристаллизатор</option>
						<option value="шлаковая надставка">шлаковая надставка</option>
					</select><br>
					<label for="diameter">Диаметр</lable>
					<input type="text" required name="diameter" placeholder="650" id="diameter"><br>
					<input type="submit" value="добавить">
				</form>
			</div>
		</div>
		<div class="block">
			<input type="checkbox" id="second">
			<h4>Материалы<br>
			<label for="second"><span>подробнее</span></label></h4>
			<div class="main" id="for-second">
<?php
echo "<table class=\"search-table\"><tr>
<th>Материал</th>
<th>Стандарт</th>
<th>Норма расхода</th>
<th>Ед. изм.</th>
<th>Действие</th>
</tr>";

$sql_material = "SELECT
id,
material,
standart,
norma,
unit
FROM material
";
$result_material = mysqli_query($link, $sql_material);
while ($row_material = mysqli_fetch_array($result_material)) {
	$id_material = $row_material["id"];
	echo "<tr>
	<td>".$row_material["material"]."</td>
	<td>".$row_material["standart"]."</td>
	<td>".$row_material["norma"]."</td>
	<td>".$row_material["unit"]."</td>
	<td>
		<form action=\"technologist/remove_material.php\" method=\"post\">
			<input type=\"hidden\" name=\"id_material\" value=\"$id_material\">
			<input type=\"hidden\" name=\"page\" value=\"technologist\">
			<input type=\"submit\" value=\"Удалить\">
		</form>
	</td>
	</tr>";
};
echo "</table>";
?>
				<hr>
				<form action="technologist/add_material.php" method="post">
					<label for="material">Материал</lable>
					<input type="text" required name="material" placeholder="Сталь 15ГС" id="material"><br>
					<label for="standart">Стандарт</lable>
					<input type="text" required name="standart" placeholder="По договору" id="standart"><br>
					<label for="norma">Норма расхода</lable>
					<input type="text" required name="norma" placeholder="1,05" id="norma"><br>
					<label for="unit">Ед. изм.</lable>
					<input type="text" required name="unit" placeholder="кг, шт, м" id="unit"><br>
					<input type="submit" value="добавить">
				</form>
			</div>
		</div>
		<div class="block">
			<input type="checkbox" id="third" <?php if (count($result_search_cards) > 0) {echo "checked";} else {echo "";};?>>
			<h4>Технологические карты<br>
			<label for="third"><span>подробнее</span></label></h4>
			<div class="main" id="for-third">
				<form action="technologist/search_card.php" method="post">
					<input type="text" required name="search" placeholder="Найти карту">
					<input type="hidden" name="page" value="technologist">
					<input type="submit" value="поиск">
				</form>
<?php
if (count($result_search_cards) > 0) {
	require_once "technologist/result_search_card.php";
} else {
	echo "";
};
?>				
				<hr>
				<form action="technologist/add_card.php" method="post" target="blank">
					<label for="size">Типоразмер</lable>
					<input type="text" required name="size" placeholder="630х25х5000 15ГС" pattern="[0-9]{2,5}х[0-9]{1,3}х[0-9]{1,5} [А-Я0-9]{1,20}"><br>
					<input type="submit" value="Создать">
				</form>
			</div>
		</div>
		
		<div class="block">
			<input type="checkbox" id="fourth">
			<h4>Нормы на выплавку<br>
			<label for="fourth"><span>подробнее</span></label></h4>
			<div class="main" id="for-fourth">
				<form action="technologist/search_norm.php" method="post">
					<input type="text" required name="search" placeholder="Найти норму">
					<input type="hidden" name="page" value="technologist">
					<input type="submit" value="поиск">
				</form>
<?php/*
if (count($result_search_cards) > 0) {
	require_once "technologist/result_search_card.php";
} else {
	echo "";
};*/
?>				
				<hr>
				<form action="technologist/create_norm.php" method="post" target="blank">
					<label for="norm">Создать норму</lable>
					<input type="text" required name="norm" placeholder="630х25х5000 15ГС"><br>
					<input type="submit" value="Создать">
				</form>
			</div>
		</div>

		<div class="block">
			<input type="checkbox" id="fifth">
			<h4>Связь с администратором<br>
			<label for="fifth"><span>подробнее</span></label></h4>
			<div class="main" id="for-fifth">
				<form action="admin_scripts/post_to_admin.php" method="post">
					<input type="text" required name="user_question">
					<input type="hidden" name="user_login" value="<?php echo $user_login;?>">
					<input type="hidden" name="page" value="technologist">
					<input type="submit" value="Написать">
				</form>
			</div>
		</div>
	</div>
	
	<div class="clearfix">
	</div>

<?php
require_once "footer.php";
?>