<?php
require_once "../../scripts/database_connect.php";

require_once "../about_user.php";


$real_casting_number = $_POST["real_casting_number"];
$real_casting_number_array = explode("-", $real_casting_number);

$furnace_num = $real_casting_number_array[0];
$real_date = $real_casting_number_array[1];
$casting_number = $real_casting_number_array[2];

$sql_casting_number = "SELECT casting_number FROM smelting WHERE year_num=$real_date AND furnace_num=$furnace_num";
$result_casting_number = mysqli_query($link, $sql_casting_number);
while ($row_casting_number = mysqli_fetch_array($result_casting_number)) {
	if ($row_casting_number["casting_number"] == $casting_number) {
		echo "<script>alert('Такой номер плавки уже существует!');</script>";
		echo "<a href=\"../worker.php\">Назад</a>";
		exit;
	};
};


$smelting_id = $_POST["smelting_id"];

$d_electrod = $_POST["d_electrod"];
$q_electrod = $_POST["q_electrod"];
$l_electrod = $_POST["l_electrod"];
$electrod_config = $_POST["electrod_config"];

$slag_start = $_POST["slag_start"];
$slag_doz = $_POST["slag_doz"];
$alumin = $_POST["alumin"];

$dorn = trim($_POST["dorn"]);
$crist = trim($_POST["crist"]);
$slag = trim($_POST["slag"]);

$count_from_snap = 0;
$sql_from_snap = "Select inventory FROM pt_snap";
$result_from_snap = mysqli_query($link, $sql_from_snap);
while ($row_from_snap = mysqli_fetch_array($result_from_snap)) {
	if (trim($row_from_snap["inventory"]) == $dorn || trim($row_from_snap["inventory"]) == $crist || trim($row_from_snap["inventory"]) == $slag) {
		$count_from_snap = $count_from_snap + 1;
	} else {
		$count_from_snap = $count_from_snap;
	};
};
if ($count_from_snap < 3) {
	header("location: ../../error_page/error_use_snap.php");
	exit;
};




$sql_select_use_dorn = "SELECT melting_num, flushing_count, durability FROM pt_snap WHERE inventory='{$dorn}'";
$result_use_dorn = mysqli_query($link, $sql_select_use_dorn);
$row_use_dorn = mysqli_fetch_array($result_use_dorn);
$durability_dorn = $row_use_dorn["durability"];
$num_dorn = $row_use_dorn["melting_num"];
$num_dorn_flush = $row_use_dorn["flushing_count"];
$num_dorn = $num_dorn + 1;
$num_dorn_flush = $num_dorn_flush + 1;
$sql_update_dorn = "UPDATE pt_snap SET
melting_num = $num_dorn,
flushing_count = $num_dorn_flush
WHERE inventory='{$dorn}'";
$result_update_dorn = mysqli_query($link, $sql_update_dorn);

$sql_select_use_crist = "SELECT melting_num, flushing_count, durability FROM pt_snap WHERE inventory='{$crist}'";
$result_use_crist = mysqli_query($link, $sql_select_use_crist);
$row_use_crist = mysqli_fetch_array($result_use_crist);
$durability_crist = $row_use_crist["durability"];
$num_crist = $row_use_crist["melting_num"];
$num_crist_flush = $row_use_crist["flushing_count"];
$num_crist = $num_crist + 1;
$num_crist_flush = $num_crist_flush + 1;
$sql_update_crist = "UPDATE pt_snap SET
melting_num = $num_crist,
flushing_count = $num_crist_flush
WHERE inventory='{$crist}'";
$result_update_crist = mysqli_query($link, $sql_update_crist);

$sql_select_use_slag = "SELECT melting_num, flushing_count, durability FROM pt_snap WHERE inventory='{$slag}'";
$result_use_slag = mysqli_query($link, $sql_select_use_slag);
$row_use_slag = mysqli_fetch_array($result_use_slag);
$durability_slag = $row_use_slag["durability"];
$num_slag = $row_use_slag["melting_num"];
$num_slag_flush = $row_use_slag["flushing_count"];
$num_slag = $num_slag + 1;
$num_slag_flush = $num_slag_flush + 1;
$sql_update_slag = "UPDATE pt_snap SET
melting_num = $num_slag,
flushing_count = $num_slag_flush
WHERE inventory='{$slag}'";
$result_update_slag = mysqli_query($link, $sql_update_slag);


$dorn = $dorn." ".$num_dorn."(".$num_dorn_flush.") ".$durability_dorn."%";
$crist = $crist." ".$num_crist."(".$num_crist_flush.") ".$durability_crist."%";
$slag = $slag." ".$num_slag."(".$num_slag_flush.") ".$durability_slag."%";


$sql_update_smelting = "UPDATE smelting SET
furnace_num = '{$furnace_num}',
year_num = '{$real_date}',
casting_number = '{$casting_number}',
d_electrod = '{$d_electrod}',
q_electrod = '{$q_electrod}',
l_electrod = '{$l_electrod}',
electrod_config = '{$electrod_config}',
slag_start = '{$slag_start}',
slag_doz = '{$slag_doz}',
alumin = '{$alumin}',
inventory_dorn = '{$dorn}',
inventory_crist = '{$crist}',
inventory_slag = '{$slag}',
real_casting_number = '{$real_casting_number}'
WHERE id=$smelting_id";
$result_update_smelting = mysqli_query($link, $sql_update_smelting);

session_start();
$_SESSION["real_casting_number"] = $real_casting_number;

header("location: in_smelting.php");
?>

