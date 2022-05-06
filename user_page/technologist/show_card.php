<?php
require_once "../../scripts/database_connect.php";

require_once "../about_user.php";

$id = $_POST["id"];

$sql_card = "SELECT 
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
FROM cards WHERE id='{$id}';
";
$result_card = mysqli_query($link, $sql_card);
$row_card = mysqli_fetch_array($result_card);
$card_name = $row_card["card_name"];
$itog_i = $row_card["itog_i"];
$itog_i_start = $row_card["itog_i_start"];
$itog_i_start_end = $row_card["itog_i_start_end"];
$itog_i_normal_start = $row_card["itog_i_normal_start"];
$itog_i_normal_end = $row_card["itog_i_normal_end"];
$itog_i_normal_start_st = $row_card["itog_i_normal_start_st"];
$itog_i_normal_start_end = $row_card["itog_i_normal_start_end"];
$itog_u = $row_card["itog_u"];
$itog_u_min = $row_card["itog_u_min"];
$itog_u_max = $row_card["itog_u_max"];
$itog_casting = $row_card["itog_casting"];
$itog_d_el = $row_card["itog_d_el"];
$itog_q_el = $row_card["itog_q_el"];
$itog_len_el = $row_card["itog_len_el"];
$itog_r_slag = $row_card["itog_r_slag"];
$itog_doz_slag = $row_card["itog_doz_slag"];
$itog_alum = $row_card["itog_alum"];
$itog_dorn = $row_card["itog_dorn"];
$itog_dorn_num = $row_card["itog_dorn_num"];
$itog_crist = $row_card["itog_crist"];
$itog_crist_num = $row_card["itog_crist_num"];
$itog_slag_remelt = $row_card["itog_slag_remelt"];
$itog_slag_remelt_num = $row_card["itog_slag_remelt_num"];
$itog_doza = $row_card["itog_doza"];
$itog_v_start = $row_card["itog_v_start"];
$itog_v = $row_card["itog_v"];
$itog_user = $row_card["itog_user"];
$card_name_bottom = $row_card["card_name_bottom"];
$itog_steel = $row_card["itog_steel"];
$itog_horda = $row_card["itog_horda"];

$casting = explode("-", $card_name);
$casting_size = explode("х", $casting[1]);
$l_casting = $casting_size[2] + 250;

?>
<head>
		<meta name="viewport" content="max-width=1600px, initial-scale=1">
		<link rel="stylesheet" href="../../style/card.css">
		<style>
.submit {
	display: inline-block;
	margin-right: 20px;
	padding: 5px 20px;
	font-family: "GOST type A";
	font-style: oblique;
	font-size: 18px;
	border: 1px solid black;
	color: black;
	text-transform: uppercase;
	margin-left: 20px;
	transition: 0.5s;
}
.submit:hover {
	background-color: black;
	color: white;
	cursor: pointer;
	transition: 0.5s;
}
		</style>
</head>
<body>
<form action="update_card.php" method="post">
<input type="hidden" name="id" value="<?php echo $id?>">
<input type="hidden" name="page" value="technologist">
<div class="ramka">
	<div class="top-block">
		<span><input type="text" name="card_name" id="card_name" value="<?php echo $card_name;?>"></span>
	</div>
	
	<div class="left-block">
	</div>
	
	<div class="esr-block">
		<h3>Режимы электрошлаковой выплавки:</h3>
		<div class="i-block">
			<h4>Сила тока, кА (I<sub>ср</sub> - <input type="text" name="itog_i" id="itog_i" value="<?php echo $itog_i;?>">)</h4>
			<p>1. <b>Режим старта</b>. Стартовый ток установить в пределах <input type="text" name="itog_i_start" id="itog_i_start" value="<?php echo $itog_i_start;?>"> - <input type="text" name="itog_i_start_end" id="itog_i_start_end" value="<?php echo $itog_i_start_end;?>"> кА.
			Поддерживать его в период 100-150 мм с последующим переходом на режим плавки</p>
			<p>2. <b>Режим плавки</b>. Ток плавки установить в пределах <input type="text" name="itog_i_normal_start" id="itog_i_normal_start" value="<?php echo $itog_i_normal_start;?>"> - <input type="text" name="itog_i_normal_end" id="itog_i_normal_end" value="<?php echo $itog_i_normal_end;?>"> кА.</p>
			<p>3. <b>Режим выводки</b>. За <input type="text" name="itog_horda" id="itog_horda" value="<?php echo $itog_horda;?>"> мм до остановки плавки выполнить снижение тока
			 с <input type="text" name="itog_i_normal_start_st" id="itog_i_normal_start_st" value="<?php echo $itog_i_normal_start_st;?>"> до <input type="text" name="itog_i_normal_start_end" id="itog_i_normal_start_end" value="<?php echo $itog_i_normal_start_end;?>"> кА.</p>
		</div>
		<div class="u-block">
			<h4>Напряжение, В (U<sub>ср</sub> - <input type="text" name="itog_u" id="itog_u" value="<?php echo $itog_u;?>">)</h4>
			<p>Выдерживать напряжение от <input type="text" name="itog_u_min" id="itog_u_min" value="<?php echo $itog_u_min;?>"> до <input type="text" name="itog_u_max" id="itog_u_max" value="<?php echo $itog_u_max;?>"> В.</p>
		</div>
	</div>
	
	<div class="about-block">
		Технологическая карта выплавки<br>
		литой заготовки - <input type="text" name="itog_casting" id="itog_casting" value="<?php echo $itog_casting;?>">
	</div>
		
	<div class="material-block">
		<h3>Материалы, необходимые к выплавке:</h3>
		<table>
			<tr>
				<th>№ п/п</th>
				<th>Наименование</th>
				<th>Количество</th>
				<th>Ед. Изм.</th>
			</tr>
			<tr>
				<td>1</td>
				<td>Диаметр РЭ</td>
				<td><input type="text" name="itog_d_el" id="itog_d_el" value="<?php echo $itog_d_el;?>"></td>
				<td>мм</td>
			</tr>
			<tr>
				<td>2</td>
				<td>Количество элементов РЭ</td>
				<td><input type="text" name="itog_q_el" id="itog_q_el" value="<?php echo $itog_q_el;?>"></td>
				<td>шт.</td>
			</tr>
			<tr>
				<td>3</td>
				<td>Длина РЭ (от торца плиты)</td>
				<td><input type="text" name="itog_len_el" id="itog_len_el" value="<?php echo $itog_len_el;?>"></td>
				<td>мм</td>
			</tr>
			<tr>
				<td>4</td>
				<td>Флюса АНФ-29 на расплав</td>
				<td><input type="text" name="itog_r_slag" id="itog_r_slag" value="<?php echo $itog_r_slag;?>"></td>
				<td>кг</td>
			</tr>
			<tr>
				<td>5</td>
				<td>Флюса АНФ-29 на дозаторы</td>
				<td><input type="text" name="itog_doz_slag" id="itog_doz_slag" value="<?php echo $itog_doz_slag;?>"></td>
				<td>кг</td>
			</tr>
			<tr>
				<td>6</td>
				<td>Алюминия АПВ на плавку</td>
				<td><input type="text" name="itog_alum" id="itog_alum" value="<?php echo $itog_alum;?>"></td>
				<td>кг</td>
			</tr>
			<tr>
				<td>7</td>
				<td>Дорн</td>
				<td>Ф <input type="text" name="itog_dorn" id="itog_dorn" value="<?php echo $itog_dorn;?>"> мм</td>
				<td>Доспутные чертежи:<br>
				<input type="text" name="itog_dorn_num" id="itog_dorn_num" value="<?php echo $itog_dorn_num;?>">
				</td>
			</tr>
			<tr>
				<td>8</td>
				<td>Кристаллизатор</td>
				<td>Ф <input type="text" name="itog_crist" id="itog_crist" value="<?php echo $itog_crist;?>"> мм</td>
				<td>Доспутные чертежи:<br>
				<input type="text" name="itog_crist_num" id="itog_crist_num" value="<?php echo $itog_crist_num;?>">
				</td>
			</tr>
			<tr>
				<td>9</td>
				<td>Шлаковая надставка</td>
				<td>Ф <input type="text" name="itog_slag_remelt" id="itog_slag_remelt" value="<?php echo $itog_slag_remelt;?>"> мм</td>
				<td>Доспутные чертежи:<br>
				<input type="text" name="itog_slag_remelt_num" id="itog_slag_remelt_num" value="<?php echo $itog_slag_remelt_num;?>">
				</td>
			</tr>
		</table>
	</div>

	<div class="bottom-text-block">
	<p>1. Выставлять перед плавкой расстояние от торца электродов Р. Э. до полки кристаллизатора 50-55 мм.
	</p>
	<p>2. Досыпать по ходу плавки по <input type="text" readonly name="itog_doza" id="itog_doza" value="<?php echo $itog_doza;?>"> +_ 10 г. прокаленного флюса АНФ - 29 через каждые 30 мм хода нижней каретки.
	</p>
	<p>3. Перемещение кристаллизатора начинать с момента падения интенсивности роста силы тока со скоростью <input type="text" readonly name="itog_v_start" id="itog_v_start" value="<?php echo $itog_v_start;?>">
	+_ 1 мм/мин, доведя ее к началу оплавления РЭ до рабочей в <input type="text" name="itog_v" id="itog_v" value="<?php echo $itog_v;?>"> +_ 1 мм/мин.
	</p>
	<p>4. * - для справок.
	</p>
	</div>
	
	<div class="main-block">
		<div class="middle-block">
			<div class="small-block">
				<div class="very-small-block">
				</div>
				<div class="very-small-block">
				</div>
			</div>
			<div class="small-block">
				<div class="very-small-block">
				</div>
				<div class="very-small-block">
				</div>
			</div>
			<div class="small-block">
				<div class="very-small-block">
				</div>
				<div class="very-small-block">
				</div>
			</div>
			<div class="small-block">
				<div class="very-small-block">
				</div>
				<div class="very-small-block">
				</div>
			</div>
			<div class="small-block">
				<div class="very-small-block">Изм.
				</div>
				<div class="very-small-block">Лист
				</div>
			</div>
			<div class="small-block">Разраб.
			</div>
			<div class="small-block">Пров.
			</div>
			<div class="small-block">Т. контр.
			</div>
			<div class="small-block">
			</div>
			<div class="small-block">Н. контр.
			</div>
			<div class="small-block">Утв.
			</div>
		</div>
		<div class="middle-block">
			<div class="small-block">
			</div>
			<div class="small-block">
			</div>
			<div class="small-block">
			</div>
			<div class="small-block">
			</div>
			<div class="small-block">№ докум.
			</div>
			<div class="small-block"><input type="text" readonly name="itog_user" id="itog_user" value="<?php echo $itog_user;?>">
			</div>
			<div class="small-block">
			</div>
			<div class="small-block">
			</div>
			<div class="small-block">
			</div>
			<div class="small-block">
			</div>
			<div class="small-block">
			</div>
		</div>
		<div class="middle-block">
			<div class="small-block">
			</div>
			<div class="small-block">
			</div>
			<div class="small-block">
			</div>
			<div class="small-block">
			</div>
			<div class="small-block">Подпись
			</div>
			<div class="small-block">
			</div>
			<div class="small-block">
			</div>
			<div class="small-block">
			</div>
			<div class="small-block">
			</div>
			<div class="small-block">
			</div>
			<div class="small-block">
			</div>
		</div>
		<div class="middle-block">
			<div class="small-block">
			</div>
			<div class="small-block">
			</div>
			<div class="small-block">
			</div>
			<div class="small-block">
			</div>
			<div class="small-block">Дата
			</div>
			<div class="small-block">
			</div>
			<div class="small-block">
			</div>
			<div class="small-block">
			</div>
			<div class="small-block">
			</div>
			<div class="small-block">
			</div>
			<div class="small-block">
			</div>
		</div>
		<div class="middle-block">
			<div class="diagonal-block"><input type="text" name="card_name_bottom" id="card_name_bottom" value="<?php echo $card_name_bottom;?>">
			</div>
			<div class="diagonal-block">
				<div class="diagonal-small-block">Технологическая карта процесса
				</div>
				<div class="diagonal-small-block">
					<div class="vertical-small-block">
						<div class="little-small-block">
							<div class="very-little-small-block">Лит.
							</div>
							<div class="very-little-small-block">
								<div class="very-very-little-small-block">
								</div>
								<div class="very-very-little-small-block">
								</div>
								<div class="very-very-little-small-block">
								</div>
							</div>
						</div>
						<div class="little-small-block">
							<div class="very-little-small-block">Масса
							</div>
							<div class="very-little-small-block">
							</div>
						</div>
						<div class="little-small-block">
							<div class="very-little-small-block">Масштаб
							</div>
							<div class="very-little-small-block">
							</div>
						</div>
					</div>
					<div class="vertical-small-block">
						<div class="vertical-very-small-block">Лист
						</div>
						<div class="vertical-very-small-block">Листов
						</div>
					</div>
				</div>
			</div>
			<div class="diagonal-block">
				<div class="diagonal-small-block"><input type="text" readonly name="itog_steel" id="itog_steel" value="<?php echo $itog_steel;?>">
				</div>
				<div class="diagonal-small-block">
				</div>
			</div>
		</div>
	</div>
</div>	

<input type="submit" value="Обновить техкарту">
<input type="reset" value="Сбросить знаечения">
</form><br>
<form action="remove_card.php" method="post">
<input type="hidden" name="id" value="<?php echo $id?>">
<input type="hidden" name="page" value="technologist">
<input type="submit" value="удалить техкарту">
</form>
<br>
<span class="submit" onclick="getCalcI()">обновить режим I</span>
<span class="submit" onclick="getCalcU()">обновить режим U</span>
<span class="submit" onclick="getEletcrodeLength()">обновить L электрода</span>

<script>
	
'use strict'

let getCalcI = function() {
	let new_i = document.getElementById('itog_i');
	let itog_i = new_i.value;
	let itog_i_start = document.getElementById('itog_i_start');
	itog_i_start.value = (itog_i * 1.25).toFixed(1);
	let itog_i_start_end = document.getElementById('itog_i_start_end');
	itog_i_start_end.value = (itog_i * 1.25 + 1.5).toFixed(1);
	let itog_i_normal_start = document.getElementById('itog_i_normal_start');
	itog_i_normal_start.value = (itog_i * 0.98).toFixed(1);
	let itog_i_normal_start_st = document.getElementById('itog_i_normal_start_st');
	itog_i_normal_start_st.value = (itog_i * 0.98).toFixed(1);
	let itog_i_normal_end = document.getElementById('itog_i_normal_end');
	itog_i_normal_end.value = (itog_i * 1.02).toFixed(1);
	let itog_i_normal_start_end = document.getElementById('itog_i_normal_start_end');
	itog_i_normal_start_end.value = (itog_i * 0.94).toFixed(1);
};

let getCalcU = function() {
	let itog_u = document.getElementById('itog_u');
	let new_u = itog_u.value;
	let new_u_min = document.getElementById('itog_u_min');
	new_u_min.value = new_u - 1;
	let new_u_max = document.getElementById('itog_u_max');
	new_u_max.value = +new_u + 1;
};

let getEletcrodeLength = function() {
	let itog_d_el = document.getElementById('itog_d_el');
	let itog_q_el = document.getElementById('itog_q_el');
	let itog_len_el = document.getElementById('itog_len_el');
	let itog_dorn = document.getElementById('itog_dorn');
	let itog_crist = document.getElementById('itog_crist');
	let itog_slag_remelt = document.getElementById('itog_slag_remelt');
	
	let d_cast = itog_crist.value / 1.025;
	let s_cast = (d_cast - itog_dorn.value / 1.025) / 2;
	let square_cast = 3.14 * s_cast * (d_cast - s_cast);
	let square_electrodes = ((3.14 * itog_d_el.value * itog_d_el.value) / 4) * itog_q_el.value;
	let kz = square_electrodes / square_cast;
	let cast_length = <?php echo $l_casting?>;
	itog_len_el.value = +(cast_length / kz).toFixed(0) + 2000 ;
};

</script>

</body>