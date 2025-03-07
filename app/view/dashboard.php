<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="shortcut icon" href="../../public/images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../../public/css/dashboard.css">
</head>
<body>

<div class="container">
    <?php
    echo '<h2>Bienvenue ' . $_SESSION['login'] . '</h2>';
    ?>

    <div class="buttons">
        <a href="./dashboard_animal/dashboard_animal.php" class="btn">Dashboard Animal</a>
        <?php if ($_SESSION['fonction'] === 'Directeur') {
            echo '<a href="./dashboard_employe/dashboard_employe.php" class="btn">Dashboard Employé</a>';
        } ?>
        <a href="logout.php" class="btn btn-deconnexion">Déconnexion</a>
    </div>

    <div class="articles">
        <div class="article">
            <h3>Article 1</h3>
            <p>Ceci est le premier article.</p>
        </div>

        <div class="article">
            <h3>Article 2</h3>
            <p>Ceci est le deuxième article.</p>
        </div>

        <div class="article">
            <h3>Article 3</h3>
            <p>Ceci est le troisième article.</p>
        </div>
    </div>
</div>
</body>
</html>

