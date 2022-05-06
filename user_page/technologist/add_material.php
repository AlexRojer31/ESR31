<?php
require_once "../../scripts/database_connect.php";

require_once "../about_user.php";

$material = $_POST["material"]; 
$standart = $_POST["standart"]; 
$norma = $_POST["norma"]; 
$unit = $_POST["unit"]; 

$sql_add_material = "INSERT INTO material (
material,
standart,
norma,
unit
) VALUES (
'{$material}',
'{$standart}',
'{$norma}',
'{$unit}'
);";
$result_add_material = mysqli_query($link, $sql_add_material);


header("location:../technologist.php");

?>

