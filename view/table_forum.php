<table id="listeSujet" class="table table-sm table-bordered">
    <thead>
    <tr>
        <th scope="col" class="titre">Titre : </th>
        <th scope="col" class="auteur">Auteur : </th>
        <th scope="col" class="date">Derniere réponse : </th>
        <th scope="col" class="date">Date : </th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <?php
        foreach($forums as $forum){
            echo "<td>" . $forum['nom'] . "</td>";
            echo "<td>"; if($forum['rank'] === "1"){ echo "<a href='profil/". $forum['id_user'] ."' class='pseudoAdmin'>" . $forum['username'] . "</a>";}  else{ echo "<a href='profil/". $forum['id_user'] ."' >" . $forum['username'] . "</a>";} echo "</td>";
            echo "<td>" . $forum['message'] . "</td>";
            echo "<td>" . date("d/m/Y H:i:s",strtotime($forum['date'])) . "</td>";
        }

        ?>
    </tr>

    </tbody>
</table>