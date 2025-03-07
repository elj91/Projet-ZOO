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
        <h2>Formulaire d'ajout</h2>
        <form id="add-animal-form" action="#" method="post">
            <div>
                <label for="type">Que souhaitez-vous ajouter ?</label>
                <select id="type" name="type" onchange="afficherForm(this.value)">
                    <option value="">Un animal ou une espèce ?</option>
                    <option value="animal">Animal</option>
                    <option value="espece">Espèce</option>
                </select>
            </div>
            <!-- Formulaire ajout Animal -->
            <div id="animal-form" style="display:none;">
                    <label for="pseudo">Pseudo :</label>
                    <input type="text" id="pseudo" name="pseudo" required>

                    <label for="espece">Espèce :</label>
                    <select id="espece" name="espece">
                        <option value="" disabled selected>Choisissez une espèce</option>
                        <?php
                        include_once(dirname(__DIR__, 3) . '/app/controller/AnimalController.php');
                        $especes = AnimalController::getAllEspeces();
                        foreach ($especes as $espece) {
                            echo "<option value='{$espece['id_especes']}'>{$espece['nom_race']}</option>";
                        }
                        ?>
                    </select>

                    <label for="date_naissance">Date de naissance :</label>
                    <input type="date" id="date_naissance" name="date_naissance">

                    <label for="sexe">Sexe :</label>
                    <select id="sexe" name="sexe">
                        <option value="" disabled selected>Choisissez un sexe</option>
                        <option value="I">Indéterminé</option>
                        <option value="M">Mâle</option>
                        <option value="F">Femelle</option>
                    </select>

                    <label for="commentaire">Commentaire :</label>
                    <textarea id="commentaire" name="commentaire"></textarea>
            </div>

            <!-- Formulaire ajout Espece -->
            <div id="espece-form" style="display:none;">
                <div>
                    <label for="nom_race">Nom de la race :</label>
                    <input type="text" id="nom_race" name="nom_race" required>
                </div>
                <div>
                    <label for="type_nourriture">Type de nourriture :</label>
                    <select id="type_nourriture" name="type_nourriture">
                        <option value="" disabled selected>Choisissez un type de nourriture</option>
                        <option value="Carnivore">Carnivore</option>
                        <option value="Herbivore">Herbivore</option>
                        <option value="Omnivore">Omnivore</option>
                    </select>
                </div>
                <div>
                    <label for="duree_vie_moyenne">Durée de vie moyenne :</label>
                    <input type="number" id="duree_vie_moyenne" name="duree_vie_moyenne" step="0.01" required>
                </div>
                <div>
                    <label for="aquatique">Aquatique :</label>
                    <select id="aquatique" name="aquatique">
                        <option value="" disabled selected>Est-il aquatique ?</option>
                        <option value="1">Oui</option>
                        <option value="0">Non</option>
                    </select>
                </div>
            </div>

            <?php
            include_once(dirname(__DIR__, 3) . '/app/controller/AnimalController.php');

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $type = $_POST['type'];

                if ($type === 'animal') {
                    $pseudo = $_POST['pseudo'];
                    $id_espece = $_POST['espece'];
                    $date_naissance = $_POST['date_naissance'];
                    $sexe = $_POST['sexe'];
                    $commentaire = $_POST['commentaire'];
                    if(AnimalController::AddAnimal($pseudo, $id_espece, $date_naissance, $sexe, $commentaire)) {
                        echo '<p style="color: green; text-align: center; margin-top: 20px">Animal ajouté avec succès</p>';
                    } else {
                        echo '<p style="color: red; text-align: center; margin-top: 20px">Erreur lors de l\'ajout de l\'animal</p>';
                    }
                } elseif ($type === 'espece') {
                    $nom_race = $_POST['nom_race'];
                    $type_nourriture = $_POST['type_nourriture'];
                    $duree_vie_moyenne = $_POST['duree_vie_moyenne'];
                    $aquatique = $_POST['aquatique'];
                    if(AnimalController::AddEspece($nom_race, $type_nourriture, $duree_vie_moyenne, $aquatique)) {
                        echo '<p style="color: green; text-align: center; margin-top: 20px">Espèce ajoutée avec succès</p>';
                    } else {
                        echo '<p style="color: red; text-align: center; margin-top: 20px">Erreur lors de l\'ajout de l\'espèce</p>';
                    }
                }
            }
            ?>
            <div id="bouton" style="display: none">
                <button type="submit" id="submit-btn">Ajouter</button>
            </div>
        </form>
    </div>
</div>
<script src="../../../public/js/dashboard_animal.js"></script>
</body>
</html>