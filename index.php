<?php
/*
 * Routeur du forum
 * On regarde si dans l'url,le premier attribut après le nom de domaine est
 * bien reconnu. Si c'est le cas on appelle le fichier demandé.
 *
 * Dev : Mehdi Ben Bahri
 */

$accueilurl = array('','accueil', 'profil', 'contact', 'mentions-legal','topic=');
$actual_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$actual_url = explode("/", $actual_url);

$premierAtribut;

for ($i = 0; $i < count($actual_url); $i++) {
    if ($_SERVER['HTTP_HOST'] === $actual_url[$i]) {
        $premierAtribut = $actual_url[$i + 2];
        //ça sert à rien de continuer la boucle
        $i = count($actual_url); //arrêt de la boucle forcé
    }
}

//On require dans tout les cas le header...

require 'view/header.php';

//Si premier Attribut est dans l'url :
echo "$premierAtribut";
if (in_array($premierAtribut, $accueilurl)) {
    if ($premierAtribut === ""){
        //si il y a rien on ramène à la page d'accueil.
        require "view/accueil.php";
    }
    else{
        require "view/".$premierAtribut.'.php';
    }

} else {

    //erreur 404
    echo "404";
}

//On require dans tout les cas le footer...
require 'view/footer.php';


?>