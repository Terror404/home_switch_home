<?php
/*
messageList is a table including info about the topic's messages, including
authorName (string)
creationTime (date)
content (string)

successfullyPostedMessage (boolean) denotes whether a message has been
successfully added by the user. If the user has not attempted to post a
message, it is not set.

$reasonForPostFailure (string) explains the error to the user if an attempt at
posting a message has been made but failed.
*/
?>

<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>

<?php

if (isset($successfullyPostedMessage)) {
	if ($successfullyPostedMessage) {
		?>
		<p>Votre message a été ajouté.</p>
		<?php
	}
	else {
		?>
		<p>Une erreur s'est produite lors de l'ajout de votre message :<br/>
		<?php echo $reasonForPostFailure; ?></p>
		<?php
	}
}

while ($message = $messageList->fetch())
{
	?>
	<p><i>Posté par <?php echo $message['authorName'] ?> le <?php echo $message['creationTime'] ?></i><br/>
	<?php echo $message['content'] ?></p>
	<?php
}
$messageList->closeCursor();

?>

<br/><br/>
<!-- (Quick) Answer part -->
Entrez le texte de votre réponse :
<form method="post" action="showtopic.php?t=<?php echo CURRENT_TOPIC ?>">

<textarea name="newMessage" rows="8" cols="50"></textarea><br/>
<input type="submit" value="Envoyer">

</form>