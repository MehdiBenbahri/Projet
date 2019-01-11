<table id="listeSujet" class="table table-sm table-bordered tableForum">
    <thead>
    <tr>
        <th scope="col" class="titre">Titre :</th>
        <th scope="col" class="auteur">Auteur :</th>
        <th scope="col" class="date">Message :</th>
        <th scope="col" class="date">Date :</th>
    </tr>
    </thead>
    <tbody>

        <?php
        foreach ($forums as $forum) {
            echo "<tr>";
            echo "<td>" . "<a href='topic?=" . $forum['id'] . "' class='pseudoAdmin'>" . $forum['nom'] . "</a>" . "</td>";
            echo "<td>" . "<a class='pseudoAdmin'>" . $forum['username'] . "</a>" . "</td>";
            echo "<td>" . $forum['message'] . "</td>";
            echo "<td>" . date("d/m/Y H:i:s", strtotime($forum['date'])) . "</td>";
            echo "</tr>";
        }

        ?>

    </tbody>
</table>