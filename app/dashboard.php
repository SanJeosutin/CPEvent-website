<?php
include('reuseable/header.php');
include('reuseable/navbar.php');

$user->storeUserData();

if(!$user->isUserValid()){
    echo "User is not valid";
}

?>

<div class="jumbotron jumbotron-fluid">
    <div class="container py-4">
        <h1 class="display-4">Hi <?php echo $user->getUsername() ?>!</h1>
        <p class="lead">Welcome to Chill & Play <?php echo date('Y') ?> Events!</p>
        <br>
    </div>
</div>

<?php include('reuseable/footer.php') ?>