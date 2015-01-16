<?php
include('mailbox_toolbar.php');
?>

<?php
require("../modele/read_my_msg.php");
?>
<div class="readmessage">

    
 

<?php       /* récupération et affichage des données*/
    $resReceivedmsg=$askReceivedmsg -> fetch ()
    ?>


            <p>De : <?php echo $resReceivedmsg ['login'] ?></p>
            <p>Envoyé le :<?php echo $resReceivedmsg ['date'] ?></p>
            </br>
            <p>Titre: <?php echo $resReceivedmsg ['title'] ?></p>
            <p>Message :</br><?php echo $resReceivedmsg ['text'] ?></p>
            
            
            <input type ="button" class="sub1" value="répondre"/>
</div>