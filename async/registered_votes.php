<?php
include('../includes/functions.php');
checkLoginAuth();

$poll_id = $_POST['poll_id'];

$poll_id = escapeString($poll_id);

$query = "SELECT * FROM registered_voters WHERE poll_id = $poll_id";
$select_candidates = mysqli_query($connection,$query);
checkQuery($select_candidates);
?>
<?php 
if(mysqli_num_rows($select_candidates) !==0){
?>

<table class="table table-striped">
    <tr>
        <th>#</th>
        <th>Name</th>  
        <th>Dispprove</th>
    </tr>
<?php
$i = 1;    
while($row = mysqli_fetch_assoc($select_candidates)){
  $reg_voter_id = $row['reg_voter_id'];
  $usr_token = $row['usr_token'];
  ?>
  <tr>
  <td><?php echo $i++;  ?></td>
  <td><?php echo  getUsername($usr_token); ?></td>
  <td> <span class='delete_usr' reg-voter-id=<?php echo  $reg_voter_id ?>> <i class="fas fa-trash"></i> </span> </td>
</tr>
  <?php
}


?>

    
</table>
<?php

}else {
    // 0 ROWS
   echo emptyTableRowMsg($select_candidates,'No registrated voters');
}
?>



<script>
  $('.delete_usr').click(function(data){
    let reg_voter_id = $(this).attr('reg-voter-id');

    $.post('async/delete_registered_voter.php',{reg_voter_id:reg_voter_id},function(){
      getRegisteredVotes();

    });
  })
</script>