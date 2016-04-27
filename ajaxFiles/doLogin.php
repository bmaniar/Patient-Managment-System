<?php

include_once '../includes/dbConn.php';
if(isset($_POST['page']) && !empty($_POST['page'])){
   //Set The Variable 
    $userName = trim(strip_tags($_POST['username']));
    $password = trim(strip_tags($_POST['password']));
    $passCode = sha1($password);
    
    //Query For Login
    $loginQuery = "SELECT * FROM ".$prev."admin WHERE `username` = '".$userName."'
                                                AND   `password` = '".$passCode."'";
    $loginResult = mysql_query($loginQuery);
    $countUser = mysql_num_rows($loginResult);
    $userFetch = mysql_fetch_array($loginResult);
    if($userFetch && $countUser >0){
       $_SESSION['doc_id'] = $userFetch['doc_id']; //set doc id in a session variable
       $_SESSION['username'] = $userFetch['username']; // set username in a session variable
       echo '<script type="text/javascript">window.location = "dashboard.php"; </script>';
    }else{
        echo '<div class="error">Invalid Username Or Password</div>';
    }
    
}