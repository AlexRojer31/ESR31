<?php
error_reporting(0);
$page_title = "анализ";

require_once "../scripts/database_connect.php";

require_once "about_user.php";

require_once "header.php";

?>

<style>
.content {
	width: 90%;
	margin-left: 5%;
}

.content {
	display: flex;
	justify-content: space-between;
	flex-wrap: no-wrap;
}
.content .block {
	flex: 1 0 auto;
	max-width: auto;
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
table {
	border-collapse: collapse;
	margin: 20px;
	padding: 0;
}
td, th {
	border: 1px solid black;
	margin: 0;
	padding: 0;
	padding: 1px 3px;
	text-align: center;
	font-family: "courier new";
	font-size: 14px;
}
label {
	display: inline-block;
	font-family: "courier new";
	font-size: 18px;
	border: 1px solid rgba(0, 83, 138, 1);
	margin: 0;
	padding: 0;
	margin-top: 10px;
	margin-left: 20px;
	padding: 5px 15px;
	text-transform: uppercase;
	transition: 0.5s;
	background-color: rgba(0, 83, 138, 1);
	color: white;
}
label:hover {
	background-color: rgba(0, 83, 138, 1);
	color: white;
	cursor: pointer;
	transition: 0.5s;
}
.content .block h4 {
	text-align: left;
	padding-left: 20px;
	margin: 0;
	margin-top: 10px;
	margin-bottom: 10px;
}
#tube:checked ~ label[for=tube] {
	background-color: transparent;
	color: black;
	transition: 0.5s;
}
#casting:checked ~ label[for=casting] {
	background-color: transparent;
	color: black;
	transition: 0.5s;
}
#technologist:checked ~ label[for=technologist] {
	background-color: transparent;
	color: black;
	transition: 0.5s;
}
#smelting:checked ~ label[for=smelting] {
	background-color: transparent;
	color: black;
	transition: 0.5s;
}
#material:checked ~ label[for=material] {
	background-color: transparent;
	color: black;
	transition: 0.5s;
}

#tube:checked ~ table tr th:nth-child(1) {
	display: none;
}
#tube:checked ~ table tr td:nth-child(1) {
	display: none;
}
#tube:checked ~ table tr td:nth-child(2) {
	display: none;
}
#tube:checked ~ table tr td:nth-child(3) {
	display: none;
}
#tube:checked ~ table tr td:nth-child(4) {
	display: none;
}

#casting:checked ~ table tr th:nth-child(2) {
	display: none;
}
#casting:checked ~ table tr td:nth-child(5) {
	display: none;
}
#casting:checked ~ table tr td:nth-child(6) {
	display: none;
}
#casting:checked ~ table tr td:nth-child(7) {
	display: none;
}
#casting:checked ~ table tr td:nth-child(8) {
	display: none;
}
#casting:checked ~ table tr td:nth-child(9) {
	display: none;
}

#technologist:checked ~ table tr th:nth-child(3) {
	display: none;
}
#technologist:checked ~ table tr td:nth-child(10) {
	display: none;
}
#technologist:checked ~ table tr td:nth-child(11) {
	display: none;
}
#technologist:checked ~ table tr td:nth-child(12) {
	display: none;
}
#technologist:checked ~ table tr td:nth-child(13) {
	display: none;
}
#technologist:checked ~ table tr td:nth-child(14) {
	display: none;
}
#technologist:checked ~ table tr td:nth-child(15) {
	display: none;
}
#technologist:checked ~ table tr td:nth-child(16) {
	display: none;
}

#smelting:checked ~ table tr th:nth-child(4) {
	display: none;
}
#smelting:checked ~ table tr td:nth-child(17) {
	display: none;
}
#smelting:checked ~ table tr td:nth-child(18) {
	display: none;
}
#smelting:checked ~ table tr td:nth-child(19) {
	display: none;
}
#smelting:checked ~ table tr td:nth-child(20) {
	display: none;
}
#smelting:checked ~ table tr td:nth-child(21) {
	display: none;
}


#material:checked ~ table tr th:nth-child(5) {
	display: none;
}
#material:checked ~ table tr td:nth-child(22) {
	display: none;
}
#material:checked ~ table tr td:nth-child(23) {
	display: none;
}
#material:checked ~ table tr td:nth-child(24) {
	display: none;
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
			<h1>Оценка выплавки<span> (анализ)</span></h1>
		</div>
	</div>

	<div class="content">
		<div class="block">
		<h4>Выберите модули для просмотра:</h4>
		<input type="checkbox" id="tube">
		<input type="checkbox" id="casting" checked>
		<input type="checkbox" id="technologist" checked>
		<input type="checkbox" id="smelting" checked>
		<input type="checkbox" id="material" checked>
		<label for="tube">Труба</label>
		<label for="casting">Отливка</label>
		<label for="technologist">Технология</label>
		<label for="smelting">Выплавка</label>
		<label for="material">Материалы</label>
		<form action="controller/search_tube.php">
			<input type="text" name="">
			<input type="submit" value="Найти">
		</form>

<table>
	<tr>		
		<th colspan="4">Труба</th>
		<th colspan="5">Отливка</th>
		<th colspan="7">Технология</th>
		<th colspan="5">Выплавка</th>
		<th colspan="3">Материалы</th>
	</tr>
	<tr>
<!--  Блок про трубу  -->		
		<td>№ заказа</td>
		<td>Типорзамер</td>
		<td>Марка стали</td>
		<td>Вес трубы</td>
<!--  Блок про отливку  -->		
		<td>Дата</td>	
		<td>№ плавки</td>
		<td>Типоразмер</td>
		<td>Кривизна</td>
		<td>Масса</td>
<!--  Блок про технологию  -->		
		<td>I, кА</td>		
		<td>U, В</td>		
		<td>R, мОм</td>		
		<td>V мм/мин</td>		
		<td>P, кВт*ч</td>		
		<td>P/W, кВт*ч/т</td>	
		<td>Коэф. зап.</td>
<!--  Блок про плавку  -->		
		<td>Инв. № дорна</td>		
		<td>Инв. № Кристаллизатора</td>		
		<td>Инв. № Шлаовой надставки</td>		
		<td>Сталевары</td>
		<td>Замечания</td>
<!--  Блок про материалы  -->		
		<td>Электроды</td>
		<td>Флюс, кг</td>
		<td>Алюминий, кг</td>
	</tr>

<?php
$sql_about_tube = "SELECT
num_order,
size,
steel,
weight_tube,
casting_number,
curvature_casting,
size_casting_fact,
weight_casting_fact,
i_average,
u_average,
r_average,
p_average,
p_w_average,
notes,
d_electrod,
q_electrod,
l_electrod,
electrod_config,
slag_start,
slag_doz,
alumin,
inventory_dorn,
inventory_crist,
inventory_slag,
real_casting_number,
worker,
v_average,
kz_casting,
casting_date
FROM smelting ORDER BY id";
$result_about_tube = mysqli_query($link, $sql_about_tube);
while ($row_about_tube = mysqli_fetch_array($result_about_tube)) {
	echo "<tr>";
	
	echo "<td>".$row_about_tube["num_order"]."</td>";
	echo "<td>".$row_about_tube["size"]."</td>";
	echo "<td>".$row_about_tube["steel"]."</td>";
	echo "<td>".$row_about_tube["weight_tube"]."</td>";
	echo "<td>".$row_about_tube["casting_date"]."</td>";	
	echo "<td><a target=\"_blank\" href=\"controller/show_real_casting.php?real_casting_number=".$row_about_tube["real_casting_number"]."\">".$row_about_tube["real_casting_number"]."</a></td>";
	echo "<td>".$row_about_tube["size_casting_fact"]."</td>";
	echo "<td>".$row_about_tube["curvature_casting"]."</td>";
	echo "<td>".$row_about_tube["weight_casting_fact"]."</td>";
	echo "<td>".$row_about_tube["i_average"]."</td>";
	echo "<td>".$row_about_tube["u_average"]."</td>";
	echo "<td>".$row_about_tube["r_average"]."</td>";
	echo "<td>".$row_about_tube["v_average"]."</td>";
	echo "<td>".$row_about_tube["p_average"]."</td>";
	echo "<td>".$row_about_tube["p_w_average"]."</td>";
	echo "<td>".$row_about_tube["kz_casting"]."</td>";
	echo "<td>".$row_about_tube["inventory_dorn"]."</td>";
	echo "<td>".$row_about_tube["inventory_crist"]."</td>";
	echo "<td>".$row_about_tube["inventory_slag"]."</td>";
	echo "<td>".$row_about_tube["worker"]."</td>";
	echo "<td>".$row_about_tube["notes"]."</td>";
	echo "<td> ф".$row_about_tube["d_electrod"]." мм, ".$row_about_tube["q_electrod"]." шт, длиной ".$row_about_tube["l_electrod"]." мм (".$row_about_tube["electrod_config"].")</td>";
	echo "<td>".($row_about_tube["slag_start"] + $row_about_tube["slag_doz"])."</td>";
	echo "<td>".$row_about_tube["alumin"]."</td>";
	
	echo "</tr>";
};
?>

</table>			
			
		</div>
	</div>
	
	<div class="clearfix">
	</div>

<?php
require_once "footer.php";
?>