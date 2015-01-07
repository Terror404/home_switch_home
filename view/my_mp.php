<?php
include('mailbox_toolbar.php');
?>

<?php
require("../modele/search_my_mp.php");
?>

<div class="mailboxtable">
<table>
                <caption> Messages Reçus </caption>
                        <tr>
                                <th> Auteur</th>
                                <th> Titre</th>
                                <th> Date d'envoi</th>
                        </tr>
    <?php       /* récupération et affichage des données*/
    while ($resReceivedmsg=$askReceivedmsg -> fetch ())
        {?>
                        <tr>
                                 <td> <?php echo $resReceivedmsg['id_author'] ?> </td>
                                <td> <!-- liens vers la page de lecture de message , et envoi son id pour pouvoir lire son contenu -->
                                    <a href="content.php?page=readMsg&id=<?php echo $resReceivedmsg['id'] ?>">
                                         <?php echo $resReceivedmsg['title'] ?>
                                    </a> 
                                </td>
                                <td> <?php echo $resReceivedmsg ['date'] ?></td>
                        </tr>
    <?php 
        }
?>
</table>
</div>