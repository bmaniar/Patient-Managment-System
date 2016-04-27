<?php
include_once '../includes/dbConn.php';
if(isset($_POST['page']) && !empty($_POST['page'])){
   
        $p_id = trim(strip_tags(strtoupper($_POST["p_id"])));
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
        
        
        //Check Age And Postal Code  Is Numeric Or Not
        if(!is_numeric($age)){
            echo '<div class="error">Age Should Be Numeric</div>';
        }elseif(!is_numeric($postal)){
            echo '<div class="error">Postal Code Should Be Numeric</div>';
        }else{
            $patientInsert ="insert into ".$prev."patient(p_id,fname,lname,mi,age,gender,status,bdate,brgy,city,prov,postal,remark,datead)
 values('".$p_id."','".$fname."','".$lname."','".$mi."','".$age."','".$gender."','".$status."','".$bdate."','".$brgy."','".$city."','".$prov."','".$postal."','".$remark."','".date('Y-m-d H:i:s')."')";;
            
       $patientResult = mysql_query($patientInsert);
       if($patientResult == TRUE){
           echo '<div style="margin-left:10px; color:#090; font-size:20px; margin-top:5px;"><img src="img/succ.png">&nbsp;New Patient Added</div>';
       }else{
           echo '<div class="error">Unable To Add</div>';
       }
        }
}