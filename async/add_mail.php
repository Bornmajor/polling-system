<?php
include('../includes/functions.php');

$mail = $_POST['mail'];
$mail = escapeString($mail);

$query = "SELECT * FROM users WHERE mail = '$mail'";
$get_mail = mysqli_query($connection,$query);
checkQuery($get_mail);

while($row = mysqli_fetch_assoc($get_mail)){
   $db_mail =  $row['mail'];
}
if(isset($db_mail)){
  failMsg('It seems your account already exist');

  echo '<a class="btn btn-primary" href="?component=login">Login</a>';

}else{
  successMsg('Add names');
?>


<form action="" class="register-form" method="post" autocomplete='off'>
        
<input type="hidden" name="mail" value='<?php echo $mail ?>'>

<div class="form-floating mb-3">
<input type="text" class="form-control" id="floatingInput" placeholder="Name" name='username' required>
<label for="floatingInput">Names</label>
</div>

<button type="submit" class="btn btn-primary w-100 mt-3 mb-2">Proceed</button>


</form>   
<?php
}
?>
<script>
    $('.env-stp').addClass('completed');

    $('.register-form').submit(function(e){
      e.preventDefault();
        let postData = $(this).serialize();

        $.post('async/add_username.php',postData,function(data){
          $('.feedback').html(data);
        })
    })
</script>

