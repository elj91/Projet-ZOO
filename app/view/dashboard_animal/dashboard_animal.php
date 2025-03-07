<?php
    $message = '';
    $color = '';
    if (isset($_GET['suppression'])) {
        if ($_GET['suppression'] === 'succes') {
            $message = 'Suppression réussie';
            $color = 'green';
        } else {
            $message = 'Echec de la suppression';
            $color = 'red';
        }
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Animal</title>
    <link rel="shortcut icon" href="../../../public/images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../../../public/css/dashboard_animal.css">
</head>
<body>
<div class="container">
    <div class="menu">
        <div class="logo">
            <img src="../../../public/images/logo.png" alt="Logo">
        </div>
        <a href="dashboard_animal.php" class="menu-btn">Dashboard</a>
        <a href="dashboard_add_animal.php" class="menu-btn">Ajouter</a>
        <a href="dashboard_edit_animal.php" class="menu-btn">Modifier</a>
        <a href="dashboard_search_animal.php" class="menu-btn">Rechercher</a>
        <a href="../dashboard.php" class="menu-btn btn-deconnexion">Retour</a>
    </div>
    <div class="dashboard">
        <div class="stats">
            <div class="species">
                <h3>Nombre d'espèces : </h3>
                <hr>
                <?php
                include_once('../../controller/AnimalController.php');
                echo '<p> ' . AnimalController::countEspece() . '</p>';
                ?>
            </div>
            <div class="animals">
                <h3>Liste des animaux :</h3>
                <hr>
                <?php
                echo '<p> ' . AnimalController::countAnimal() . '</p>';
                ?>
            </div>
        </div>
        <div class="container-section">
            <div class="animal-list">
                <table>
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Pseudo</th>
                        <th>Date de naissance</th>
                        <th>Commentaire</th>
                        <th>ID Race</th>
                        <th>Sexe</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $animaux = AnimalController::getAllAnimaux();
                    foreach ($animaux as $animal) {
                        echo '<tr>';
                        echo '<td>' . $animal['id_animaux'] . '</td>';
                        echo '<td>' . $animal['pseudo'] . '</td>';
                        echo '<td>' . $animal['date_naissance'] . '</td>';
                        echo '<td>' . $animal['commentaire'] . '</td>';
                        echo '<td>' . $animal['id_race'] . '</td>';
                        echo '<td>' . $animal['sexe'] . '</td>';
                        echo '<td><a class="delete-btn" href="delete_animal.php?id='. $animal['id_animaux'] .'">Supprimer</a></td>';
                        echo '</tr>';
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    let message = '<?php echo $message; ?>';
    let color = '<?php echo $color; ?>';
    if (message !== '') {
        alert(message, 'color: ' + color + '; font-weight: bold; text-align: center;');
    }
</script>
</body>
</html>
