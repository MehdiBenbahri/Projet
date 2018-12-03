<?php

//on crée une instance pour les futurs rapport et on écrase les anciens






/*
 *
 * TO DO :
 * Connection à la base de donnée et vérification du mots de passe
 * En attendant je mets le mdp en dur :
 *
 */

$emailBdd = "email@email.fr";
$passBdd = "12345"; //meilleur mdp !

if ($emailBdd === $_POST["email"]){
    if($passBdd === $_POST["pass"]){
        $_SESSION['rapport']->createRapport("Content de vous revoir !","rgb(45, 132, 59)","Bienvenue : ","rgb(93, 216, 113");
        //on connect et on redirige vers le profil :
        //TO DO : La variable de session

        header('Location: profil');
        exit();
    }
    else{
        $_SESSION['rapport']->createRapport("Mot de passe incorrect !","rgba(188, 28, 0,0.5)","Erreur : ","rgb(128, 0, 0)");
        header('Location: signIn');
        exit();
    }

}
else{
    $_SESSION['rapport']->createRapport("Email incorrect !","rgba(188, 28, 0,0.5)","Erreur : ","rgb(128, 0, 0)");
    header('Location: signIn');
    exit();
}



?>