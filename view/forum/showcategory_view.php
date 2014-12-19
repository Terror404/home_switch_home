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

    <?php
        if ($topicList->rowCount() != 0) {
            while ($topic = $topicList->fetch()) {
                ?>
                <p><strong><a href="./../controler/content.php?page=showTopic&amp;t=<?php echo $topic['id'] ?>">
                <!--Topic gets stored in $_GET['t']-->
                <?php echo $topic['title'] ?>
                </a></strong><br/>Créé par <?php echo $topic['authorName'] ?> 
                le <?php echo $topic['creationTime'] ?>
                </p><br/>
                <?php
            }
            $topicList->closeCursor();
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