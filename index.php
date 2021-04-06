<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('components/meta.php') ?>
    <title>CMS Local - Home</title>
</head>

<body class="homepage">
    <?php include('components/header.php') ?>
    <main id="main">
        <div class="hero" style="background-image: url('./images/homepage-hero.jpeg');">
            <div class="hero-container">
                <?php if (!$loggedIn) : ?>
                    <h1>Create an account or sign up</h1>
                    <a href="sign-in.php" class="btn btn-primary my-2 my-sm-0">Sign in</a>
                    or
                    <a href="sign-up.php" class="btn btn-primary my-2 my-sm-0">Sign up</a>
                <?php else : ?>
                    <h1>Welcome! You are signed in</h1>
                    <a href="locations.php" class="btn btn-primary my-2 my-sm-0">View Locations</a>
                <?php endif; ?>
            </div>
        </div>
    </main>
    <?php include('components/footer.php') ?>
</body>

</html>