<?php
include_once(dirname(__DIR__, 3) . '/app/controller/EmployeController.php');

// Vérifie le type de requête et la donnée.
if (isset($_POST['prenom'])) {
    $prenom = $_POST['prenom'];

    // Affiche un div pour le tableau
    echo '<div class="resultat-table">';
    echo '<h2>Résultat de la recherche</h2>';

    //Récup les infos de l'animal et affiche dans un tableau
    $employeData = EmployeController::getEmployeByPrenom($prenom);
    if (!empty($employeData)) {
        echo '<table>';
        echo '<thead>';
        echo '<tr>';
        echo '<th>Nom</th>';
        echo '<th>Prénom</th>';
        echo '<th>Date de naissance</th>';
        echo '<th>Sexe</th>';
        echo '<th>Login</th>';
        echo '<th>Mot de passe</th>';
        echo '<th>Salaire</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        foreach ($employeData as $employe) {
            echo '<tr>';
            echo '<td>' . $employe['nom'] . '</td>';
            echo '<td>' . $prenom . '</td>';
            echo '<td>' . $employe['date_naissance'] . '</td>';
            echo '<td>' . $employe['sexe'] . '</td>';
            echo '<td>' . $employe['login'] . '</td>';
            echo '<td>' . $employe['mdp'] . '</td>';
            echo '<td>' . $employe['salaire'] . '</td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
    } else {
        echo '<p style="color: red; text-align: center; margin-top: 20px"> Aucun résultat trouvé pour l\'employé(e) avec comme prénom : ' . $prenom . '</p>';
    }
    echo '</div>';
}

