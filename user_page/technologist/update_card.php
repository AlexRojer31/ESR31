<?php
require_once "../../scripts/database_connect.php";

require_once "../about_user.php";

$id = $_POST["id"];
$page = $_POST["page"]; 

$card_name = $_POST["card_name"];
$itog_i = $_POST["itog_i"];
$itog_i_start = $_POST["itog_i_start"];
$itog_i_start_end = $_POST["itog_i_start_end"];
$itog_i_normal_start = $_POST["itog_i_normal_start"];
$itog_i_normal_end = $_POST["itog_i_normal_end"];
$itog_i_normal_start_st = $_POST["itog_i_normal_start_st"];
$itog_i_normal_start_end = $_POST["itog_i_normal_start_end"];
$itog_u = $_POST["itog_u"];
$itog_u_min = $_POST["itog_u_min"];
$itog_u_max = $_POST["itog_u_max"];
$itog_casting = $_POST["itog_casting"];
$itog_d_el = $_POST["itog_d_el"];
$itog_q_el = $_POST["itog_q_el"];
$itog_len_el = $_POST["itog_len_el"];
$itog_r_slag = $_POST["itog_r_slag"];
$itog_doz_slag = $_POST["itog_doz_slag"];
$itog_alum = $_POST["itog_alum"];
$itog_dorn = $_POST["itog_dorn"];
$itog_dorn_num = $_POST["itog_dorn_num"];
$itog_crist = $_POST["itog_crist"];
$itog_crist_num = $_POST["itog_crist_num"];
$itog_slag_remelt = $_POST["itog_slag_remelt"];
$itog_slag_remelt_num = $_POST["itog_slag_remelt_num"];
$itog_doza = $_POST["itog_doza"];
$itog_v_start = $_POST["itog_v_start"];
$itog_v = $_POST["itog_v"];
$itog_user = $_POST["itog_user"];
$card_name_bottom = $_POST["card_name_bottom"];
$itog_steel = $_POST["itog_steel"];
$itog_horda = $_POST["itog_horda"];

$sql_card = "UPDATE cards SET 
card_name = '{$card_name}',
itog_i = '{$itog_i}',
itog_i_start = '{$itog_i_start}',
itog_i_start_end = '{$itog_i_start_end}',
itog_i_normal_start = '{$itog_i_normal_start}',
itog_i_normal_end = '{$itog_i_normal_end}',
itog_i_normal_start_st = '{$itog_i_normal_start_st}',
itog_i_normal_start_end = '{$itog_i_normal_start_end}',
itog_u = '{$itog_u}',
itog_u_min = '{$itog_u_min}',
itog_u_max = '{$itog_u_max}',
itog_casting = '{$itog_casting}',
itog_d_el = '{$itog_d_el}',
itog_q_el = '{$itog_q_el}',
itog_len_el = '{$itog_len_el}',
itog_r_slag = '{$itog_r_slag}',
itog_doz_slag = '{$itog_doz_slag}',
itog_alum = '{$itog_alum}',
itog_dorn = '{$itog_dorn}',
itog_dorn_num = '{$itog_dorn_num}',
itog_crist = '{$itog_crist}',
itog_crist_num = '{$itog_crist_num}',
itog_slag_remelt = '{$itog_slag_remelt}',
itog_slag_remelt_num = '{$itog_slag_remelt_num}',
itog_doza = '{$itog_doza}',
itog_v_start = '{$itog_v_start}',
itog_v = '{$itog_v}',
itog_user = '{$itog_user}',
card_name_bottom = '{$card_name_bottom}',
itog_steel = '{$itog_steel}',
itog_horda = '{$itog_horda}'
WHERE id='{$id}'
";

$result_sql = mysqli_query($link, $sql_card) or die("error ".mysqli_error($link));

header("location:../$page.php");

?>