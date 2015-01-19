<?php
if($_POST['submit']=='Accepter la demande')
{
   ?>
<p class="alert">Votre echange est maintenant confirmé! 
    </br>
    Home Switch Home vous souhaite un excellent séjour.</p>
<?php
}
elseif($_POST['submit']=='Refuser la demande' OR $_POST['submit']=='Annuler la demande')
{
    ?>
<p class="alert">Votre refus a bien été pris en compte!</p>
<?php
}
