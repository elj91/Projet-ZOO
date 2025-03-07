<?php
class Database
{
    private $URL = 'localhost';
    private $nom_bdd = 'MS2_2_Zoo';
    private $login = 'elj';
    private $mdp = 'elj';

    public function getConnexion()
    {
        $connexion = mysqli_connect($this->URL, $this->login, $this->mdp, $this->nom_bdd);
        if (!$connexion) {
            echo 'Erreur de connexion à la base de données';
        }
        return $connexion;
    }
}
