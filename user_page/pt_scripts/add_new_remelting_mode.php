<?php
require_once "../../scripts/database_connect.php";

require_once "../about_user.php";


$real_casting_number = $_POST["real_casting_number"];
$i_casting = $_POST["i_casting"];
$u_casting = $_POST["u_casting"];
$psn_casting = $_POST["psn_casting"];
$notes = $_POST["notes"];
$speed_casting = $_POST["speed_casting"];
$user = $user_surname;
$length_casting = $_POST["length_casting"];

$real_time = date("H:i");

$sql_insert_mode = "INSERT INTO remelting_modes (
real_time,
real_casting_number,
i_casting,
u_casting,
psn_casting,
notes,
speed_casting,
length_casting,
user
) VALUES (
'{$real_time}',
'{$real_casting_number}',
'{$i_casting}',
'{$u_casting}',
'{$psn_casting}',
'{$notes}',
'{$speed_casting}',
'{$length_casting}',
'{$user}'
)";
$result_insert_mode = mysqli_query($link, $sql_insert_mode);


session_start();
$_SESSION["real_casting_number"] = $real_casting_number;

header("location: in_smelting.php");

?>

