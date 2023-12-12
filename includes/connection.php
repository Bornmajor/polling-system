<?php
$connection = mysqli_connect('localhost','root','','polls');

if($connection == false){
die("ERROR: Could not connect DB."
    . mysqli_connect_error());
}
ob_start(); 
if(session_status() !== PHP_SESSION_ACTIVE) session_start();

//error_reporting(0); 
?>