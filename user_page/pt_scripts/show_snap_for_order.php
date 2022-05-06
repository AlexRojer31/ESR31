<?php
require_once "../../scripts/database_connect.php";

require_once "../about_user.php";

$is_pt_snap = $_POST["is_pt_snap"];

$is_pt_snap_array = explode(":", $is_pt_snap);

?>
<style>
p {
	margin: 20px;
	padding: 0;
	font-family: "courier new";
	font-size: 24px;
	margin-bottom: 10px;
}
</style>

<p>
<?php echo $is_pt_snap?>
</p>

<!--
id 
num_order 
size 
steel 
weight_tube 
casting_number 
size_casting_plan 
weight_casting_plan 
d_max_casting 
d_min_casting 
s_max_casting 
s_min_casting 
l_casting 
curvature_casting 
size_casting_fact 
weight_casting_fact 
i_average 
u_average 
r_average 
p_average 
p_w_average 
start_smelting 
end_smelting 