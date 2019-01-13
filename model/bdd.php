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
    function bdd()
    {
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
     * permet de savoir le nom de la base de donnée sur la qu'elle on travail
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

    /*
     * Crée un utilisateur avec les paramètres données
     *
     *
     *
     */
    public function createUser($email,$pass,$nom)
    {
        try {

            $this->pdo->exec("INSERT INTO user(username, rank, email, password) VALUES ('$nom','0','$email','$pass')");

            return 0;
        } catch (PDOException $e) {

            $_SESSION['rapport']->createRapport("Merci de contacter un administrateur | message : <i>$e | $this->pdo->errorInfo()</i>  !","rgba(188, 28, 0,0.5)","Exeption : ","rgb(128, 0, 0)");
            return 1;
        }
    }
    /*
     * True si l'utilisateur existe déjà dans la base de donnée
     * False si il existe pas.
     *
     */
    public function UserAlreadyExiste($user){
        try{
            $req = $this->pdo->prepare("Select username from user where username = :user");
            $req->bindParam(":user",$user);
            $req->execute();
            $this->pdo->errorInfo();
            $fetch = $req->fetchAll();
            if(count($fetch)>0){
                return true;
            }
            else{
                return false;
            }

        }
        catch(PDOException $e){
            $_SESSION['rapport']->createRapport("Erreur lors de la vérification du nom d'utilisateur - merci de contacter un administrateur | message : <i>$e | $this->pdo->errorInfo()</i>  !","rgba(188, 28, 0,0.5)","Exeption : ","rgb(128, 0, 0)");
            return true;
        }
    }
    public function EmailAlreadyExiste($mail){
        try{
            $req = $this->pdo->prepare("Select email from user where email = :mail");
            $req->bindParam(":mail",$mail);
            $req->execute();
            $this->pdo->errorInfo();
            $fetch = $req->fetchAll();
            if(count($fetch)>0){
                return true;
            }
            else{
                return false;
            }

        }
        catch(PDOException $e){
            $_SESSION['rapport']->createRapport("Erreur lors de la vérification de l'email - merci de contacter un administrateur | message : <i>$e | $this->pdo->errorInfo()</i>  !","rgba(188, 28, 0,0.5)","Exeption : ","rgb(128, 0, 0)");
            return true;
        }
    }
    public function getTopicInfoById($id){
        try{
            $req = $this->pdo->prepare("SELECT user.id,message,id_user,id_topic,date,username FROM reponse inner JOIN user on user.id = id_user where id_topic = :id");
            $req->bindParam(":id",$id);
            $req->execute();
            $this->pdo->errorInfo();
            $fetch = $req->fetchAll();
            return $fetch;

        }
        catch(PDOException $e){
            $_SESSION['rapport']->createRapport("Erreur lors de la vérification de l'email - merci de contacter un administrateur | message : <i>$e | $this->pdo->errorInfo()</i>  !","rgba(188, 28, 0,0.5)","Exeption : ","rgb(128, 0, 0)");
            return true;
        }
    }
    public function connectInfoIsCorrect($nom,$pass){
        try{
            $req = $this->pdo->prepare("Select * from user where username = :mail and password = :pass");
            $req->bindParam(":mail",$nom);
            $req->bindParam(":pass", $pass);
            $req->execute();
            $this->pdo->errorInfo();
            $fetch = $req->fetchAll();
            if(count($fetch)>0){
                return true;
            }
            else{
                return false;
            }

        }
        catch(PDOException $e){
            $_SESSION['rapport']->createRapport("Erreur lors de la vérification des informations - merci de contacter un administrateur | message : <i>$e | $this->pdo->errorInfo()</i>  !","rgba(188, 28, 0,0.5)","Exeption : ","rgb(128, 0, 0)");
            return true;
        }
    }

    public function getAllUser(){
        try{
            $req = $this->pdo->prepare("Select * from user");

            $req->execute();
            $this->pdo->errorInfo();
            $fetch = $req->fetchAll();
            return $fetch;

        }
        catch(PDOException $e){
            $_SESSION['rapport']->createRapport("Erreur lors de la récupération des données - merci de contacter un administrateur | message : <i>$e | $this->pdo->errorInfo()</i>  !","rgba(188, 28, 0,0.5)","Exeption : ","rgb(128, 0, 0)");
            return true;
        }
    }
    public function getAllForum(){
        try{
            $req = $this->pdo->prepare("SELECT DISTINCT nom,topic.id,message,date,username,id_user from topic inner join reponse on topic.id = id_topic inner join user on id_user = user.id group by (topic.id)");

            $req->execute();
            $this->pdo->errorInfo();
            $fetch = $req->fetchAll();
            return $fetch;

        }
        catch(PDOException $e){
            $_SESSION['rapport']->createRapport("Erreur lors de la récupération des données - merci de contacter un administrateur | message : <i>$e | $this->pdo->errorInfo()</i>  !","rgba(188, 28, 0,0.5)","Exeption : ","rgb(128, 0, 0)");
            return true;
        }
    }
    /*
    * Crée un topic et la réponse qui va avec
    */
    public function createTopic($titre,$reponse,$pseudo)
    {
        try {
            $this->pdo->exec("INSERT INTO `topic`(`nom`) VALUES ('".$titre."')");
            $req = $this->pdo->prepare("Select id from topic where nom = '$titre'");
            $req->execute();
            $this->pdo->errorInfo();
            $fetch = $req->fetchAll();
            $idTopic = $fetch[0]['id'];
            $req = $this->pdo->prepare("Select id from user where username = '$pseudo'");
            $req->execute();
            $this->pdo->errorInfo();
            $fetch = $req->fetchAll();
            $idUser = $fetch[0]['id'];
            $this->pdo->exec("INSERT INTO `reponse`(`message`, `id_user`, `id_topic`, `date`) VALUES ('$reponse','$idUser','$idTopic',date('Y-m-d H:i:s'))");

            header('Location: topic?=' . $idTopic);
            exit();
        } catch (PDOException $e) {

            $_SESSION['rapport']->createRapport("Merci de contacter un administrateur | message : <i>$e | $this->pdo->errorInfo()</i>  !","rgba(188, 28, 0,0.5)","Exeption : ","rgb(128, 0, 0)");
            return 1;
        }
    }
    public function repondTopic($msg,$idTopic,$pseudo)
    {
        try {

            $req = $this->pdo->prepare("Select id from user where username = '$pseudo'");
            $req->execute();
            $this->pdo->errorInfo();
            $fetch = $req->fetchAll();
            $idUser = $fetch[0]['id'];
            $this->pdo->exec("INSERT INTO `reponse`(`message`, `id_user`, `id_topic`, `date`) VALUES ('$msg','$idUser','$idTopic',date('Y-m-d H:i:s'))");

            header('Location: topic?=' . $idTopic);
            exit();
        } catch (PDOException $e) {

            $_SESSION['rapport']->createRapport("Merci de contacter un administrateur | message : <i>$e | $this->pdo->errorInfo()</i>  !","rgba(188, 28, 0,0.5)","Exeption : ","rgb(128, 0, 0)");
            return 1;
        }
    }


}