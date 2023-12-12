<?php
include('connection.php');


function escapeString($string){
    global  $connection;
   return mysqli_real_escape_string($connection,$string);
 
 }

  //success msg
function successMsg($msg){
    echo '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    '.$msg.'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }
  
  //fail msg
  function failMsg($msg){
    echo '
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    '.$msg.'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }
 
 
function checkQuery($result){
    global $connection;
    if($result){
  
    }else{
        die("Query failed".mysqli_error($connection));
    
    }  
  }

  function generateUserString($length_of_string){
    // String of all alphanumeric character
    $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';   // Shuffle the $str_result and returns substring
    // of specified length
    $gen_video_id = "Q-U". substr(str_shuffle($str_result),
                        0, $length_of_string);
      
   return $gen_video_id;
  }
  
  function generateUserId(){
    global $connection;

    $usr_id = generateUserString(50);

    $query = "SELECT * FROM users WHERE usr_id = '$usr_id'";
    $check_usr_id = mysqli_query($connection,$query);

    if(mysqli_num_rows($check_usr_id) !== 0){
       
    return $usr_id = generateUserString(50);

    }else{
    
    return $usr_id;
    }

    

  }

  function checkLoginAuth(){
    if(!isset($_SESSION['usr_id'])){
      header("Location: ?component=login");
    }
  }

  function getUsrToken($usr_id){
    global $connection;

   $usr_id = escapeString($usr_id);

    $query = "SELECT * FROM users WHERE usr_id = '$usr_id'";
    $select_token = mysqli_query($connection,$query);
    checkQuery($select_token);
    while($row = mysqli_fetch_assoc($select_token)){
    $usr_token = $row['usr_token'];

    }
    return $usr_token;

  }

  function getPollUsrToken($poll_id){
    global $connection;

    $poll_id = escapeString($poll_id);
    $query = "SELECT * FROM polls WHERE poll_id = $poll_id";
    $select_usr_token = mysqli_query($connection,$query);
    checkQuery($select_usr_token);

    while($row = mysqli_fetch_assoc($select_usr_token)){
      $usr_token = $row['usr_token'];
    }

    return $usr_token;


  }

  function getPollTitle($poll_id){
    global $connection;
    $poll_id = escapeString($poll_id);

    $query = "SELECT poll_title FROM polls WHERE poll_id = $poll_id";
    $select_poll_title = mysqli_query($connection,$query);
    checkQuery($select_poll_title);

    while($row = mysqli_fetch_assoc($select_poll_title)){
    $poll_title = $row['poll_title'];
    }

    return $poll_title;


  }
  function getUsername($usr_token){
    global $connection;
    $usr_token = escapeString($usr_token);

    $query = "SELECT * FROM users WHERE usr_token = $usr_token";
    $select_username = mysqli_query($connection,$query);
    checkQuery($select_username);

    while($row = mysqli_fetch_assoc($select_username)){
    $username = $row['username'];

    }
    return $username;

  }

  function emptyTableRowMsg($query,$msg){
    global $connection;
    
    $total_rows = mysqli_num_rows($query);
    if($total_rows == 0){
        return '<div class="no_row_data">
        <img src="images/empty.png" width="150px" alt="">
        '.$msg.
        '</div>';
    }


  }
  
  function getCandidatesName($cand_id){
    global $connection;

    $query = "SELECT username FROM candidates WHERE cand_id = $cand_id";
    $select_username = mysqli_query($connection,$query);
    checkQuery($select_username);
    while($row = mysqli_fetch_assoc($select_username)){
    $username =  $row['username'];
    }

    return $username;

  }
?>