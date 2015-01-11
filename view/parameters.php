<br/>
<br/>
<h1>Vos paramètres</h1>
<br/>
<br/>

<h3>Modifier vos informations personnelles :</h3>
<br/>

<form method="post" action="../controler/content.php?page=redirect_chgt_log">
    Modifier son login : <input type="text" name="modLogin"/>
    <input type="hidden" name="whichForm" value="1"/>
    <input type="submit" value="Modifier"/>
    <input type="reset" value="Annuler"/>
</form>
<br/>
<br/>

<form method="post" action="">
    Modifier son mot de passe : <br/>
        Ancien mot de passe : <input type="password" name="oldPassword"/><br/>
        Nouveau mot de passe : <input type="password" name="modPassword"/><br/>
        Répéter le nouveau mot de passe :<input type="password" name="verifModPassword"/><br/>
    <input type="hidden" name="whichForm" value="2"/>
    <input type="submit" value="Modifier"/>
    <input type="reset" value="Annuler"/>
</form>
<?php 
if(isset($end) AND isset($_POST['whichForm']) AND $_POST['whichForm']==2)
{
    if($end==0)
    {
        echo"La modification a été effectuée avec succès";
    }
    elseif($end==1)
    {
        echo"Veuillez remplir le champ correctement";
    }
    elseif($end==2)
    {
        echo"Les deux nouveaux mots de passe entrés sont différents";
    }
    elseif($end==3)
    {
        echo"Le mot de passe est différent de l'actuel";
    }
}
?>
<br/>
<br/>

<form method="post" action="">
Modifier son mot de passe : <br/>
    Ancienne adresse mail : <input type="text" name="oldMail"/><br/>
    Nouvelle adresse mail : <input type="text" name="modMail"/><br/>
    Répéter la nouvelle adresse mail :<input type="text" name="verifModMail"/><br/>
<input type="hidden" name="whichForm" value="3"/>
<input type="submit" value="Modifier"/>
<input type="reset" value="Annuler"/>
</form>
<?php 
if(isset($end) AND isset($_POST['whichForm']) AND $_POST['whichForm']==3)
{
    if($end==0)
    {
        echo"La modification a été effectuée avec succès";
    }
    elseif($end==1)
    {
        echo"Veuillez remplir le champ correctement";
    }
    elseif($end==2)
    {
        echo"Les deux nouvelles adresses mail entrées sont différentes";
    }
    elseif($end==3)
    {
        echo"L'adresse mail entrée est différente de l'actuel";
    }
    elseif($end==4)
    {
        echo"Le format de l'adresse mail entrée n'est pas correct.";
    }
}
?>
<br/>
<br/>

<form method="post" action="">
    Modifier son télephone : <input type="text" name="modPhoneNumber" placeholder="01.02.03.04.05"/>
    <input type="hidden" name="whichForm" value="4"/>
    <input type="submit" value="Modifier"/>
    <input type="reset" value="Annuler"/>
</form>
<br/>
<?php 
if(isset($end) AND isset($_POST['whichForm']) AND $_POST['whichForm']==4)
{
    if($end==0)
    {
        echo"La modification a été effectuée avec succès";
    }
    elseif($end==1)
    {
        echo"Veuillez remplir le champ correctement";
    }
}
?>
<br/>

<form method="post" action="">
    Modifier sa date de naissance : <input type="text" name="modBirthdate" placeholder="jj/mm/aaaa"/>
    <input type="hidden" name="whichForm" value="5"/>
    <input type="submit" value="Modifier"/>
    <input type="reset" value="Annuler"/>
</form>
<?php 
if(isset($end) AND isset($_POST['whichForm']) AND $_POST['whichForm']==5)
{
    if($end==0)
    {
        echo"La modification a été effectuée avec succès";
    }
    elseif($end==1)
    {
        echo"Veuillez remplir le champ correctement";
    }
    elseif($end==2)
    {
        echo"Le format de la date n'est pas correct. Veuillez respecter la casse.";
    }
}
?>
<br/>
<br/>

<h3>Modifier vos préférences :</h3>
<br/>
<form>
    Recevoir des mails de la part de Home Switch Home :
    <input type="checkbox" name="askAutoMail" value="0"/> Non
    <input type="checkbox" name="askAutoMail" value="1"/> Oui
    <input type="submit" value="Modifier"/>
    <input type="reset" value="Annuler"/>
</form>


