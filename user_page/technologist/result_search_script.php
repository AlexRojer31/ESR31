<?php

$serch_array_length = count($result_search_array);

echo "<table class=\"search-table\">
<tr>
<th>Типоразмер</th>
<th>Чертеж</th>
<th>Тип</th>
<th>Диаметр</th>
<th>Действия</th>
</tr>
";
for ($i = 0; $i < $serch_array_length; $i++) {
	$id = $result_search_array[$i];
	$sql_search = "SELECT size, drawing, type, diameter FROM snap WHERE id=$id;"; 
	$result_search = mysqli_query($link, $sql_search);
	$row_search = mysqli_fetch_array($result_search);
	if ($row_search[0] == "") {
		break;
	};
	echo "<tr>
	<td>".$row_search["size"]."</td>
	<td>".$row_search["drawing"]."</td>
	<td>".$row_search["type"]."</td>
	<td>".$row_search["diameter"]."</td>
	<td>";
	if ($page_title != "технолог") {
		echo "Нет";
	} else {
	echo "<form action=\"technologist/remove_snap.php\" method=\"post\">
		<input type=\"hidden\" name=\"id\" value=\"$id\">
		<input type=\"hidden\" name=\"page\" value=\"technologist\">
		<input type=\"submit\" value=\"Удалить\">
	</form>";
	};
	echo "</td>
	</tr>";
};
echo "</table>";

?>
