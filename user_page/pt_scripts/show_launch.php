<?php
$sql_select_orders = "SELECT id, new_order, size FROM launch_orders";
$result_select_orders = mysqli_query($link, $sql_select_orders);
while ($row_select_orders = mysqli_fetch_array($result_select_orders)) {
	$id_order = $row_select_orders["id"];
	$str_search_array = explode(" ", $row_select_orders["size"]);
	$str_search_array1 = explode("х", $str_search_array[0]);
	$str_search = $str_search_array1[0].$str_search_array1[1].$str_search_array1[2].$str_search_array[1];
	$str_search = mb_strtoupper($str_search);
	$is_card_count = 0;
	$is_pt_snap = "";
	$is_start;
	$is_card = "";
	$sql_is_card = "SELECT id, card_name FROM cards";
	$result_is_card = mysqli_query($link, $sql_is_card);
	while ($row_is_card = mysqli_fetch_array($result_is_card)) {
		$to_search_array = explode("-", $row_is_card["card_name"]);
		$to_search_array1 = explode("х", $to_search_array[1]);
		$to_search_array2 = explode(" ", $to_search_array[2]);
		$to_search = $to_search_array1[0].$to_search_array1[1].$to_search_array1[2].$to_search_array2[0];
		$to_search = mb_strtoupper($to_search);
		if ($to_search == $str_search) {
			$is_card = $row_is_card["id"];
			break;
		};
	};
	if ($is_card != "") {
	$sql_real_card = "SELECT itog_dorn, itog_crist, itog_slag_remelt FROM cards WHERE id=$is_card";
	$result_real_card = mysqli_query($link, $sql_real_card);
	$row_real_card = mysqli_fetch_array($result_real_card);
	$d_dorn = $row_real_card["itog_dorn"];
	$d_krist = $row_real_card["itog_crist"];
	$d_slag = $row_real_card["itog_slag_remelt"];
	} else {
	$d_dorn = 0;
	$d_krist = 0;
	$d_slag = 0;
	};
	$sql_search_pt_snap_dorn = "SELECT inventory, drawing FROM pt_snap WHERE type=\"дорн\" && diameter=$d_dorn";
	$result_search_pt_snap_dorn = mysqli_query($link, $sql_search_pt_snap_dorn);
	$about_dorn = "";
	$i_d = 1;
	while ($row_search_pt_snap_dorn = mysqli_fetch_array($result_search_pt_snap_dorn)) {
		$about_dorn = $about_dorn.$i_d.". инв. № ".$row_search_pt_snap_dorn["inventory"].". По чертежу №".$row_search_pt_snap_dorn["drawing"]."<br>";
		$i_d++;
	};
	if ($about_dorn == "") {
		$is_pt_snap = $is_pt_snap." Дорнов нет<br>";
	} else {
		$is_pt_snap = $is_pt_snap."Дорны:<br>".$about_dorn;
	};
	
	$sql_search_pt_snap_crist = "SELECT inventory, drawing FROM pt_snap WHERE type=\"кристаллизатор\" && diameter=$d_krist";
	$result_search_pt_snap_crist = mysqli_query($link, $sql_search_pt_snap_crist);
	$about_crist = "";
	$i_c = 1;
	while ($row_search_pt_snap_crist = mysqli_fetch_array($result_search_pt_snap_crist)) {
		$about_crist = $about_crist.$i_c.". инв. № ".$row_search_pt_snap_crist["inventory"].". По чертежу №".$row_search_pt_snap_crist["drawing"]."<br>";
		$i_c++;
	};	
	if ($about_crist == "") {
		$is_pt_snap = $is_pt_snap." Кристаллизаторов нет<br>";
	} else {
		$is_pt_snap = $is_pt_snap."Кристаллизаторы:<br>".$about_crist;
	};
	
	$sql_search_pt_snap_slag = "SELECT inventory, drawing FROM pt_snap WHERE type=\"шлаковая надставка\" && diameter=$d_slag";
	$result_search_pt_snap_slag = mysqli_query($link, $sql_search_pt_snap_slag);
	$about_slag = "";
	$i_s = 1;
	while ($row_search_pt_snap_slag = mysqli_fetch_array($result_search_pt_snap_slag)) {
		$about_slag = $about_slag.$i_s.". инв. № ".$row_search_pt_snap_slag["inventory"].". По чертежу №".$row_search_pt_snap_slag["drawing"]."<br>";
		$i_s++;
	};
	if ($about_slag == "") {
		$is_pt_snap = $is_pt_snap." Шлаковых надставок нет<br>";
	} else {
		$is_pt_snap = $is_pt_snap."Шлаковые надставки:<br>".$about_slag;
	};	

	echo "<tr>";
	echo "<td>".$row_select_orders["new_order"]."</td>";
	echo "<td>".$row_select_orders["size"]."</td>";
	echo "<td>";
	if ($is_card != "") {
		echo "<form target=\"_blank\" action=\"pt_scripts/show_card_for_order.php\" method=\"post\"><input type=\"hidden\" name=\"id_card\" value=\"$is_card\"><input style=\"background-color: green;\" type=\"submit\" value=\"\"></form>";
	} else {
		echo "<form action=\"pt_scripts/post_tech_about_card.php\" method=\"post\"><input type=\"hidden\" name=\"str_search\" value=\"".$row_select_orders["size"]."\"><input style=\"background-color: red;\" type=\"submit\" value=\"\"></form>";
	};
	echo "</td>";
	echo "<td>";
	if ($is_card != "") {
		if (stripos($is_pt_snap, "нет") === false) {
			echo "<form target=\"_blank\" action=\"pt_scripts/show_snap_for_order.php\" method=\"post\"><input type=\"hidden\" name=\"is_pt_snap\" value=\"$is_pt_snap\"><input style=\"background-color: green;\" type=\"submit\" value=\"\"></form>";
		} else {
			echo "<form target=\"_blank\" action=\"pt_scripts/show_snap_for_order.php\" method=\"post\"><input type=\"hidden\" name=\"is_pt_snap\" value=\"$is_pt_snap\"><input style=\"background-color: red;\" type=\"submit\" value=\"\"></form>";
		};
	} else {
		echo "<form target=\"_blank\" action=\"pt_scripts/show_snap_for_order.php\" method=\"post\"><input type=\"hidden\" name=\"is_pt_snap\" value=\"$is_pt_snap\"><input style=\"background-color: red;\" type=\"submit\" value=\"\"></form>";
	};
	echo "</td>";
	echo "<td>";
	if ($is_card != "" && stripos($is_pt_snap, "нет") === false) {
		echo "<form action=\"pt_scripts/add_to_melting_order.php\" method=\"post\"><input type=\"hidden\" name=\"id_order\" value=\"$id_order\"><input type=\"hidden\" name=\"id_card\" value=\"$is_card\"><input type=\"hidden\" name=\"is_pt_snap\" value=\"$is_pt_snap\"><input type=\"hidden\" name=\"notes\" value=\"\"><input class=\"button\" style=\"color: green;\" type=\"submit\" value=\"В работу\"></form>";
	} else {
		echo "<form id=\"with-notes\" action=\"pt_scripts/add_to_melting_order.php\" method=\"post\"><input type=\"hidden\" name=\"id_order\" value=\"$id_order\"><input type=\"hidden\" id=\"id_card\" name=\"id_card\" value=\"$is_card\"><input type=\"hidden\" name=\"is_pt_snap\" value=\"$is_pt_snap\"><input type=\"hidden\" name=\"notes\" value=\"\" id=\"notes\"><input id=\"submitFalse\" onclick=\"submitForm()\" class=\"button\" style=\"color: red;\" type=\"button\" value=\"В работу\"></form>";
	};
	echo "</td>";
	echo "<td><form action=\"pt_scripts/remove_launch_order.php\" method=\"post\"><input type=\"hidden\" name=\"id_order\" value=\"$id_order\"><input class=\"button\" type=\"submit\" value=\"Удалить\"></form></td>";
	echo "</tr>";
	$is_card = "";
	$is_card_count = 0;
	$about_dorn = "";
	$about_crist = "";
	$about_slag = "";
	$is_pt_snap = "";
	$i_d = 1;
	$i_c = 1;
	$i_s = 1;
	$id_order = 0;
};
?>