<?php
include('../includes/functions.php');

echo "Ok";

?>

<form action="" class="login-form" method="post" autocomplete='off'>
        
        <div class="stepper-wrapper">

          <div class="stepper-item ">
            <div class="step-counter completed active"><i class="fas fa-envelope"></i></div>
            <!-- <div class="step-name">First</div> -->
          </div>
    
          <div class="stepper-item">
            <div class="step-counter"><i class="fas fa-user"></i></div>
          </div>
          <div class="stepper-item  ">
            <div class="step-counter"><i class="fas fa-key"></i></div>
            
          </div>
        </div>
    
 
         <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" placeholder="Name" required>
        <label for="floatingInput">Names</label>
        </div>
    
        <button type="submit" class="btn btn-primary w-100 mt-3 mb-2">Proceed</button>
    
      
        </form>