Une erreur s'est produite :<br/>
<?php
    //$error should be set before including this page
    if (isset($error)) {
        echo $error;
    }
    else {
        echo "Erreur inconnue.";
    }
?>
<br/><br/>
<a href="./../controler/content.php?page=forumIndex">Retour à l'index du forum</a>