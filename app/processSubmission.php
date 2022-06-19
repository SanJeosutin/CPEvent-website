<?php
if(session_status() == PHP_SESSION_NONE) session_start();

include("./classes/GenericFunction.class.php");
require_once("./classes/DatabaseHandler.class.php");


if(!isset($_POST['submitMyArt'])) {
    header('location: dashboard.php?page=events');
    exit();
}else{
    $db = new DatabaseHandler();
    $db->exec("INSERT INTO `userartwork` (`userID`, `artwork_title`, `artwork_source`) VALUES (".$_SESSION['user_id'].", '".$_POST['artworkTittle']."', '".$_POST['artworkSource']."');");
    $db->disconnect();
}
?>