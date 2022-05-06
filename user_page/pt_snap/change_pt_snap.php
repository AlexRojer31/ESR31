<?php
require_once "../../scripts/database_connect.php";

require_once "../about_user.php";

$id = $_POST["id"];
$inventory = $_POST["inventory"];
$size = $_POST["size"];
$drawing = $_POST["drawing"];
$type = $_POST["type"];
$diameter = $_POST["diameter"];
$diameter_fact = $_POST["diameter_fact"];
$melting_num = $_POST["melting_num"];
$flushing_count = $_POST["flushing_count"];
$damage = $_POST["damage"];
$durability = $_POST["durability"];
$position  = $_POST["position"];

if ($type == "дорн" ) {
	$delta = $diameter - $diameter_fact;	
} else {
	$delta = $diameter_fact - $diameter;
};

$durability = 100 - ($delta / 30)*100;
$durability = round($durability, 0);

if ($damage === 'нет') {
} else {
	$durability = $durability - 30;
};

if ($durability < 0) {
	$durability = 0;
};

$sql_update_pt_snap = "UPDATE pt_snap SET
inventory = '{$inventory}',
size = '{$size}',
drawing = '{$drawing}',
type = '{$type}',
diameter = '{$diameter}',
diameter_fact = '{$diameter_fact}',
melting_num = '{$melting_num}',
flushing_count = '{$flushing_count}',
damage = '{$damage}',
durability = '{$durability}',
position  = '{$position}',
user = '{$user_login}'
WHERE
id='{$id}'
";


$result_update_pt_snap = mysqli_query($link, $sql_update_pt_snap);

header("location:../show_pt_snap.php?id=$id");

?>

