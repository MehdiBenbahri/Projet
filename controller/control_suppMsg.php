<?php
if (isset($_SESSION['co'])) {
    $idPost = filter_var($_POST["idPost"], FILTER_SANITIZE_STRING);
    $idTopic = filter_var($_POST["idTopic"], FILTER_SANITIZE_STRING);
    $bdd->removePost($idPost);

    header('Location: topic?=' . $idTopic);
} else {
    $_SESSION['rapport']->createRapport("Vous devez être connecteé !", "#f4ca41", "Erreur : ", "#f46842");
    header('Location: accueil');
    exit();
}
?>
