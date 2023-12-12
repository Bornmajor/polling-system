<?php include('includes/header.php') ?>
<meta name="description" content="Polling system">
<title>Polls - Login</title>
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
         Account login
    </div>


    <div class="feedback"><!--feedback-->
  </div><!--feedback-->
    <form action="" class="login-form" method="post" autocomplete='off'>
    
    <input type="hidden" name="redirect_url" value='<?php if(isset($_GET['redirect_url'])){ echo $_GET['redirect_url']; }?>'>

    <input type="hidden" name="poll_id" value='<?php if(isset($_GET['poll_id'])){echo $_GET['poll_id'];} ?>'>
 
    <div class="form-floating mb-3">
    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="mail" required>
    <label for="floatingInput">Email address</label>
    </div>

    <div class="form-floating">
    <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name='pwd' required>
    <label for="floatingPassword">Password</label>
    </div> 




    <button type="submit" class="btn btn-primary w-100 mt-3 mb-2">Proceed</button>

  
    </form>
   
  

     <a href="?component=forget_password" class="mt-3">Forget password</a>
     <br>
    <a href="?component=registration" class="mb-3">Create account</a>


     </div><!--form_interactions-->
  

    

    

</div>

</div>

<script>
    $('document').ready(function(){

        // $('.env-stp').addClass('completed');
    })
    $('.login-form').submit(function(e){
        e.preventDefault();

        let postData = $(this).serialize();

        
        $.post('async/async_login.php',postData,function(data){
             $('.feedback').html(data);
        })
       

    })
</script>
