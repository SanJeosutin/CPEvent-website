<?php
include('classes/User.class.php');
$user = new User();
?>
<nav class="navbar fixed-top navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand">
                <img src="sources/images/logo_chillplay.svg" width="30" height="30" class="d-inline-block align-top"
                    alt="Chill&Play Logo">
                Chill & Play
            </a>
            <div class="d-flex nav-item dropdown">
                <span class="align-middle">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                        aria-expanded="false">
                        <img class="rounded-circle"
                            src="<?php echo $user->getUserImage(); ?>" style="width: 32px; height: 32px;" alt="logo" class="logo">
                            <?php echo $user->getUserDiscordTag(); ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item">
                                <i class="fa fa-sign-out" aria-hidden="true"></i>
                                Logout
                            </a>
                        </li>
                    </ul>
                </span>
            </div>
        </div>
    </nav>