<?php
session_start();

include('./app/controller/InscriptionController.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $sexe = $_POST['sexe'];
    $login = $_POST['login'];
    $mdp = $_POST['mdp'];
    $fonction = $_POST['profession'];

    if (!InscriptionController::inscription($nom, $prenom, $sexe, $login, $mdp, $fonction)) {
        $_SESSION['erreur_inscription'] = 'Identifiant déjà utilisé';
        header('Location: ./app/view/inscription_view.php');
    }
    else {
        header('Location: index.php');
    }


}