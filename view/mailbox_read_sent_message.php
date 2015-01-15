<?php
include('mailbox_toolbar.php');
?>

<div class="readmessage">


<?php       /* récupération et affichage des données*/
    $resSentMsg=$askSentMsg -> fetch ()
    ?>

            <p>Envoyé à : <?php echo $resSentMsg['login'] ?></p>
            <p>Envoyé le :<?php echo $resSentMsg['date'] ?></p>
            </br>
            <p>Titre: <?php echo $resSentMsg['title'] ?></p>
            <p>Message :</br><?php echo $resSentMsg['text'] ?></p>
</div> 
