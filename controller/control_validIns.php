<?php

$fail = 0;
$email = filter_var($_POST["pass2"], FILTER_SANITIZE_EMAIL);
$pass = filter_var($_POST["pass"], FILTER_SANITIZE_STRING);
$pass2 = filter_var($_POST["pass2"], FILTER_SANITIZE_STRING);
$pseudo = filter_var($_POST['nom'], FILTER_SANITIZE_STRING);


if ($pass !== $pass2){
    $_SESSION['rapport']->createRapport("Les mots de passe doivent être identique !","rgba(188, 28, 0,0.5)","Erreur : ","rgb(128, 0, 0)");
    $fail = 1;
}
if($fail === 0){
    if($bdd->UserAlreadyExiste($pseudo )===false){
        $fail = 0;
    }
    else{
        $_SESSION['rapport']->createRapport("Le nom d'utilisateur existe déjà !","rgba(188, 28, 0,0.5)","Erreur : ","rgb(128, 0, 0)");
        $fail = 1;
    }
}
if($fail === 0){
    $fail = $bdd->createUser($email,$pass,$pseudo);
}



if ($fail === 0){
    $_SESSION['rapport']->createRapport("Bienvenue sur le Forum !","rgb(45, 132, 59)","Bienvenue : ","rgb(93, 216, 113");
    header('Location: profil');
    exit();
}
else{
    header('Location: signUp');
    exit();
}
