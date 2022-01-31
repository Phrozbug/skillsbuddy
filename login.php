<?php

include_once('connection.php');

session_start();

$file = $_GET['file'];
$id = $_GET['id'];

unset($_SESSION['error']);

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM users WHERE username = :username AND password = :password";
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);

    $stmt->execute();

    $user = $stmt->fetch();
    if ($user !== false) {
        $_SESSION['loggedInUser'] = $user['username'];
        header('Location:' . $file . '?id=' . $id);
        die();
    }

    $_SESSION['error'] = "Gebruikersnaam of wachtwoord is ongeldig.";
}

?>

<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />
    <title>Skillsbuddy - Eindopdracht Marc Roelofs</title>
</head>

<body class="h-100">

    <!--Navigation-->
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 fixed-top">
        <div class="container">
            <a href="index.php" class="navbar-brand">SKILLSBUDDY</a>
        </div>

    </nav>

    <!-- Login -->
    <div class="bg-dark text-light p-5">
        <div class="container h-100">
            <div class="row h-100 justify-content-center align-items-center">
                <div class="col-10 col-md-8 col-lg-6">
                    <div class="text-center">
                        <h1 class="text-warning">Login</h1>
                        <p class="description">Om te kunnen bewerken en/of toevoegen moet je inloggen</p>
                    </div>    

                    <!-- Form -->
                    <form class="form-example" action="" method="post">
                            <!-- Input fields -->
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" class="form-control username" id="username" placeholder="Username..." name="username">
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control password" id="password" placeholder="Password..." name="password">
                            </div>
                            <?php if (isset($_SESSION['error'])) { ?>
                                <div style="color: red;"><?= $_SESSION['error']; ?></div>
                            <?php } ?>
                            <button type="submit" class="btn btn-primary btn-customized">Login</button>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

</body>

</html>