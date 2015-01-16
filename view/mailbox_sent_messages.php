
<?php
include('mailbox_toolbar.php');
?>
<h2 class="title"> Messages Envoyés </h2>
<div class="mailboxtable">
<table class="table">
                
                        <tr>
                                <th class="msgaut_title"> Envoyé à : </th>
                                <th class="msg_title"> Titre :</th>
                                <th class="msgdate_title"> Date d'envoi :</th>

                        </tr>
    <?php       /* récupération et affichage des données*/
    while ($res_sent_msg=$ask_sent_msg -> fetch () 
             
              )
        { ?>
        
                        <tr>    
                            <td class="msgaut">  <?php /*echo $res_sent_msg['id_receiver']*/
                                    echo $res_sent_msg['login']?> </td> 
                                <td class="msgtitle"> <!-- liens vers la page de lecture de message , et envoi son id pour pouvoir lire son contenu -->
                                    <a href="content.php?page=readSentMsg&id=<?php echo $res_sent_msg['id'] ?>">
                                         <?php echo $res_sent_msg['title'] ?>
                                    </a> 
                                </td>
                                <td class="msgdate"> <?php echo $res_sent_msg ['date'] ?></td>
                        </tr>
    <?php 
        }
?>
</table>
</div>
