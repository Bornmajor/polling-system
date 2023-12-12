<?php
include('../includes/functions.php');
checkLoginAuth();

$usr_token =  getUsrToken($_SESSION['usr_id']);

$query = "SELECT * FROM polls WHERE usr_token = '$usr_token'";
$select_token = mysqli_query($connection,$query);
checkQuery($select_token);

if(mysqli_num_rows($select_token) !== 0){
    while($row = mysqli_fetch_assoc($select_token)){
     $poll_id = $row['poll_id']; 
    $poll_title = $row['poll_title'];

    ?>
  <li><a class='nav_bar_links'  href="?component=manage_poll&poll_id=<?php echo $poll_id; ?>"> <i class="fas fa-box-open"></i>
  <?php echo $poll_title ?></a></li>
  <hr style='margin:5px;'>

    <?php
    }
}


?>