<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="shortcut icon" href="../../public/images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../../public/css/inscription.css">
</head>
<body>
<div class="container">
    <h2>Inscription</h2>
    <form action="../../inscription.php" method="post">
        <div class="form-group">
            <label for="profession">Profession :</label>
            <select id="profession" name="profession" onchange="changeBackground()">
                <option value="Employé">Employé</option>
                <option value="Directeur">Directeur</option>
            </select>
        </div>

        <div class="form-group">
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" required>
        </div>

        <div class="form-group">
            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" required>
        </div>

        <div class="form-group">
            <label for="sexe">Sexe :</label>
            <select id="sexe" name="sexe">
                <option value="M">Masculin</option>
                <option value="F">Féminin</option>
                <option value="N">Ne se prononce pas</option>
            </select>
        </div>
        <br>
        <br>
        <div class="form-group">
            <label for="login">Login :</label>
            <input type="text" id="login" name="login" required>
        </div>

        <div class="form-group">
            <label for="mdp">Mot de passe :</label>
            <input type="password" id="mdp" name="mdp" required>
        </div>

        <?php
        if (isset($_SESSION['erreur_inscription'])) {
            echo '<p style="color: red; text-align: center; margin-bottom: 20px">' . $_SESSION['erreur_inscription'] . '</p>';
            unset($_SESSION['erreur_inscription']);
        }
        ?>

        <button type="submit">S'inscrire</button>
    </form>

    <div class="login-link">
        <p>Déjà inscrit ?</p>
        <a href="../../index.php">Connectez-vous !</a>
    </div>
</div>

<script>
    function changeBackground() {
        let profession = document.getElementById("profession").value;

        if (profession === "Directeur") {
            document.body.style.backgroundImage = "url('../../public/images/directeur.jpeg')";
        } else {
            document.body.style.backgroundImage = "url('../../public/images/employer.jpeg')";
        }
    }
</script>
</body>
</html>