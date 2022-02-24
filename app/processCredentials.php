<?php
include('classes/User.class.php');

if(!isset($_POST['login'])) {
    if(isset($_SESSION['loggedIn']) == true){
        header('location: dashboard.php');
    }else{
        header('location: index.php');
    }
    exit();
}else{
    User::load();
    header('location: '.User::getOAuth2URL());
}
?>

