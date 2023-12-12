<?php
include('../includes/functions.php');
checkLoginAuth();


$poll_id  = $_POST['poll_id'];
$poll_id = escapeString($poll_id);

$usr_id = $_SESSION['usr_id'];
$usr_token = getUsrToken($usr_id);

$date_registered = date("l jS \of F Y h:i:s A");



$query = "INSERT INTO registered_voters(poll_id,usr_token,date_registered)VALUE($poll_id,$usr_token,'$date_registered')";
$insert_reg_voter = mysqli_query($connection,$query);
checkQuery($insert_reg_voter);


?>