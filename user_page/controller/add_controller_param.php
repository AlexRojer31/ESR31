<?php
require_once "../../scripts/database_connect.php";

require_once "../about_user.php";


$real_casting_number = trim($_POST["real_casting_number"]);
$d_min = trim($_POST["d_min"]);
$d_max = trim($_POST["d_max"]);
$s_min = trim($_POST["s_min"]);
$s_max = trim($_POST["s_max"]);
$l_casting = trim($_POST["l_casting"]);
$curvature_casting = trim($_POST["curvature_casting"]);



if ($d_max < $d_min) {
	header("location:../../error_page/error_controller.php");
	exit;
};

if ($s_max < $s_min) {
	header("location:../../error_page/error_controller.php");
	exit;
};

$d_average = round(($d_max + $d_min) / 2, 0);
$s_average = round(($s_max + $s_min) / 2, 0);

$size_casting_fact = $d_average."х".$s_average."х".$l_casting;

$sql_about_casting = "SELECT d_electrod, q_electrod, time_casting FROM smelting WHERE real_casting_number='{$real_casting_number}'";
$result_about_casting = mysqli_query($link, $sql_about_casting);
$row_about_casting = mysqli_fetch_array($result_about_casting);
$d_electrod = $row_about_casting["d_electrod"];
$q_electrod = $row_about_casting["q_electrod"];
$time_casting = $row_about_casting["time_casting"];


$square_electrode = $q_electrod * 3.14 * $d_electrod * $d_electrod / 4;
$square_casting = 3.14 * $s_average * ($d_average - $s_average);
$kz_casting = round($square_electrode / $square_casting, 2);
$v_average = round($l_casting / $time_casting, 0);

$sql_update_smelting = "
UPDATE smelting SET
d_max_casting = '{$d_max}',
d_min_casting = '{$d_min}',
s_max_casting = '{$s_max}',
s_min_casting = '{$s_min}',
l_casting = '{$l_casting}',
curvature_casting = '{$curvature_casting}',
size_casting_fact = '{$size_casting_fact}',
v_average = '{$v_average}',
kz_casting = '{$kz_casting}'
WHERE real_casting_number='{$real_casting_number}'";
$result_update_smelting = mysqli_query($link, $sql_update_smelting);

header("location:../controller.php");

?>

