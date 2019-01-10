<?php
    $info = $bdd->getTopicInfoById($topicId);

    if(count($info)>0){
        require "view/topic.php";
    }
    else{
        require "view/page404.php";
    }




?>