Une erreur s'est produite :<br/>
<?php
	//$error should be set before including this page
	if (isset($error)) {
		echo $error;
	}
	else {
		echo "Erreur non précisée.";
	}
?>
<br/><br/>
<a href="index.php">Retour à l'index</a>