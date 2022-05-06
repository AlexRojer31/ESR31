<?php

$serch_card_length = count($result_search_cards);

echo "<table class=\"search-table\">
<tr>
<th>Типоразмер</th>
<th>Отливка</th>
<th>Действия</th>
</tr>
";
for ($i = 0; $i < $serch_card_length; $i++) {
	$id = $result_search_cards[$i];
	$sql_search_card = "SELECT card_name, itog_casting FROM cards WHERE id=$id;"; 
	$result_search_card = mysqli_query($link, $sql_search_card);
	$row_search_card = mysqli_fetch_array($result_search_card);
	if ($row_search_card[0] == "") {
		break;
	};
	echo "<tr>
	<td>".$row_search_card["card_name"]."</td>
	<td>".$row_search_card["itog_casting"]."</td>
	<td>
	<form action=\"technologist/show_card.php\" method=\"post\" target=\"blank\">
		<input type=\"hidden\" name=\"id\" value=\"$id\">
		<input type=\"hidden\" name=\"page\" value=\"technologist\">
		<input type=\"submit\" value=\"Изменить\">
	</form>
	</td>
	</tr>";
};
echo "</table>";

?>