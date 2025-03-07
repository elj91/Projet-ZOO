<?php
class Employe
{
    public static function AddEmploye($nom, $prenom, $date_naissance, $sexe, $login, $password, $salaire) {
        include_once('Database.php');
        $connexion = new Database();
        $connexion = $connexion->getConnexion();
        $requete = "INSERT INTO Personnels (nom, prenom, date_naissance, sexe, login, mdp, fonction, salaire) VALUES ('$nom', '$prenom', '$date_naissance', '$sexe', '$login', '$password', 'Employe', '$salaire')";
        if (mysqli_query($connexion, $requete)) {
            return true;
        } else {
            return false;
        }
    }

    public static function getAllEmploye()
    {
        include_once('Database.php');
        $connexion = new Database();
        $connexion = $connexion->getConnexion();
        $requete = "SELECT * FROM Personnels WHERE fonction = 'Employe'";
        $resultat = mysqli_query($connexion, $requete);
         
        while ($row = mysqli_fetch_assoc($resultat)) {
            $employe[] = $row;
        }
        return $employe;
    }

    public static function getEmployeById($id_employe)
    {
        include_once('Database.php');
        $connexion = new Database();
        $connexion = $connexion->getConnexion();
        $requete = "SELECT nom, prenom, date_naissance, sexe, login, mdp, salaire FROM Personnels WHERE id_personnels = '$id_employe'";
        $resultat = mysqli_query($connexion, $requete);
        return mysqli_fetch_assoc($resultat);
    }

    public static function countDirecteur() {
        include_once('Database.php');
        $connexion = new Database();
        $connexion = $connexion->getConnexion();
        $requete = "SELECT COUNT(*) FROM Personnels WHERE fonction = 'Directeur'";
        $resultat = mysqli_query($connexion, $requete);
        $row = mysqli_fetch_assoc($resultat);
        return $row['COUNT(*)'];
    }

    public static function countEmploye() {
        include_once('Database.php');
        $connexion = new Database();
        $connexion = $connexion->getConnexion();
        $requete = "SELECT COUNT(*) FROM Personnels WHERE fonction = 'Employe'";
        $resultat = mysqli_query($connexion, $requete);
        $row = mysqli_fetch_assoc($resultat);
        return $row['COUNT(*)'];
    }

    public static function deleteEmploye($id_employe) {
        include_once('Database.php');
        $connexion = new Database();
        $connexion = $connexion->getConnexion();
        $requete = "DELETE FROM Personnels WHERE id_personnels = '$id_employe'";
        if (mysqli_query($connexion, $requete)) {
            return true;
        } else {
            return false;
        }
    }

    public static function modifyEmploye($id_employe, $nom, $prenom, $date_naissance, $sexe, $login, $password, $salaire)
    {
        include_once('Database.php');
        $connexion = new Database();
        $connexion = $connexion->getConnexion();
        $requete = "UPDATE Personnels SET nom = '$nom', prenom = '$prenom', date_naissance = '$date_naissance', sexe = '$sexe', login = '$login', mdp = '$password', salaire = '$salaire' WHERE id_personnels = '$id_employe'";
        if (mysqli_query($connexion, $requete)) {
            return true;
        } else {
            return false;
        }
    }

    public static function getEmployeByPrenom($prenom) {
        include_once('Database.php');
        $connexion = new Database();
        $connexion = $connexion->getConnexion();
        $requete = "SELECT nom, date_naissance, sexe, login, mdp, salaire FROM Personnels WHERE prenom = '$prenom'";
        $resultat = mysqli_query($connexion, $requete);
       
        while ($row = mysqli_fetch_assoc($resultat)) {
            $animaux[] = $row;
        }
        return $animaux;
    }
}