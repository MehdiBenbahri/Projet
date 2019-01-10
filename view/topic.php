<?php
    foreach ($info as $i){
        ?>
        <div class="card">
            <h5 class="card-header"><?php echo $i['username']; ?>  <small><i><?php echo date("d/m/Y H:i:s",strtotime($i['date'])) ?></i></small></h5>

            <div class="card-body">
                <p class="card-text"><?php echo $i['message']; ?></p>
            </div>
        </div>
        <?php
    }


?>