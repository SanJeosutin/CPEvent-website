<?php
require_once("./classes/DatabaseHandler.class.php");

if(!isset($_POST['submitMyArt'])) {
    header('location: dashboard.php?page=events');
    exit();
}else{
    $db = new DatabaseHandler();
    $db->exec("INSERT INTO `artwork` (`id`, `title`, `image`, `user_id`) VALUES (NULL, '".$_POST['artworkTittle']."', '".$_FILES['uploadArtwork']['name']."', '".$_SESSION['user_id']."')");
    $db->disconnect();
}
?>