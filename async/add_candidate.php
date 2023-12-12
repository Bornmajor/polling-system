<?php
include('../includes/functions.php');
checkLoginAuth();

$username  = $_POST['username'];
$poll_id = $_POST['poll_id'];


$username = escapeString($username);
$poll_id = escapeString($poll_id);

$query = "INSERT INTO candidates(username,poll_id)VALUES('$username',$poll_id)";
$insert_candidate = mysqli_query($connection,$query);
checkQuery($insert_candidate);

?>