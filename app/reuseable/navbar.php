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
                            src="<?php echo $_SESSION['userProfilePicture'] ?>" style="width: 32px; height: 32px;" alt="logo" class="logo">
                            <?php echo $_SESSION['userDiscordTag'] ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="dashboard.php?page=events">
                                <i class="fas fa-calendar-check"></i>
                                Events
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="dashboard.php?page=scoreboard">
                                <i class="fas fa-clipboard-list"></i>
                                Scoreboard
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="dashboard.php?page=myStats">
                            <i class="fas fa-user-alt"></i>
                                My Stats
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="logout.php">
                                <i class="fa fa-sign-out" aria-hidden="true"></i>
                                Logout
                            </a>
                        </li>
                    </ul>
                </span>
            </div>
        </div>
    </nav>