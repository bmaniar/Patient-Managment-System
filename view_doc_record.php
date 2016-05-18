<?php

//Include dbConn.php File
include_once 'includes/dbConn.php';
$doc_id = $_GET['d_id'];
$viewDocQuery = "SELECT * FROM ".$prev."doctor WHERE `d_id` = '$doc_id'"; // Query For View Doctor Details
$viewDocResult = mysql_query($viewDocQuery);
$viewDocGetDoctor = mysql_fetch_array($viewDocResult);
$DoctorFullName = $viewDocGetDoctor['fname'].'&nbsp;'.$viewDocGetDoctor['lname'];

?>

<h5 style="margin-left:10px;">Patient Records of Dr. <?php echo ucwords($DoctorFullName);?></h5>
<table border="1" bordercolor="#999999" style="width:797px;margin-left:10px; margin-bottom:20px; margin-right:20px;">
    <tr bgcolor="#CCCCCC">
        <td align="center" style="width:30px;" >#</td>
        <td align="left" ><i class="icon-file icon-black"></i>&nbsp;Patient ID's</td>
        <td align="left"><i class="icon-file icon-black"></i>&nbsp;Full Name</td>
        <td align="center"><i class="icon-plus icon-black"></i>&nbsp;Gender</td>
        <td align="center" ><i class="icon-time icon-black"></i>&nbsp;Time</td>
        <td align="center"><i class="icon-calendar icon-black"></i>&nbsp;Date&nbsp;attended</td>
        
    </tr>
    
    
    <?php
    $i= 0;
    $getDIDFromAppTbl = "SELECT * FROM ".$prev."app WHERE `d_id` = '$doc_id'"; // Get patient ID From App table
    $appResult = mysql_query($getDIDFromAppTbl);
    
    while($appRecords = mysql_fetch_array($appResult)){
    $getPatient = "SELECT * FROM ".$prev."patient WHERE `p_id` = '".$appRecords['p_id']."'"; //match patient Id From App table to pateint table
    $patientResultView = mysql_query($getPatient);
    $patientRecord = mysql_fetch_array($patientResultView);
    $patientFullName = $patientRecord['fname'].'&nbsp;'.$patientRecord['lname'];
    $i++;
    ?>
    
   
   
    <tr class="hrs" bgcolor="" height="37">
        <td align="center" ><?php echo $i; ?></td>
        <td align="left" ><?php echo $appRecords['p_id']; ?></td>
        <td align="left" ><?php echo $patientFullName ?></td>
        <td align="center"><?php echo $patientRecord['gender']; ?></td>
        <td align="center"><?php echo $appRecords['time']; ?></td> 
        <td align="center" width="150"><?php echo date_format(date_create(date($appRecords['date'])), 'F j, Y'); ?></td>
    </tr>
    <?php }?>
</table>