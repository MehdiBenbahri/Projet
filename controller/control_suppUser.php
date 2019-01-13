<?php
if (isset($_SESSION['co'])) {
    $idUser = filter_var($_POST["idUser"], FILTER_SANITIZE_STRING);
    $idTopic = filter_var($_POST["idTopic"], FILTER_SANITIZE_STRING);
    $bdd->removeUser($idUser);

    header('Location: topic?=' . $idTopic);
} else {
    $_SESSION['rapport']->createRapport("Vous devez être connecteé !", "#f4ca41", "Erreur : ", "#f46842");
    header('Location: accueil');
    exit();
}
?>
