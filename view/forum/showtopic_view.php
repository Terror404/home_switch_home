<link rel="stylesheet" type="text/css" href="./../view/css/forumstyle.css">
<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>

<div class="forumFrame">
    <?php
    
        //confirmation/error message for adding a new post
        if (isset($successfullyPostedMessage)) {
            if ($successfullyPostedMessage) {
                ?>
                <p>Votre message a été ajouté.</p><br/>
                <?php
        }
            else {
                ?>
                <p>Une erreur s'est produite lors de l'ajout de votre message :<br/>
                <?php echo $reasonForPostFailure; ?></p><br/>
                <?php
            }
        }
        //confirmation/error message for editing a post
        if (isset($successfullyModifiedMessage)) {
            if ($successfullyModifiedMessage) {
                ?>
                <p>Votre message a été modifié.</p><br/>
                <?php
            }
            else {
                ?>
                <p>Une erreur s'est produite lors de la modification de votre message :<br/>
                <?php echo $reasonForModificationFailure; ?></p><br/>
                <?php
            }
        }
        
        //Page navigation
        ?>
        Page 
        <?php
        for ($i = 1; $i <= NUMBER_OF_PAGES; $i++) {
            if ($i == CURRENT_PAGE) {
                echo "<strong>".(string)$i."</strong> ";
            }
            else {
                ?>
                <a href="./../controler/content.php?page=showTopic&amp;t=<?php echo CURRENT_TOPIC ?>&amp;p=<?php echo (($i-1) * MESSAGES_PER_PAGE) ?>">
                <?php echo $i ?></a> <!-- espace -->
                <?php
            }
        }
        ?>
        <br/></br>
        <?php
        
        //Displaying messages
        for ($i = 0; ($i < MESSAGES_PER_PAGE) and (array_key_exists($firstMessage + $i, $messageTable)); $i++)
        {
            ?>
            <p><i>Posté par 
            <?php echo $messageTable[$firstMessage + $i]['authorName'] ?> 
            le <?php echo $messageTable[$firstMessage + $i]['creationTime'] ?></i> - 
            #<?php echo($firstMessage + $i) /*Message number*/ ?>
                <?php
                    if (isLoggedIn()) { //Displaying the "Edit" option
                        if ($messageTable[$firstMessage + $i]['authorId'] == $_SESSION['userId']) {
                            ?>
                             - <a href="./../controler/content.php?page=editPost&amp;t=<?php echo CURRENT_TOPIC ?>&amp;p=<?php echo $messageTable[$firstMessage + $i]['id'] ?>">Modifier</a>
                            <?php
                        }
                    }
                ?>
                <br/>
            <?php echo $messageTable[$firstMessage + $i]['content'] ?></p><br/>
            <?php
        }
    ?>

    <br/><br/>
    <!-- (Quick) Answer part -->
    Entrez le texte de votre réponse :
    <form method="post" action="./../controler/content.php?page=showTopic&amp;t=<?php echo CURRENT_TOPIC ?>">

    <textarea name="newMessage" rows="8" cols="50"></textarea><br/>
    <input type="submit" value="Envoyer">

    </form>
</div>