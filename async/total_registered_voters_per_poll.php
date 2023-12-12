<?php
include('../includes/functions.php');
checkLoginAuth();


$poll_id  = $_POST['poll_id'];
$poll_id = escapeString($poll_id);

$query = "SELECT * FROM registered_voters WHERE poll_id = $poll_id";
$select_total_reg_voters = mysqli_query($connection,$query);

echo mysqli_num_rows($select_total_reg_voters);

?>