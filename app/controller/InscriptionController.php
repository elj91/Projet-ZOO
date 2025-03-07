<?php
class InscriptionController {
    public static function inscription($nom, $prenom, $sexe, $login, $mdp, $fonction) {
        include_once('./app/model/Database.php');
        $connexion = new Database();
        $connexion = $connexion->getConnexion();

        // Vérifier si le login est déjà utilisé
        $requeteVerification = "SELECT * FROM Personnels WHERE login = '$login'";
        $resultatVerification = mysqli_query($connexion, $requeteVerification);

        if (mysqli_num_rows($resultatVerification) > 0) {
            return false;
        }

        // Le login est disponible, effectuer l'inscription
        $requete = "INSERT INTO Personnels (nom, prenom, sexe, login, mdp, fonction) VALUES ('$nom', '$prenom', '$sexe', '$login', '$mdp', '$fonction')";
        $resultat = mysqli_query($connexion, $requete);

        if ($resultat) {
            return true;
        } else {
            return false;
        }
    }
}
