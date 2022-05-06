<?php
$page_title = "новая статья";

require_once "../scripts/database_connect.php";

require_once "about_user.php";

require_once "access_control.php";

require_once "header.php";

$today = date("d,m,Y");
$today_array = explode(",", $today);
$today_day = $today_array[0];
$today_month = $today_array[1];
$today_year = $today_array[2];

?>
<style>
.content {
	width: 90%;
	margin-left: 5%;
}
.decor {
	width: 90%;
	box-shadow: 1px 1px 3px rgba(0, 83, 138, 1);
	margin: 20px 5%;
	padding: 10px;
}
.decor h2 {
	font-family: "impact";
	font-size: 42px;
	color: black;
}
.decor h2 span {
	font-family: "courier new";
	font-size: 16px;
	color: rgba(0, 83, 138, 1);
}
.decor h4 {
	font-family: "courier new";
	font-size: 32px;
	color: black;
	margin: 0;
	text-decoration: underline;
}
.decor h5 {
	font-family: "impact";
	font-size: 32px;
	color: black;
	margin: 0;
}
.decor h5:first-letter {
	color: rgba(0, 83, 138, 1);
}
.decor p {
	font-family: "courier new";
	font-size: 22px;
	color: black;
	margin: 0;
}
.decor p:first-letter  {
	font-family: "impact";
	font-size: 26px;
	color: black;
}
.decor ul {
	list-style-type: none;
	margin: 0;
	margin-top: -40px;
}
.decor li {
	position: relative;
	margin-bottom: 5px;
	border: none;
	margin: 0;
	padding: 0;
}
.decor li::before {
	content: "";
	position: absolute;
	z-index: 1;
	display: block;
	width: 10px;
	height: 10px;
	border: 2px solid black;
	left: -30px;
}
.decor li::after {
	content: "";
	position: absolute;
	z-index: 2;
	display: block;
	width: 20px;
	height: 10px;
	border: 2px solid rgba(0, 83, 138, 1);
	left: -31px;
	transform: rotate(-50deg);
	top: -8px;
	border-right: none;
	border-top: none;
}
.decor blockquote {
	font-style: italic;
	font-size: 28px;
	background: linear-gradient(to left, rgba(0, 83, 138, 0.2) 10%, rgba(0, 83, 138, 0.8) 70%);
	padding: 10px;
	width: 50%;
	color: white;
}

.content label {
	font-family: "courier new";
	font-size: 26px;
	font-weight: bold;
	margin-top: 20px;
	display: inline-block;
}
.content input[type=text] {
	width: 30%;
	min-width: 200px;
	font-family: "courier new";
	font-size: 20px;
	border: none;
	border-bottom: 1px solid rgba(0, 83, 138, 1);
	transition: 0.5s;
}
.content input[type=text]:focus {
	width: 100%;
	border-bottom: 2px solid rgba(0, 83, 138, 1);
	transition: 0.5s;
}
.content input[type=submit] {
	font-family: "courier new";
	font-size: 16px;
	border: 1px solid rgba(0, 83, 138, 1);
	margin: 10px 0px;
	padding: 5px 20px;
	text-transform: uppercase;
	background-color: transparent;
	transition: 0.5s;
	float: right;
}
.content input[type=submit]:hover {
	background-color: rgba(0, 83, 138, 1);
	cursor: pointer;
	color: white;
	transition: 0.5s;
}
.content textarea {
	width: 60%;
	min-width: 200px;
	font-family: "courier new";
	font-size: 16px;
	height: 100px;
	border: none;
	border-bottom: 1px solid rgba(0, 83, 138, 1);
	transition: 0.5s;
	resize: none;
	overflow: auto;
}
.content textarea:nth-of-type(2) {
	height: 200px;

}
.content textarea:focus {
	width: 100%;
	border-bottom: 2px solid rgba(0, 83, 138, 1);
	transition: 0.5s;
}
</style>
	<div class="desctop">
		<div class="container">
			<h1>Написать новую статью</h1>
		</div>
	</div>

	<div class="content"> 

	<div class="decor">
		<h4>Ознакомьтесь с правилами оформления статей</h4><br>
		<h5>Заключайте заголовки между тэгами, пример: < h3 > Подзаголовок < /h3 ></h5>
		<p>Выделяйте смысловые абзацы между тэгами, пример: < p > Абзац < /p >
		<ul><i>Используйте списки применяя конструкцию, пример: < ul > Маркированный список < /ul ></i>
			<li>А внутри нее конструкцию, пример: < li > Пункт списка 1 < /li ></li>
			<li>А внутри нее конструкцию, пример: < li > Пункт списка 2 < /li ></li>
			<li>А внутри нее конструкцию, пример: < li > Пункт списка 3 < /li ></li>
		</ul>
		<blockquote>Цитаты заключайте между тэгами, пример: < blockquote > Цитата < /blockquote ></blockquote>
		<b>Можно сделать текст жирным заключив его между тэгами, пример: < b > жирный текст < /b > </b>, <br>
		<i>или курсивным при помощи конструкции, пример: < i > текст курсивом < /i ></i>
		</p>
	</div>
	
	<form action="../articles/add_new_articles.php" method="post">
		<label for="title">Заголовок статьи</label><br>
		<input required type="text" placeholder="Заголовок статьи" name="title" id="title"><br>
		<label for="overview">Краткий обзор</label><br>
		<textarea required placeholder="Краткий обзор" name="overview" id="overview"></textarea><br>
		<label for="text">Текст статьи</label><br>
		<textarea required placeholder="Статья" name="text" id="text"></textarea><br>
		<input type="hidden" name="today" value="<?php echo $today_day." ".$today_month." ".$today_year;?>">
		<input type="hidden" name="autor" value="<?php echo $user_login;?>">
		<input type="submit" value="Записать">
	</form>
	
	</div>
	
	<div class="clearfix">
	</div>
<?php
require_once "footer.php";
?>