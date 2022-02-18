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
    <!-- Piwik script -->
    <script type="text/javascript">
        (function(window, document, dataLayerName, id) {
            window[dataLayerName] = window[dataLayerName] || [], window[dataLayerName].push({
                start: (new Date).getTime(),
                event: "stg.start"
            });
            var scripts = document.getElementsByTagName('script')[0],
                tags = document.createElement('script');

            function stgCreateCookie(a, b, c) {
                var d = "";
                if (c) {
                    var e = new Date;
                    e.setTime(e.getTime() + 24 * c * 60 * 60 * 1e3), d = "; expires=" + e.toUTCString()
                }
                document.cookie = a + "=" + b + d + "; path=/"
            }
            var isStgDebug = (window.location.href.match("stg_debug") || document.cookie.match("stg_debug")) && !window.location.href.match("stg_disable_debug");
            stgCreateCookie("stg_debug", isStgDebug ? 1 : "", isStgDebug ? 14 : -1);
            var qP = [];
            dataLayerName !== "dataLayer" && qP.push("data_layer_name=" + dataLayerName), isStgDebug && qP.push("stg_debug");
            var qPString = qP.length > 0 ? ("?" + qP.join("&")) : "";
            tags.async = !0, tags.src = "https://phrozbug.containers.piwik.pro/" + id + ".js" + qPString, scripts.parentNode.insertBefore(tags, scripts);
            ! function(a, n, i) {
                a[n] = a[n] || {};
                for (var c = 0; c < i.length; c++) ! function(i) {
                    a[n][i] = a[n][i] || {}, a[n][i].api = a[n][i].api || function() {
                        var a = [].slice.call(arguments, 0);
                        "string" == typeof a[0] && window[dataLayerName].push({
                            event: n + "." + i + ":" + a[0],
                            parameters: [].slice.call(arguments, 1)
                        })
                    }
                }(i[c])
            }(window, "ppms", ["tm", "cm"]);
        })(window, document, 'dataLayer', 'a2e3de91-30c3-4f03-97c6-fcc64fdfc541');
    </script><noscript><iframe src="https://phrozbug.containers.piwik.pro/a2e3de91-30c3-4f03-97c6-fcc64fdfc541/noscript.html" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>


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
                <div class="text-center">
                    <h1 class="text-warning">Contact</h1>
                </div>
                <div class="col-10 col-md-8 col-lg-6">

                    <!-- form -->
                    <form class="form-example" method="post" action="submit.php">


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

    <!-- Footer -->
    <footer class="p-5 bg-dark text-white text-center position-relative">
        <div class="container">
            <p class="lead">Copyright &copy; 2022 Marc Roelofs</p>

        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>