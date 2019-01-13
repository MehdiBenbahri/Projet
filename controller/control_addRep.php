<?php
/*
 * Controller pour valider les topic
 * Dev : Mehdi Benbahri
 */
if(isset($_SESSION['co'])){
    $text = filter_var($_POST["text"], FILTER_SANITIZE_STRING);
    $idTopc = filter_var($_POST["idTopic"], FILTER_SANITIZE_STRING);
    $pseudo = $_SESSION['co'];

    var_dump($bdd->repondTopic($text,$idTopc,$pseudo));

}
else{
    $_SESSION['rapport']->createRapport("Vous devez être connecteé !","#f4ca41","Erreur : ","#f46842");
    header('Location: accueil');
    exit();
}


?>