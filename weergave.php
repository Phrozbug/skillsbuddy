<?php

include "connectDbase.php";

$pdo = connectDatabase();

$id = $_GET['id'];
$weergave = $pdo->query("SELECT * FROM skills WHERE id = $id");
$weergave = $weergave->fetch();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.css' rel='stylesheet' />
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
                        <a href="#toevoegen" class="nav-link">Toevoegen</a>
                    </li>
                    <li class="nav-item">
                        <a href="edit.php?id=<?php echo $weergave['id'] ?>" class="nav-link text-danger">Bewerken</a>
                    </li>
                    <li class="nav-item">
                        <a href="/contact/contact.php" class="nav-link">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a href="#over" class="nav-link">Over</a>
                    </li>
                </ul>
            </div>
        </div>

    </nav>

    <!--Weergave basis data en video-->

    <section class="bg-dark text-light p-5 p-lg-0 pt-lg-5 text-center text-sm-start">
        <div class="container">
            <div class="d-sm-flex align-items-center justify-content-between">
                <div>
                    <h1><?php echo $weergave['taal'] ?></h1>
                    <h2>Notities voor <span class="text-warning"><?php echo $weergave['onderdeel'] ?></span></h2>
                    <p class="lead my-4"><?php echo $weergave['notities'] ?>
                    </p>
                    <a href="<?php echo $weergave['onlinedoc'] ?>" target="_blank" rel="noopener noreferrer" class="btn btn-primary btn-lg">Online documentatie</a>
                </div>
                <div>
                    <iframe class="d-none d-sm-block" width="420" height="345" frameborder="0" src="https://www.youtube.com/embed/<?php echo $weergave['videoid']; ?>?autoplay=01&mute=0"></iframe>
                    <a href="https://www.youtube.com/watch?v=<?php echo $weergave['videoid'] ?>" class="m-5 btn btn-danger btn-m d-block d-sm-none">Video uitleg</a>
                </div>
            </div>
        </div>

    </section>

    <!-- Snippet area -->

    <section class="bg-light text-dark">
        <div class="container">
            <h2 class="mt-5">Code Snippet</h2>
            <br>
            <pre>
                <?php echo htmlspecialchars($weergave['snippet']) ?>
            </pre>
            <br>
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