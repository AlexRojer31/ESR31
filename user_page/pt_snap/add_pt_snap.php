<?php
require_once "../../scripts/database_connect.php";

require_once "../about_user.php";

$inventory = trim($_POST["inventory"]);
$size = $_POST["size"]; 
$drawing = $_POST["drawing"]; 
$type = $_POST["type"]; 
$diameter = $_POST["diameter"]; 
$diameter_fact = $diameter;
$melting_num = 0; 
$flushing_count = 0; 
$damage = 'нет'; 
$durability = 100; 
$position = $_POST["position"]; 

$sql_is_inventory = "SELECT inventory FROM pt_snap";
$result_is_inventory = mysqli_query($link, $sql_is_inventory);
while ($row_is_inventory = mysqli_fetch_array($result_is_inventory)) {
	if ($row_is_inventory["inventory"] === $inventory) {
	header("location:../../error_page/error_inventory.php?inventory=$inventory");
	exit;		
	};
};

$sql_add_snap = "INSERT INTO pt_snap (
inventory,
size,
drawing,
type,
diameter,
diameter_fact,
melting_num,
flushing_count,
damage,
durability,
position,
user
) VALUES (
'{$inventory}',
'{$size}',
'{$drawing}',
'{$type}',
'{$diameter}',
'{$diameter_fact}',
'{$melting_num}',
'{$flushing_count}',
'{$damage}',
'{$durability}',
'{$position}',
'{$user_login}'
);";
$result_add_snap = mysqli_query($link, $sql_add_snap);
header("location:../../message_page/add_snap_success.php");

?>


