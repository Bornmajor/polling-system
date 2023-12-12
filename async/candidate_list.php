<?php
include('../includes/functions.php');
checkLoginAuth();

$poll_id = $_POST['poll_id'];

$poll_id = escapeString($poll_id);

$query = "SELECT * FROM candidates WHERE poll_id = $poll_id";
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
        <th>Votes</th>
        <th>Remove</th>
    </tr>
<?php
$i = 1;    
while($row = mysqli_fetch_assoc($select_candidates)){
  $cand_id = $row['cand_id'];
  $username = $row['username'];
  ?>
  <tr>
  <td><?php echo $i++;  ?></td>
  <td><?php echo $username; ?></td>
  <td>
    <?php
    $query = "SELECT * FROM voters WHERE cand_id = $cand_id";
    $select_votes = mysqli_query($connection,$query);
    checkQuery($select_votes);
    echo mysqli_num_rows($select_votes);
    ?>
  </td>
  <td> <span class='delete_cand' cand-id='<?php echo $cand_id ?>'> <i class="fas fa-trash"></i> </span> </td>
</tr>
  <?php
}


?>

    
</table>
<?php

}else {
    // 0 ROWS
   echo emptyTableRowMsg($select_candidates,'No candidates');
}
?>



<script>
  $('.delete_cand').click(function(){
    let cand_id = $(this).attr('cand-id');

    $.post('async/delete_candidate.php',{cand_id:cand_id},function(){
      getCandidates();
    });
  })
</script>