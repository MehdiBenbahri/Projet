<?php
$info = $bdd->getTopicInfoById($topicId);


if (!isset($_SESSION['co'])) {
    require "view/demandeDeCo.php";
} else if (count($info) > 0) {
    require "view/topic.php";
} else {
    require "view/page404.php";
}


?>