<?php
require_once "../../scripts/database_connect.php";

require_once "../about_user.php";

$search = $_POST["search"];
$page = $_POST["page"];

$search = mb_strtoupper($search);
$search_array = explode("*", $search);

$result_search_cards = [];
$j = 0;

$sql_search = "SELECT 
id,
card_name
FROM cards";
$result_search = mysqli_query($link, $sql_search);
while ($row_search = mysqli_fetch_array($result_search)) {
	$str_search = $row_search[1];
	$count_search = 0;
	for ($i = 0; $i < count($search_array); $i++) {
		if (strripos(mb_strtoupper($str_search), $search_array[$i]) === FALSE) {
			
		} else {
			$count_search = $count_search + 1;
		};
	};
	if ($count_search == count($search_array)) {
		$result_search_cards[$j] = $row_search[0]; 
		$j++;
	};
};


session_start();
$_SESSION["result_search_cards"] = $result_search_cards;

header("location:../$page.php");

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