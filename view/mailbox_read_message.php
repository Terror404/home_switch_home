<?php
include('mailbox_toolbar.php');
?>

<?php
require("../modele/read_my_msg.php");
?>
<div class="readmessage">

    
 

<?php       /* récupération et affichage des données*/
   while( $resReceivedmsg=$askReceivedmsg -> fetch ())
   {?>


            <p>De : <?php echo $resReceivedmsg ['login'] ?></p>
            <p>Envoyé le :<?php echo $resReceivedmsg ['date'] ?></p>
            </br>
            <p>Titre: <?php echo $resReceivedmsg ['title'] ?></p>
            <p>Message :</br><?php echo $resReceivedmsg ['text'] ?></p>
            
            <p class="twosubs">
                <a  href="../controler/content.php?page=newMsg" class="link">
                    <input type ="button" class="sub" value="répondre"/>
                </a>
                
                <form method="post" action="../controler/content.php?page=delete_msg">
                                <input type="hidden" name="idmsg" value="<?php echo $resReceivedmsg ['id'] ?>"/>
                                <input type=submit value="Supprimer" class="sub"/>
                </form> 
  
            </p>    
   <?php } ?>
</div>