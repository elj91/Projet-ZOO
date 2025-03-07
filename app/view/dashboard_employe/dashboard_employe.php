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
    <link rel="stylesheet" href="../../../public/css/dashboard_employe.css">
</head>
<body>
<div class="container">
    <div class="menu">
        <div class="logo">
            <img src="../../../public/images/logo.png" alt="Logo">
        </div>
        <a href="dashboard_employe.php" class="menu-btn">Dashboard</a>
        <a href="dashboard_add_employe.php" class="menu-btn">Ajouter</a>
        <a href="dashboard_edit_employe.php" class="menu-btn">Modifier</a>
        <a href="dashboard_search_employe.php" class="menu-btn">Rechercher</a>
        <a href="../dashboard.php" class="menu-btn btn-deconnexion">Retour</a>
    </div>
    <div class="dashboard">
        <div class="stats">
            <div class="directeur">
                <h3>Directeurs : </h3>
                <hr>
                <?php
                include_once("../../controller/EmployeController.php");
                echo '<p> ' . EmployeController::countDirecteur() . '</p>';
                ?>
            </div>
            <div class="employe">
                <h3>Employé(e)s : </h3>
                <hr>
                <?php
                echo '<p> ' . EmployeController::countEmploye() . '</p>';
                ?>
            </div>
        </div>
        <div class="container-section">
            <div class="employe-list">
                <table>
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Date de naissance</th>
                        <th>Sexe</th>
                        <th>Login</th>
                        <th>Mot de passe</th>
                        <th>Salaire</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $employes = EmployeController::getAllEmploye();
                    foreach ($employes as $employe) {
                        echo '<tr>';
                        echo '<td>' . $employe['id_personnels'] . '</td>';
                        echo '<td>' . $employe['nom'] . '</td>';
                        echo '<td>' . $employe['prenom'] . '</td>';
                        echo '<td>' . $employe['date_naissance'] . '</td>';
                        echo '<td>' . $employe['sexe'] . '</td>';
                        echo '<td>' . $employe['login'] . '</td>';
                        echo '<td>' . $employe['mdp'] . '</td>';
                        echo '<td>' . $employe['salaire'] . '</td>';
                        echo '<td><a class="delete-btn" href="dashboard_del_animal.php?id='. $employe['id_personnels'] .'">Supprimer</a></td>';
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

