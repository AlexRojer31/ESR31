<?php
require_once "../../scripts/database_connect.php";

require_once "../about_user.php";

$id_order = $_POST["id_order"];
$id_card = $_POST["id_card"];
$is_pt_snap = $_POST["is_pt_snap"];
$notes = $_POST["notes"];

$sql_order = "SELECT new_order, size FROM launch_orders WHERE id=$id_order";
$result_order = mysqli_query($link, $sql_order);
$row_order = mysqli_fetch_array($result_order);
$size_order = $row_order["size"];

$size_order_array = explode(" ", $size_order);
$type_size_order_array = explode("х", $size_order_array[0]);
$d_size = $type_size_order_array[0] / 1000;
$s_size = $type_size_order_array[1] / 1000; 
$l_size =  $type_size_order_array[2] / 1000;

$num_order = $row_order["new_order"];
$steel = $size_order_array[1]."Ш";
$size = $size_order_array[0];
$weight_tube = round(3.14 * $s_size * ($d_size - $s_size) * $l_size * 7850 + 1, 0);

$sql_card = "SELECT itog_casting FROM cards WHERE id=$id_card";
$result_card = mysqli_query($link, $sql_card) or die("Отсутствует технологическая карта");
$row_card = mysqli_fetch_array($result_card);

$size_casting_plan_array = explode(" ", $row_card["itog_casting"]);
$size_casting_plan = $size_casting_plan_array[0];
$weight_casting_plan = substr($size_casting_plan_array[3], 1);

$sql_add_smelting = "INSERT INTO smelting (
num_order,
size,
steel,
weight_tube,
size_casting_plan,
weight_casting_plan,
user,
notes,
is_card,
is_pt_snap
) VALUES (
'{$num_order}',
'{$size}',
'{$steel}',
'{$weight_tube}',
'{$size_casting_plan}',
'{$weight_casting_plan}',
'{$user_login}',
'{$notes}',
'{$id_card}',
'{$is_pt_snap}'
)";
$result_add_smelting = mysqli_query($link, $sql_add_smelting) or die(mysqli_error($link));

$sql_remove_launch_orders = "DELETE FROM launch_orders WHERE id=$id_order";
$result_remove_launch_orders = mysqli_query($link, $sql_remove_launch_orders);


header("location:../master.php");


?>
<!--
id 
num_order 
size 
steel 
weight_tube 
casting_number 
size_casting_plan 
weight_casting_plan 
d_max_casting 
d_min_casting 
s_max_casting 
s_min_casting 
l_casting 
curvature_casting 
size_casting_fact 
weight_casting_fact 
i_average 
u_average 
r_average 
p_average 
p_w_average 
start_smelting 
end_smelting 
notes 
furnace_num 
d_electrod 
q_electrod 
l_electrod 
electrod_config 
slag_start 
slag_doz 
alumin 
year_num 
inventory_dorn 
inventory_crist 
inventory_slag 
user
is_card
is_pt_snap 