<?php
require_once "../../scripts/database_connect.php";

require_once "../about_user.php";

$real_casting_number = $_POST["real_casting_number"];



$max_id_modes = 0;
$sql_max_id_modes = "SELECT id FROM remelting_modes WHERE real_casting_number='{$real_casting_number}'";
$result_max_id_modes = mysqli_query($link, $sql_max_id_modes);
while ($row_max_id_modes = mysqli_fetch_array($result_max_id_modes)) {
	if ($row_max_id_modes["id"] >  $max_id_modes) {
		$max_id_modes = $row_max_id_modes["id"];
	} else {
		$max_id_modes = $max_id_modes;
	};
};

$id_casting_start = $max_id_modes;
$id_casting_end = 0;
$sql_require_time = "SELECT id, real_time FROM remelting_modes WHERE real_casting_number='{$real_casting_number}'";
$result_time = mysqli_query($link, $sql_require_time);
while ($row_time = mysqli_fetch_array($result_time)) {
	if ($row_time["id"] <  $id_casting_start) {
		$id_casting_start = $row_time["id"];
	} else {
		$id_casting_start = $id_casting_start;
	};

	if ($row_time["id"] >  $id_casting_end) {
		$id_casting_end = $row_time["id"];
	} else {
		$id_casting_end = $id_casting_end;
	};	
};

$sql_end_time = "SELECT real_time, length_casting FROM remelting_modes WHERE id='{$id_casting_end}'";
$result_end_time = mysqli_query($link, $sql_end_time);
$row_end_time = mysqli_fetch_array($result_end_time);
$end_smelting = $row_end_time["real_time"];
$end_smelting_array = explode(":", $end_smelting);
$end_smelting_to_caunt = $end_smelting_array[0] * 60 + $end_smelting_array[1];
$length_casting = $row_end_time["length_casting"];

$sql_start_time = "SELECT real_time FROM remelting_modes WHERE id='{$id_casting_start}'";
$result_start_time = mysqli_query($link, $sql_start_time);
$row_start_time = mysqli_fetch_array($result_start_time);
$start_smelting = $row_start_time["real_time"];
$start_smelting_array = explode(":", $start_smelting);
$start_smelting_to_caunt = $start_smelting_array[0] * 60 + $start_smelting_array[1];

if ($end_smelting_to_caunt < $start_smelting_to_caunt) {
	$time_casting = 1440 - $start_smelting_to_caunt + $end_smelting_to_caunt;
} else {
	$time_casting = $end_smelting_to_caunt - $start_smelting_to_caunt;
};

//работа со временем
//echo $start_smelting."<br>";
//echo $end_smelting."<br>";
//echo $time_casting."<br>";

$casting_date = date("d-m-y");
//echo $casting_date."<br>";

//работа с записями по ходу плавки
$note_start = "";
$sql_note_start = "SELECT notes FROM smelting WHERE real_casting_number='{$real_casting_number}'";
$result_note_start = mysqli_query($link, $sql_note_start);
while ($row_note_start = mysqli_fetch_array($result_note_start)) {
	if ($row_note_start["notes"] == "") {
		break;
	};
	$note_start = $note_start.$row_note_start["notes"]."<br>";
};
$note_casting = "";
$sql_note_casting = "SELECT notes FROM remelting_modes WHERE real_casting_number='{$real_casting_number}'";
$result_note_casting = mysqli_query($link, $sql_note_casting);
while ($row_note_casting = mysqli_fetch_array($result_note_casting)) {
	if ($row_note_casting["notes"] == "") {
		break;
	};
	$note_casting = $note_casting.$row_note_casting["notes"]."<br>";
};
$note_casting = trim($note_start."<br>".$note_casting."<b>АВАРИЙНАЯ ОСТАНОВКА<b>");
//echo $note_casting."<br>";

//найдем усредненные значения параметров

$summ_i = 0;
$summ_u = 0;
$count_number = 0;
$sql_average = "SELECT i_casting, u_casting FROM remelting_modes WHERE real_casting_number='{$real_casting_number}'";
$result_average = mysqli_query($link, $sql_average);
while ($row_average = mysqli_fetch_array($result_average)) {
	$summ_i = $summ_i + $row_average["i_casting"];
	$summ_u = $summ_u + $row_average["u_casting"];
	$count_number++;
};

$i_average = round($summ_i / $count_number, 1);
$u_average = round($summ_u / $count_number, 1);
$r_average = round($u_average / $i_average, 2);
$p_average = round($i_average * $u_average, 2);

//echo $i_average."<br>";
//echo $u_average."<br>";
//echo $r_average."<br>";
//echo $p_average."<br>";

//запишем сталеваров
$select_worker = "";
$sql_worker = "SELECT user FROM remelting_modes WHERE real_casting_number='{$real_casting_number}'";
$result_worker = mysqli_query($link, $sql_worker);
while ($row_worker = mysqli_fetch_array($result_worker)) {
	if (stripos($select_worker, $row_worker["user"]) != false) {
		$select_worker = $select_worker;
	} else {
		$select_worker = $select_worker." ".$row_worker["user"];
	};
};
$select_worker = trim($select_worker);
//echo $select_worker;

$sql_insert_casting = "UPDATE smelting SET
i_average = '{$i_average}',
u_average = '{$u_average}',
r_average = '{$r_average}',
p_average = '{$p_average}',
start_smelting = '{$start_smelting}',
end_smelting = '{$end_smelting}',
notes = '{$note_casting}',
time_casting = '{$time_casting}',
casting_date = '{$casting_date}',
worker = '{$select_worker}'
WHERE real_casting_number='{$real_casting_number}'";
$result_insert_casting = mysqli_query($link, $sql_insert_casting) or die(mysqli_error($link));

header("location: ../worker.php");
?>