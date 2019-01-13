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
