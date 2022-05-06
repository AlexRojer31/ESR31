<?php
$page_title = "мастер";

require_once "../scripts/database_connect.php";

require_once "about_user.php";

require_once "header.php";

$serch_array = $_GET["serch_array"];
if ($_SESSION["result_search_array"]) {
	$result_search_array = $_SESSION["result_search_array"];
} else {
	$result_search_array = [];
};

?>

<style>
.content {
	width: 90%;
	margin-left: 5%;
}
.pt-snap h4 {
	font-family: "impact";
	font-size: 26px;
	margin: 0;
	margin-bottom: 10px;
	padding: 0;
}
.pt-snap p {
	display: inline-block;
	font-family: "courier new";
	font-size: 20px;
	text-transform: uppercase;
	padding: 10px 15px;
	border: 1px solid rgba(0, 83, 138, 1);
	margin-right: 20px;
	margin-bottom: 5px;
	transition: 0.5s;
}
.pt-snap p:hover {
	background-color: rgba(0, 83, 138, 1);
	color: white;
	cursor: pointer;
	transition: 0.5s;
}


.add-snap {
	display: inline-block;
	border: 1px solid rgba(0, 83, 138, 1);
	padding: 20px;
}
.add-snap h5 {
	font-family: "courier new";
	font-weight: bold;
	font-size: 20px;
	margin: 0;
	margin-bottom: 10px;
	padding: 0;
}
.add-snap h5 span {
	font-family: "courier new";
	font-weight: normal;
	font-size: 12px;
	text-transform: uppercase;
	margin-bottom: 10px;
	padding: 5px 15px;
	border: 1px solid rgba(0, 83, 138, 1);
	margin-left: 20px;
	transition: 0.5s;
}
.add-snap h5 span:hover {
	background-color: rgba(0, 83, 138, 1);
	color: white;
	cursor: pointer;
	transition: 0.5s;
}
.add-snap form {
	margin-top: 20px;
	font-family: "courier new";
	font-weight: normal;
	font-size: 16px;
}
.add-snap form label {
	text-transform: uppercase;
}
.add-snap form input {
	margin-bottom: 10px;
	border: none;
	border-bottom: 1px solid rgba(0, 83, 138, 1);
	width: 50%;
}
.add-snap form select {
	margin-bottom: 10px;
	border: none;
	border-bottom: 1px solid rgba(0, 83, 138, 1);
	width: 50%;
}
.add-snap form input[type=submit] {
	font-family: "courier new";
	border: 1px solid rgba(0, 83, 138, 1);
	width: auto;
	text-transform: uppercase;
	font-size: 18px;
	padding: 5px 15px;
	background-color: transparent;
	transition: 0.5s;
	font-weight: normal;
}
.add-snap form input[type=submit]:hover {
	background-color: rgba(0, 83, 138, 1);
	color: white;
	cursor: pointer;
	transition: 0.5s;
}

.search-snap {
	display: none;
	width: 50%;
	border: 1px solid rgba(0, 83, 138, 1);
	padding: 10px;
}
.search-snap h5 {
	font-family: "courier new";
	font-weight: bold;
	font-size: 20px;
	margin: 0;
	margin-bottom: 10px;
	padding: 0;
}
.search-snap h5 span {
	font-family: "courier new";
	font-weight: normal;
	font-size: 12px;
	text-transform: uppercase;
	margin-bottom: 10px;
	padding: 5px 15px;
	border: 1px solid rgba(0, 83, 138, 1);
	margin-left: 20px;
	transition: 0.5s;
}
.search-snap h5 span:hover {
	background-color: rgba(0, 83, 138, 1);
	color: white;
	cursor: pointer;
	transition: 0.5s;
}
.search-snap form {
	margin-top: 20px;
	font-family: "courier new";
	font-weight: normal;
	font-size: 16px;
}
.search-snap form input {
	margin-bottom: 10px;
	border: none;
	border-bottom: 1px solid rgba(0, 83, 138, 1);
	width: 70%;
	padding: 5px;
}
.search-snap form input[type=submit] {
	border: 1px solid rgba(0, 83, 138, 1);
	width: auto;
	text-transform: uppercase;
	font-size: 18px;
	padding: 5px 15px;
	background-color: transparent;
	transition: 0.5s;
	font-weight: normal;
	font-family: "courier new";
	font-weight: normal;
	font-size: 16px;
}
.search-snap form input[type=submit]:hover {
	background-color: rgba(0, 83, 138, 1);
	color: white;
	cursor: pointer;
	transition: 0.5s;
}

.search-result form {
	display: inline;
}
.search-result input[type=submit] {
	border: none;
	color: rgba(0, 83, 138, 1);
	text-decoration: underline;
	background-color: transparent;
	transition: 0.5s;
}
.search-result input[type=submit]:hover {
	cursor: pointer;
	transition: 0.5s;
}
.search-result .result {
	font-family: "courier new";
	font-weight: normal;
	font-size: 18px;
}
.search-result .result span {
	font-weight: bold;
}
.master-work {
	margin: 0;
	padding: 0;
	width: 90%;
	margin-left: auto;
	margin-right: auto;
}
.master-block {
	margin: 0;
	margin-top: 20px;
	margin-bottom: 20px;
	padding: 0;
	width: 100%;
	height: auto;
	box-shadow: 1px 1px 3px rgba(0, 83, 138, 1);
	font-family: "Courier new";
	font-size: 20px;
	font-weight: normal;
	overflow: auto;
}
.master-block h3 {
	margin: 10px;
	font-family: "Impact";
	font-size: 24px;
}
.master-block table {
	margin: 10px;
	border-collapse: collapse;
}
.master-block th, td {
	border: 1px solid black;
	padding: 5px 15px;
	font-size: 16px;
	font-weight: normal;
	text-align: center;
}
.master-block th {
	font-weight: bold;
}
.master-block form {
	margin: 10px;
}
.master-block label {
	display: inline-block;
	font-weight: bold;
	margin-top: 10px;

}
.master-block input {
	width: 50%;
	min-width: 250px;
	border: none;
	background-color: transparent;
	border-bottom: 1px solid rgba(0, 83, 138, 1);
	margin-top: 10px;
	font-family: "courier new";
	font-size: 16px;
}
.master-block input[type=submit] {
	display: inline-block;
	margin-top: 20px;
	padding: 5px 15px;
	width: auto;
	font-size: 24px;
	border: 1px solid rgba(0, 83, 138, 1);
	color: rgba(0, 83, 138, 1);
	text-transform: uppercase;
	transition: 0.5s;
}
.master-block input[type=submit]:hover {
	color: white;
	background-color: rgba(0, 83, 138, 1);
	cursor: pointer;
	transition: 0.5s;
}
@media all and (max-width: 600px) {
	.master-block input {
	font-size: 10px;
	}
	.master-block input[type=submit] {
	font-size: 12px;
	}
	.master-block th, td {
	font-size: 8px;
	}
}
.master-block table form {
	margin: 0;
	padding: 0;
	width: auto;
}
.master-block table input[type=submit], input[type=button] {
	display: block;
	font-size: 16px;
	font-weight: normal;
	text-align: center;
	border: none;
	color: rgba(0, 83, 138, 1);
	text-decoration: underline;
	margin: 0;
	padding: 0;
	text-transform: none;
	width: 15px;
	height: 15px;
	min-width: 15px;
	border-radius: 50%;
}
.master-block table input[type=submit]:hover, input[type=button]:hover {
	background-color: transparent;
	cursor: pointer;
	color: rgba(0, 83, 138, 1);
}
.master-block table input[type=submit].button, input[type=button].button {
	display: inline-block;
	font-size: 16px;
	font-weight: normal;
	text-align: center;
	border: none;
	color: rgba(0, 83, 138, 1);
	text-decoration: underline;
	margin: 0;
	padding: 0;
	text-transform: none;
	width: auto;
	border-radius: 0%;
}
.master-block p {
	font-size: 12px;
	margin: 0;
	padding: 0;
	padding-left: 10px;
}
.master-block table input.to-add-casting  {
	text-align: center;
	border: none;
	font-family: "Courier new";
	font-size: 12px;
	margin: 0;
	padding: 0;
}
#to-add-casting {
	width: auto;
}
label[for=show-pt-work] {
	display: inline-block;
	font-family: "impact";
	font-size: 24px;
	border: 1px solid rgba(0, 83, 138, 1);
	padding: 5px 15px;
	margin-bottom: 20px;
	transition: 0.5s;
}
label[for=show-pt-work]:hover {
	cursor: pointer;
	background-color: rgba(0, 83, 138, 1);
	color: white;
	transition: 0.5s;
}
#show-pt-work:checked ~ .master-block {
	display: none;
}
#show-pt-work:not(:checked) ~ label[for=show-pt-work] {
	cursor: pointer;
	background-color: rgba(0, 83, 138, 1);
	color: white;
}
input[type=checkbox] {
	display: none;
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
.master-work .block h4 {
	font-family: "impact";
	font-size: 24px;
}
.master-work .block input {
	font-family: "courier new";
	font-size: 18px;
	border: none;
	background-color: transparent;
	border-bottom: 1px solid rgba(0, 83, 138, 1);
}
.master-work .block input[type=submit] {
	padding: 5px 15px;
	margin-left: 10px;
	border: 1px solid rgba(0, 83, 138, 1);
	transition: 0.5s;
}
.master-work .block input[type=submit]:hover {
	cursor: pointer;
	background-color: rgba(0, 83, 138, 1);
	color: white;
	transition: 0.5s;
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
			<h1>Блок управления производством<span>(Мастер)</span></h1>
		</div>
	</div>

	<div class="content">
		<div class="pt-snap">
			<h4>Оснастка ЭШП на участке</h4>
			<p onclick="addPtSnap()" class="snap-btn">Ввод в эксплуатацию</p>
			<p onclick="searchPtSnap()" class="snap-btn">поиск оснастки</p>
			<div class="search-snap">
				<h5>Форма поиска оснастки <span onclick="closeSearch()">отмена</span><h5>
				<form action="pt_snap/search_snap.php" method="post">
					<input required type="text" name="search" placeholder="Строка поиска">
					<input type="hidden" name="page" value="master">
					<input type="submit" value="найти">
				</form>
			</div>
			
			<div class="search-result">
<?php
session_start();
$serch_array = $_SESSION["search_array"];
if ($serch_array) {
$serch_array_length = count($serch_array);

for ($i = 0; $i < $serch_array_length; $i++) {
	$id = $serch_array[$i];
	$count = $i + 1;
	$sql_search = "SELECT inventory, size, drawing, type, position, durability FROM pt_snap WHERE id=$id;"; 
	$result_search = mysqli_query($link, $sql_search);
	$row_search = mysqli_fetch_array($result_search);
	echo "<div class=\"result\"";
	if ($row_search["durability"] < 60) {
	if ($row_search["durability"] > 30) {
		echo " style=\"background-color: yellow;\"";
	} else {
		echo " style=\"background-color: red;\"";
	};
	};
	echo "><span class=\"number\">".$count.".</span> ".$row_search["inventory"]." ".$row_search["size"]." ".$row_search["drawing"]." ".$row_search["type"]." ".$row_search["position"]."
<form action=\"show_pt_snap.php\" method=\"post\" target=\"blank\"><input type=\"hidden\" name=\"id\" value=\"".$id."\"><input type=\"submit\" value=\"подробнее\"></form></div><br>";
};};
?>
			</div>
		</div>
	</div>
	
	<div class="clearfix">
	</div>
	
	<hr>
	
	<div class="master-work">
		<input type="checkbox" id="show-pt-work">
		<label for="show-pt-work">Планирование производства</label>
		<div class="master-block">
			<h3>Трубы в запуске в производство</h3>
			<table>
				<tr>
					<th>№ заказа</th>
					<th>Типоразмер</th>
					<th>Техкарта*</th>
					<th>Оснастка**</th>
					<th>Запуск***</th>
					<th>Удалить</th>
				</tr>
<?php
require_once "pt_scripts/show_launch.php";
?>
			</table>
			<p> * - При нажатии на лампочку раскроется технологическая карта <br>(если лампочка красная, при нажатии будет отправлен запрос технологу на создание ТК)</p>
			<p> ** - При нажатии на лампочку раскроется список найденной оснастка.</p>
			<p> *** - Отправить в работу типоразмер без ТК нельзя - выдаст ошибку.</p>
			<hr>
			<form action="pt_scripts/add_launch_order.php" method="post">
				<label for="new_order">Номер заказа</label><br>
				<input type="text" name="new_order" id="new_order" placeholder="F.00.0000000" required pattern="[F]{1}.[0-9]{2}.[0-9]{7}"><br>
				<label for="size">Типоразмер трубы</label><br>
				<input type="text" name="size" id="size" placeholder="530х28х5000 15ГС Ш" pattern="[0-9]{2,5}х[0-9]{1,3}х[0-9]{1,5} [А-Я0-9]{1,20} Ш" required><br>
				<label for="num">Количество</label><br>
				<input type="text" name="num" id="num" placeholder="1" required><br>
				<input type="hidden" name="page" value="master">
				<input type="hidden" name="user" value="<?php echo $user_login;?>">
				<input type="submit" value="добавить">
			</form>
		</div>
		<div class="master-block">
			<h3>Трубы в работе</h3>
			<table>
				<tr>
					<th>№ заказа</th>
					<th>Типоразмер</th>
					<th>Сталь</th>
					<th>Статус</th>
					<th>Действия</th>
				</tr>
<?php
$sql_select_from_smelting = "SELECT num_order, size, steel, casting_number, end_smelting, real_casting_number, id FROM smelting";
$result_select_from_smelting = mysqli_query($link, $sql_select_from_smelting);
while ($row_select_from_smelting = mysqli_fetch_array($result_select_from_smelting)) {
	if ($row_select_from_smelting["end_smelting"] != "") {
		echo "";
	} else {
	$id_smelting = $row_select_from_smelting["id"];
	$real_casting_number = $row_select_from_smelting["real_casting_number"];
	echo "<tr>";
	echo "<td>".$row_select_from_smelting["num_order"]."</td>";
	echo "<td>".$row_select_from_smelting["size"]."</td>";
	echo "<td>".$row_select_from_smelting["steel"]."</td>";
	echo "<td>";
	if ($row_select_from_smelting["casting_number"] != "") {
		echo "Выплавляется";
	} else {
		echo "Ожидание";
	};
	echo "</td>";
	echo "<td>";
	if ($row_select_from_smelting["casting_number"] != "") {
		echo "<form target=\"_blank\" action=\"pt_scripts/show_casting.php\" method=\"post\"><input type=\"hidden\" name=\"real_casting_number\" value=\"$real_casting_number\"><input class=\"button\" style=\"color: blue;\" type=\"submit\" value=\"Просмотр\"></form>";
	} else {
		echo "<form action=\"pt_scripts/remove_from_smelting.php\" method=\"post\"><input type=\"hidden\" name=\"id_smelting\" value=\"$id_smelting\"><input class=\"button\" style=\"color: blue;\" type=\"submit\" value=\"Удалить\"></form>";
	};
	echo "</td>";	
	echo "</tr>";
	};
};
?>
			</table>
		</div>
		<div class="master-block">
			<h3>Трубы, требущие подтверждения</h3>
			<table>
				<tr>
					<th>№ заказа</th>
					<th>№ плавки</th>
					<th>Масса, кг</th>
					<th>Примечания</th>
					<th>Подтвердить</th>
				</tr>

<?php
$sql_casting_for_add = "SELECT num_order, real_casting_number, end_smelting, weight_casting_fact FROM smelting";
$result_casting_for_add = mysqli_query($link, $sql_casting_for_add);
while ($row_casting_for_add = mysqli_fetch_array($result_casting_for_add)) {
	$end_smelting_for_add = $row_casting_for_add["end_smelting"];
	$real_casting_number_for_add = $row_casting_for_add["real_casting_number"];
	$weight_casting_fact_for_add = $row_casting_for_add["weight_casting_fact"];
	if ($real_casting_number_for_add != "" && $end_smelting_for_add != "" && $weight_casting_fact_for_add == "") {
		echo "<tr>";
		echo "<td>".$row_casting_for_add["num_order"]."</td>";
		echo "<td>".$real_casting_number_for_add."</td>";
		echo "<td>";
		echo "<form action=\"pt_scripts/add_weight_to_casting.php\" method=\"post\">
		<input required class=\"to-add-casting\" type=\"text\" name=\"weight_casting_fact\" pattern=\"[0-9]{0,5}\">
		<input type=\"hidden\" name=\"real_casting_number\" value=\"".$real_casting_number_for_add."\">
		";
		echo "</td>";
		echo "<td>";
		echo "<input class=\"to-add-casting\" type=\"text\" name=\"notes\">";
		echo "</td>";	
		echo "<td>";
		echo "<input id=\"to-add-casting\" class=\"to-add-casting\" type=\"submit\" value=\"Подтвердить\"></form>";
		echo "</td>";	
		echo "</tr>";
	};
};




?>

			</table>

		</div>
	</div>
	
	<hr>

	<div class="master-work">
		<div class="block">
			<h4>Чертежная оснастка</h4>
				<form action="technologist/search_snap.php" method="post">
					<input type="text" required name="search" placeholder="Найти оснастку">
					<input type="hidden" name="page" value="master">
					<input type="submit" value="поиск">
				</form>
<?php
if (count($result_search_array) > 0) {
	require_once "technologist/result_search_script.php";
} else {
	echo "";
};
?>				
			<br>
		</div>
	</div>
	
	<div class="master-work">
		<div class="block">
			<h4>Написать администратору</h4>
				<form action="admin_scripts/post_to_admin.php" method="post">
					<input type="text" required name="user_question">
					<input type="hidden" name="user_login" value="<?php echo $user_login;?>">
					<input type="hidden" name="page" value="master">
					<input type="submit" value="Написать">
				</form>
			<br>
		</div>
	</div>
	
	<div class="clearfix">
	</div>

<script src="js/formAddSnap.js"></script>
<script src="js/showSearch.js"></script>
<script>

'use strict'

let isCard = document.getElementById('id_card');
let isCardFalse = document.getElementById('submitFalse');
if (isCard.value == '') {
	isCardFalse.onclick = function onclick(event) {alert('Запрещено передавать в работу без ТК!');};
};

let submitForm = function() {
	let notes = prompt('Причина запуска без ТПП','');
	let form = document.getElementById('with-notes');
	let input = document.getElementById('notes');
	if (notes === null) {
		alert('Вы не написали причину запуска без ТПП');
	} else {
		if (notes == '') {
			alert('Вы не написали причину запуска без ТПП');
		} else {
			input.value = notes;
			form.submit();
		};
	};
};

</script>
<?php
require_once "footer.php";
?>