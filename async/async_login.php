<?php
include('../includes/functions.php');


$mail = $_POST['mail'];
$pwd = $_POST['pwd'];

$mail = escapeString($mail);
$pwd = escapeString($pwd);

$mail = strtolower($mail);
$query = "SELECT * FROM users WHERE mail = '$mail' ";
$select_user = mysqli_query($connection,$query);
checkQuery($select_user);

if(mysqli_num_rows($select_user) !== 0){
   
while($row = mysqli_fetch_assoc($select_user)){
    $db_usr_id =  $row['usr_id'];
    $db_pwd  = $row['pwd'];
}
 
  if(password_verify($pwd,$db_pwd)){
 
    $_SESSION['usr_id'] = $db_usr_id;
     successMsg('Login successfully!!');
     successMsg('Redirecting...');

     ?>
     <script>
      <?php 
      if(!empty($_POST['poll_id'])){
        $poll_id = $_POST['poll_id'];
        // if(empty($poll_id)){
        //   return false;
        // }
         
        if(!empty($_POST['redirect_url'])){
        $redirect_url = $_POST['redirect_url'];

        // if(empty($redirect_url)){
        //   return false;
        // }
       
        if($redirect_url == 'poll_registration'){
        echo 'setTimeout(() => {
           window.location.href = "?component=registration_poll&poll_id='.$poll_id.'";
        }, 2000);';
        }else if($redirect_url == 'poll_voting'){
          echo 'setTimeout(() => {
            window.location.href = "?component=voting&poll_id='.$poll_id.'";
         }, 2000);';
        }
      

        }
    
     
      }else{
        echo 'setTimeout(() => {
          window.location.href = "?component=home";
      }, 2000);';
      }
      ?>
      
     </script>

     <?php

  }else{
     failMsg('Wrong credentials');
  }

  
}else{
    failMsg('Email address unavailable');
}

?>