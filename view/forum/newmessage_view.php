<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>

<form method="post" action="./../controler/content.php?page=showTopic&amp;t=<?php echo CURRENT_TOPIC ?>">
	Entrez le texte de votre message :<br/>
	<textarea name="newMessage" rows="8" cols="50"></textarea><br/>
	<input type="submit" value="Envoyer">
</form>