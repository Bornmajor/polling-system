<!--LG Screen navbar-->
<ul id='navbar'>
<li><br></li>
<hr style='margin:0px;'>
 

  <li><a class="active" href="?component=home"><i class="fas fa-home"></i> Home</a></li>
  <hr style='margin:0px;'>
  <div class='nav_titles'>Polls</div>

   <span class='polls_links'></span>

<!--if user is admin view-->



  
    <li> <a class='nav_bar_links'  href="#home"><i class="fas fa-user-circle"></i>
    <?php
   $usr_id = $_SESSION['usr_id'];
   $usr_id = escapeString($usr_id);
   $query = "SELECT * FROM users WHERE usr_id = '$usr_id'";
   $select_name = mysqli_query($connection,$query);
   checkQuery($select_name);
     while($row = mysqli_fetch_assoc($select_name)){
      $db_username = $row['username'];
     }
     $words  = explode(" ",  $db_username);

    $firstname = $words[0];
    //$secondname = $words[1];
     echo $firstname;
   ?>
   
  </a>
  </li>


  <hr style='margin:10px;'>
    <li><a class='nav_bar_links'  href="?component=signout"><i class="fas fa-sign-out-alt"></i> Logout </a></li>
  
 

</ul>
<!--LG Screen navbar-->

<!--SM Screen navbar-->
<button id='menu' style='margin:20px;' class="btn btn-success menu"  type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
<i style='font-size:30px;' class="fas fa-bars"></i>
</button>

<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasExampleLabel"><img  src="images/navlogo.png"  height='80px' alt=""></h5>
    <button  type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <div class='nav_links'>
    <a class='nav_bar_links'  href="#home"><i class="fas fa-user-circle"></i>
    <?php
   $usr_id = $_SESSION['usr_id'];
   $usr_id = escapeString($usr_id);
   $query = "SELECT * FROM users WHERE usr_id = '$usr_id'";
   $select_name = mysqli_query($connection,$query);
   checkQuery($select_name);
     while($row = mysqli_fetch_assoc($select_name)){
      $db_username = $row['username'];
     }
     $words  = explode(" ",  $db_username);

    $firstname = $words[0];
    //$secondname = $words[1];
     echo $firstname;
   ?>
  </a>
  
    <hr style='margin:5px;'>
    <a  href="dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
    <hr style='margin:5px;'>
      <div class='nav_titles'>Polls</div>
      <?php
      $usr_token =  getUsrToken($_SESSION['usr_id']);

      $query = "SELECT * FROM polls WHERE usr_token = '$usr_token'";
      $select_token = mysqli_query($connection,$query);
      checkQuery($select_token);
      
      if(mysqli_num_rows($select_token) !== 0){
          while($row = mysqli_fetch_assoc($select_token)){
          $poll_id = $row['poll_id'];
          $poll_title = $row['poll_title'];
      
          ?>
        <a class='nav_bar_links'  href="#"> <i class="fas fa-box-open"></i>
        <?php echo $poll_title ?></a>
        <hr style='margin:5px;'>
      
          <?php
          }
      }
      
      ?>


     <hr style='margin:10px;'>
    <a class='nav_bar_links'  href="signout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</a>
 
    
    

    </div>


  </div>
</div>
<!--SM Screen navbar-->


<script>
  function loadPollsLinks(){
    $.ajax({
      url: 'async/poll_links_nav.php',
      type: 'POST',
      success:function(data){
         $('.polls_links').html(data);
      } 
    })
  }

 
    loadPollsLinks();

</script>