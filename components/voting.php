<?php include('includes/header.php') ?>
<meta name="description" content="Polling system">
<title>
<?php
if(isset($_GET['poll_id'])){
    $poll_id = $_GET['poll_id'];
    
   $poll_title = getPollTitle($poll_id);
    echo 'Voting for ' . $poll_title; 
}else{
    if(empty($_GET['poll_id'])){
        header("Location: ?components=home");
    }
}
?>

</title>
</head>
<body>
<?php checkLoginAuth(); ?>
<?php
if(!isset($_SESSION['usr_id'])){
  header("Location: ?component=login&redirect_url=poll_voting&poll_id=$poll_id");
}
?>
<?php include('includes/navbar.php'); ?>

<div class="body-container"><!--body-->

<div class="card_register_container"><!--card-container-->

<div class="card reg_poll_card" >
  <img src="images/vote-ballot-box-people.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h3 class="card-title">Poll Id - <?php echo $poll_id ?></h3>
    <h5 class="card-title"><?php echo $poll_title ?></h5>
    <h6>Choose a candidate</h6>

    <?php
    $usr_id = $_SESSION['usr_id'];
    $usr_token = getUsrToken($usr_id);

    $query = "SELECT * FROM registered_voters WHERE usr_token = $usr_token AND poll_id = $poll_id";
    $check_registration = mysqli_query($connection,$query);
    checkQuery($check_registration);
    if(mysqli_num_rows($check_registration) !== 0){
    //user already registered
   ?>
     <span class='votes'></span>
   <?php
    }else{
    //user not registered 
    failMsg("You need to register to this poll to vote !! Request voting link from this poll creator");
    }
    ?>
  
 


  </div>
</div>



</div><!--card-container-->

</div><!--body-->

<script>
    function getUserVoteCandidate(){
        let poll_id = '<?PHP echo $poll_id;  ?>';
        $.ajax({
            url: 'async/usr_vote.php',
            data:{poll_id:poll_id},
            type: 'POST',
            success:function(data){
              if(!data.error){
                $('.votes').html(data);
              }
            }

        })
    }
    getUserVoteCandidate();

</script>
