<?php
$page_title = "";

require_once "../scripts/database_connect.php";

require_once "about_user.php";

require_once "header.php";

$id = $_REQUEST["id"];

$sql_pt_snap = "SELECT 
inventory,
size,
drawing,
type,
diameter,
diameter_fact,
melting_num,
flushing_count,
damage,
durability,
position 
FROM pt_snap WHERE id=$id;";
$result_pt_snap = mysqli_query($link, $sql_pt_snap);
$row_pt_snap = mysqli_fetch_array($result_pt_snap);

?>
<style>
.content {
	float: none;
	width: 90%;
	margin-left: 5%;
}
.content p {
	font-size: 20px;
	width: 100%;
}
.content h4 {
	font-family: "impact";
	font-size: 24px;
	width: 100%;
}
.content span {
	color: rgba(0, 83, 138, 1);
	font-size: 24px;
	font-weight: bold;
}
.content ul {
	list-style-type: none;
	margin: 0;
	padding: 0;
}
.content li {
	margin: 0;
	padding: 0;
	float: left;
	border: 1px solid rgba(0, 83, 138, 1);
	font-size: 16px;
	padding: 10px 25px;
	margin-right: 10px;
	text-align: center;
	text-transform: uppercase;
	transition: 0.5s;
}
.content li:hover {
	color: white;
	background-color: rgba(0, 83, 138, 1);
	cursor: pointer;
	transition: 0.5s;
}


</style>
	<div class="desctop">
		<div class="container">
			<form action="../index.php" method="post">
				<input type="submit" name="user_name" value="выход">
			</form>
			<h1></h1>
		</div>
	</div>
	
	<div class="content">
		<h4><?php echo mb_strtoupper($row_pt_snap["type"]);?></h4>
		<p>Инвентарный номер -<span> № <?php echo $row_pt_snap["inventory"];?></span>;</p>
		<p>Типоразмер -<span> <?php echo $row_pt_snap["size"];?></span>;</p>
		<p>Чертеж <span>№ <?php echo $row_pt_snap["drawing"];?></span>;</p>
		<p>Рабочий диаметр (черт.)<span> <?php echo $row_pt_snap["diameter"];?> мм</span>;</p>
		<p>Рабочий диаметр (факт.)<span> <?php echo $row_pt_snap["diameter_fact"];?> мм</span>;</p>
		<p>Количество плавок -<span> <?php echo $row_pt_snap["melting_num"];?></span>;</p>
		<p>Количество плавок после промывки -<span> <?php echo $row_pt_snap["flushing_count"];?></span>;</p>
		<p>Сведения о повреждениях:<span> <?php echo $row_pt_snap["damage"];?></span>;</p>
		<p>Остаток стойкости -<span> <?php echo $row_pt_snap["durability"];?> %</span>;</p>
		<p>Место расположения -<span> <?php echo $row_pt_snap["position"];?></span>.</p>
		
<?php
if ($row_pt_snap["durability"] < 60) {
	if ($row_pt_snap["durability"] > 30) {
		echo "<p style=\"background-color: yellow; font-size: 24px;\">Внимание! Технологическая оснастка частично изношена!</p>";
	} else {
		echo "<p style=\"background-color: red; font-size: 28px;\">Опасность! Оснастка непригодна для использования!</p>";
	};
};
?>
		
		<br>
		<ul <?php if ($user_type == "worker") {echo "style=\"display: none;\"";};?>>
			<li onclick="pierce()">Проточить</li>
			<li onclick="damage()">Повреждения</li>
			<li onclick="repairs()">Ремонтировать</li>
			<li onclick="rinse()">Промыть</li>
			<li id="transaction">Переместить</li>
			<li onclick="deleteSnap()">Списать</li>
		</ul>
		
		<form action="pt_snap/change_pt_snap.php" method="post" id="formUpdate">
			<input type="hidden" name="id" value="<?php echo $id;?>">
			<input type="hidden" name="inventory" value="<?php echo $row_pt_snap["inventory"];?>">
			<input type="hidden" name="size" value="<?php echo $row_pt_snap["size"];?>">
			<input type="hidden" name="drawing" value="<?php echo $row_pt_snap["drawing"];?>">
			<input type="hidden" name="type" value="<?php echo $row_pt_snap["type"];?>">
			<input type="hidden" name="diameter" value="<?php echo $row_pt_snap["diameter"];?>">
			<input type="hidden" name="diameter_fact" value="<?php echo $row_pt_snap["diameter_fact"];?>">
			<input type="hidden" name="melting_num" value="<?php echo $row_pt_snap["melting_num"];?>">
			<input type="hidden" name="flushing_count" value="<?php echo $row_pt_snap["flushing_count"];?>">
			<input type="hidden" name="damage" value="<?php echo $row_pt_snap["damage"];?>">
			<input type="hidden" name="durability" value="<?php echo $row_pt_snap["durability"];?>">
			<input type="hidden" name="position" value="<?php echo $row_pt_snap["position"];?>">
		</form>
	</div>

<script src="js/pierce.js"></script>
<script src="js/damage.js"></script>
<script src="js/repairs.js"></script>
<script src="js/rinse.js"></script>
<script src="js/deleteSnap.js"></script>

<script>

let transaction = document.getElementById('transaction');
transaction.addEventListener('click', snapMove);

function snapMove() {
	let isTrue = confirm('Вы хотите переместить оснастку?');
	if (isTrue === true) {
		let newLocation = prompt('Куда Вы перемещаете оснастку?','');
		let inputTranslate = document.getElementsByTagName('input');
		for (let i = 0; i < inputTranslate.length; i++) {
			if (inputTranslate[i].name == 'position') {
				inputTranslate[i].value = newLocation;
			}
		}
	}
	let formUpdate = document.getElementById('formUpdate');
	formUpdate.submit();
}

</script>

	<div class="clearfix">
		<br>
	</div>
	
<?php
require_once "../user_page/footer.php";
?>


