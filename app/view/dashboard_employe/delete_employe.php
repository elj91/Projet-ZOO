<?php
include_once(dirname(__DIR__, 2) . '/controller/EmployeController.php');
// Récupère l'id de l'animal et appelle fonction pour le supprimer
$id_employe = $_GET['id'];
if (EmployeController::deleteEmploye($id_employe)) {
    header('Location: dashboard_animal.php?suppression=succes');
} else {
    header('Location: dashboard_animal.php?suppression=echec');
}