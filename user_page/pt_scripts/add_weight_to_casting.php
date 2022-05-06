<?php
require_once "../../scripts/database_connect.php";

require_once "../about_user.php";

$real_casting_number = $_POST["real_casting_number"];
$weight_casting_fact = $_POST["weight_casting_fact"];
$notes = $_POST["notes"];

//echo $real_casting_number."<br>".$weight_casting_fact."<br>";

$sql_note_smalteng = "SELECT notes, p_average, time_casting FROM smelting WHERE real_casting_number='{$real_casting_number}'";
$result_note_smelting = mysqli_query($link, $sql_note_smalteng);
$row_note_smelting = mysqli_fetch_array($result_note_smelting);
$notes_in_ram = $row_note_smelting["notes"];
$p_average = $row_note_smelting["p_average"];
$time_casting = $row_note_smelting["time_casting"];

$new_note = $notes_in_ram."<hr>".$notes;
$p_w_average = round($p_average * ($time_casting / 60) / ($weight_casting_fact / 1000), 0);

//echo $new_note." ".$p_w_average;

$sql_update_smelting = "UPDATE smelting SET
p_w_average = '{$p_w_average}',
weight_casting_fact = '{$weight_casting_fact}',
notes = '{$new_note}'
WHERE real_casting_number='{$real_casting_number}'";
$result_update_smelting = mysqli_query($link, $sql_update_smelting);

header("location: ../master.php");


?>