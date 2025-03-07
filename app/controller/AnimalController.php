<?php
class AnimalController
{
    public static function AddAnimal($pseudo, $id_espece, $date_naissance, $sexe, $commentaire) {
        include_once('../../model/Animal.php');
        return Animal::AddAnimal($pseudo, $id_espece, $date_naissance, $sexe, $commentaire);
    }

    public static function AddEspece($nom_race, $type_nourriture, $duree_vie_moyenne, $aquatique)
    {
        include_once('../../model/Animal.php');
        return Animal::AddEspece($nom_race, $type_nourriture, $duree_vie_moyenne, $aquatique);
    }

    public static function getAllAnimaux()
    {
        include_once('../../model/Animal.php');
        return Animal::getAllAnimaux();
    }

    public static function getAnimalById($id_animal)
    {
        include_once('../../model/Animal.php');
        return Animal::getAnimalById($id_animal);
    }

    public static function getAllEspeces()
    {
        include_once('../../model/Animal.php');
        return Animal::getAllEspeces();
    }

    public static function getEspeceById($id_espece)
    {
        include_once('../../model/Animal.php');
        return Animal::getEspeceById($id_espece);
    }


    public static function countAnimal() {
        include_once('../../model/Animal.php');
        return Animal::countAnimal();
    }

    public static function countEspece() {
        include_once('../../model/Animal.php');
        return Animal::countEspece();
    }

    public static function deleteAnimal($id_animal) {
        include_once('../../model/Animal.php');
        return Animal::deleteAnimal($id_animal);
    }

    public static function modifyAnimal($id_animal, $pseudo, $id_espece, $date_naissance, $sexe, $commentaire)
    {
        include_once('../../model/Animal.php');
        return Animal::modifyAnimal($id_animal, $pseudo, $id_espece, $date_naissance, $sexe, $commentaire);
    }

    public static function modifyEspece($id_espece, $nom_race, $type_nourriture, $duree_vie_moyenne, $aquatique)
    {
        include_once('../../model/Animal.php');
        return Animal::modifyEspece($id_espece, $nom_race, $type_nourriture, $duree_vie_moyenne, $aquatique);
    }

    public static function getAnimalByPseudo($pseudo) {
        include_once('../../model/Animal.php');
        return Animal::getAnimalByPseudo($pseudo);
    }

    public static function getEspeceByNom($nom_race)
    {
        include_once('../../model/Animal.php');
        return Animal::getEspeceByNom($nom_race);
    }

}