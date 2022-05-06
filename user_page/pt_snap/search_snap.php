<?php
require_once "../../scripts/database_connect.php";

require_once "../about_user.php";

$search = $_POST["search"];
$page = $_POST["page"];

$search = mb_strtoupper($search);
$serch_array = [];
$i = 0;
$sql_pt_snap = "SELECT id, inventory, size, drawing, diameter, type FROM pt_snap";
$result_pt_snap = mysqli_query($link, $sql_pt_snap);
while ($row_pt_snap = mysqli_fetch_array($result_pt_snap)) {
	$id = $row_pt_snap["id"];
	$inventory = mb_strtoupper($row_pt_snap["inventory"]);
	$size = mb_strtoupper($row_pt_snap["size"]);
	$drawing = mb_strtoupper($row_pt_snap["drawing"]);
	$diameter = mb_strtoupper($row_pt_snap["diameter"]);
	$type = mb_strtoupper($row_pt_snap["type"]);
	$search_pos = stripos($inventory, $search);
	if ($search_pos === FALSE) {
		$search_pos = stripos($size, $search);
		if ($search_pos === FALSE) {
		$search_pos = stripos($drawing, $search);
			if ($search_pos === FALSE) {
			$search_pos = stripos($diameter, $search);
				if ($search_pos === FALSE) {
				$search_pos = stripos($type, $search);
					if ($search_pos === FALSE) {
					} else {$serch_array[$i] = $id; $i++;};	
				} else {$serch_array[$i] = $id; $i++;};
			} else {$serch_array[$i] = $id; $i++;};
		} else {$serch_array[$i] = $id; $i++;};
	} else {$serch_array[$i] = $id; $i++;};
};
session_start();
$_SESSION["search_array"] = $serch_array;

header("location:../$page.php");
?>

