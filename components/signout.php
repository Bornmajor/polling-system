<?php
session_start();
$_SESSION['usr_id'] = null;

header("Location: ?component=login");

?>