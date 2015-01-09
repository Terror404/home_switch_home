
<?php
include('mailbox_toolbar.php');
?>

<div class="mailboxtable">
<table>
                <caption> messages envoyés </caption>
                        <tr>
                                <th> envoyé à </th>
                                <th> titre</th>
                                <th> date d'envoi</th>

                        </tr>
    <?php       /* récupération et affichage des données*/
    while ($res_sent_msg=$ask_sent_msg -> fetch () 
             
              )
        { ?>
        
                        <tr>    
                            <td>  <?php /*echo $res_sent_msg['id_receiver']*/
                                    echo $res_sent_msg['login']?> </td> 
                                <td> <!-- liens vers la page de lecture de message , et envoi son id pour pouvoir lire son contenu -->
                                    <a href="content.php?page=readSentMsg&id=<?php echo $res_sent_msg['id'] ?>">
                                         <?php echo $res_sent_msg['title'] ?>
                                    </a> 
                                </td>
                                <td> <?php echo $res_sent_msg ['date'] ?></td>
                        </tr>
    <?php 
        }
?>
</table>
</div>
