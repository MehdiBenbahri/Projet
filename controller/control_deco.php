<?php
echo "déconnexion...";
unset($_SESSION['co']);
header('Location: accueil');
exit();

?>