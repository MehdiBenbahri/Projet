<?php

//on crée une instance pour les futurs rapport et on écrase les anciens






/*
 *
 * TO DO :
 * Connection à la base de donnée et vérification du mots de passe
 *
 */
$pseudo = filter_var($_POST["nom"], FILTER_SANITIZE_STRING);
$pass = filter_var($_POST["pass"], FILTER_SANITIZE_STRING);
$verif = $bdd->connectInfoIsCorrect($pseudo,$pass);



if($verif === true){
    $_SESSION['rapport']->createRapport("Content de vous revoir !","rgb(45, 132, 59)","Bienvenue : ","rgb(93, 216, 113");
    //on connect et on redirige vers le profil :
    $_SESSION['co'] = $pseudo;

    header('Location: profil');
    exit();
}
else{
    $_SESSION['rapport']->createRapport("informations incorrect !","rgba(188, 28, 0,0.5)","Erreur : ","rgb(128, 0, 0)");
    header('Location: signIn');
    exit();
}


?>