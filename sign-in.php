<?php include('components/server.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('components/meta.php') ?>
    <title>CMS Local - Sign In</title>
</head>

<body>
    <?php include('components/header.php') ?>

    <main id="main">
        <div class="container-fluid">
            <div class="row py-5">
                <div class="col col-12 col-md-6">
                    <img src="./images/register-hero.png" class="img-fluid" alt="illustration of women working on website" />
                </div>
                <div class="col col-12 col-md-6 d-flex flex-column justify-content-center">
                    <h2 class="mb-4">Sign In</h2>
                    <form id="sign-in-form" method="post" action="sign-in.php">
                        <?php include('components/errors.php'); ?>
                        <div class="form-group mb-3">
                            <label class="mb-1" for="email">Email address*</label>
                            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="name@example.com" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="mb-1" for="password">Password*</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="*******" required>
                        </div>
                        <div class="form-group position-relative mb-3">
                            <button type="submit" id="log-me-in" name="log_me_in" class="btn btn-primary">Sign in</button>
                            <div class="lds-ring spinner d-none">
                                <div></div>
                                <div></div>
                                <div></div>
                                <div></div>
                            </div>
                        </div>
                        <p>
                            Not a member yet? <a href="sign-up.php">Sign up</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <?php include('components/footer.php') ?>
</body>

</html>