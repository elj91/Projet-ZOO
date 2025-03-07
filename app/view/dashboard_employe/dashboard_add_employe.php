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
    <div class="employe-form-cont">
        <h2>Formulaire d'ajout</h2>
        <form id="add-employe-form" action="#" method="post">
            <div id="employe-form">
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" required>

                <label for="prenom">Prénom :</label>
                <input type="text" id="prenom" name="prenom" required>

                <label for="date_naissance">Date de naissance :</label>
                <input type="date" id="date_naissance" name="date_naissance">

                <label for="sexe">Sexe :</label>
                <select id="sexe" name="sexe" required>
                    <option value="" disabled selected>Choisissez un sexe</option>
                    <option value="I">Indéterminé</option>
                    <option value="M">Mâle</option>
                    <option value="F">Femelle</option>
                </select>

                <label for="login">Login :</label>
                <input type="text" id="login" name="login">

                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password">

                <label for="salaire">Salaire :</label>
                <input type="number" id="salaire" name="salaire" required>
            </div>

            <?php
            include_once('../../controller/EmployeController.php');

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $nom = $_POST['nom'];
                $prenom = $_POST['prenom'];
                $date_naissance = $_POST['date_naissance'];
                $sexe = $_POST['sexe'];
                $login = $_POST['login'];
                $mdp = $_POST['password'];
                $salaire = $_POST['salaire'];
                if(EmployeController::AddEmploye($nom, $prenom, $date_naissance, $sexe, $login, $mdp, $salaire)) {
                    echo '<p style="color: green; text-align: center; margin-top: 20px">Employé(e) ajouté(e) avec succès</p>';
                } else {
                    echo '<p style="color: red; text-align: center; margin-top: 20px">Erreur lors de l\'ajout de l\'employé(e)</p>';
                }
            }
            ?>
            <div id="bouton">
                <button type="submit" id="submit-btn">Ajouter</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>