<?php include('includes/header.php') ?>
<meta name="description" content="Polling system">
<title>Polls - Registration</title>
</head>
<body>

<div class="container">


<div class="form-container">

    
     <div class="illustration d-flex flex-column justify-content-center align-items-center">
        <img  class='illustration_img' width='100%' src="images/survey.png" alt="">
        <h5 class="title mb-3 fw-bolder"><span style='color:#0d6efd'>Polling</span>  system</h5>
     </div>


     <div class="form_interactions p-3"><!--form_interactions-->

     <div class="mb-3 fw-bolder fs-5 d-flex justify-content-center">
         Account setup
    </div>

    <div class="stepper-wrapper">
      <div class="env-stp stepper-item">
        <div class="step-counter active"><i class="fas fa-envelope"></i></div>
        <!-- <div class="step-name">First</div> -->
      </div>

      <div class="user-stp stepper-item">
        <div class="step-counter"><i class="fas fa-user"></i></div>
      </div>
      <div class="key-stp stepper-item  ">
        <div class="step-counter"><i class="fas fa-key"></i></div>
     
      </div>
    </div>

    <div class="feedback"><!--feedback-->

   

    <form action="" class="register-form" method="post" autocomplete='off'>
        

    <div class="form-floating mb-3">
    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="mail" required>
    <label for="floatingInput">Email address</label>
    </div>



    <button type="submit" class="btn btn-primary w-100 mt-3 mb-2">Proceed</button>

  
    </form>
   
    </div><!--feedback-->

     <a href="?component=forget_password" class="mt-3">Forget password</a>
     <br>
    <a href="?component=login" class="mb-3">Login</a>


     </div><!--form_interactions-->
  

    

    

</div>

</div>

<script>
    $('document').ready(function(){

        // $('.env-stp').addClass('completed');
    })
    $('.register-form').submit(function(e){
        e.preventDefault();

        let postData = $(this).serialize();

        
        $.post('async/add_mail.php',postData,function(data){
             $('.feedback').html(data);
        })
       

    })
</script>
