<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/config.php';

session_start();

if (!empty($_SESSION['_contact_form_error'])) {
    $error = $_SESSION['_contact_form_error'];
    unset($_SESSION['_contact_form_error']);
}

if (!empty($_SESSION['_contact_form_success'])) {
    $success = true;
    unset($_SESSION['_contact_form_success']);
    header("location: succes.php");
    exit;
}

?>
<!doctype html>
<html lang="en" class="h-100">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css" />
    <title>Contact</title>

    <!-- reCAPTCHA Javascript -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body class="h-100">
    <style>
        body {
            background-color: #212529;
            font-family: 'Open Sans', sans-serif;
            font-size: 15px;
            font-weight: 400;
            color: #888;
            line-height: 30px;
            text-align: center;
        }

        a {
            color: #a365bc;
            text-decoration: none;
            transition: all .3s;
        }

        a:hover a:focus {
            color: #a365bc;
            border: 0;
            text-decoration: none;
        }

        h1 {
            font-size: 26px;
            font-weight: 300;
            color: #555;
            line-height: 46px;
            font-style: italic;
        }

        ::-moz-selection {
            background: #8542a0;
            color: #fff;
            text-shadow: none;
        }

        ::selection {
            background: #8542a0;
            color: #fff;
            text-shadow: none;
        }
    </style>
    <!--Navigation-->
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 fixed-top">
        <div class="container">
            <a href="../index.php" class="navbar-brand">SKILLSBUDDY</a>
        </div>
    </nav>
    <!-- form -->
    <div class="bg-dark text-light p-5 ">
        <div class="container h-100">
            <div class="row h-100 justify-content-center align-items-center">
                <div class="col-10 col-md-8 col-lg-6">
                    <form class="form-example" method="post" action="submit.php">
                        <h1>
                            Contact
                        </h1>

                        <?php
                        if (!empty($success)) {

                        ?>
                            <div class="alert alert-success">Your message was sent successfully!
                            </div>

                        <?php
                        }
                        ?>

                        <?php
                        if (!empty($error)) {
                        ?>
                            <div class="alert alert-danger"><?= $error ?></div>
                        <?php
                        }
                        ?>

                        <div class="form-group">
                            <label for="name">Je naam</label>
                            <input type="text" name="name" id="name" placeholder="Naam..." class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="email">Je emailadres</label>
                            <input type="email" name="email" id="email" placeholder="Email..." class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="subject">Je onderwerp</label>
                            <input type="text" name="subject" id="subject" placeholder="Onderwerp..." class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="message">Je bericht</label>
                            <textarea name="message" id="message" placeholder="Bericht..." class="form-control" rows="12"></textarea>
                        </div>
                        <br>
                        <div class="form-group text-center">
                            <div class="g-recaptcha" data-sitekey="<?= CONTACTFORM_RECAPTCHA_SITE_KEY ?>"></div>
                        </div>
                        <br>
                        <button class="btn btn-primary btn-customized">Verstuur</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>