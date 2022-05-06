<?php
require_once "../../scripts/database_connect.php";

require_once "../about_user.php";


$real_casting_number = $_POST["real_casting_number"];
if ($real_casting_number == "") {
	session_start();
	$real_casting_number = $_SESSION["real_casting_number"];
};

$sql_real_casting_number = "SELECT size_casting_plan, steel, is_card FROM smelting WHERE real_casting_number='{$real_casting_number}'";
$result_real_casting_number = mysqli_query($link, $sql_real_casting_number);
$row_real_casting_number = mysqli_fetch_array($result_real_casting_number);

$header_text = $row_real_casting_number["size_casting_plan"]." ".$row_real_casting_number["steel"];
$id_card = $row_real_casting_number["is_card"];




?>
<style>
.block {
	display: inline-block;
	width: auto;
	margin: 20px;
	padding: 10px;
	border: 1px solid black;
}
h2 {
	margin: 0;
	padding: 0;
	color: black;
	font-family: "impcat";
	font-size: 24px;
	margin-bottom: 20px;
}
h2 span {
	margin: 0;
	padding: 0;
	color: rgba(0, 83, 138, 1);
	font-family: "courier new";
	font-size: 18px;
	text-decoration: underline;
	font-weight: normal;
}
h2 span:hover {
	cursor: pointer;
}
table {
	margin: 0;
	padding: 0;
	border-collapse: collapse;
	border: 1px solid rgba(0, 83, 138, 1);
	color: black;
	text-align: center;
}
table th, td {
	border: 1px solid rgba(0, 83, 138, 1);
	padding: 0;
	font-family: "courier new";
	font-size: 18px;
	padding: 5px;
}
input {
	border: none;
	background-color: transparent;
	color: rgba(0, 83, 138, 1);
	text-align: center;
	font-family: "courier new";
	font-size: 18px;
}
input[type=submit], input[type=reset] {
	display: inline-block;
	margin-top: 20px;
	margin-right: 10px;
	padding: 5px 15px;
	border: 1px solid rgba(0, 83, 138, 1);
	text-transform: uppercase;
	transition: 0.5s;
}
input[type=submit]:hover, input[type=reset]:hover {
	background-color: rgba(0, 83, 138, 1);
	color: white;
	cursor: pointer;
	transition: 0.5s;
}




</style>

<div class="block">
<h2><?php echo $header_text;?> (<?php echo $real_casting_number;?>Ш)<br>
<span onclick="openCard()"><?php echo "Открыть техкарту";?></span><h2>

<table>
	<tr>
		<th>Время</th>
		<th>Ступень тр-ра</th>
		<th>Сила тока, кА</th>
		<th>Напряжение, В</th>
		<th>Скорость плавки, мм/мин</th>
		<th>Длина, мм</th>
		<th>Примечания</th>
	</tr>
<?php
$sql_smelting = "SELECT real_time, i_casting, u_casting, psn_casting, notes, speed_casting, length_casting FROM 
remelting_modes WHERE real_casting_number='{$real_casting_number}' ORDER BY id";
$result_smelting = mysqli_query($link, $sql_smelting) or die(mysqli_error($link));
while ($row_smelting = mysqli_fetch_array($result_smelting)) {
	echo "<tr>";
	echo "<td>".$row_smelting["real_time"]."</td>";
	echo "<td>".$row_smelting["psn_casting"]."</td>";
	echo "<td>".$row_smelting["i_casting"]."</td>";
	echo "<td>".$row_smelting["u_casting"]."</td>";
	echo "<td>".$row_smelting["speed_casting"]."</td>";
	echo "<td>".$row_smelting["length_casting"]."</td>";
	echo "<td>".$row_smelting["notes"]."</td>";
	echo "</tr>";
};
?>
	<tr>
		<form action="add_new_remelting_mode.php" method="post">
			<td></td>
			<td><input type="text" required name="psn_casting"></td>
			<td><input type="text" required name="i_casting"></td>
			<td><input type="text" required name="u_casting"></td>
			<td><input type="text" required name="speed_casting"></td>
			<td><input type="text" required name="length_casting"></td>
			<td><input type="text" name="notes"></td>
	</tr>
</table>

	<input type="hidden" required name="user" value="<?php echo $user_surname;?>">
	<input type="hidden" required name="real_casting_number" value="<?php echo $real_casting_number;?>">
	<input type="submit" value="Записать">
	<input type="reset" value="Сбросить">
</form>

<form action="show_card_for_order.php" method="post" id="showCard" target="_blank">
	<input type="hidden" required name="id_card" value="<?php echo $id_card;?>">
</form>

<hr>
<form action="end_smelting.php" method="post">
	<input type="hidden" required name="real_casting_number" value="<?php echo $real_casting_number;?>">
	<input type="submit" value="Завершить плавку">
</form>

<form action="error_smelting.php" method="post">
	<input type="hidden" required name="real_casting_number" value="<?php echo $real_casting_number;?>">
	<input type="submit" value="Аварийная остановка">
</form>
</div>

<script>
'use strict'

let openCard = function() {
	let showCard = document.getElementById('showCard');
	showCard.submit();
};
</script>