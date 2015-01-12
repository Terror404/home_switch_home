<?php /*
	topicList is a query table with the info pertaining to the topics, including
            id
            title
            authorName
            creationTime

	categoryInfo is a table with the info pertaining to the category, including
            title
*/ ?>

<link rel="stylesheet" type="text/css" href="./../view/css/forumstyle.css">

<div class="forumFrame">
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

    <strong><?php echo $categoryInfo['title'] ?></strong>
    <br/><br/>
    
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
    <br/></br>

    <?php
        if ($topicList->rowCount() != 0) {
            for ($i = 0; ($i < TOPICS_PER_PAGE) and (array_key_exists($firstTopic + $i, $topicTable)); $i++)
            {
                    ?>
                    <p><strong><a href="./../controler/content.php?page=showTopic&amp;t=<?php echo $topicTable[$firstTopic + $i]['id'] ?>">
                    <!--Topic gets stored in $_GET['t']-->
                    <?php echo $topicTable[$firstTopic + $i]['title'] ?>
                    </a></strong><br/>Créé par <?php echo $topicTable[$firstTopic + $i]['authorName'] ?> 
                    le <?php echo $topicTable[$firstTopic + $i]['creationTime'] ?>
                    </p><br/>
                    <?php
            }
        }
        else {
            ?>
            Pas de sujets dans la catégorie demandée.
            <?php
        }
    ?>

    <br/><br/>
    <a href="./../controler/content.php?page=addTopic&amp;c=<?php echo CURRENT_CATEGORY ?>">Créer un nouveau sujet.</a>
</div>