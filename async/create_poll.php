<?php
include('../includes/functions.php');

checkLoginAuth();

$poll_title = $_POST['poll_title'];
$poll_title = escapeString($poll_title);

$usr_id = $_SESSION['usr_id'];
$usr_token = getUsrToken($usr_id);

$query = "INSERT INTO polls(poll_title,usr_token)VALUES('$poll_title',$usr_token)";
$insert_poll = mysqli_query($connection,$query);
checkQuery($insert_poll);

if($insert_poll){
    successMsg('Poll created');
}else{
   failMsg('Poll query failed!!');
}

?>