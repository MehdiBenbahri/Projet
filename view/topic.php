<div class="container">
    <div class="row">
        <div class="col-sm">
        </div>
        <div class="col-12 cote">
            <?php
            foreach ($info as $i) {
                ?>
                <div class="card">
                    <h5 class="card-header"><?php echo $i['username']; ?>
                        <small><i><?php echo date("d/m/Y H:i:s", strtotime($i['date'])) ?></i></small>
                        <?php
                        if ($bdd->isAdmin($_SESSION['co'])) {
                            ?>
                            <form method="post" class="droite spacing" action="control_suppMsg">
                                <button class="btn btn-danger" title="supprimer le message"><i class="fas fa-times"></i>
                                </button>
                                <input class="noShow" name="idPost" value="<?php echo $i['messageId']; ?>">
                                <input class="noShow" name="idTopic" value="<?php echo $topicId; ?>">
                            </form>

                            <form method="post" class="droite spacing" action="control_suppUser">
                                <button class="btn btn-warning" title="supprimer l'utilisateur"><i
                                            class="fas fa-skull"></i></button>
                                </button>
                                <input class="noShow" name="idUser" value="<?php echo $i['id_user']; ?>">
                                <input class="noShow" name="idTopic" value="<?php echo $topicId; ?>">
                            </form>

                            <?php
                        }

                        ?>

                    </h5>

                    <div class="card-body">
                        <p class="card-text"><?php echo $i['message']; ?></p>
                    </div>
                </div>
                <hr>
                <?php
            }
            ?>
            <h3>Répondre : </h3>
            <form method="post" action="control_addRep">

                <textarea name="text" class="form form-control textareaForum"></textarea>
                <br>

                <input class="noShow" type="text" name="idTopic" value="<?php echo $topicId ?>">
                <button type="Submit" class="btn btn-danger droite">Envoyer <i class="fas fa-check-square"></i></button>
            </form>
        </div>
        <div class="col-sm">
        </div>
    </div>
</div>
<br>
<br>
