<?php
require_once "../../scripts/database_connect.php";

require_once "../about_user.php";

$size = $_POST["norm"]; 

require_once "calc_card.php";

$itog_casting = $d_real_casting."х".$s_real_casting."х".$l_casting." ".$steel_tube;
$itog_casting_weight = $real_weight_castig;
$itog_d_electrode = $itog_el_diameter;
$itog_qualyti_electrode = $itog_qualiti;
$itog_electrode_length = $l_electrode;
$itog_slag_melting = $m_slag;
$itog_slag_garnisazh = $m_garnisazh;
$itog_alumini = $m_alum;
$itog_d_dorn = $mandrel_set;
$itog_d_crist = $crystallizer_set;
$itog_d_slag_remelting = $slag_remelting_set;
$itog_dorn = $itog_dorn;
$itog_crist = $itog_crist;
$itog_slag_remelting = $itog_slag_remelting;
$itog_doza = round($m_garnisazh / $l_casting * 30, 3) * 1000;
$itog_v = round($l_casting / ($real_weight_castig / 13), 0); 
$itog_u = $itog_horda;
$itog_i = round(($itog_d_dorn + $itog_d_crist) / $itog_u, 1);
$itog_user = $user_surname;
$itog_tube = $d_tube."х".$s_tube."х".$l_tube."-".$steel_tube;

?>
<html>
	<head>
		<style>
		
.norma	{
	width: 700px;
	height: 1000px;
	border: 1px solid black;
	margin: 10px;
	padding: 0;
	position: relative;
}		
ul {
	margin: 0;
	padding: 0;
	list-style-type: none;
}
li {
	margin: 0;
	padding: 0;
}
table {
	border-collapse: collapse;
	margin-left: auto;
	margin-right: auto;
}
td, th {
	margin: 0;
	padding: 0;
	border: 1px solid black;
}
		</style>
	</head>
	<body>
		
		<div class="norma">
			<div class="tube">Норма на выплавку литой заготовки трубы <?php echo $itog_tube;?>, массой <?php echo $weight_tube?> кг.
			</div>
			<div class="casting">Литая заготовка <?php echo $itog_casting;?>, массой <?php echo $real_weight_castig?> кг.
			</div>
			<div class="snap">Технологическая оснастка, применяемая при выплавке:
				<ul>
					<li>
						Дорн диаметром - <?php echo $itog_d_dorn;?> мм (чертежи - <?php echo $itog_dorn;?>)
					</li>
					<li>
						Кристаллизатор диаметром - <?php echo $itog_d_crist;?> мм (чертежи - <?php echo $itog_crist;?>)
					</li>
					<li>
						Шлаковая надставка диаметром - <?php echo $itog_d_slag_remelting;?> мм (чертежи - <?php echo $itog_slag_remelting;?>)
					</li>
				</ul>
			</div>
			<div class="material">
				Расход материалов на выплавку одной трубной заготовки:<br>
				<table>
					<tr>
						<th>№ п/п</th>
						<th>Материал</th>
						<th>НТД</th>
						<th>Расход</th>
						<th>ед. изм.</th>
					</tr>
<?php
$n = 1;
$sql_material = "SELECT 
material,
standart,
norma,
unit
FROM material";
$result_material = mysqli_query($link, $sql_material);
while ($row_material = mysqli_fetch_array($result_material)) {
	echo "<tr>";
	echo "<td>".$n."</td>";
	echo "<td>".$row_material["material"]."</td>";
	echo "<td>".$row_material["standart"]."</td>";
	echo "<td>".$row_material["norma"]."</td>";
	echo "<td>".$row_material["unit"]."</td>";
	echo "</tr>";
	$n++;
};
?>
				</table>
			</div>
		</div>
		
	</body>
</html>