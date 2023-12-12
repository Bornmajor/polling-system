<?php
include('../includes/functions.php');
checkLoginAuth();

$cand_id = $_POST['cand_id'];
$cand_id = escapeString($cand_id);

$query = "DELETE FROM candidates WHERE cand_id = $cand_id";
$delete_query = mysqli_query($connection,$query);
checkQuery($delete_query);

?>