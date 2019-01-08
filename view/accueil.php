<?php
if (isset($_SESSION['co'])){
    echo "<a href='control_deco'>Déconnexion</a><br><a href='profil'>Profil</a>";
}
else{
    echo "accueil<br><a href='signIn'>Connexion</a><br><a href='signUp'>S'inscrire</a>";
}
require "view/table_forum.php";

?>

