<?php include('includes/header.php') ?>
<meta name="description" content="Polling system">
<title>
<?php
if(isset($_GET['poll_id'])){
    $poll_id = $_GET['poll_id'];
   $poll_title = getPollTitle($poll_id);
    echo 'Registration of - '.$poll_id. ' : ' . $poll_title; 
}else{
    if(empty($_GET['poll_id'])){
        header("Location: ?components=home");
    }
}
?>

</title>
</head>
<body>
<?php 
if(!isset($_SESSION['usr_id'])){
    header("Location: ?component=login&redirect_url=poll_registration&poll_id=$poll_id");
}
?>

<?php include('includes/navbar.php'); ?>

<div class="body-container"><!--body-->

<div class="card_register_container"><!--card-container-->

<div class="card reg_poll_card" >
  <img src="images/survey.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h3 class="card-title">Poll Id - <?php echo $poll_id ?></h3>
    <h5 class="card-title"><?php echo $poll_title ?></h5>
    <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
   
    <span class="register_status"></span>
    
  </div>
</div>



</div><!--card-container-->


</div><!--body-->

<script>
    function getStatusRegisteredPoll(){
        let poll_id = '<?php echo $poll_id ?>';
        $.ajax({
            url: 'async/register_poll_status.php',
            type: 'POST',
            data: {poll_id:poll_id},
            success:function(data){
              $('.register_status').html(data);
            }

        })
    }
    getStatusRegisteredPoll();

</script>