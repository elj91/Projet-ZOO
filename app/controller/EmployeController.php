<?php
class EmployeController
{
    public static function AddEmploye($nom, $prenom, $date_naissance, $sexe, $login, $password, $salaire) {
        include_once("../../model/Employe.php");
        return Employe::AddEmploye($nom, $prenom, $date_naissance, $sexe, $login, $password, $salaire);
    }
    public static function getAllEmploye()
    {
        include_once("../../model/Employe.php");
        return Employe::getAllEmploye();
    }

    public static function getEmployeById($id_employe)
    {
        include_once("../../model/Employe.php");
        return Employe::getEmployeById($id_employe);
    }

    public static function countDirecteur() {
        include_once("../../model/Employe.php");
        return Employe::countDirecteur();
    }

    public static function countEmploye() {
        include_once("../../model/Employe.php");
        return Employe::countEmploye();
    }

    public static function deleteEmploye($id_employe) {
        include_once("../../model/Employe.php");
        return Employe::deleteEmploye($id_employe);
    }

    public static function modifyEmloye($id_employe, $nom, $prenom, $date_naissance, $sexe, $login, $password, $salaire)
    {
        include_once("../../model/Employe.php");
        return Employe::modifyEmploye($id_employe, $nom, $prenom, $date_naissance, $sexe, $login, $password, $salaire);
    }

    public static function getEmployeByPrenom($prenom)
    {
        include_once("../../model/Employe.php");
        return Employe::getEmployeByPrenom($prenom);
    }
}