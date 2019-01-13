<?php
if (isset($_SESSION['co']) && $bdd->isAdmin($_SESSION['co'])) {
    $idPost = filter_var($_POST["idPost"], FILTER_SANITIZE_STRING);
    $idTopic = filter_var($_POST["idTopic"], FILTER_SANITIZE_STRING);
    $bdd->removePost($idPost);

    header('Location: topic?=' . $idTopic);
} else {

    header('Location: accueil');
    exit();
}
?>
