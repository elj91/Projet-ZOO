<?php
include_once('../../controller/AnimalController.php');
// Récupère l'id de l'animal et appelle fonction pour le supprimer
$id_animal = $_GET['id'];
if (AnimalController::deleteAnimal($id_animal)) {
    header('Location: dashboard_animal.php?suppression=succes');
} else {
    header('Location: dashboard_animal.php?suppression=echec');
}