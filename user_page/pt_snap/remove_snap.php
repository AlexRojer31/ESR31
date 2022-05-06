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


$sql_update_pt_snap = "DELETE FROM pt_snap 
WHERE
id='{$id}'
";
$result_update_pt_snap = mysqli_query($link, $sql_update_pt_snap);

$sql_update_pt_snap_remove = "INSERT INTO pt_snap_remove (
inventory,
drawing,
type,
melting_num,
user
) VALUES (
'{$inventory}',
'{$drawing}',
'{$type}',
'{$melting_num}',
'{$user_login}'
)";
$result_updae_pt_snap_remove = mysqli_query($link, $sql_update_pt_snap_remove);

?>

<script>
'use strict'

window.close();

</script>
