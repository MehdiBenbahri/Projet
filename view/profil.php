<?php
if (!isset($_SESSION['co'])){
    echo "Vous n'êtes pas connecté ! <br><a href='signIn'>Connexion</a><br><a href='signUp'>S'inscrire</a>";
}
else{
    echo "information du profil : ";
    echo "<br>pseudo : " . $_SESSION['co'];
}



?>