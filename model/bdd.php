<?php
/**
 * Classe de connection à la base de donnée
 * Dev : Mehdi Ben Bahri
 * Date: 29/11/2018
 * Time: 09:05
 *
 * PS : pas de getter pour le password, pour des raison évidentes
 * pas de setter non plus pour aucun des paramètres
 */

class connectDB
{
    private $host;
    private $user;
    private $db_name;
    private $password;
    private $pdo;

    /**
     * constucteur de la classe.
     * @param $host
     * @param $user
     * @param $db_name
     * @param $password
     * @param $pdo
     */
    public function __construct($host, $user, $db_name, $password)
    {
        $this->host = $host;
        $this->user = $user;
        $this->db_name = $db_name;
        $this->password = $password;

        $this->pdo = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $user, $password);
    }

    /* Retourne l'objet PDO déjà initialisé
    *  Dev : Mehdi Ben Bahri
    */
    function bdd(){
        return $this->pdo;
    }


    /**
     * permet de savoir sur qu'elle host on travail (au cas ou...)
     * @return mixed
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * permet de connaitre sous qu'elle utilisateur on est identifier dans la base de donnée
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * permet de savoir le nom de la base de donnée sur laqu'elle on travail
     * @return mixed
     */
    public function getDbName()
    {
        return $this->db_name;
    }

    /*
     * \/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/
     * Attention, même si j'ai fais un guetteur pour avoir l'objet PDO
     * il faut faire des fonctions pour les opérations redondante.
     * \/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/
     */


}