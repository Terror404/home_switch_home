<?php
if($_POST['submit']=='Accepter la demande')
{
   ?>
<p style="top:10%;position:absolute; text-align: center;">Votre echange est maintenant confirmé! Home Switch Home vous souhaite un excellent séjour.</p>
<?php
}
elseif($_POST['submit']=='Refuser la demande' OR $_POST['submit']=='Annuler la demande')
{
    ?>
<p style="top:10%;position:absolute; text-align: center;">Votre refus a bien été pris en compte!</p>
<?php
}
