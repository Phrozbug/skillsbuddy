<?php

include_once('connection.php');

session_start();

include "connectDbase.php";

$pdo = connectDatabase();

$inhoud_html = $pdo->query('SELECT * FROM skills WHERE taal = "HTML"');
$inhoud_css = $pdo->query('SELECT * FROM skills WHERE taal = "CSS"');
$inhoud_php = $pdo->query('SELECT * FROM skills WHERE taal = "PHP"');
$inhoud_phppdo = $pdo->query('SELECT * FROM skills WHERE taal = "PHP-PDO"');
$inhoud_javascript = $pdo->query('SELECT * FROM skills WHERE taal = "JavaScript"');
$inhoud_python = $pdo->query('SELECT * FROM skills WHERE taal = "Python"');
$inhoud_git = $pdo->query('SELECT * FROM skills WHERE taal = "GIT"');
$inhoud_diversen = $pdo->query('SELECT * FROM skills WHERE taal = "Diversen"');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-194047847-4"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-194047847-4');
    </script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />
    <title>Skillsbuddy - Notities voor de Web Developer</title>
    <meta name="description" content="Met Skillsbuddy kun je bijhouden welke programmeertalen je hebt geleerd. Per taal kun je de relevante informatie raadplegen, veranderen en toevoegen." />
    <meta name="keywords" content="full stack web development, coding, programmeren, notities, html, css, MySQL, PHP, PDO, PHP-PDO, javascript, python, git," />
    <meta name="author" content="Marc Roelofs" />
    <meta name="copyright" content="Marc Roelofs" />

</head>

<body>
    </div>
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
                        <a href="insert.php?" class="nav-link">Toevoegen</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" data-bs-toggle="dropdown" href="#">Talen</a>
                        <div class="dropdown-menu bg-dark">
                            <a class="dropdown-item text-light" href="#HTML">HTML</a>
                            <a class="dropdown-item text-light" href="#CSS">CSS</a>
                            <a class="dropdown-item text-light" href="#PHP">PHP</a>
                            <a class="dropdown-item text-light" href="#PHP-PDO">MySQL/PHP-PDO</a>
                            <a class="dropdown-item text-light" href="#JavaScript">JavaScript</a>
                            <a class="dropdown-item text-light" href="#Python">Python</a>
                            <a class="dropdown-item text-light" href="#Git">Git</a>
                            <a class="dropdown-item text-light" href="#Diversen">Diversen</a>
                        </div>

                    </li>
                    <li class="nav-item">
                        <a href="contact/contact.php" class="nav-link">Contact</a>
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

    <!--Hero-->

    <section class="bg-dark text-light p-5 p-lg-0 pt-lg-5 text-center text-sm-start">
        <div class="container">
            <div class="d-sm-flex align-items-center justify-content-between">
                <div>
                    <h1>Skillsbuddy voor de <span class="text-warning">Web Developer</span></h1>
                    <p class="lead my-4">Met Skillsbuddy kun je bijhouden welke programmeertalen je hebt geleerd. Per taal kun je
                        de relevante informatie raadplegen, veranderen en toevoegen.
                    </p>

                    <button class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#enroll">
                        Meer informatie</button>
                </div>
                <img class="img-fluid w-50 d-none d-sm-block" src="img/hero.svg" alt="Female working on laptop">

            </div>
        </div>

    </section>




    <!-- Taal & Inhoud -->

    <section class="p-5">
        <div class="container">
        </div>
        <h1 class="text-center mb-4">De Talen & Onderdelen</h1>
        <div class="row g-4 align-items-center justify-content-between text-center py-5">
            <div class="col-md" id="HTML">
                <h5><span class="fw-bold">HTML</span></h5>
                <?php while ($row = $inhoud_html->fetch()) { ?>
                    <a href="weergave.php?id=<?php echo $row['id'] ?>" class="text-decoration-none text-dark"><?php echo $row['onderdeel']; ?></a>
                    <br>
                <?php } ?>
            </div>

            <div class="col-md" id="CSS">
                <h5><span class="fw-bold">CSS</span></h5>
                <?php while ($row = $inhoud_css->fetch()) { ?>
                    <a href="weergave.php?id=<?php echo $row['id'] ?>" class="text-decoration-none text-dark"><?php echo $row['onderdeel']; ?></a>
                    <br>
                <?php } ?>
            </div>
        </div>

        <div class="bg-dark text-light row g-4 align-items-center justify-content-between text-center">
            <div class="col-md" id="PHP">
                <h5><span class="fw-bold">PHP</span></h5>
                <?php while ($row = $inhoud_php->fetch()) { ?>
                    <a href="weergave.php?id=<?php echo $row['id'] ?>" class="text-decoration-none text-light"><?php echo $row['onderdeel']; ?></a>
                    <br>
                <?php } ?>
            </div>

            <div class="col-md" id="PHP-PDO">
                <h5><span class="fw-bold">MySQL/PHP-PDO</span></h5>
                <?php while ($row = $inhoud_phppdo->fetch()) { ?>
                    <a href="weergave.php?id=<?php echo $row['id'] ?>" class="text-decoration-none text-light"><?php echo $row['onderdeel']; ?></a>
                    <br>
                <?php } ?>
            </div>
        </div>

        <div class="row g-4 align-items-center justify-content-between text-center py-5">
            <div class="col-md" id="JavaScript">
                <h5><span class="fw-bold">JavaScript</span></h5>
                <?php while ($row = $inhoud_javascript->fetch()) { ?>
                    <a href="weergave.php?id=<?php echo $row['id'] ?>" class="text-decoration-none text-dark"><?php echo $row['onderdeel']; ?></a>
                    <br>
                <?php } ?>
            </div>

            <div class="col-md" id="Python">
                <h5><span class="fw-bold">Python</span></h5>
                <?php while ($row = $inhoud_python->fetch()) { ?>
                    <a href="weergave.php?id=<?php echo $row['id'] ?>" class="text-decoration-none text-dark"><?php echo $row['onderdeel']; ?></a>
                    <br>
                <?php } ?>
            </div>
        </div>

        <div class="bg-dark text-light row g-4 align-items-center justify-content-between text-center">
            <div class="col-md" id="Git">
                <h5><span class="fw-bold">Git</span></h5>
                <?php while ($row = $inhoud_git->fetch()) { ?>
                    <a href="weergave.php?id=<?php echo $row['id'] ?>" class="text-decoration-none text-light"><?php echo $row['onderdeel']; ?></a>
                    <br>
                <?php } ?>
            </div>

            <div class="col-md" id="Diversen">
                <h5><span class="fw-bold">Diversen</span></h5>
                <?php while ($row = $inhoud_diversen->fetch()) { ?>
                    <a href="weergave.php?id=<?php echo $row['id'] ?>" class="text-decoration-none text-light"><?php echo $row['onderdeel']; ?></a>
                    <br>
                <?php } ?>
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

    <!-- Modal -->
    <div class="modal fade" id="enroll" tabindex="-1" aria-labelledby="enrollLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="enrollLabel">Meer informatie</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="lead">Op deze site houd ik (Marc Roelofs) bij wat ik leer over fullstack web development.<br><br>
                        Dit is mijn eindopdracht voor de opleiding full stack web developer bij Bit-Academy.<br><br>
                        Ik gebruik de termen "talen" en "onderdelen" op de hoofdpagina. Dus geen termen als functies, tags, properties, operators of syntax.<br>
                        Bij aanvang van deze opleiding is het verschil tussen al deze termen nog niet duidelijk.
                        Op deze manier kan ik het makkelijkste zoeken in mijn eigen taal.<br><br>
                        De uitleg over de onderdelen is zo ingedeeld zodat het voor mij gemakkelijk is te gebruiken in de praktijk.<br>
                        Het zijn dingen die ik graag wil terugzien in een uitleg zoals een korte toelichting, een externe uitleg,
                        een uitleg in een video en een code snippet.<br><br>

                        Veel plezier ermee!

                    </p>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Sluit
                    </button>

                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>


</body>

</html>