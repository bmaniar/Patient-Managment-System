<?php
include_once '../includes/dbConn.php';
if(isset($_POST['page']) && !empty($_POST['page'])){
    //Set Post Variables
        $d_id = trim(strip_tags(strtoupper($_POST["d_id"])));
	$fname = trim(strip_tags($_POST['fname']));
	$lname = trim(strip_tags(strtoupper($_POST["lname"])));
	$mi = trim(strip_tags($_POST['mi']));
	$age = trim(strip_tags($_POST['age']));
	$gender = trim(strip_tags($_POST['gender']));
	$status = trim(strip_tags($_POST['stat']));
	$mm = trim(strip_tags($_POST['mm']));
	$dd = trim(strip_tags($_POST['dd']));
	$yy = trim(strip_tags($_POST['yy']));
	$bdate=$yy."-".$mm."-".$dd;
	$brgy = trim(strip_tags($_POST['brgy']));
	$city = trim(strip_tags($_POST['city']));
	$prov = trim(strip_tags($_POST['prov']));
	$postal = trim(strip_tags($_POST['postal']));
	$remark = trim(strip_tags($_POST['remark']));
        
        //Check Age And Postal Code is Numeric Or Not
        
        if(!is_numeric($age)) 
	{
		echo "<div class='info'>Please input valid Age .</div>";
	}
	elseif(!is_numeric($postal)) 
	{
		echo "<div class='info'>Please input valid Postal Code.</div>";
	}
        else{
            $update="update ".$prev."doctor set 
		fname='".$fname."',
		lname='".$lname."',
		mi='".$mi."',
                age='".$age."',
		gender='".$gender."',
		status='".$status."',
		bdate='".$bdate."',
		brgy='".$brgy."',
		city='".$city."',
		prov='".$prov."',
		postal='".$postal."',
		remark='".$remark."'
		where d_id='".$d_id."'";
            $rs=mysql_query($update) or die(mysql_error());
            if($rs){
                echo '<div class="success" id="signup_status">
                         <button type="button" class="close" data-dismiss="alert">&times;</button>
                         <h4>Success!</h4>
                         Records are successfully updated..<br/>
                         <a href="?view_doctors" class="btn">Back to Info</a>
                         
                    </div>';
            }else{
        
            }
        }
        
    
}


?>