<?php
include('../includes/functions.php');


$mail = $_POST['mail'];
$username = $_POST['username'];
$pwd = $_POST['pwd'];

$username = $_POST['username'];
$username = escapeString($username);


$mail = escapeString($mail);
$username = escapeString($username);
$pwd = escapeString($pwd);
// password encryption

$pwd = password_hash($pwd,PASSWORD_BCRYPT,array('cost' => 12));
//lower case
$mail = strtolower($mail);
$usr_id = generateUserId();

$query = "INSERT INTO users(usr_id,username,mail,pwd)VALUES('$usr_id','$username','$mail','$pwd')";
$insert_user = mysqli_query($connection,$query);
checkQuery($insert_user);
if($insert_user){
    $_SESSION['usr_id'] = $usr_id;
    
    successMsg('Account setup successfully');
    successMsg('Redirecting...');

    echo '<script>
    setTimeout(() => {
        window.location.href = "?component=home";
    }, 3000);
    </script>';

}else{
    failMsg("Account setup failed");

    echo '<script>
    setTimeout(() => {
        window.location.href = "?component=registration";
    }, 2000);
    </script>';
}
?>

<script>
   $('.key-stp').addClass('completed');

</script>
