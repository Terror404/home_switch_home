<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>

<form method="post" action="showcategory.php?c=<?php echo CURRENT_CATEGORY ?>">
	Entrez le nom de votre sujet :<br/>
	<input type="text" name="topicTitle"><br/>
	Entrez le texte de votre message :<br/>
	<textarea name="openingPost" rows="8" cols="50"></textarea><br/>
	<input type="submit" value="Envoyer">
</form>