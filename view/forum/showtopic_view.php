<link rel="stylesheet" type="text/css" href="./../view/css/forumstyle.css">
<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>

<div class="ForumFrame">
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
        //confirmation message for deleting a message
        if (isset($successfullyDeletedMessage)) {
            displayConfirmation(
                $successfullyDeletedMessage,
                "Votre message a été supprimé.",
                "la suppression du message",
                $reasonForDeletionFailure
            );
        }
        
        //error message for unsuccessful topic deletion
        if (isset($topicDeletionSuccessful) AND !$topicDeletionSuccessful) {
            echo "<p>Une erreur s'est produite lors de la suppression du sujet :<br/>";
            echo $reasonForTopicDeletionFailure;
            echo "</p><br/>";
        }
        
        //Title display
        echo(
            "<div class='ForumPageHeader'>"
            . $topicInfo['title']
            . "</div><br/>"
        );
        
        //Locking topic, mod only
        if ($hasModRights and !$topicInfo['lockStatus']) {
            ?>
                <form method="post"
                    action="./../controler/content.php?page=showTopic&amp;t=<?php echo CURRENT_TOPIC ?>">
                    <input type="hidden" name="lockingTopic" value="true">
                    <input type="submit" class="SubmitButton" value="Verrouiller ce sujet">
                </form>
                <br/>
            <?php
        }
        
        //Unlocking topic, mod only
        if ($hasModRights and $topicInfo['lockStatus']) {
            ?>
                <form method="post" action="./../controler/content.php?page=showTopic&amp;t=<?php echo CURRENT_TOPIC ?>">
                    <input type="hidden" name="unlockingTopic" value="true">
                    <input type="submit" class="SubmitButton" value="Déverrouiller ce sujet">
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
        <br/>
        
        <!-- Message display -->
        <table class="ForumTable">
        <?php
        
        //Displaying messages; up to MESSAGES_PER_PAGE or until there are no more messages
        for ($i = 0; ($i < MESSAGES_PER_PAGE) and (array_key_exists($firstMessage + $i, $messageTable)); $i++)
        {
            $currentMsg = $firstMessage + $i;
            ?>
            <tr>
                <td class="PosterFullInfo">
                    <?php echo $messageTable[$currentMsg]['authorName'] ?></br>
                    <div class="AvatarWrapper">
                        <img
                            class="UserAvatar"
                            src="<?php echo $messageTable[$currentMsg]['authorAvatar'] ?>"
                            alt="Avatar de <?php echo $messageTable[$currentMsg]['authorName'] ?>"
                        >
                    </div>
                    Inscrit le
                    <?php
                        $joinDate=date_create($messageTable[$currentMsg]['joinTime']);
                        echo date_format($joinDate,"Y/m/d");
                    ?>
                </td>
                <td class="Message">
                    <div class="MessageInfo">
                        posté le <?php echo $messageTable[$currentMsg]['creationTime'] ?></i> - <!-- espace -->
                        #<?php echo($currentMsg) /*Message number*/ ?>
                        <?php //Displaying the "Edit" option
                        if (
                            isLoggedIn()
                            and (
                                $hasModRights
                                or (
                                    $messageTable[$currentMsg]['authorId'] == $_SESSION['userId']
                                    and !$topicInfo['lockStatus']
                                )
                            )
                        ) {
                            echo(
                                " - <a href='./../controler/content.php?page=editPost&amp;t="
                                . CURRENT_TOPIC
                                . "&amp;p="
                                . $messageTable[$currentMsg]['id']
                                . "'>Modifier</a>"
                            );
                        }
                        ?>
                    </div>
                    <hr>
                    <?php echo $messageTable[$currentMsg]['content'] ?></p>
                </td>
            </tr>
            <?php
        }
        ?>
        </table>

    <br/>
    
    <!-- (Quick) Answer part -->
    <?php
    if ($topicInfo['lockStatus'] and !$hasModRights) {
        echo "Vous ne pouvez pas ajouter de message à ce sujet car il est verrouillé.";
    }
    elseif (!isLoggedIn()) {
        echo "Vous devez vous identifier pour pouvoir répondre.";
    }
    else {
        ?>
        Entrez le texte de votre réponse :
        <form method="post"
            action="./../controler/content.php?page=showTopic&amp;t=<?php echo CURRENT_TOPIC ?>">
            <textarea name="newMessage" rows="8" cols="50"></textarea><br/>
            <input type="submit" class="SubmitButton" value="Envoyer">
        </form>
        <?php
    }
    ?>
</div>