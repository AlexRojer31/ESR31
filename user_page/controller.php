<?php
$page_title = "контролер";

require_once "../scripts/database_connect.php";

require_once "about_user.php";

require_once "header.php";

?>

<style>
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
	overflow: auto;
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
	margin-left: 10px;
	padding: 0;
	text-align: center;
	margin-bottom: 20px;
}
td, th {
	border: 1px solid black;
	margin: 0;
	padding: 0;
	padding: 2px 5px;
	font-family: "courier new";
	font-size: 12px;
}
.block .main input[type=number] {
	border: none;
	width: 35px;
	margin: 0;
	padding: 0;
	text-align: center;
	font-family: "courier new";
	font-size: 12px;
	background-color: rgba(0, 83, 138, 0.2);
}
.block .main input[type=submit] {
	border: none;
	color: rgba(0, 83, 138, 1);
	margin: 0;
	padding: 0;
	text-align: center;
	font-family: "courier new";
	font-size: 12px;
	text-transform: uppercase;
	transition: 0.5s;
}
.block .main input[type=submit]:hover {
	cursor: pointer;
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
			<h1>Блок контроля<span> (Контролер)</span></h1>
		</div>
	</div>

	<div class="content">
		<div class="block">
			<input type="checkbox" id="first" checked>
			<h4>Трубы на контроль<br>
			<label for="first"><span>подробнее</span></label></h4>
			<div class="main" id="for-first">
				<table>
					<tr>
						<th>№ отливки</th>
						<th>D<sub>min</sub>, мм</th>
						<th>D<sub>max</sub>, мм</th>
						<th>S<sub>min</sub>, мм</th>
						<th>S<sub>max</sub>, мм</th>
						<th>L, мм </th>
						<th>Кривизна, мм </th>
						<th>Действие</th>
					</tr>

<?php
$sql_about_casting = "SELECT real_casting_number, end_smelting FROM smelting WHERE size_casting_fact=''";
$result_about_casting = mysqli_query($link, $sql_about_casting);
while ($row_about_casting = mysqli_fetch_array($result_about_casting)) {
	$real_casting_number = $row_about_casting["real_casting_number"];
	$end_smelting = $row_about_casting["end_smelting"];
	if ($real_casting_number != "" && $end_smelting != "") {
		echo "<tr>";
		echo "<td>".$real_casting_number." Ш</td>";
		echo "<td><form action=\"controller/add_controller_param.php\" method=\"post\">
		<input required type=\"number\" name=\"d_min\">
		<input type=\"hidden\" name=\"real_casting_number\" value=\"".$real_casting_number."\">
		</td>";
		echo "<td><input required type=\"number\" name=\"d_max\"></td>";
		echo "<td><input required type=\"number\" name=\"s_min\"></td>";
		echo "<td><input required type=\"number\" name=\"s_max\"></td>";
		echo "<td><input required type=\"number\" name=\"l_casting\"></td>";
		echo "<td><input required type=\"number\" name=\"curvature_casting\"></td>";
		echo "<td><input type=\"submit\" value=\"Записать\"></form></td>";
		echo "</tr>";
	};
};
?>
				</table>
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
					<input type="hidden" name="page" value="controller">
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