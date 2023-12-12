<?php
include('../includes/functions.php');
checkLoginAuth();

$poll_id  = $_POST['poll_id'];
$poll_id = escapeString($poll_id);

$usr_id = $_SESSION['usr_id'];
$usr_token = getUsrToken($usr_id);

$query = "SELECT * FROM  registered_voters WHERE usr_token = $usr_token AND poll_id = $poll_id";
$select_voter = mysqli_query($connection,$query);
checkQuery($select_voter);

if(mysqli_num_rows($select_voter) !== 0){
    //exist
successMsg('You already registered');
}else{
    //not exist
echo '<a  class="register-poll btn btn-primary">Register poll</a>';
}
?>

<script>
        $('.reg_poll_card').click(function(){
        let poll_id = '<?php echo $poll_id ?>';

        $.post('async/usr_register_poll.php',{poll_id:poll_id},function(data){
            getStatusRegisteredPoll();
        })
    })
</script>
    
