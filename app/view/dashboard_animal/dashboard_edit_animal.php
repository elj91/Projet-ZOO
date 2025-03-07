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
    <div class="animal-form-cont">
        <h2>Formulaire de modification</h2>
        <form id="modify-form" action="#" method="post">
            <div>
                <label for="type">Que souhaitez-vous modifier ?</label>
                <select id="type" name="type" onchange="afficherForm(this.value)">
                    <option value="">Un animal ou une espèce ?</option>
                    <option value="animal">Animal</option>
                    <option value="espece">Espèce</option>
                </select>
            </div>
            <div id="animal-form" style="display:none;">
                <div>
                    <label for="animal-list">Choisissez un animal :</label>
                    <select id="animal-list" name="animal-list" onchange="afficherInformationsAnimal(this.value)">
                        <option value="" disabled selected>Animal à modifier</option>
                        <?php
                        include_once(dirname(__DIR__, 3) . '/app/controller/AnimalController.php');
                        $animaux = AnimalController::getAllAnimaux();
                        foreach ($animaux as $animal) {
                            echo "<option value='{$animal['id_animaux']}'>{$animal['pseudo']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div id="animal-modify-inputs" style="display:none;">
                    <label for="pseudo">Pseudo : </label>
                    <input type="text" id="pseudo" name="pseudo">

                    <label for="espece">Espèce :</label>
                    <select id="espece" name="espece" required>
                        <option value="" disabled selected>Choisissez une nouvelle espèce</option>
                        <?php
                        include_once(dirname(__DIR__, 3) . '/app/controller/AnimalController.php');
                        $especes = AnimalController::getAllEspeces();
                        foreach ($especes as $espece) {
                            echo "<option value='{$espece['id_especes']}'>{$espece['nom_race']}</option>";
                        }
                        ?>
                    </select>

                    <label for="date_naissance">Date de naissance : </label>
                    <input type="date" id="date_naissance" name="date_naissance">

                    <label for="sexe">Sexe : </label>
                    <select id="sexe" name="sexe" required>
                        <option value="" disabled selected>Choisissez un nouveau sexe</option>
                        <option value="M">Masculin</option>
                        <option value="F">Féminin</option>
                        <option value="I">Indéterminé</option>
                    </select>

                    <label for="commentaire">Commentaire : </label>
                    <textarea id="commentaire" name="commentaire"></textarea>
                </div>
            </div>

            <div id="espece-form" style="display:none;">
                <div>
                    <label for="espece-list">Choisissez une espèce :</label>
                    <select id="espece-list" name="espece-list" onchange="afficherInformationsEspece(this.value)">
                        <option value="" disabled selected>Espece à modifier</option>
                        <?php
                        $especes = AnimalController::getAllEspeces();
                        foreach ($especes as $espece) {
                            echo "<option value='{$espece['id_especes']}'>{$espece['nom_race']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div id="espece-modify-inputs" style="display:none;">
                    <label for="nom_race">Nom race :</label>
                    <input type="text" id="nom_race" name="nom_race">

                    <label for="type_nourriture">Type de nourriture</label>
                    <select id="type_nourriture" name="type_nourriture" required>
                        <option value="" disabled selected>Que mange-t-il ? </option>
                        <option value="Carnivore">Carnivore</option>
                        <option value="Herbivore">Herbivore</option>
                        <option value="Omnivore">Omnivore</option>
                    </select>

                    <label for="duree_vie_moyenne">Durée de vie moyenne :</label>
                    <input type="number" id="duree_vie_moyenne" name="duree_vie_moyenne" step="0.01">

                    <label for="aquatique">Aquatique :</label>
                    <select id="aquatique" name="aquatique" required>
                        <option value="" disabled selected>Est-il aquatique ?</option>
                        <option value="1">Oui</option>
                        <option value="0">Non</option>
                    </select>
                </div>
            </div>

            <?php
            include_once(dirname(__DIR__, 3) . '/app/controller/AnimalController.php');
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (isset($_POST['type'])) {
                    if ($_POST['type'] === 'animal') {
                        $id_animal = $_POST['animal-list'];
                        $pseudo = $_POST['pseudo'];
                        $id_espece = $_POST['espece'];
                        $date_naissance = $_POST['date_naissance'];
                        $sexe = $_POST['sexe'];
                        $commentaire = $_POST['commentaire'];
                        if (AnimalController::modifyAnimal($id_animal, $pseudo, $id_espece, $date_naissance, $sexe, $commentaire)) {
                            echo '<p style="color: green; text-align: center; margin-top: 20px">Animal modifié avec succès.</p>';
                        } else {
                            echo '<p style="color: red; text-align: center; margin-top: 20px">Erreur lors de la modification de l\'animal.</p>';
                        }
                    } elseif ($_POST['type'] === 'espece') {
                        $id_espece = $_POST['espece-list'];
                        $nom_race = $_POST['nom_race'];
                        $type_nourriture = $_POST['type_nourriture'];
                        $duree_vie_moyenne = $_POST['duree_vie_moyenne'];
                        $aquatique = $_POST['aquatique'];
                        if (AnimalController::modifyEspece($id_espece,$nom_race, $type_nourriture, $duree_vie_moyenne, $aquatique)) {
                            echo '<p style="color: green; text-align: center; margin-top: 20px">Espece modifiée avec succès.</p>';
                        } else {
                            echo '<p style="color: red; text-align: center; margin-top: 20px">Erreur lors de la modification de l\'espèce.</p>';
                        }
                    }
                }
            }
            ?>
            <div id="bouton" style="display:none;">
                <button type="submit" id="sumbit-btn">Modifier</button>
            </div>
        </form>
    </div>
</div>
<script src="../../../public/js/dashboard_animal.js"></script>
<script>
    function afficherInformationsAnimal(animalId) {
        let xhr = new XMLHttpRequest(); // Créer un objet XMLHttpRequest
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) { // Si la requête est terminée
                if (xhr.status === 200) { // Si la requête s'est bien déroulée
                    let responseData = JSON.parse(xhr.responseText); // Convertie les données JSON en objet JavaScript
                    if (responseData.type === 'animal') {
                        let animalData = responseData.animal; // Récupérer les données de l'animal

                        document.getElementById('pseudo').value = animalData.pseudo;
                        document.getElementById('date_naissance').value = animalData.date_naissance;
                        document.getElementById('commentaire').value = animalData.commentaire;

                        document.getElementById('pseudo').innerText = animalData.pseudo;
                        document.getElementById('date_naissance').innerText = animalData.date_naissance;
                        document.getElementById('commentaire').innerText = animalData.commentaire;

                        document.getElementById('animal-modify-inputs').style.display = 'block';
                        document.getElementById('bouton').style.display = 'block';
                    } else {
                        console.error('Type de données invalide.');
                    }
                } else {
                    console.error('Erreur lors de la récupération des informations de l\'animal');
                }
            }
        };
        xhr.open('GET', 'info_animal.php?type=animal&animal_id=' + animalId, true); // Prépare la requête AJAX
        xhr.send(); // Envoie la requête AJAX
    }

    function afficherInformationsEspece(especeId) {
        let xhr = new XMLHttpRequest(); // Créer un objet XMLHttpRequest
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) { // Si la requête est terminée
                if (xhr.status === 200) { // Si la requête s'est bien déroulée
                    let responseData = JSON.parse(xhr.responseText); // Convertie les données JSON en objet JavaScript
                    if (responseData.type === 'espece') {
                        let especeData = responseData.espece; // Récupérer les données de l'espèce

                        document.getElementById('nom_race').value = especeData.nom_race;
                        document.getElementById('duree_vie_moyenne').value = especeData.duree_vie_moyenne;

                        document.getElementById('nom_race').innerText = especeData.nom_race;
                        document.getElementById('duree_vie_moyenne').innerText = especeData.duree_vie_moyenne;

                        document.getElementById('espece-modify-inputs').style.display = 'block';
                        document.getElementById('bouton').style.display = 'block';
                    } else {
                        console.error('Type de données invalide.');
                    }
                } else {
                    console.error('Erreur lors de la récupération des informations de l\'espèce');
                }
            }
        };
        xhr.open('GET', 'info_animal.php?type=espece&espece_id=' + especeId, true); // Prépare la requête AJAX
        xhr.send(); // Envoie la requête AJAX
    }
</script>
</body>
</html>