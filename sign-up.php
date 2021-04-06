<?php include('config/server.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('components/meta.php') ?>
    <title>CMS Local - Sign Up</title>
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
                    <h2 class="mb-4">Create an account</h2>
                    <form id="sign-up-form" method="post" action="sign-up.php">
                        <?php include('components/errors.php'); ?>
                        <div class="form-group mb-3">
                            <label class="mb-1" for="fullname">Full name*</label>
                            <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Eg: John Doe" value="<?php echo $fullname; ?>" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="mb-1" for="email">Email address*</label>
                            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="name@example.com" value="<?php echo $email; ?>" required>
                            <small id=" emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group mb-3">
                            <label class="mb-1" for="password_1">Password*</label>
                            <input type="password" class="form-control" id="password_1" name="password_1" placeholder="*******" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="mb-1" for="password_2">Confirm password*</label>
                            <input type="password" class="form-control" id="password_2" name="password_2" placeholder="*******" required>
                        </div>
                        <div class="form-check mb-3">
                            <input type="checkbox" class="form-check-input" id="teesNcees" required>
                            <label class="mb-1" class="form-check-label" for="teesNcees">I agree to the Terms and Conditions</label>
                        </div>
                        <div class="form-group position-relative mb-3">
                            <button type="submit" id="sign-me-up" name="sign_me_up" class="btn btn-primary">Sign up</button>
                            <div class="lds-ring spinner d-none">
                                <div></div>
                                <div></div>
                                <div></div>
                                <div></div>
                            </div>
                        </div>
                        <p>
                            Already a member? <a href="sign-in.php">Sign in</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <?php include('components/footer.php') ?>
</body>

</html>