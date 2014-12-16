<?php
include('mailbox_toolbar.php');
?>

<div class=".readmessage">
<ul class="listehz">
    <li><input type ="button" value="nouveau"/></li>
    <li><input type ="button" value="répondre"/></li>
    <li><input type ="reset" value="supprimer"/></li>
</ul>

<?php       /* récupération et affichage des données*/
    $resSentMsg=$askSentMsg -> fetch ()
    ?>

            <p>envoyé à : <?php echo $resSentMsg['id_receiver'] ?></p>
            <p>envoyé le :<?php echo $resSentMsg['date'] ?></p>
            <p>titre: <?php echo $resSentMsg['title'] ?></p>
            <p>message :<?php echo $resSentMsg['text'] ?></p>
</div> 
