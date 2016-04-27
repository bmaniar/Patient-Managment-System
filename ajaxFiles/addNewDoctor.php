<?php

if(isset($_POST["page"]) && !empty($_POST["page"]))
{
	include('../includes/dbConn.php');

	$d_id = trim(strip_tags(strtoupper($_POST["d_id"])));
	$fname = trim(strip_tags($_POST['fname']));
	$lname = trim(strip_tags(strtoupper($_POST["lname"])));
	$mi = trim(strip_tags($_POST['mi']));
	$age = trim(strip_tags($_POST['age']));
	$gender = trim(strip_tags($_POST['gender']));
	$status = trim(strip_tags($_POST['status']));
	$mm = trim(strip_tags($_POST['mm']));
	$dd = trim(strip_tags($_POST['dd']));
	$yy = trim(strip_tags($_POST['yy']));
	$bdate=$yy."-".$mm."-".$dd;
	$brgy = trim(strip_tags($_POST['brgy']));
	$city = trim(strip_tags($_POST['city']));
	$prov = trim(strip_tags($_POST['prov']));
	$postal = trim(strip_tags($_POST['postal']));
	$remark = trim(strip_tags($_POST['remark']));
	
		
	if(!is_numeric($age)) 
	{
		echo "<div class='info'>Please input valid Age .</div>";
	}
	
	else
		{
		
		$insert="Insert into ".$prev."doctor(d_id,fname,lname,mi,age,gender,status,bdate,brgy,city,prov,postal,remark,datead)
 values('".$d_id."','".$fname."','".$lname."','".$mi."','".$age."','".$gender."','".$status."','".$bdate."','".$brgy."','".$city."','".$prov."','".$postal."','".$remark."','".date('Y-m-d H:i:s')."')";

$rs=mysql_query($insert) or die(mysql_error());
	?>

<div style="margin-left:10px; color:#090; font-size:20px; margin-top:5px;"><img src="img/succ.png">&nbsp;New Doctor Added</div>
	<?php
}
}
?>