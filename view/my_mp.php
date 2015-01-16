<?php
include('mailbox_toolbar.php');
?>

<?php
require("../modele/search_my_mp.php");
?>
<h2 class="title"> Messages Reçus </h2>
<div class="mailboxtable">
<table class="table">
                
                        <tr>
                                <th class="msgaut_title"> Auteur : </th>
                                <th class="msg_title"> Titre : </th>
                                <th class="msgdate_title"> Date d'envoi :</th>
                        </tr>
    <?php       /* récupération et affichage des données*/
    while ($resReceivedmsg=$askReceivedmsg -> fetch ())
        {?>
                        <tr>
                                 <td class="msgaut"> <?php  echo $resReceivedmsg['login']; ?> </td>
                                <td class="msgtitle"> <!-- liens vers la page de lecture de message , et envoi son id pour pouvoir lire son contenu -->
                                    <a href="content.php?page=readMsg&id=<?php echo $resReceivedmsg['id'] ?>">
                                         <?php echo $resReceivedmsg['title'] ?>
                                    </a> 
                                </td>
                                <td class="msgdate"> <?php echo $resReceivedmsg ['date'] ?></td>
                        </tr>
    <?php 
        }
?>
</table>
</div>
