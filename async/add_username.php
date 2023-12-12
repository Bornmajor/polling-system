<?php
include('../includes/functions.php');

$mail = $_POST['mail'];
$username = $_POST['username'];

$mail = escapeString($mail);
$username = escapeString($username);


?>
<?php  successMsg('Add a password'); ?>
<form action="" class="register-form" method="post" autocomplete='off'>
        
<input type="hidden" name="mail" value='<?php echo $mail ?>'>
<input type="hidden" name="username" value='<?php echo $username ?>'>

<div class="form-floating">
<input type="password" class="form-control" id="floatingPassword" placeholder="Password" name='pwd' required>
<label for="floatingPassword">Password</label>
</div> 

<button type="submit" class="btn btn-primary w-100 mt-3 mb-2">Finish</button>
        
        
</form>  

<script>
 $('.user-stp').addClass('completed');

 
$('.register-form').submit(function(e){
    e.preventDefault();
    let postData = $(this).serialize();

    $.post('async/add_password.php',postData,function(data){
        $('.feedback').html(data);
    })
})


</script>