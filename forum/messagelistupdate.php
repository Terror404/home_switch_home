<?php

//adding a new message
if (
	isset($_POST['newMessage'])
	and ($_POST['newMessage'] != null)
	and ($_POST['newMessage'] != "")
) {
	if (isLoggedIn()) {
		try {
			$messageInsertion = $DB->prepare("
				INSERT INTO post(date_creation, id_topic, id_user, text)
				VALUES(:creationTime, :topicId, :authorId, :content)
			");
			$messageInsertion->execute(array(
				'creationTime' => (new DateTime("now"))->format('Y-m-d H:i:s'),
				'topicId' => CURRENT_TOPIC,
				'authorId' => $_SESSION['userId'],
				'content' => $_POST['newMessage']
			));
			$successfullyPostedMessage = true;
			//updating message list with the added answer
			$messageList = getMessageList($DB, CURRENT_TOPIC);
		}
		catch (exception $e) {
			$successfullyPostedMessage = false;
			$reasonForPostFailure = "L'ajout dans la base de donnée a échoué.";
		}
	}
	else {
		$successfullyPostedMessage = false;
		$reasonForPostFailure = "Vous n'êtes pas identifié.";
	}
}

//modifying an existing message
if (
	isset($_POST['updatedMessage'])
	and ($_POST['updatedMessage'] != null)
	and ($_POST['updatedMessage'] != "")
) {
	if (isLoggedIn()) {
		if ((isset($_GET['p']) AND ((int)$_GET['p'] != 0))) {
			//getting data about the message being modified so we can check it
			//exists and its owner is the one modifying it
			$postQuery = $DB->query("
				SELECT	user.id AS authorId
				FROM 	post, user
				WHERE	user.id = post.id_user
						AND post.id = {$_GET['p']}
			");
                                                
			if ($postQuery->rowCount() != 0) {
				$postData = $postQuery->fetch();
				if ($postData['authorId'] == $_SESSION['userId']) {
					$editQuery = $DB->prepare("");
				}
				else {
					$successfullyPostedMessage = false;
					$reasonForPostFailure = "Vous n'avez pas l'autorisation de
						modifier ce message.";
				}
			}
			else {
				$successfullyPostedMessage = false;
				$reasonForPostFailure = "Le message précisé n'existe pas.";
                        }
		}
		else {
			$successfullyPostedMessage = false;
			$reasonForPostFailure = "Pas de message précisé.";
		}
                }
	else {
		$successfullyPostedMessage = false;
		$reasonForPostFailure = "Vous n'êtes pas identifié.";
	}
}
?>