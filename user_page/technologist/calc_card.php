<?php
$size_and_steel = explode(" ", $size);

$size_dsl = explode("х", $size_and_steel[0]);

$d_tube = $size_dsl[0];
$s_tube = $size_dsl[1];
$l_tube = $size_dsl[2];
$density = 7850;

$steel_tube = $size_and_steel[1]." Ш";
$steel_tube = mb_strtoupper($steel_tube);

$weight_tube = 3.14 * ($s_tube/1000) * (($d_tube/1000) - ($s_tube/1000)) * ($l_tube/1000) * $density;
$weight_tube = round($weight_tube, 0) + 1;

//echo "Диамаетр трубы - ".$d_tube."<br>Толщина стенки трубы - ".$s_tube."<br>Длина трубы - ".$l_tube."<br> Марка стали - ".$steel_tube."<br>";
//echo "Массой - ".$weight_tube."<br><hr>";

$d_casting = $d_tube + 20;
$s_casting = $s_tube + 20; 
$l_casting = $l_tube + 250;

$middle_d_casting = ($d_casting * 1.1 + $d_casting * 0.98) / 2;
$middle_s_casting = ($s_casting * 1.1 + $s_casting * 0.98) / 2;

$weight_casting = 3.14 * ($middle_s_casting/1000) * (($middle_d_casting/1000) - ($middle_s_casting/1000)) * ($l_casting/1000) * $density;
$weight_casting = round($weight_casting, 0) + 1;

//echo "Диамаетр отливки - ".$d_casting."<br>Толщина стенки отливки - ".$s_casting."<br>Длина отливки - ".$l_casting;
//echo "<br>Массой - ".$weight_casting."<br><hr>";

//нужно получить данные для оснастки потребной 

$d_crystallizer = $d_casting * 1.02;
$d_crystallizer = round($d_crystallizer, 0) + 1;
$d_mandrel = ($d_casting - 2 * $s_casting) * 1.025;
$d_mandrel = round($d_mandrel, 0) + 3;
$d_slag_remelting = $d_crystallizer + 110;

/*echo "
Потребная оснастка: <br>
Диаметр дорна - ".$d_mandrel."<br>
Диаметр кристаллизатора - ".$d_crystallizer."<br>
Диаметр шлаковой - ".$d_slag_remelting."<br><hr>
";
*/
//выполним подбор оснастки

$sql_snap = "SELECT 
id,
size,
drawing,
type,
diameter
FROM snap";
$result_snap = mysqli_query($link, $sql_snap);

$mandrel_array = [];
$crystallizer_array = [];
$slag_remelting_array = [];
$i = 0;
$j = 0;
$k = 0;

while ($row_snap = mysqli_fetch_array($result_snap)) {
	if ($row_snap["type"] == "дорн") {
		if ($row_snap["diameter"] <= $d_mandrel) {
			$mandrel_array[$i] = $row_snap["diameter"];
			$i++;
		};
	};
	if ($row_snap["type"] == "кристаллизатор") {
		if ($row_snap["diameter"] >= $d_crystallizer) {
			$crystallizer_array[$j] = $row_snap["diameter"];
			$j++;
		};
	};
	if ($row_snap["type"] == "шлаковая надставка") {
		if ($row_snap["diameter"] >= $d_slag_remelting) {
			$slag_remelting_array[$k] = $row_snap["diameter"];
			$k++;
		};
	};
};


$mandrel_set = 0;
$crystallizer_set = 10000;
$slag_remelting_set = 10000;

for ($i = 0; $i < count($mandrel_array); $i++) {
	if ($mandrel_array[$i] > $mandrel_set) {
		$mandrel_set = $mandrel_array[$i];
	} else {
		$mandrel_set = $mandrel_set;
	};
};
for ($i = 0; $i < count($crystallizer_array); $i++) {
	if ($crystallizer_array[$i] < $crystallizer_set) {
		$crystallizer_set = $crystallizer_array[$i];
	} else {
		$crystallizer_set = $crystallizer_set;
	};
};
for ($i = 0; $i < count($slag_remelting_array); $i++) {
	if ($slag_remelting_array[$i] < $slag_remelting_set) {
		$slag_remelting_set = $slag_remelting_array[$i];
	} else {
		$slag_remelting_set = $slag_remelting_set;
	};
};

//echo "Оснастка которая есть: <br>";
//echo "Диаметр дорна ".$mandrel_set."<br>";
//echo "Диаметр кристаллизатора ".$crystallizer_set."<br>";
//echo "Диаметр шлаковой ".$slag_remelting_set."<br>";

$d_real_casting = round($crystallizer_set / 1.02 - 1, 0) - 4;
$s_real_casting = round(($d_real_casting - round($mandrel_set / 1.025 - 5, 0)) / 2, 0) - 4;
$real_weight_castig = 3.14 * ($s_real_casting/1000) * (($d_real_casting/1000) - ($s_real_casting/1000)) * ($l_casting/1000) * $density;
$real_weight_castig = round($real_weight_castig, 0) + 1;

//echo $d_real_casting."х".$s_real_casting."х".$l_casting." ".$steel_tube;
//echo "<br>".$real_weight_castig."<hr>";

$itog_dorn;
$itog_crist;
$itog_slag_remelting;
$sql_crystallizer_set = "SELECT
drawing
FROM snap
WHERE
diameter=$crystallizer_set
";
$result_crystallizer_set = mysqli_query($link, $sql_crystallizer_set);
//echo "Допускаемые кристаллизаторы: <br>";
while ($row_crystallizer_set = mysqli_fetch_array($result_crystallizer_set)) {
	$itog_crist = $itog_crist.$row_crystallizer_set["drawing"]." ";
	//echo $row_crystallizer_set["drawing"]."<br>";
};
$sql_mandrel_set = "SELECT
drawing
FROM snap
WHERE
diameter=$mandrel_set
";
$result_mandrel_set = mysqli_query($link, $sql_mandrel_set);
//echo "Допускаемые дорны: <br>";
while ($row_mandrel_set = mysqli_fetch_array($result_mandrel_set)) {
	$itog_dorn = $itog_dorn.$row_mandrel_set["drawing"]." ";
	//echo $row_mandrel_set["drawing"]."<br>";
};
$sql_slag_remelting_set = "SELECT
drawing
FROM snap
WHERE
diameter=$slag_remelting_set
";
$result_slag_remelting_set = mysqli_query($link, $sql_slag_remelting_set);
//echo "Допускаемые шлаковые: <br>";
while ($row_slag_remelting_set = mysqli_fetch_array($result_slag_remelting_set)) {
	$itog_slag_remelting = $itog_slag_remelting.$row_slag_remelting_set["drawing"]." ";
	//echo $row_slag_remelting_set["drawing"]."<br>";
};
//echo "<hr>";



$middle_diameter = round(($crystallizer_set + $mandrel_set) / 2, 0);
$square_casting =  3.14 * ($s_real_casting/1000) * (($d_real_casting/1000) - ($s_real_casting/1000));


$d_electrode = 0.08;
$d_electrode_m = $d_electrode * 1000;
$qualiti_electrode = 0;
$horda = 100000;
while ($horda > 50) {
	$qualiti_electrode = $qualiti_electrode + 2;
	$alfa = 360 / $qualiti_electrode;
	$horda = round($middle_diameter * sin(deg2rad($alfa / 2)), 0) - $d_electrode_m;
	if ($horda <= 50) {
		$qualiti_electrode = $qualiti_electrode - 2;
		$alfa = 360 / $qualiti_electrode;
		$horda = round($middle_diameter * sin(deg2rad($alfa / 2)), 0) - $d_electrode_m;
		break;	
	};
};
$square_electrodes = $qualiti_electrode * 3.14 * $d_electrode * $d_electrode / 4;
$kz = round($square_electrodes / $square_casting, 2) * 100;

$qualiti_electrode_90 = 0;
$d_electrode_90 = 0.09;
$d_electrode_90_m = $d_electrode_90 * 1000;
$horda_90 = 100000;
while ($horda_90 > 50) {
	$qualiti_electrode_90 = $qualiti_electrode_90 + 2;
	$alfa = 360 / $qualiti_electrode_90;
	$horda_90 = round($middle_diameter * sin(deg2rad($alfa / 2)), 0) - $d_electrode_90_m;
	if ($horda_90 <= 50) {
		$qualiti_electrode_90 = $qualiti_electrode_90 - 2;
		$alfa = 360 / $qualiti_electrode_90;
		$horda_90 = round($middle_diameter * sin(deg2rad($alfa / 2)), 0) - $d_electrode_90_m;
		break;	
	};
};
$square_electrodes_90 = $qualiti_electrode_90 * 3.14 * $d_electrode_90 * $d_electrode_90 / 4;
$kz_90 = round($square_electrodes_90 / $square_casting, 2) * 100;

if ($kz_90 > $kz) {
	if ($kz_90 < 85) {
		$itog_kz = $kz_90;
		$itog_qualiti = $qualiti_electrode_90;
		$itog_el_diameter = $d_electrode_90_m;
		$itog_horda = $horda_90;
	} else {
		$itog_kz = $kz;
		$itog_qualiti = $qualiti_electrode;
		$itog_el_diameter = $d_electrode_m;
		$itog_horda = $horda;
	};
} else {
	if ($kz < 85) {
		$itog_kz = $kz;
		$itog_qualiti = $qualiti_electrode;
		$itog_el_diameter = $d_electrode_m;
		$itog_horda = $horda;
	} else {
		$itog_kz = $kz_90;
		$itog_qualiti = $qualiti_electrode_90;
		$itog_el_diameter = $d_electrode_90_m;
		$itog_horda = $horda_90;
	};	
};

//echo $itog_qualiti." электродов Ф - ".$itog_el_diameter." мм, через каждые ".$itog_horda." мм. коэф. зап. -".$itog_kz."%<br>";

$l_electrode = round($l_casting / ($itog_kz / 100), 0);
$l_electrode = round($l_electrode / 100, 0) * 100 + 2100;

//echo "Потребная длина расходуемого электрода: ".$l_electrode." мм. <br><hr>";

// рассчитаем количество материалов необходимое на плавку.
$d_nar_casting = $d_real_casting / 1000;
$d_vn_casting = ($d_real_casting - 2 * $s_real_casting) / 1000;

$d_nar_garnisazh = $d_nar_casting + 0.005;
$d_vn_garnisazh = $d_vn_casting - 0.005;

$s_nar_garnisazh = (3.14 / 4) * ($d_nar_garnisazh - $d_nar_casting) * ($d_nar_garnisazh + $d_nar_casting);
$s_vn_garnisazh = (3.14 / 4) * ($d_vn_casting - $d_vn_garnisazh) * ($d_vn_casting + $d_vn_garnisazh);

$m_garnisazh = ($l_casting / 1000) * ($s_nar_garnisazh + $s_vn_garnisazh) * 2700;
$m_garnisazh = round($m_garnisazh, 0) + 1;

$m_slag_sg = (3.14 / 4) * ($slag_remelting_set / 1000 - ($mandrel_set - 115) / 1000) * ($slag_remelting_set / 1000 + ($mandrel_set - 115) / 1000) * 0.11 * 3000;
$m_slag_sg = round($m_slag_sg, 0) + 1;

$m_slag_dk = (3.14 / 4) * (($crystallizer_set - $mandrel_set) / 1000) * (($crystallizer_set + $mandrel_set) / 1000) * 0.08 * 3000;
$m_slag_dk = round($m_slag_dk, 0) + 1;

$m_slag = $m_slag_sg + $m_slag_dk;

//echo "Потребность во флюсе на расплав ".$m_slag. " кг<br>";
//echo "Потребность во флюсе на гарнисаж ".$m_garnisazh." кг<br>";

$sql_material = "SELECT norma FROM material WHERE material='Порошок алюминиевый АПВ'";
$result_material = mysqli_query($link, $sql_material);
$row_material = mysqli_fetch_array($result_material);

$m_alum = round($real_weight_castig * $row_material["norma"] / 1000, 1);

//echo "Потребность в алюминие ".$m_alum." кг<br>";

?>