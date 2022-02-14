<?php
include('classes/User.class.php');

if(!isset($_POST['login'])) {
    header('location: index.php');
    exit();
}
$user = new User();
header('location: '.$user->getOAuth2URL());
if(isset($_POST['login']) && empty($_SESSION['state'])) header('location: '.$user->getOAuth2URL());
?>

