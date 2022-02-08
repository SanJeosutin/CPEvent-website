<?php
    if(!isset($_SESSION)) session_start();

    include('classes/User.class.php');
    $user = new User();

    echo $user->getUserDiscordTag();

    //echo "<br><br>SESSION_STATE : ".$_SESSION['state']."<br> CURRUNT_STATE : ".$user->getState();
    //echo "<br>IS_VALID_LOGIN : ".$user->getValidLogin();
?>

<?php include('reuseable/header.php') ?>
    <div class="d-flex flex-column min-vh-100 justify-content-center align-items-center text-center h-100">
        <div class="card bg-dark" style="width: 18rem;">
            <img src="sources/images/logo_chillplay.svg" class="card-img-top" alt="Chill & Play Logo">
            <div class="card-body">
                <h1 class="card-title text-green-primary">Chill & Play</h1>
                <h2 class="card-subtitle mb-2 text-green-secondary"> <?php echo date('Y') ?> Events</h2>
                <br>
                <a href="<?php echo $user->getOAuth2URL() ?>" class="btn btn-primary text-dark bg-green-secondary">Click me to get started!</a>
            </div>
        </div>
    </div>
<?php include('reuseable/footer.php') ?>