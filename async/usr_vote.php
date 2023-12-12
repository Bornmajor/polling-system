<?php
include('../includes/functions.php');
checkLoginAuth();

$poll_id = $_POST['poll_id'];
$poll_id = escapeString($poll_id);

$usr_id = $_SESSION['usr_id'];
$usr_token = getUsrToken($usr_id);

?>
 
<form action="" method="post" class='cast-form'>
         <?php
         $query = "SELECT * FROM candidates WHERE poll_id = $poll_id";
         $select_candidates = mysqli_query($connection,$query);
         checkQuery($select_candidates);
          if(mysqli_num_rows($select_candidates) !== 0){
         //candidates available votinng allowed
          while($row = mysqli_fetch_assoc($select_candidates)){
            $cand_id = $row['cand_id'];
            $username = $row['username'];
            
            ?>
          <?php 
        
          //get usr vote if exist
          $query = "SELECT * FROM voters WHERE usr_token = $usr_token AND poll_id = $poll_id";
           $select_vote = mysqli_query($connection,$query);
           checkQuery($select_vote);

           while($row = mysqli_fetch_assoc($select_vote)){
           $db_cand_id = $row['cand_id'];

           }

           if(mysqli_num_rows($select_vote) !== 0){
            //usr already voted
            
            ?>
         
        <div class="form-check">
        <input type="hidden" name="poll_id" value="<?php echo $poll_id ?>">
        <input class="form-check-input candidate-radio-option" type="radio" name="cand_id"  value="<?php echo $cand_id ?>"  required disabled>

        <label class="form-check-label" for="exampleRadios1"><?php echo $username ?></label>

        </div>
        <script>
        $('.candidate-radio-option').each(function(){
           if($(this).val() == "<?php echo  $db_cand_id ?>"){
            $(this).prop( "checked", true );
           } 
        })



        </script>
            <?php
            
           }else{
        //usr has not voted
         ?>
        <div class="form-check">
        <input type="hidden" name="poll_id" value="<?php echo $poll_id ?>">
        <input class="form-check-input candidate-radio" type="radio" name="cand_id"  value="<?php echo $cand_id ?>" required>

        <label class="form-check-label" for="exampleRadios1"><?php echo $username ?></label>

        </div>
            <?php
         }
      
           }
             
            }else{
               //no candidates enrolled to allow voting
              failMsg('No enrolled candidates');
            }
         
         ?>
        <br>

      <?php 
      // echo mysqli_num_rows($select_vote);
         if(mysqli_num_rows($select_vote) !== 0){
          //usr already voted
          successMsg('You already voted');
         }else{
           //usr has not voted
          echo '  <button type="submit" class="btn btn-primary">Submit</button>';

         }
      ?>

      </form>

      <script>
        
    $('.cast-form').submit(function(e){
        e.preventDefault();

        let postData = $(this).serialize();

        $.post('async/cast_vote.php',postData,function(data){
        if(!data.error){
        // $('.candidate-radio').prop("disabled",true);
         getUserVoteCandidate();
        } 
        

        })



    });
      </script>
    