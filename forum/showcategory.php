<?php

//test content on line 28
require_once("../modele/pdoDatabaseRef.php");
require_once("isLoggedIn stub.php");
require_once("showcategory_model.php");

if (CATEGORY_IS_SET) {
	if (CATEGORY_EXISTS) {
	
		//adding new topic
		if (
			(isset($_POST['openingPost']))
			and ($_POST['openingPost'] != "")
			and ($_POST['openingPost'] != null)
			and (isset($_POST['topicTitle']))
			and ($_POST['topicTitle'] != "")
			and ($_POST['topicTitle'] != null)
		) {
			if (isLoggedIn()) {
				try {
					$topicInsertion = $DB->prepare("
						INSERT INTO topic(date_creation, id_category, id_user, locked, title)
						VALUES(:creationTime, :categoryId, :authorId, :lockedStatus, :title)
					");
					$topicInsertion->execute(array(
						'creationTime' => (new DateTime("now"))->format('Y-m-d H:i:s'),
						'categoryId' => CURRENT_CATEGORY,
						'authorId' => $_SESSION['userId'],
						'lockedStatus' => false,
						'title' => $_POST['topicTitle']
					));
					
					$newTopicId = $DB->lastInsertId();
					$messageInsertion = $DB->prepare("
						INSERT INTO post(date_creation, id_topic, id_user, text)
						VALUES(:creationTime, :topicId, :authorId, :content)
					");
					$messageInsertion->execute(array(
						'creationTime' => (new DateTime("now"))->format('Y-m-d H:i:s'),
						'topicId' => $newTopicId,
						'authorId' => /*$_SESSION['userId']*/1,
						'content' => $_POST['openingPost']
					));
					$successfullyAddedTopic = true;
				}
				catch (exception $e) {
					$successfullyAddedTopic = false;
					$reasonForPostFailure = "L'ajout dans la base de donnée a échoué.";
				}
			}
			else {
				$successfullyAddedTopic = false;
				$reasonForPostFailure = "Vous n'êtes pas identifié.";
			}
		}
	
		//displaying topics
		$topicList = getTopicList($DB, CURRENT_CATEGORY);
		include("showcategory_view.php");
	}
	else {
		$error = "La catégorie demandée n'existe pas.";
		include("error.php");
	}
}
else {
	$error = "Pas de catégorie précisée.";
	include("error.php");
}

?>