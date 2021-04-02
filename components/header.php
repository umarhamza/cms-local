<?php
session_start();

$loggedIn = false;

if (isset($_SESSION['email'])) {
    $loggedIn = true;
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['email']);
    header("location: sign-in.php");
}
?>
<header>
    <div class="container-fluid">
        <div class="row">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="/">CMS Local</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto align-items-center">
                        <li class="nav-item active">
                            <a class="nav-link" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="locations.php">Locations</a>
                        </li>
                        <li class="nav-item">
                            <?php 
                            if(!$loggedIn) {
                                echo '<a class="nav-link" href="sign-in.php" id="sign-in">Sign in</a>';
                            }                               
                            ?>
                        </li>
                        <li class="nav-item">
                            <?php 
                            if(!$loggedIn) {
                            echo '<a class="nav-link" href="sign-up.php">
                                <span class="btn btn-primary my-2 my-sm-0">Sign up</span>
                            </a>';
                            } else {
                                echo '<a class="nav-link" href="index.php?logout=1">
                                <span class="btn btn-primary my-2 my-sm-0">Sign out</span>
                            </a>';
                            }
                            ?>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
</header>