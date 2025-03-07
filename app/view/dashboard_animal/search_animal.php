<?php
include_once('../app/controller/AnimalController.php');

// Vérifie le type de requête et la donnée.
if (isset($_POST['type']) && isset($_POST['recherche'])) {
    $type = $_POST['type'];
    $recherche = $_POST['recherche'];

    // Affiche un div pour le tableau
    echo '<div class="resultat-table">';
    echo '<h2>Résultat de la recherche</h2>';

    //Récup les infos de l'animal et affiche dans un tableau
    if ($type === "animal") {
        $animalData = AnimalController::getAnimalByPseudo($recherche);
        if (!empty($animalData)) {
            echo '<table>';
            echo '<thead>';
            echo '<tr>';
            echo '<th>Espece</th>';
            echo '<th>Date de Naissance</th>';
            echo '<th>Sexe</th>';
            echo '<th>Pseudo</th>';
            echo '<th>Commentaire</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            foreach ($animalData as $animal) {
                echo '<tr>';
                echo '<td>' . $animal['nom_race'] . '</td>';
                echo '<td>' . $animal['date_naissance'] . '</td>';
                echo '<td>' . $animal['sexe'] . '</td>';
                echo '<td>' . $recherche . '</td>';
                echo '<td>' . $animal['commentaire'] . '</td>';
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
        } else {
            echo '<p style="color: red; text-align: center; margin-top: 20px"> Aucun résultat trouvé pour l\'animal avec le pseudo : ' . $recherche . '</p>';
        }

        //Récup les infos de l'espèce et affiche dans un tableau
    } elseif ($type === "espece") {
        $especeData = AnimalController::getEspeceByNom($recherche);
        if (!empty($especeData)) {
            echo '<table>';
            echo '<thead>';
            echo '<tr>';
            echo '<th>Nom de Race</th>';
            echo '<th>Type de Nourriture</th>';
            echo '<th>Durée de Vie Moyenne</th>';
            echo '<th>Aquatique</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            foreach ($especeData as $espece) {
                echo '<tr>';
                echo '<td>' . $recherche . '</td>';
                echo '<td>' . $espece['type_nourriture'] . '</td>';
                echo '<td>' . $espece['duree_vie_moyenne'] . '</td>';
                echo '<td>' . ($espece['aquatique'] ? 'Oui' : 'Non') . '</td>';
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
        } else {
            echo '<p style="color: red; text-align: center; margin-top: 20px"> Aucun résultat trouvé pour l\'espèce avec comme nom : ' . $recherche . '</p>';
        }
    }
    echo '</div>';
}
