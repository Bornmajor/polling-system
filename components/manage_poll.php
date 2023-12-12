<?php include('includes/header.php') ?>
<meta name="description" content="Polling system">
<title>
<?php
if(isset($_GET['poll_id'])){
    $poll_id = $_GET['poll_id'];
   $poll_title = getPollTitle($poll_id);
    echo 'Poll Id - '.$poll_id. ' : ' . $poll_title; 
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

<?php include('includes/navbar.php'); ?>

<div class="body-container"><!--body-->


<h2> Poll Id <i class="fas fa-arrow-right"></i> <?php echo $poll_id; ?></h2>
<h3><?php echo $poll_title; ?></h3>
<br>

<h4><span>No of Voters</span> <i class="fas fa-arrow-right"></i>

<span class="no_voters"></span>
</h4>

<h5><span>No of Registered voters</span> <i class="fas fa-arrow-right"></i>
<span class="no_registered_voters"></span>
</h5>


<br>

<h5>Registration link</h5>
<?php
$isHttps = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on';
// Get the protocol (HTTP or HTTPS)
$protocol = $isHttps ? 'https://' : 'http://';
// Get the host (domain or IP address)
$host = $_SERVER['HTTP_HOST'];
// Get the base URL
$baseUrl = $protocol . $host;
 $baseUrl;
?>

<div class="register_link"><span class='register_url'><?php echo $baseUrl  ?>/apps/polls/?component=registration_poll&poll_id=<?php echo $poll_id ?></span> 
 <span class='copy_btn  register_url_btn'><i class="fas fa-copy"></i></span>
</div>
<h5>Voting link</h5>
<div class="voting_link">
    <span class='voting_url'><?php echo $baseUrl;  ?>/apps/polls/?component=voting&poll_id=<?php echo $poll_id ?></span>
      <span class='copy_btn voting_url_btn'><i class="fas fa-copy"></i></span>
    </div>
<br>
<div class="candidates"><!--candidates-->

  
<form action="" method="post" class='add_candidate_form'>
<input type="hidden" name="poll_id" value="<?php echo $poll_id; ?>">
<input type="text"  class='form-control entry-cand-input' name='username' placeholder='Add candidate' required>
<button type="submit" class='btn btn-primary'>Add entry</button>

</form>

<h4>Candidates list</h4>
<div class="view_candidates"></div>




</div><!--candidates-->
<br><br>

<h4>Registered votes</h4>
<div class="registered_voters"></div>

</div><!--body-->


<script>


    $('.add_candidate_form').submit(function(e){
        e.preventDefault();
        let postData = $(this).serialize();

        $.post('async/add_candidate.php',postData,function(data){
            getCandidates();
            $('.add_candidate_form')[0].reset();
        })


       
    })

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

    function getTotalRegisteredVoters(){
        let poll_id = '<?php echo $poll_id  ?>';
        $.ajax({
            url: 'async/total_registered_voters_per_poll.php',
            type: 'POST',
            data: {poll_id:poll_id},
            success:function(data){
                $('.no_registered_voters').html(data);
            }
        })
    }

    function getCandidates(){
        let poll_id = '<?php echo $poll_id  ?>';
        $.ajax({
            url: 'async/candidate_list.php',
            type: 'POST',
            data: {poll_id:poll_id},
            success:function(data){
              $('.view_candidates').html(data);
            }
        })
        getTotalVoters();
    }
    function getRegisteredVotes(){
        let poll_id = '<?php echo $poll_id  ?>';
        $.ajax({
            url: 'async/registered_votes.php',
            type: 'POST',
            data: {poll_id:poll_id},
            success:function(data){
              $('.registered_voters').html(data);
            }
        })
        getTotalRegisteredVoters();
    }

    getCandidates();
    getTotalVoters();
    getTotalRegisteredVoters();
    getRegisteredVotes();

    $('.register_url_btn').click(function(){
 
        navigator.clipboard.writeText( $('.register_url').text());
    })
    $('.voting_url_btn').click(function(){
    
    navigator.clipboard.writeText( $('.voting_url').text());
    })
</script>