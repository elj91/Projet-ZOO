<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion au Zoo</title>
    <link rel="stylesheet" href="./public/css/index.css">
    <link rel="shortcut icon" href="./public/images/logo.png" type="image/x-icon">

</head>
<body>

<div class="container">
    <h2>Zoo</h2>

    <form action="#" method="post">
        <label for="login">Login :</label>
        <input type="text" id="login" name="login" required>

        <label for="password">Password :</label>
        <input type="password" id="password" name="password" required>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            include('app/controller/ConnexionController.php');

            $login = $_POST['login'];
            $mdp = $_POST['password'];

            if (ConnexionController::connexion($login, $mdp)) {
                header('Location: ./app/view/dashboard.php');
            } else {
                echo '<p style = "color: red; text-align: center; margin-bottom: 20px">Identifiant ou mot de passe incorrect</p>';
            }
        }
        ?>

        <button type="submit">Se connecter</button>
    </form>

    <div class="register-link">
        <p>Pas encore inscrit ?</p>
        <a href="./app/view/inscription_view.php">Inscrivez-vous !</a>
    </div>
</div>

</body>
</html>
