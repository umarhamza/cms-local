<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// initializing variables
$fullname = "";
$email    = "";
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', 'root', 'cms-local');

// REGISTER USER
if (isset($_POST['sign_me_up'])) {
    session_start();

    // receive all input values from the form
    $fullname = mysqli_real_escape_string($db, $_POST['fullname']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($fullname)) {
        array_push($errors, "Full name is required");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password_1)) {
        array_push($errors, "Password is required");
    }
    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }

    // first check the database to make sure 
    // a user does not already exist with the same fullname and/or email
    $user_check_query = "SELECT * FROM users WHERE fullname='$fullname' OR email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
        if ($user['fullname'] === $fullname) {
            array_push($errors, "Full name already exists");
        }

        if ($user['email'] === $email) {
            array_push($errors, "Email already exists");
        }
    }

    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        //Load Composer's autoloader
        require './vendor/autoload.php';

        //Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            // SMTP debugger
            // $mail->SMTPDebug = 1;

            //Send using SMTP
            $mail->isSMTP();

            //Set the SMTP server to send through
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = '';
            $mail->Password   = '';
            $mail->SMTPSecure = 'ssl';
            $mail->Port       = 465;

            //Recipients
            $mail->setFrom('umar@umarhamza.com', 'Umar Hamza');
            $mail->addAddress($email, $fullname);
            $mail->addBCC('umar@umarhamza.com');


            $body = '<p style="background:#212529;padding:25px 15px;color:#fff;text-align:center;font-size:28px;">CMS LOCAL</p>
            <h1 style="text-align:center;font-size:20px;margin-top: 75px;">THANK YOU FOR SIGNING UP</h1>
            <b style="height:120px;display:block;text-align:center;">Thanks you for signing up to CMS Local. You can login at anytime from <a href="' . $_SERVER["SERVER_NAME"] . '" target="_blank">' . $_SERVER["SERVER_NAME"] . '</a></b>
            <p style="background:#000;padding:15px;color:#ccc;text-align:center;">Copyright 2021 CMS Local</p>';

            //Content
            $mail->isHTML(true);
            $mail->Subject = 'Thank your for signing up';
            $mail->Body    = $body;
            $mail->AltBody = strip_tags($body);

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

        $password = md5($password_1); //encrypt the password before saving in the database

        $query = "INSERT INTO users (fullname, email, password) VALUES('$fullname', '$email', '$password')";
        mysqli_query($db, $query);
        $_SESSION['email'] = $email;
        $_SESSION['success'] = "You are now logged in";

        header('location: index.php');
    }
}


// SIGN USER IN
if (isset($_POST['log_me_in'])) {
    session_start();

    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
            $_SESSION['email'] = $email;
            $_SESSION['fullname'] = $fullname;
            $_SESSION['success'] = "You are now logged in";
            header('location: index.php');
        } else {
            array_push($errors, "Wrong email/password combination");
        }
    }
}
