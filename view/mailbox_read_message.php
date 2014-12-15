<?php
include('mailbox_toolbar.php');
?>

<?php
require("../modele/read_my_msg.php");
?>

<ul class="listehz">
    <li><input type ="button" value="nouveau"/></li>
    <li><input type ="button" value="répondre"/></li>
    <li><input type ="reset" value="supprimer"/></li>
</ul>

<?php       /* récupération et affichage des données*/
    $resReceivedmsg=$askReceivedmsg -> fetch ()
    ?>

            <p>de : <?php echo $resReceivedmsg ['id_author'] ?></p>
            <p>envoyé le :<?php echo $resReceivedmsg ['date'] ?></p>
            <p>titre: <?php echo $resReceivedmsg ['title'] ?></p>
            <p>message :<?php echo $resReceivedmsg ['text'] ?></p>