<?php

include_once('connection.php');

session_start();

$id = $_GET['id'];

if (!isset($_SESSION['loggedInUser'])) {
    header("Location: login.php?id=$id&file=edit.php");
    die();
}


include "connectDbase.php";

$pdo = connectDatabase();

if (isset($_POST['submitButton'])) {
    $id = $_POST['id'];
    $taal = $_POST['taal'];
    $onderdeel = $_POST['onderdeel'];
    $onlinedoc = $_POST['onlinedoc'];
    $snippet = $_POST['snippet'];
    $notities = $_POST['notities'];
    $videoid = $_POST['videoid'];

    $sql = "UPDATE skills 
    SET
        taal=:taal,
        onderdeel=:onderdeel,
		onlinedoc=:onlinedoc,
        snippet=:snippet,
        notities=:notities,
        videoid=:videoid
    WHERE id=:id";

    $data = [
        'taal' => $taal,
        'onderdeel' => $onderdeel,
        'onlinedoc' => $onlinedoc,
        'snippet' => $snippet,
        'notities' => $notities,
        'videoid' => $videoid,
        'id' => $id
    ];


    $stmt = $pdo->prepare($sql);
    $stmt->execute($data);


    header("location: weergave.php?id=$id");
    exit;
}

$id = $_GET['id'];
$weergave = $pdo->query("SELECT * FROM skills WHERE id = $id");
$weergave = $weergave->fetch();

$taal_current = $weergave['taal'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />
    <title>Skillsbuddy - Eindopdracht Marc Roelofs</title>
</head>

<body>
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
            <a href="index.php" class="navbar-brand">SKILLSBUDDY</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navmenu">
                <ul class="navbar-nav ms-auto">


                    <li class="nav-item">
                        <a href="/contact/contact.php" class="nav-link">Contact</a>
                    </li>
                    
                </ul>
                <button id="login" name="login" class="btn btn-dark text-warning">
                    <?php if (isset($_SESSION['loggedInUser'])) : ?>
                        <?php echo $_SESSION['loggedInUser'] ?>
                    <?php else : ?>
                        <a href="login.php?id=&file=index.php" class="text-decoration-none text-light">Login</a>
                    <?php endif ?>

                </button>
            </div>
        </div>

    </nav>

    <!--Weergave edit area-->

    <section class="bg-dark text-light p-5 p-lg-0 pt-lg-5 text-center text-sm-start">
        <div class="container">
            <div class="row g-4">
                <div class="col-md">
                    <h2 class="text-warning">Bewerken</h2>
                    <div class="d-sm-flex align-items-center justify-content-between">
                        <div class="input-group">
                            <form action="" method="POST">
                                <input type="hidden" id="id" name="id" value="<?= $weergave['id'] ?>">
                                <label for="taal">Taal:</label><br>
                                <select name="taal" id="taal">
                                    <option value="HTML" <?= $taal_current == "HTML" ? 'selected' : '' ?>>HTML</option>
                                    <option value="CSS" <?= $taal_current == "CSS" ? 'selected' : '' ?>>CSS</option>
                                    <option value="Bootstrap" <?= $taal_current == "Bootstrap" ? 'selected' : '' ?>>Bootstrap</option>
                                    <option value="PHP" <?= $taal_current == "PHP" ? 'selected' : '' ?>>PHP</option>
                                    <option value="CSS" <?= $taal_current == "CSS" ? 'selected' : '' ?>>CSS</option>
                                    <option value="PHP-PDO" <?= $taal_current == "PHP-PDO" ? 'selected' : '' ?>>MySQL/PHP-PDO</option>
                                    <option value="JavaScript" <?= $taal_current == "JavaScripy" ? 'selected' : '' ?>>JavaScript</option>
                                    <option value="Python" <?= $taal_current == "Python" ? 'selected' : '' ?>>Python</option>
                                    <option value="GIT" <?= $taal_current == "GIT" ? 'selected' : '' ?>>Git</option>
                                    <option value="Diversen" <?= $taal_current == "Diversen" ? 'selected' : '' ?>>Diversen</option>
                                </select><br><br>
                                <label for="onderdeel">Onderdeel:</label>
                                <input type="text" id="onderdeel" name="onderdeel" value="<?= $weergave['onderdeel'] ?>"><br><br>

                                <label for="onlinedoc">Online documentatie:</label>
                                <textarea id="onlinedoc" name="onlinedoc" rows="1" cols="40"><?php echo $weergave['onlinedoc'] ?></textarea><br><br>

                                <label for="notities">Notities:</label>
                                <textarea id="notities" name="notities" rows="4" cols="40"><?php echo $weergave['notities'] ?></textarea><br><br>

                                <label for="videoid">ID Video:</label>
                                <input type="text" id="videoid" name="videoid" value="<?= $weergave['videoid'] ?>"> <br><br>

                                <label for="snippet">Code snippet:</label>
                                <textarea id="snippet" name="snippet" rows="15" cols="40"><?php echo PHP_EOL . $weergave['snippet'] ?></textarea><br><br>

                                <input type="submit" name="submitButton">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <img class="img-fluid w-80 d-none d-sm-block" src="img/edit.svg" alt="Man editting card">
                </div>
            </div>
        </div>

    </section>

    <!-- Footer -->
    <footer class="p-5 bg-dark text-white text-center position-relative">
        <div class="container">
            <p class="lead">Copyright &copy; 2022 Marc Roelofs</p>
            <a href="#" class="position-absolute bottom-0 end-0 p-5">
                <i class="bi bi-arrow-up-circle h1"></i>
            </a>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>


</body>

</html>