<?php
include('mailbox_toolbar.php');
?>

<div class="readmessage">


<?php       /* récupération et affichage des données*/
    while ($resSentMsg=$askSentMsg -> fetch ())
    {?>

            <p>Envoyé à : <?php echo $resSentMsg['login'] ?></p>
            <p>Envoyé le :<?php echo $resSentMsg['date'] ?></p>
            </br>
            <p>Titre: <?php echo $resSentMsg['title'] ?></p>
            <p>Message :</br><?php echo $resSentMsg['text'] ?></p>
            
            <p class="twosubs">
                <a  href="../controler/content.php?page=newMsg" class="link">
                    <input type ="button" class="sub" value="répondre"/>
                </a>
                
                <form method="post" action="../controler/content.php?page=delete_msg">
                                <input type="hidden" name="idmsg_sent" value="<?php echo $resSentMsg ['id'] ?>"/>
                                <input type=submit value="Supprimer" class="sub"/>
                </form> 
  
            </p> 
    <?php } ?>
</div> 
