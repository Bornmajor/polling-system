<?php 
if(isset($_GET['component'])){
$component = $_GET['component'];
}else{
$component = '';
}

switch($component){
case 'home';
include('components/home.php');
break;
case 'login';
include('components/login.php');
break;
case 'registration';
include('components/registration.php');
break;
case 'manage_poll';
include('components/manage_poll.php');
break;
case 'registration_poll';
include('components/registration_poll.php');
break;
case 'voting';
include('components/voting.php');
break;
case 'signout';
include('components/signout.php');
break;
default:
include('components/home.php');

}

?>
<?php include('includes/footer.php'); ?>
    

   

