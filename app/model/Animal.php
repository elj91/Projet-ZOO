<?php
class Animal
{
    public static function AddAnimal($pseudo, $id_espece, $date_naissance, $sexe, $commentaire) {
        include_once('Database.php');
        $connexion = new Database();
        $connexion = $connexion->getConnexion();
        $requete = "INSERT INTO Animaux (id_race, date_naissance, sexe, pseudo, commentaire) VALUES ('$id_espece', '$date_naissance', '$sexe', '$pseudo', '$commentaire')";
        if (mysqli_query($connexion, $requete)) {
            return true;
        } else {
            return false;
        }
    }

    public static function AddEspece($nom_race, $type_nourriture, $duree_vie_moyenne, $aquatique)
    {
        include_once('Database.php');
        $connexion = new Database();
        $connexion = $connexion->getConnexion();
        $requete = "INSERT INTO Especes (nom_race, type_nourriture, duree_vie_moyenne, aquatique) VALUES ('$nom_race', '$type_nourriture', '$duree_vie_moyenne', '$aquatique')";
        if (mysqli_query($connexion, $requete)) {
            return true;
        } else {
            return false;
        }
    }

    public static function getAllAnimaux()
    {
        include_once('Database.php');
        $connexion = new Database();
        $connexion = $connexion->getConnexion();
        $requete = "SELECT * FROM Animaux";
        $resultat = mysqli_query($connexion, $requete);
       
        while ($row = mysqli_fetch_assoc($resultat)) {
            $animaux[] = $row;
        }
        return $animaux;
    }

    public static function getAnimalById($id_animal)
    {
        include_once('Database.php');
        $connexion = new Database();
        $connexion = $connexion->getConnexion();
        $requete = "SELECT id_race, date_naissance, sexe, pseudo, commentaire FROM Animaux WHERE id_animaux = '$id_animal'";
        $resultat = mysqli_query($connexion, $requete);
        return mysqli_fetch_assoc($resultat);
    }

    public static function getAllEspeces()
    {
        include_once('Database.php');
        $connexion = new Database();
        $connexion = $connexion->getConnexion();
        $requete = "SELECT * FROM Especes";
        $resultat = mysqli_query($connexion, $requete);
      
        while ($row = mysqli_fetch_assoc($resultat)) {
            $especes[] = $row;
        }
        return $especes;
    }

    public static function getEspeceById($id_espece)
    {
        include_once('Database.php');
        $connexion = new Database();
        $connexion = $connexion->getConnexion();
        $requete = "SELECT nom_race, type_nourriture, duree_vie_moyenne, aquatique FROM Especes WHERE id_especes = '$id_espece'";
        $resultat = mysqli_query($connexion, $requete);
        return mysqli_fetch_assoc($resultat);
    }

    public static function countAnimal() {
        include_once('Database.php');
        $connexion = new Database();
        $connexion = $connexion->getConnexion();
        $requete = "SELECT COUNT(*) FROM Animaux";
        $resultat = mysqli_query($connexion, $requete);
        $row = mysqli_fetch_assoc($resultat);
        return $row['COUNT(*)'];
    }

    public static function countEspece() {
        include_once('Database.php');
        $connexion = new Database();
        $connexion = $connexion->getConnexion();
        $requete = "SELECT COUNT(*) FROM Especes";
        $resultat = mysqli_query($connexion, $requete);
        $row = mysqli_fetch_assoc($resultat);
        return $row['COUNT(*)'];
    }

    public static function deleteAnimal($id_animal) {
        include_once('Database.php');
        $connexion = new Database();
        $connexion = $connexion->getConnexion();
        $requete = "DELETE FROM Animaux WHERE id_animaux = '$id_animal'";
        if (mysqli_query($connexion, $requete)) {
            return true;
        } else {
            return false;
        }
    }

    public static function modifyAnimal($id_animal, $pseudo, $id_espece, $date_naissance, $sexe, $commentaire)
    {
        include_once('Database.php');
        $connexion = new Database();
        $connexion = $connexion->getConnexion();
        $requete = "UPDATE Animaux SET id_race = '$id_espece', date_naissance = '$date_naissance', sexe = '$sexe', pseudo = '$pseudo', commentaire = '$commentaire' WHERE id_animaux = '$id_animal'";
        if (mysqli_query($connexion, $requete)) {
            return true;
        } else {
            return false;
        }
    }

    public static function modifyEspece($id_espece, $nom_race, $type_nourriture, $duree_vie_moyenne, $aquatique)
    {
        include_once('Database.php');
        $connexion = new Database();
        $connexion = $connexion->getConnexion();
        $requete = "UPDATE Especes SET nom_race = '$nom_race', type_nourriture = '$type_nourriture', duree_vie_moyenne = '$duree_vie_moyenne', aquatique = '$aquatique' WHERE id_especes = '$id_espece'";
        if (mysqli_query($connexion, $requete)) {
            return true;
        } else {
            return false;
        }
    }

    public static function getAnimalByPseudo($pseudo) {
        include_once('Database.php');
        $connexion = new Database();
        $connexion = $connexion->getConnexion();
        $requete = "SELECT a.date_naissance, a.sexe, a.commentaire, e.nom_race
        FROM Animaux a 
        INNER JOIN Especes e ON a.id_race = e.id_especes
        WHERE a.pseudo = '$pseudo'";
        $resultat = mysqli_query($connexion, $requete);
      
        while ($row = mysqli_fetch_assoc($resultat)) {
            $animaux[] = $row;
        }
        return $animaux;
    }

    public static function getEspeceByNom($nom_race)
    {
        include_once('Database.php');
        $connexion = new Database();
        $connexion = $connexion->getConnexion();
        $requete = "SELECT type_nourriture, duree_vie_moyenne, aquatique FROM Especes WHERE nom_race = '$nom_race'";
        $resultat = mysqli_query($connexion, $requete);
     
        while ($row = mysqli_fetch_assoc($resultat)) {
            $especes[] = $row;
        }
        return $especes;
    }
}