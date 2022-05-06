<?php
require_once "../../scripts/database_connect.php";

require_once "../about_user.php";

$real_casting_number = $_GET["real_casting_number"];


$sql_about_casting = "SELECT 
inventory_dorn,
inventory_crist,
inventory_slag,
size_casting_fact,
weight_casting_fact,
curvature_casting,
d_electrod,
q_electrod,
l_electrod,
electrod_config,
slag_start,
slag_doz,
alumin,
is_card,
casting_date,
steel,
is_card,
notes
FROM smelting WHERE real_casting_number='{$real_casting_number}'";
$result_about_casting = mysqli_query($link, $sql_about_casting);
$row_about_casting = mysqli_fetch_array($result_about_casting);

$is_card = $row_about_casting["is_card"];

$sql_card = "SELECT card_name FROM cards WHERE id=$is_card";
$result_card = mysqli_query($link, $sql_card);
$row_card = mysqli_fetch_array($result_card);
$card_name = $row_card["card_name"];


?>

<style>
.casting {
	display: inline-block;
	margin: 20px;
	padding: 10px;
	border: 1px solid rgba(0, 83, 138, 1);
}
h2, h3 {
	margin: 0;
	padding: 0;
	font-family: "courier new";
	font-size: 30px;
	font-weight: bold;
	margin-bottom: 20px;
}
p {
	margin: 0;
	padding: 0;
	font-family: "courier new";
	font-size: 20px;
	font-weight: bold;
	margin-bottom: 10px;
}
span {
	color: rgba(0, 83, 138, 1);
}
table {
	margin: 0;
	padding: 0;
	border-collapse: collapse;
	text-align: center;
}
td, th {
	border: 1px solid black;
	padding: 3px 5px;
	font-family: "courier new";
	font-size: 16px;
}
</style>


<div class="casting">
<h2>№ <?php echo $real_casting_number;?>Ш <span>(<?php echo $row_about_casting["casting_date"];?>)</span></h2>
<h3><?php echo $row_about_casting["size_casting_fact"];?> <?php echo $row_about_casting["steel"];?> <span>(<?php echo $row_about_casting["weight_casting_fact"];?> кг)</span></h3>
<p>Параметры плавки:</p>
<table>
	<tr>
		<td>Технологическая карта</td>
		<td><a target="_blank" href="../pt_scripts/show_card_for_order.php?id_card=<?php echo $row_about_casting["is_card"];?>"><?php echo $card_name;?></a></td>
	</tr>
	<tr>
		<td>Электроды</td>
		<td>ф <?php echo $row_about_casting["d_electrod"];?> мм, 
		<?php echo $row_about_casting["q_electrod"];?> шт (
		<?php echo $row_about_casting["electrod_config"];?>) длиной 
		<?php echo $row_about_casting["l_electrod"];?> мм
		</td>
	</tr>
	<tr>
		<td>Дорн</td>
		<td><?php echo $row_about_casting["inventory_dorn"];?></td>
	</tr>
	<tr>
		<td>Кристаллизатор</td>
		<td><?php echo $row_about_casting["inventory_crist"];?></td>
	</tr>
	<tr>
		<td>Шлаковая надставка</td>
		<td><?php echo $row_about_casting["inventory_slag"];?></td>
	</tr>
	<tr>
		<td>Флюс на расплав, кг</td>
		<td><?php echo $row_about_casting["slag_start"];?></td>
	</tr>
	<tr>
		<td>Флюс на дозаторы, кг</td>
		<td><?php echo $row_about_casting["slag_doz"];?></td>
	</tr>
	<tr>
		<td>Алюминий, кг</td>
		<td><?php echo $row_about_casting["alumin"];?></td>
	</tr>
<table>
<p>Режимы плавки:</p>
<table>
	<tr>
		<th>Время</th>
		<th>Ступень ПСН</th>
		<th>Сила тока, кА</th>
		<th>Напряжение, В</th>
		<th>Скорость НК, мм/мин</th>
		<th>Длина, мм</th>
		<th>Примечания</th>
		<th>Сталевар</th>
	</tr>
<?php
$sql_real_casting = "SELECT
real_time,
i_casting,
u_casting,
psn_casting,
notes,
speed_casting,
user,
length_casting
FROM remelting_modes
WHERE real_casting_number='{$real_casting_number}'
ORDER BY id";
$result_real_casting = mysqli_query($link, $sql_real_casting);
while ($row_real_casting = mysqli_fetch_array($result_real_casting)) {
	echo "<tr>";
	echo "<td>".$row_real_casting["real_time"]."</td>";
	echo "<td>".$row_real_casting["psn_casting"]."</td>";
	echo "<td>".$row_real_casting["i_casting"]."</td>";
	echo "<td>".$row_real_casting["u_casting"]."</td>";
	echo "<td>".$row_real_casting["speed_casting"]."</td>";
	echo "<td>".$row_real_casting["length_casting"]."</td>";
	echo "<td>".$row_real_casting["notes"]."</td>";
	echo "<td>".$row_real_casting["user"]."</td>";
	echo "</tr>";
};
?>
</table>

<?php

if (stripos($row_about_casting["notes"], "АВАРИЙНАЯ ОСТАНОВКА") === false) {
} else {
	echo "<br><p style=\"color: red;\"><b>Плавка была аварийно остановлена!</b></p>";
};
?>
</div>
