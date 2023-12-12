<?php
include('../includes/functions.php');
checkLoginAuth();

$usr_id = $_SESSION['usr_id'];
$usr_token = getUsrToken($usr_id);

$date_registered = date("l jS \of F Y h:i:s A");

$cand_id = $_POST['cand_id'];
$poll_id = $_POST['poll_id'];

$poll_id = escapeString($poll_id);
$cand_id = escapeString($cand_id);

$query = "SELECT * FROM voters WHERE usr_token = $usr_token AND poll_id = $poll_id";
$select_vote = mysqli_query($connection,$query);
checkQuery($select_vote);

if(mysqli_num_rows($select_vote) == 0){
// user has not vote

$query = "INSERT INTO voters(usr_token,cand_id,poll_id)VALUES($usr_token,$cand_id,$poll_id)";
$insert_vote = mysqli_query($connection,$query);
checkQuery($insert_vote);

    

}






?>