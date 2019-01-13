<?php
/*
 * Controller pour valider les topic
 * Dev : Mehdi Benbahri
 */
if(isset($_SESSION['co'])){
    $titre = filter_var($_POST["titre"], FILTER_SANITIZE_STRING);
    $text = filter_var($_POST["text"], FILTER_SANITIZE_STRING);

    $bdd->createTopic($titre,$text,$_SESSION['co']);

}
else{
    $_SESSION['rapport']->createRapport("Vous devez être connecteé !","#f4ca41","Erreur : ","#f46842");
    header('Location: accueil');
    exit();
}







?>