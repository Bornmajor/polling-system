<?php
include('../includes/functions.php');
checkLoginAuth();
$reg_voter_id = $_POST['reg_voter_id'];

$reg_voter_id = escapeString($reg_voter_id);

$query = "DELETE FROM registered_voters WHERE reg_voter_id = $reg_voter_id";
$delete_query = mysqli_query($connection,$query);
checkQuery($delete_query);


?>