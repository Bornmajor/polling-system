<?php
include('../includes/functions.php');
checkLoginAuth();
$usr_token =  getUsrToken($_SESSION['usr_id']);

$query = "SELECT * FROM polls WHERE usr_token = '$usr_token' LIMIT 5";
$select_token = mysqli_query($connection,$query);
checkQuery($select_token);

if(mysqli_num_rows($select_token) !== 0){
    while($row = mysqli_fetch_assoc($select_token)){
    $poll_id = $row['poll_id'];
    $poll_title = $row['poll_title'];

    ?>
    <div class="poll-card card  text-end" style="width: 18rem;">
  <div class="card-body">
  <h4 class="card-title"><span>Poll Id <i class="fas fa-arrow-right"></i> </span><?php echo  $poll_id ?> </h4>
    <h5 class="card-title"><?php echo  $poll_title?> </h5>
    <h6 class="card-subtitle mb-2 text-body-secondary">Voters <i class="fas fa-arrow-right"></i>
     <span class='no_voters'></span> 
    </h6>
   
    <div class='pacesetters-container'>
     <?php
     $query = "SELECT cand_id, COUNT(cand_id) AS 'value' FROM voters GROUP BY cand_id ORDER BY 'value' DESC LIMIT 1";
     $select_voters = mysqli_query($connection,$query);
     checkQuery($select_voters);
     while($row = mysqli_fetch_assoc($select_voters)){
     $cand_id = $row['cand_id'];
     ?>
        <div href="#" class="poll-card-link ">1. <span><i class="fas fa-user"></i></span> <?php echo getCandidatesName($cand_id) ?> </div>

     <?php
     }

     ?>

   </div>

   <div style='margin-top:30px'>
    <a href="?component=manage_poll&poll_id=<?php echo $poll_id?>" class='btn btn-primary'>Manage</a>
   </div>


  </div>
</div>
    


    <?php
    }


}

?>

<script>
      function getTotalVoters(){
        let poll_id = '<?php echo $poll_id  ?>';
        $.ajax({
            url: 'async/total_voter_per_poll.php',
            type: 'POST',
            data: {poll_id:poll_id},
            success:function(data){
                $('.no_voters').html(data);
            }
        })
    }
    getTotalVoters();

</script>