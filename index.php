<?php
require 'view/header.php';
require 'controller/rapport.php';
require 'model/bdd.php';
session_start();

//On en profite pour afficher les rapport si il y'en a !

if(isset($_SESSION['rapport'])){
    $_SESSION['rapport']->getAllRapport();

}

$_SESSION['rapport'] = $error = new rapport();
$bdd = new connectDB("localhost","root","bdd_projet","");

/*
 * Routeur du forum
 * On regarde si dans l'url,le premier attribut après le nom de domaine est
 * bien reconnu. Si c'est le cas on appelle le fichier demandé.
 *
 * Dev : Mehdi Ben Bahri
 */

$accueilurl = array('','accueil', 'profil', 'contact', 'mentions-legal','signIn','signUp','control_validCo','control_validIns','control_deco','control_validTop','control_addRep');
$actual_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$actual_url = explode("/", $actual_url);

$premierAtribut;

for ($i = 0; $i < count($actual_url); $i++) {
    if ($_SERVER['HTTP_HOST'] === $actual_url[$i]) {
        $premierAtribut = $actual_url[$i + 2];
        if (empty($premierAtribut)){
            $premierAtribut = "";
        }
        //ça sert à rien de continuer la boucle
        $i = count($actual_url); //arrêt de la boucle forcé
    }
}

require "view/navBar.php";

//Si premier Attribut est dans l'url :
if (in_array($premierAtribut, $accueilurl)) {

    /*On regarde si il ne demande pas un controlleur */
    if ($premierAtribut === ""){
        //si il y a rien on ramène à la page d'accueil.
        require "controller/control_listeForum.php";
        require "view/accueil.php";
    }
    else if(strlen($premierAtribut)>7){
        /*Vérification pour les controller*/
        if (substr($premierAtribut,0,7) === "control"){
            //c'est un controlleur

            require "controller/". $premierAtribut .".php";

        }
        else{

            require 'view/page404.php';
        }
    }
    else{
        if ($premierAtribut === "accueil"){
            require "controller/control_listeForum.php";
        }
        require "view/".$premierAtribut.'.php';
    }
    /*Si il fait plus de 7 caractères,c'est peu être un controller.)*/



}else {
    $topicId = (int) filter_var($premierAtribut, FILTER_SANITIZE_NUMBER_INT);
    if (is_int($topicId)){

        require "controller/control_listTopic.php";


    }
    else{

        //si il y a rien on ramène à la page d'accueil.
        require 'view/page404.php';
    }


}

//On require dans tout les cas le footer...
require 'view/footer.php';


?>