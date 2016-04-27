<?php
include_once '../includes/dbConn.php';
if(isset($_POST['d_id'])){
    $id = $_POST['d_id'];
    $deleteDoctor = "DELETE FROM ".$prev."doctor WHERE `d_id` = '$id'";
    $deleteQuery = mysql_query($deleteDoctor);
    if($deleteQuery){
        echo '<div class="success">Successfully Deleted!</div>';
    }else{
        echo '<div class="error">Unable To Delete</div>';
    }
}