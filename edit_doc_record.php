

 <script type="text/javascript" src="<?php echo $vpath?>js/jquery.form.js"></script>
 <script type="text/javascript" src="<?php echo $vpath?>js/jquery.min.js"></script>
 <script type="text/javascript" src="<?php echo $vpath?>myScript/edit_doc_record.js"></script>
 <link href="css/warningCss.css" rel="stylesheet" type="text/css"/>


<?php
include_once 'includes/dbconn.php';
if(isset($_GET['d_id'])){
    $docID = $_GET['d_id'];
    $doctorEditQuey = "SELECT * FROM ".$prev."doctor WHERE `d_id` = '$docID'";
    $doctorEditResult = mysql_query($doctorEditQuey);
    $doctorEditResultShow = mysql_fetch_array($doctorEditResult);


?>

<table  align="center" style="margin:20px; font-size:15px; height:430px; font-weight:bold; width:792px;" border="0">
    <tr>
        <td>Doctor ID:&nbsp;<span class="label label-success">Default</span></td>
    </tr>
    
    <tr>
        <td>
            <span id="" class="btn"><?php  echo $doctorEditResultShow['d_id'];?></span>
            <input type="hidden" name="d_id" id="d_id" value="<?php echo $doctorEditResultShow['d_id']?>" required="required" />
        </td>
    </tr>
    
    <tr>
        <td>First Name&nbsp;</td>
        <td>Last Name&nbsp;</td>
        <td>Middle Name&nbsp;</td>
        <td>Age&nbsp;</td>
    </tr>
    
    <tr>
        <td><input id="fname" name="fname" type="text" value="<?php  echo $doctorEditResultShow['fname'];?>" class="input-medium" required="required"></td>
        <td><input id="lname" name="lname" type="text" value="<?php  echo $doctorEditResultShow['lname'];?>" class="input-medium" required="required"></td>
        <td><input id="mi" name="mi" type="text" value="<?php  echo $doctorEditResultShow['mi'];?>" class="input-medium" required="required"></td>
        <td><input id="age" name="age" type="text" value="<?php  echo $doctorEditResultShow['age'];?>" class="input-small" required="required"></td>
    </tr>
    
    <td>Gender&nbsp;</td>
    <td>Status&nbsp;</td>
    <td>Birthdate&nbsp;</td>
    
    <tr>
        <td>
            <?php
		switch($doctorEditResultShow['gender']){
		case 'Select':
                    $m1 = "selected"; break;
                case 'Male':
                    $m2 = "selected"; break;
		case 'Female':
                    $m3 = "selected"; break;
		}
            ?>
            
            <select class="input-small" name="gender" id="gender">
                <option id="01" value="Select" <?php echo $m1; ?>>Select</option>
                <option id="02" value="Male" <?php echo $m2; ?>>Male</option> 
                <option id="03" value="Female" <?php echo $m3; ?>>Female</option>
            </select>
        </td>
        
        <td>
            <?php
		switch($doctorEditResultShow['status']){
		case 'Select':
                    $m1 = "selected"; break;
                case 'Single':
                    $m2 = "selected"; break;
		case 'Married':
                    $m3 = "selected"; break;
		}
	    ?>
            
            <select class="input-medium" name="stat" id="stat">
                <option id="01" value="Select" <?php echo $m1; ?>>Select</option>
                <option id="02" value="Single" <?php echo $m2; ?>>Single</option> 
                <option id="03" value="Married" <?php echo $m3; ?>>Married</option>
            </select>
        </td>
        
        <td colspan="2">
            <?php 
                switch(date_format(date_create($doctorEditResultShow['bdate']), 'm')){
		case '00':
                    $m0 = "selected"; break;
                case '01':
                    $m1 = "selected"; break;
                case '02':
                    $m2 = "selected"; break;
		case '03':
                    $m3 = "selected"; break;
		case '04':
                    $m4 = "selected"; break;
		case '05':
                    $m5 = "selected"; break;
		case '06':
                    $m6 = "selected"; break;
		case '07':
                    $m7 = "selected"; break;
		case '08':
                    $m8 = "selected"; break;
		case '09':
                    $m9 = "selected"; break;
		case '10':
                    $m10 = "selected"; break;
		case '111':
                    $m11 = "selected"; break;
		case '12':
                    $m12 = "selected"; break;
                }
            ?>
            
            <select  class="input-small" style="width:120px;" name="mm" id="mm">
                <option id="00" value="00" <?php echo $m0; ?>>MM</option>
                <option id="01" value="01" <?php echo $m1; ?>>January</option>
                <option id="02" value="02" <?php echo $m2; ?>>February</option> 
                <option id="03" value="03" <?php echo $m3; ?>>March</option>
                <option id="04" value="04" <?php echo $m4; ?>>April</option> 
                <option id="05" value="05" <?php echo $m5; ?>>May</option> 
                <option id="06" value="06" <?php echo $m6; ?>>June</option> 
                <option id="07" value="07" <?php echo $m7; ?>>July</option> 
                <option id="08" value="08" <?php echo $m8; ?>>August</option> 
                <option id="09" value="09" <?php echo $m9; ?>>September</option> 
                <option id="10" value="10" <?php echo $m10; ?>>October</option> 
                <option id="11" value="11" <?php echo $m11; ?>>November</option> 
                <option id="12" value="12" <?php echo $m12; ?>>December</option> 
            </select>
            
            <select class="input-small" name="dd" id="dd" style="width:60px;">
                <?php for($x=1;$x<32;$x++):?>
                <option value="<?php echo $x; ?>" 
                    <?php 
                    if(date_format(date_create($doctorEditResultShow['bdate']), 'd')==$x)
                     {
                        echo "selected"; 
                        
                     }else{
                            $yy="";
                            } ?>><?php echo $x; ?></option>
                        
                       
                <?php endfor; ?>
            </select>
            
            <select class="input-small" name="yy" id="yy" style="width:80px;">
                <option>YY</option>
                <?php for($x=1950;$x<2050;$x++){ ?>
                        <option value="<?php echo $x; ?>" <?php

                         if(date_format(date_create($doctorEditResultShow['bdate']), 'Y')==$x){
                        echo "selected"; }else{
                                $yy="";}?>><?php echo $x; ?></option>
                <?php	} ?> 
            </select>
        </td>
    </tr>
    
    <tr>
        <td height="20" colspan="4" style="border-bottom:1px solid #CCC;">Address</td>
    </tr>
    
    <tr>
        <td  >House No., St. Barangay&nbsp;</td>
        <td >City/Municipality&nbsp;</td>
        <td >Province&nbsp;</td>
        <td >Postal Code&nbsp;</td>
    </tr>
    
    <tr>
        <td><input id="brgy" name="brgy" type="text" value="<?php  echo $doctorEditResultShow['brgy'];?>" required="required"></td>
        <td><input id="city" name="city" type="text" value="<?php echo $doctorEditResultShow['city']; ?>" class="input-medium" required="required"></td>
        <td>
            <input id="prov" name="prov" type="text" value="<?php echo $doctorEditResultShow['prov']; ?>" class="input-medium" required="required">
            <td><input id="postal" name="postal" type="text" value="<?php echo $doctorEditResultShow['postal']; ?>" class="input-small" required="required">
        </td>
        
        
    </tr>
    
    <tr>
        <td>Remarks&nbsp;<span class="label label-success">Optional</span></td>
    </tr>
    
    <tr>
        <td colspan="5"><textarea name="remark" id="remark" class="span7" style="width:700px;"><?php  echo $doctorEditResultShow['remark'];?></textarea></td>
    </tr>
    
    <tr>
        <td colspan="2" align="left" height="20">
            <a href="javascript:void(0);" class="btn btn-medium btn-primary " onClick="editdoctor();" style="float:left;"><i class="icon-edit icon-black"></i>&nbsp;Save Changes</a>
            <div id="signup_status" style="margin-left:223px; margin-top:-64px;position:absolute;"></div>
        </td>
    </tr>
    
</table>

<?php }?>