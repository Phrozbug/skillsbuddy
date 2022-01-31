<?php

include_once('connection.php');

session_start();

$id = NULL;

if (!isset($_SESSION['loggedInUser'])) {
    header("Location: login.php?id=$id&file=insert.php");
    die();
}

include "connectDbase.php";

$pdo = connectDatabase();

if (isset($_POST['submitButton'])) {
    $taal = $_POST['taal'];
    $onderdeel = $_POST['onderdeel'];
    $onlinedoc = $_POST['onlinedoc'];
    $snippet = $_POST['snippet'];
    $notities = $_POST['notities'];
    $videoid = $_POST['videoid'];

    $sql = "INSERT INTO skills (taal, onderdeel, onlinedoc, snippet, notities, videoid) 
    VALUES (:taal, :onderdeel, :onlinedoc, :snippet, :notities, :videoid)";

    $data = [
        'taal' => $taal,
        'onderdeel' => $onderdeel,
        'onlinedoc' => $onlinedoc,
        'snippet' => $snippet,
        'notities' => $notities,
        'videoid' => $videoid,
    ];


    $stmt = $pdo->prepare($sql);
    $stmt->execute($data);


    header("location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css" />
    <title>Skillsbuddy - Eindopdracht Marc Roelofs</title>
</head>

<body>
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

    <!--Weergave insert area-->

    <section class="bg-dark text-light p-5 p-lg-0 pt-lg-5 text-center text-sm-start">
        <div class="container">
            <div class="row g-4">
                <div class="col-md">
                    <h2 class="text-warning">Toevoegen</h2>
                    <div class="d-sm-flex align-items-center justify-content-between">
                        <div class="input-group">
                            <form action="" method="POST">
                                <label for="taal">Taal:</label><br>
                                <select name="taal" id="taal">
                                    <option value="HTML">HTML</option>
                                    <option value="CSS">CSS</option>
                                    <option value="Bootstrap">Bootstrap</option>
                                    <option value="PHP">PHP</option>
                                    <option value="CSS">CSS</option>
                                    <option value="PHP-PDO">PHP-PDO</option>
                                    <option value="JavaScript">JavaScript</option>
                                    <option value="Python">Python</option>
                                    <option value="GIT">Git</option>
                                    <option value="Diversen">Diversen</option>
                                </select><br><br>
                                <label for="onderdeel">Onderdeel:</label>
                                <input type="text" id="onderdeel" name="onderdeel" value=""><br><br>

                                <label for="onlinedoc">Online documentatie:</label>
                                <textarea id="onlinedoc" name="onlinedoc" rows="1" cols="40"></textarea><br><br>

                                <label for="notities">Notities:</label>
                                <textarea id="notities" name="notities" rows="4" cols="40"></textarea><br><br>

                                <label for="videoid">ID Video:</label>
                                <input type="text" id="videoid" name="videoid" value=""> <br><br>

                                <label for="snippet">Code snippet:</label>
                                <textarea id="snippet" name="snippet" rows="15" cols="40"></textarea><br><br>

                                <input type="submit" name="submitButton">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <img class="img-fluid w-80 d-none d-sm-block" src="img/toevoegen.svg" alt="Man adding card">
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