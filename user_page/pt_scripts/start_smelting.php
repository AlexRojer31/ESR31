<?php
require_once "../../scripts/database_connect.php";

require_once "../about_user.php";


$furnace_num = $_POST["furnace_num"];
$smelting_id = $_POST["smelting_id"];

$sql_smelting = "SELECT size_casting_plan, steel, casting_number, is_card FROM smelting WHERE id=$smelting_id";
$result_smelting = mysqli_query($link, $sql_smelting);
$row_smelting = mysqli_fetch_array($result_smelting);

$size_casting_plan = $row_smelting["size_casting_plan"];
$steel = $row_smelting["steel"];
$is_card = $row_smelting["is_card"];


$real_date = date("y");

$sql_number_smeltig = "SELECT casting_number FROM smelting WHERE year_num=$real_date AND furnace_num=$furnace_num";
$result_number_smeltig = mysqli_query($link, $sql_number_smeltig);
$count_number = 0;
while ($row_number_smeltig = mysqli_fetch_array($result_number_smeltig)) {
	if ($row_number_smeltig["casting_number"] > $count_number) {
		$count_number = $row_number_smeltig["casting_number"];
	} else {
		$count_number = $count_number;
	};
};

$casting_number = $count_number + 1;

$real_casting_number = $furnace_num."-".$real_date."-".$casting_number;
$size_casting_plan_and_steel = $size_casting_plan." ".$steel;


?>
<style>
form {
	border: 1px solid black;
	margin: 20px;
	padding: 20px;
	font-family: "Courier new";
	font-size: 24px;
}
input, select {
	border: none;
	background-color: transparent;
	border-bottom: 1px solid rgba(0, 83, 138, 1);
	font-family: "Courier new";
	font-size: 18px;
	width: 30%;
	margin-bottom: 10px;
	margin-left: 20px;
}
input[type=submit], input[type=reset] {
	color: rgba(0, 83, 138, 1);
	border: 1px solid rgba(0, 83, 138, 1);
	font-family: "Courier new";
	font-size: 24px;
	width: auto;
	padding: 5px 15px;
	text-transform: uppercase;
	transition: 0.5s;
	margin-left: 20px;
}
input[type=submit]:hover, input[type=reset]:hover {
	color: white;
	background-color: rgba(0, 83, 138, 1);
	cursor: pointer;
	transition: 0.5s;
}

a {
	font-family: "Courier new";
	font-size: 16px;
	text-transform: uppercase;
}
</style>

<form action="start_new_smeilting.php" method="post">
	<label for="">№ плавки </label><input required type="text" name="real_casting_number" value="<?php echo $real_casting_number;?>" id=""><br>
	<label for="">Отливка </label><input readonly type="text" name="size_casting_plan_and_steel" value="<?php echo $size_casting_plan_and_steel;?>" id=""><br>
	<label for="">Диаметр электрода, мм</label><input required type="text" name="d_electrod" id=""><br>
	<label for="">Количество элементов РЭ, шт</label><input required type="text" name="q_electrod" id=""><br>
	<label for="">Длина электрода, мм</label><input required type="text" name="l_electrod" id=""><br>
	<label for="">Компановка электродов</label>
	<select name="electrod_config">
		<option value="одиночные">Одиночные</option>
		<option value="спарка">Спарка</option>
	</select><br>
	<label for="">Флюса на расплав, кг</label><input required type="text" name="slag_start" value="" id=""><br>
	<label for="">Флюса на дозаторы, кг</label><input required type="text" name="slag_doz" value="" id=""><br>
	<label for="">Алюминия, кг</label><input required type="text" name="alumin" value="" id=""><br>
	<label for="">Инв. № дорна</label><input required type="text" name="dorn" value="" id=""><br>
	<label for="">Инв. № кристаллизатора</label><input required type="text" name="crist" value="" id=""><br>
	<label for="">Инв. № шлаковой надставки</label><input required type="text" name="slag" value="" id=""><br>
	<input type="hidden" name="furnace_num" value="<?php echo $furnace_num;?>" id="">
	<input type="hidden" name="smelting_id" value="<?php echo $smelting_id;?>" id="">
	<input type="hidden" name="real_date" value="<?php echo $real_date;?>" id="">
	<input type="hidden" name="" value="" id="">
	<input type="submit" value="начать">
	<input type="reset" value="сбросить">	
</form>
<a href="../worker.php">назад</a>
