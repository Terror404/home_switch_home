<link rel="stylesheet" type="text/css" href="./../view/css/forumstyle.css">
<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>

<div class="forumFrame">
    <form method="post" action="./../controler/content.php?page=showTopic&amp;t=<?php echo CURRENT_TOPIC ?>&amp;p=<?php echo CURRENT_MESSAGE ?>">
        <?php
            if (POST_CAN_BE_DELETED) {
                ?>
                <input type="checkbox" name="deleteInstruction"> Supprimer le message</br>
                <?php
            }
        ?>
        Entrez le texte de votre message :<br/>
        <textarea name="updatedMessage" rows="8" cols="50">
        <?php echo $postData['content'] ?>
        </textarea><br/>
        <input type="submit" value="Envoyer">
    </form>
</div>