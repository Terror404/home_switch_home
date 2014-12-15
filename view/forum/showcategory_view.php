<?php /*
	topicList is a query table with the info pertaining to the topics, including
		id
		title
		authorName
		creationTime

	categoryInfo is a table with the info pertaining to the category, including
		title
*/ ?>

<?php
	if (isset($successfullyAddedTopic)) {
		if ($successfullyAddedTopic) {
			?>
			<p>Votre sujet a été ajouté.</p>
			<?php
		}
		else {
			?>
			<p>Une erreur s'est produite lors de l'ajout de votre sujet :<br/>
			<?php echo $reasonForPostFailure; ?></p>
			<?php
		}
	}
?>

<?php echo $categoryInfo['title'] ?>
<br/><br/>

<?php
	if ($topicList->rowCount() != 0) {
		while ($topic = $topicList->fetch()) {
			?>
                        <p><strong><a href="./../controler/content.php?page=showTopic&t=<?php echo $topic['id'] ?>">
			<!--Topic gets stored in $_GET['t']-->
			<?php echo $topic['title'] ?>
			</a></strong><br/>Créé par <?php echo $topic['authorName'] ?> 
			le <?php echo $topic['creationTime'] ?>
			<br/></p>
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