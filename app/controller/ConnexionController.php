<?php
class ConnexionController
{

    public static function connexion($login, $mdp) {
        include_once('./app/model/Database.php');
        $connexion = new Database();
        $connexion = $connexion->getConnexion();
        $requete = "SELECT fonction FROM Personnels WHERE login = '$login' AND mdp = '$mdp'";
        $resultat = mysqli_query($connexion, $requete);
        if (mysqli_num_rows($resultat) == 1) {
            $row = mysqli_fetch_assoc($resultat);
            $_SESSION['fonction'] = $row['fonction'];
            $_SESSION['login'] = $login;
            return true;
        } else {
            return false;
        }
    }
}