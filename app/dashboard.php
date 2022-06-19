<?php


include('reuseable/header.php');
include('reuseable/navbar.php');

echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';

//!super messy code, but it works :D
//!need to re factor when all of the components works!

?>

<div class="jumbotron jumbotron-fluid">
    <div class="container py-4">
        <h1 class="display-4">Hi <?php echo $_SESSION['username'] ?>!</h1>
        <p class="lead">Welcome to Chill & Play <?php echo date('Y') ?> Events!</p>
        <hr>
        <p class="lead">
            <strong>
                <?php
                switch ($_GET['page']) {
                    case 'events':
                        echo 'Events';
                        break;
                    default:
                        echo 'Work In Progess';
                        break;
                }
                ?>
            </strong>
            -
            <em>
                <?php
                switch ($_GET['page']) {
                    case 'events':
                        echo 'Art Competitions running from 7th to 21st of March 2022.';
                        echo '<br> <strong>Theme -</strong> <em>A warm, cozy coffee shop</em>';
                        break;

                    default:
                        echo 'Please be patient as we are working \'super hard\' to roll out new features.';
                        break;
                }
                ?>
            </em>
        </p>
        <br>
        <?php
        switch ($_GET['page']) {
            case 'events':
        ?>
                <div class="container">
                    <form method="POST" action="processSubmission.php">
                        <div class="mb-3">
                            <label class="form-label" for="artworkTittle">Artwork Title</label>
                            <input class="form-control" id="artworkTittle" name="artworkTittle" type="text" required />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="uploadArtwork">Upload Artwork</label>
                            <input class="form-control" id="uploadArtwork" name ="artworkSource" type="file" accept="image/png, image/gif, image/jpeg" required></input>
                        </div>
                        <div class="mb-3">
                            <p class="text-muted">
                                <small>
                                    By submitting, you agree to our <a href="./sources/legalDocuments/PrivacyPolicy.html">Privacy Policy</a>.
                                </small>
                            </p>
                        </div>
                            <button class="btn bg-green-secondary text-dark" id="submitMyArt" name="submitMyArt" type="submit">Submit my artwork</button>
                    </form>
                </div>

        <?php
                break;

            default:
                echo '<img src="https://c.tenor.com/_4YgA77ExHEAAAAC/rick-roll.gif" class="img-fluid" alt="Sumetin\' kul 😎">';
                break;
        }
        ?>
    </div>
</div>

<?php include('reuseable/footer.php') ?>