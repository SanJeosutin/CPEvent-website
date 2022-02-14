<?php if (session_status() == PHP_SESSION_NONE) session_start(); ?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="title" content="Chill&Play Events">
    <meta name="author" content="sanjustin">
    <script src="https://kit.fontawesome.com/629067d246.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="sources/styles/main.css" rel="stylesheet">
    <title>Chill & Play Events</title>
</head>

<body class="bg-dark text-white">
    <div class="d-flex flex-column min-vh-100 justify-content-center align-items-center text-center h-100">
        <div class="card bg-dark border border-dark" style="width: 18rem;">
            <img src="sources/images/logo_chillplay.png" class="card-img-top" alt="Chill & Play Logo">
            <div class="card-body">
                <h1 class="card-title text-green-primary">Chill & Play</h1>
                <h2 class="card-subtitle mb-2 text-green-secondary"> <?php echo date('Y') ?> Events</h2>
                <br>
                <form method="POST" name="login" action="processCredentials.php">
                    <button type="submit" class="btn btn-primary text-dark bg-green-secondary" name="login">Click me to get started!</button>
                </form>
            </div>
        </div>
    </div>
    <?php include('reuseable/footer.php') ?>
