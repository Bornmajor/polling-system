<?php include('includes/header.php') ?>
<meta name="description" content="Polling system">
<title>Polls</title>
</head>
<body>
<?php checkLoginAuth(); ?>

<?php include('includes/navbar.php'); ?>

<div class="body-container"><!--body-->


<div class="get-started-poll card mb-3" >

  <div class="row g-0">
    <div class="col-md-4">
      <img src="images/survey.png" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Create a poll</h5>
        <a href="#" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#addPoll">Get started</a>
      </div>
    </div>
  </div>
</div>

<input type="search" name="" class='form-control search-box' placeholder='Search for ballot box..'>



<div class="polls_created"></div>


</div><!--body-->





<!-- Modal -->
<div class="modal fade" id="addPoll" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style='border:none;'>
    
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <img style='max-width:400px' src="images/checklist.png"  width='100%' alt="">
        
        <form action="" class='create_poll_form' method="post">

        <div class="feedback"></div>

        <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" placeholder="Poll" name='poll_title' required>
        <label for="floatingInput">Poll title</label>
        </div>  

        <button type="submit" class="btn btn-primary w-100 mt-3 mb-2">Create poll</button>
        
    
        </form>
      


      </div>
     
    </div>
  </div>
</div>




<script>
  function displayUsersPolls(){

    $.ajax({
        url: 'async/view_usr_polls.php',
        type: 'POST',
        success:function(data){
            if(!data.error){
                 $('.polls_created').html(data);

            }

        }
    })

  }


      displayUsersPolls();  

 $('.create_poll_form').submit(function(e){
    e.preventDefault();

    let postData = $(this).serialize();

    $.post('async/create_poll.php',postData,function(data){
        $('.feedback').html(data);
        $('.create_poll_form')[0].reset();

      if(!data.error){
       displayUsersPolls();
      loadPollsLinks();
      }
     

    })
 })
</script>
    