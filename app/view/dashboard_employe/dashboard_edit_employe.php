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
        <h2>Formulaire de modification</h2>
        <form id="modify-form" action="#" method="post">
            <div id="employe-form">
                <div>
                    <label for="employe-list">Choisissez un employé(e) :</label>
                    <select id="employe-list" name="employe-list" onchange="afficherInformationsEmploye(this.value)">
                        <option value="" disabled selected>Sélectionnez l'employé(e) que vous souhaitez modifier :</option>
                        <?php
                        include_once(dirname(__DIR__, 3) . '/app/controller/EmployeController.php');
                        $employes = EmployeController::getAllEmploye();
                        foreach ($employes as $employe) {
                            echo "<option value='{$employe['id_personnels']}'>{$employe['prenom']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div id="employe-modify-inputs" style="display:none;">
                    <label for="nom">Nom : </label>
                    <input type="text" id="nom" name="nom">

                    <label for="prenom">Prénom : </label>
                    <input type="text" id="prenom" name="prenom">

                    <label for="date_naissance">Date de naissance : </label>
                    <input type="date" id="date_naissance" name="date_naissance">

                    <label for="sexe">Sexe : </label>
                    <select id="sexe" name="sexe" required>
                        <option value="" disabled selected>Choisissez un nouveau sexe</option>
                        <option value="M">Masculin</option>
                        <option value="F">Féminin</option>
                        <option value="N">Ne se prononce pas</option>
                    </select>

                    <label for="login">Login : </label>
                    <input type="text" id="login" name="login">

                    <label for="mdp">Mot de passe :
                    <input type="password" id="mdp" name="mdp">
                    <div class="mdp-icon">
                        <i data-feather="eye" id="eye"></i>
                        <i data-feather="eye-off" id="eye-off" style="display: none"></i>
                    </div>
                    </label>

                    <label for="salaire">Salaire : </label>
                    <input type="number" id="salaire" name="salaire">
                </div>
            </div>

            <?php
            include_once(dirname(__DIR__, 3) . '/app/controller/EmployeController.php');
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $id_employe = $_POST['employe-list'];
                $nom = $_POST['nom'];
                $prenom = $_POST['prenom'];
                $date_naissance = $_POST['date_naissance'];
                $sexe = $_POST['sexe'];
                $login = $_POST['login'];
                $mdp = $_POST['mdp'];
                $salaire = $_POST['salaire'];
                if (EmployeController::modifyEmloye($id_employe, $nom, $prenom, $date_naissance, $sexe, $login, $mdp, $salaire)) {
                    echo '<p style="color: green; text-align: center; margin-top: 20px">Employé modifié(e) avec succès.</p>';
                } else {
                    echo '<p style="color: red; text-align: center; margin-top: 20px">Erreur lors de la modification de l\'employé(e).</p>';
                }
            }
            ?>
            <div id="bouton" style="display: none">
                <button type="submit" id="sumbit-btn">Modifier</button>
            </div>
        </form>
    </div>
</div>
<script src="https://unpkg.com/feather-icons"></script>
<script>
    feather.replace();
    const eye = document.querySelector(".feather-eye");
    const eyeoff = document.querySelector(".feather-eye-off");
    const passwordField = document.querySelector("input[type=password]");
    eye.addEventListener("click", function() {
        eye.style.display = "none";
        eyeoff.style.display = "block";
        passwordField.type = "text";
    });
    eyeoff.addEventListener("click", function() {
        eye.style.display = "block";
        eyeoff.style.display = "none";
        passwordField.type = "password";
    });
</script>
<script>
    function afficherInformationsEmploye(employeId) {
        let xhr = new XMLHttpRequest(); // Créer un objet XMLHttpRequest
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) { // Si la requête est terminée
                if (xhr.status === 200) { // Si la requête s'est bien déroulée
                    let responseData = JSON.parse(xhr.responseText); // Convertie les données JSON en objet JavaScript
                    console.log(responseData);
                    if (responseData.type === 'employe') {
                        let employeData = responseData.employe; // Récupérer les données de l'animal

                        document.getElementById('nom').value = employeData.nom;
                        document.getElementById('prenom').value = employeData.prenom;
                        document.getElementById('date_naissance').value = employeData.date_naissance;
                        document.getElementById('login').value = employeData.login;
                        document.getElementById('mdp').value = employeData.mdp;
                        document.getElementById('salaire').value = employeData.salaire;

                        document.getElementById('nom').innerText = employeData.nom;
                        document.getElementById('prenom').innerText = employeData.prenom;
                        document.getElementById('date_naissance').innerText = employeData.date_naissance;
                        document.getElementById('login').innerText = employeData.login;
                        document.getElementById('mdp').innerText = employeData.mdp;
                        document.getElementById('salaire').innerText = employeData.salaire;

                        document.getElementById('employe-modify-inputs').style.display = 'block';
                        document.getElementById('bouton').style.display = 'block';
                    } else {
                        console.error('Type de données invalide.');
                    }
                } else {
                    console.error('Erreur lors de la récupération des informations de l\'employé(e)');
                }
            }
        };
        xhr.open('GET', 'info_employe.php?employe_id=' + employeId, true); // Prépare la requête AJAX
        xhr.send(); // Envoie la requête AJAX
    }
</script>
</body>
</html>