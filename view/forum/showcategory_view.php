<link rel="stylesheet" type="text/css" href="./../view/css/forumstyle.css">

<div class="ForumFrame">
    <?php
        if (isset($successfullyAddedTopic)) {
            if ($successfullyAddedTopic) {
                ?>
                <p>Votre sujet a été ajouté.</p><br/>
                <?php
            }
            else {
                ?>
                <p>Une erreur s'est produite lors de l'ajout de votre sujet :<br/>
                <?php echo $reasonForPostFailure; ?></p><br/>
                <?php
            }
        }
    ?>

    <div class="ForumPageHeader"><?php echo $categoryInfo['title'] ?></div>
    <br/>
    
    <!-- Page navigation -->
    Page 
    <?php
    for ($i = 1; $i <= NUMBER_OF_PAGES; $i++) {
        if ($i == CURRENT_PAGE) {
            echo "<strong>".(string)$i."</strong> ";
        }
        else {
            ?>
            <a href="./../controler/content.php?page=showCategory&amp;c=<?php echo CURRENT_CATEGORY ?>&amp;t=<?php echo (($i-1) * TOPICS_PER_PAGE) ?>">
            <?php echo $i ?></a> <!-- espace -->
            <?php
        }
    }
    ?>
    <br/>
    
    <?php
        if ($topicList->rowCount() != 0) {
            echo "<table class='ForumTable'>";
            for ($i = 0; ($i < TOPICS_PER_PAGE) and (array_key_exists($firstTopic + $i, $topicTable)); $i++)
            {
                ?>
                <tr>
                    <td class="TitlePanel">
                        <strong>
                            <a href="./../controler/content.php?page=showTopic&amp;t=<?php echo $topicTable[$firstTopic + $i]['id'] ?>">
                            <!--Topic gets stored in $_GET['t']-->
                            <?php echo $topicTable[$firstTopic + $i]['title'] ?>
                        </a></strong>
                        <br/>
                        <div class="MessageInfo">
                            Créé par <?php echo $topicTable[$firstTopic + $i]['authorName'] ?> 
                            le <?php echo $topicTable[$firstTopic + $i]['creationTime'] ?>
                        </div>
                    </td>
                </tr>
                <?php
            }
            echo "</table>";
        }
        else {
            ?>
            <br/>Pas de sujets dans la catégorie demandée.<br/>
            <?php
        }
    ?>

    <br/>
    <?php
    if (!isLoggedIn()) {
        echo "Vous devez vous identifier pour pouvoir répondre.";
    }
    else {
        ?>
        <a
            class="NewTopicButton"
            href="./../controler/content.php?page=addTopic&amp;c=<?php echo CURRENT_CATEGORY ?>">
            Créer un nouveau sujet
        </a>
        <?php
    }
    ?>
</div>