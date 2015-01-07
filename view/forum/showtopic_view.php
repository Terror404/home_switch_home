<link rel="stylesheet" type="text/css" href="./../view/css/forumstyle.css">
<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>

<div class="forumFrame">
    <?php
    
        //confirmation message for adding a new post
        if (isset($successfullyPostedMessage)) {
            displayConfirmation(
                $successfullyPostedMessage,
                "Votre message a été ajouté.",
                "l'ajout du message",
                $reasonForPostFailure
            );
        }
        //confirmation message for editing a post
        if (isset($successfullyModifiedMessage)) {
            displayConfirmation(
                $successfullyModifiedMessage,
                "Votre message a été modifié.",
                "la modification du message",
                $reasonForModificationFailure
            );
        }
        //confirmation message for locking the topic
        if (isset($successfullyLockedTopic)) {
            displayConfirmation(
                $successfullyLockedTopic,
                "Le sujet a été verrouillé avec succès.",
                "l'opération de verrouillage",
                $reasonForLockFailure
            );
        }
        //confirmation message for unlocking the topic
        if (isset($successfullyUnlockedTopic)) {
            displayConfirmation(
                $successfullyUnlockedTopic,
                "Le sujet a été déverrouillé avec succès.",
                "l'opération de déverrouillage",
                $reasonForUnlockFailure
            );
        }
        
        //Title display
        echo(
            "<span class='pageTitle'>"
            . $topicInfo['title']
            . "</span>"
        );
        
        //Locking topic, mod only
        if ($hasModRights and !$topicInfo['lockStatus']) {
            ?>
                <form method="post"
                    action="./../controler/content.php?page=showTopic&amp;t=<?php echo CURRENT_TOPIC ?>">
                    <input type="hidden" name="lockingTopic" value="true">
                    <input type="submit" value="Verrouiller ce sujet">
                </form>
            <?php
        }
        
        //Unlocking topic, mod only
        if ($hasModRights and $topicInfo['lockStatus']) {
            ?>
                <form method="post" action="./../controler/content.php?page=showTopic&amp;t=<?php echo CURRENT_TOPIC ?>">
                    <input type="hidden" name="unlockingTopic" value="true">
                    <input type="submit" value="Déverrouiller ce sujet">
                </form>
            <?php
        }
        
        //Page navigation
        echo "Page ";
        for ($i = 1; $i <= NUMBER_OF_PAGES; $i++) {
            if ($i == CURRENT_PAGE) {
                echo "<strong>".(string)$i."</strong> ";
            }
            else {
                echo(
                    "<a href='./../controler/content.php?page=showTopic&amp;t="
                    . CURRENT_TOPIC
                    . "&amp;p="
                    . (($i-1) * MESSAGES_PER_PAGE)
                    . "'>"
                    . $i
                    . "</a> "
                );
            }
        }
        
        ?>
        <br/></br>
        
        <!-- Message display -->
        <table class="messageTable">
        <?php
        
        //Displaying messages; up to MESSAGES_PER_PAGE or until there are no more messages
        for ($i = 0; ($i < MESSAGES_PER_PAGE) and (array_key_exists($firstMessage + $i, $messageTable)); $i++)
        {
            $currentMsg = $firstMessage + $i;
            ?>
            <tr>
                <td class="posterFullInfo">
                    <?php echo $messageTable[$currentMsg]['authorName'] ?></br>
                    Inscrit le <?php echo $messageTable[$currentMsg]['joinTime'] ?>
                </td>
                <td class="message">
                    <div class="messageInfo">
                        posté le <?php echo $messageTable[$currentMsg]['creationTime'] ?></i> - <!-- espace -->
                        #<?php echo($currentMsg) /*Message number*/ ?>
                    </div>
                    <?php //Displaying the "Edit" option
                        if (
                            isLoggedIn() and ($hasModRights
                            or ($messageTable[$currentMsg]['authorId'] == $_SESSION['userId'])))
                        {
                            echo(
                                " - <a href='./../controler/content.php?page=editPost&amp;t="
                                . CURRENT_TOPIC
                                . "&amp;p="
                                . $messageTable[$currentMsg]['id']
                                . "'>Modifier</a>"
                            );
                        }
                    ?>
                    <?php echo $messageTable[$currentMsg]['content'] ?></p>
                </td>
            </tr>
            <?php
        }
        ?>
        </table>

    <br/><br/>
    
    <!-- (Quick) Answer part -->
    <?php
    if (isLoggedIn()) {
        echo "Vous devez vous identifier pour pouvoir répondre.";
    }
    elseif ($topic['lockStatus']) {
        echo "Vous ne pouvez pas ajouter de message à ce sujet car il est verrouillé.";
    }
    else {
        ?>
        Entrez le texte de votre réponse :
        <form method="post"
            action="./../controler/content.php?page=showTopic&amp;t=<?php echo CURRENT_TOPIC ?>">
            <textarea name="newMessage" rows="8" cols="50"></textarea><br/>
            <input type="submit" value="Envoyer">
        </form>
        <?php
    }
    ?>
</div>