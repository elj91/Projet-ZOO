<?php
include_once(dirname(__DIR__, 3) . '/app/controller/AnimalController.php');

// Vérifie le type de requête
if (isset($_GET['type'])) {
    if ($_GET['type'] === 'animal' && isset($_GET['animal_id'])) {
        // Si un ID d'animal est spécifié, récupérer les informations de l'animal
        $animalId = $_GET['animal_id'];
        $animalData = AnimalController::getAnimalById($animalId);


        // Tableau info animal
        $data = array(
            'type' => 'animal',
            'animal' => $animalData,
        );
        echo json_encode($data);


    } elseif ($_GET['type'] === 'espece' && isset($_GET['espece_id'])) {
        // Si un ID d'espèce est spécifié, récupérer les informations de l'espèce
        $especeId = $_GET['espece_id'];
        $especeData = AnimalController::getEspeceById($especeId);


        // Tableau info espece
        $data = array(
            'type' => 'espece',
            'espece' => $especeData,
        );
        echo json_encode($data);
    }
}
