<?php
$page_title = "сталевар";

require_once "../scripts/database_connect.php";

require_once "about_user.php";

require_once "header.php";

$serch_array = $_GET["serch_array"];
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
</style>
	<div class="desctop">
		<div class="container">
			<form action="../index.php" method="post">
				<input type="submit" name="user_name" value="выход">
			</form>
			<form action="change_password.php" method="post">
				<input type="submit" value="изменить пароль">
			</form>
			<h1>Блок выплавки<span>(Сталевар)</span></h1>
		</div>
	</div>

	<div class="content">
		<div class="pt-snap">
			<h4>Технологическая оснастка ЭШП</h4>
			<p onclick="searchPtSnap()" class="snap-btn">поиск оснастки</p>
			<div class="search-snap">
				<h5>Форма поиска оснастки <span onclick="closeSearch()">отмена</span><h5>
				<form target="blank" action="pt_snap/search_snap.php" method="post">
					<input required type="text" name="search" placeholder="Строка поиска">
					<input type="hidden" name="page" value="worker">
					<input type="submit" value="найти">
				</form>
			</div>
			
			<div class="search-result">
<?php
session_start();
if (isset($_SESSION["search_array"])) {
$serch_array = $_SESSION["search_array"];

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
};
};
?>
			</div>
		</div>
	</div>
	
	<div class="clearfix">
	</div>
	
	<div class="master-work">

		<div class="master-block">

<?php
$count_smelting_in_work = 1;
$sql_smelting_in_work = "SELECT casting_number, end_smelting, real_casting_number FROM smelting";
$result_smelting_in_work = mysqli_query($link, $sql_smelting_in_work);
while ($row_smelting_in_work = mysqli_fetch_array($result_smelting_in_work)) {
	$is_casting_number = $row_smelting_in_work["casting_number"];
	$is_end_smelting = $row_smelting_in_work["end_smelting"];
	$real_casting_number = $row_smelting_in_work["real_casting_number"];
	if ($is_casting_number != "" && $is_end_smelting == "") {
		echo "<form action=\"pt_scripts/in_smelting.php\" method=\"post\"><span>Плавка ".$real_casting_number." в работе. </span>
		<input type=\"hidden\" name=\"real_casting_number\" value=\"".$real_casting_number."\"><input type=\"submit\" value=\"Продолжить\"></form>";
		$count_smelting_in_work++;
	};
};
?>	

		</div>
		
		<div class="master-block">
			<h3>Трубы к выплавке</h3>
			<table>
				<tr>
					<th>Отливка</th>
					<th>Техкарта</th>
					<th>Оснастка</th>
					<th>Действия</th>
				</tr>
<?php
$sql_select_from_smelting = "SELECT is_card, is_pt_snap, size_casting_plan, steel, casting_number, end_smelting, id FROM smelting";
$result_select_from_smelting = mysqli_query($link, $sql_select_from_smelting);
while ($row_select_from_smelting = mysqli_fetch_array($result_select_from_smelting)) {
	if ($row_select_from_smelting["end_smelting"] != "") {
			echo "";
	} else {
		if ($row_select_from_smelting["casting_number"] != "") {
			echo "";
		} else {
			$smelting_id = $row_select_from_smelting["id"];
			$is_pt_snap = $row_select_from_smelting["is_pt_snap"];
			$is_card = $row_select_from_smelting["is_card"];
			echo "<tr>";
			echo "<td>".$row_select_from_smelting["size_casting_plan"]." ".$row_select_from_smelting["steel"]."</td>";
			echo "<td><form target=\"_blank\" action=\"pt_scripts/show_card_for_order.php\" method=\"post\"><input type=\"hidden\" name=\"id_card\" value=\"$is_card\"><input style=\"background-color: blue;\" type=\"submit\" value=\"\"></form>
</td>";
			echo "<td><form target=\"_blank\" action=\"pt_scripts/show_snap_for_order.php\" method=\"post\"><input type=\"hidden\" name=\"is_pt_snap\" value=\"$is_pt_snap\"><input style=\"background-color: blue;\" type=\"submit\" value=\"\"></form>
</td>";
			if ($count_smelting_in_work > 2) {
				echo "<td></td>";
			} else {
			echo "<td><form id=\"start-smelting\" action=\"pt_scripts/start_smelting.php\" method=\"post\">
			<input type=\"hidden\" name=\"smelting_id\" value=\"$smelting_id\">
			<input type=\"hidden\" id=\"furnace-num\" name=\"furnace_num\" value=\"\">
			<input  onclick=\"startSmelting()\" class=\"button\" style=\"color: blue;\" type=\"button\" value=\"Начать плавку\">
			</form></td>";		
			echo "</tr>";
			};
		};
	};
};
?>
			</table>
		</div>
		
		<div class="master-block">
		<div class="block">
			<h3>Написать администратору</h3>
				<form action="admin_scripts/post_to_admin.php" method="post">
					<input type="text" required name="user_question">
					<input type="hidden" name="user_login" value="<?php echo $user_login;?>">
					<input type="hidden" name="page" value="worker">
					<input type="submit" value="Написать">
				</form>
			<br>
		</div>
		</div>
		
	</div>
	
	<div class="clearfix">
	</div>


<script src="js/showSearch.js"></script>
<script>

'use strict'

let startSmelting = function() {
	let furnaceNum = prompt('Введите № печи','');
	if (furnaceNum != 1 && furnaceNum !=2) {
		alert('Ошибка ввода');
	} else {
		let newForse = document.getElementById('furnace-num');
		newForse.value = furnaceNum;
		let startForm = document.getElementById('start-smelting');
		startForm.submit();
	};
};

</script>
<?php
require_once "footer.php";
?>