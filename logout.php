<?php session_start();
unset($_SESSION['username']);
header('location: index.php ');
unset($_SESSION['doc_id']);
header('location: index.php ') ;
?>