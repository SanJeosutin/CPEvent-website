<?php if(session_status() == PHP_SESSION_NONE) session_start() ?>

<?php

include('classes/User.class.php');

User::load();
User::storeUserData();

if(!isset($_SESSION['loggedIn']) && !User::isUserValid()){
    header('Location: logout.php');
    exit();
    
}else if(User::isUserValid()){
    $_SESSION['loggedIn'] = true;
    $_SESSION['user_id'] = User::getUserId();
    $_SESSION['username'] = User::getUsername();
    $_SESSION['userDiscordTag'] = User::getUserDiscordTag();
    $_SESSION['userProfilePicture'] = User::getUserImage();
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="title" content="Chill&Play Events">
    <meta name="author" content="sanjustin">
    <script src="https://kit.fontawesome.com/629067d246.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="sources/styles/main.css" rel="stylesheet">    
    <title>Chill & Play Events</title>
</head>

<body class="bg-dark text-white padding-content">