<?php
include('mailbox_toolbar.php');
?>

<?php
require("../modele/search_my_mp.php");
?>

<table>
                <caption> messages reçus </caption>
                        <tr>
                                <th> auteur</th>
                                <th> titre</th>
                                <th> date d'envoi</th>

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