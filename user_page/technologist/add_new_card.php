<?php
require_once "../../scripts/database_connect.php";

require_once "../about_user.php";

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

$coun_card_name = 0;
$sql_is_card = "SELECT card_name FROM cards";
$result_is_card = mysqli_query($link, $sql_is_card);
while ($row_is_card = mysqli_fetch_array($result_is_card)) {
	if ($row_is_card["card_name"] == $card_name) {
		$coun_card_name = $coun_card_name + 1;
	};
};
if ($coun_card_name > 0) {
	header("location: ../../error_page/add_new_card_error.php?inventory=$card_name");
	exit;
};

$dql_add_card = "INSERT INTO cards (
card_name,
itog_i,
itog_i_start,
itog_i_start_end,
itog_i_normal_start,
itog_i_normal_end,
itog_i_normal_start_st,
itog_i_normal_start_end,
itog_u,
itog_u_min,
itog_u_max,
itog_casting,
itog_d_el,
itog_q_el,
itog_len_el,
itog_r_slag,
itog_doz_slag,
itog_alum,
itog_dorn,
itog_dorn_num,
itog_crist,
itog_crist_num,
itog_slag_remelt,
itog_slag_remelt_num,
itog_doza,
itog_v_start,
itog_v,
itog_user,
card_name_bottom,
itog_steel,
itog_horda
) VALUES (
'{$card_name}',
'{$itog_i}',
'{$itog_i_start}',
'{$itog_i_start_end}',
'{$itog_i_normal_start}',
'{$itog_i_normal_end}',
'{$itog_i_normal_start_st}',
'{$itog_i_normal_start_end}',
'{$itog_u}',
'{$itog_u_min}',
'{$itog_u_max}',
'{$itog_casting}',
'{$itog_d_el}',
'{$itog_q_el}',
'{$itog_len_el}',
'{$itog_r_slag}',
'{$itog_doz_slag}',
'{$itog_alum}',
'{$itog_dorn}',
'{$itog_dorn_num}',
'{$itog_crist}',
'{$itog_crist_num}',
'{$itog_slag_remelt}',
'{$itog_slag_remelt_num}',
'{$itog_doza}',
'{$itog_v_start}',
'{$itog_v}',
'{$itog_user}',
'{$card_name_bottom}',
'{$itog_steel}',
'{$itog_horda}'
)";
$result_add_card = mysqli_query($link, $dql_add_card);

header("location: ../../message_page/add_new_card_success.php");

?>
<!--
card_name
itog_i
itog_i_start
itog_i_start_end
itog_i_normal_start
itog_i_normal_end
itog_i_normal_start_st
itog_i_normal_start_end
itog_u
itog_u_min
itog_u_max
itog_casting
itog_d_el
itog_q_el
itog_len_el
itog_r_slag
itog_doz_slag
itog_alum
itog_dorn
itog_dorn_num
itog_crist
itog_crist_num
itog_slag_remelt
itog_slag_remelt_num
itog_doza
itog_v_start
itog_v
itog_user
card_name_bottom
itog_steel
-->