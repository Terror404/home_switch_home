
    <br/>
<br/>
<div class="Title"><h1>Vos paramètres</h1></div>
<br/>
<br/>

<div class="form">
<h3>Modifier vos informations personnelles :</h3>
<br/>

<form method="post" action="../controler/content.php?page=redirect_chgt_log">
    <label>Modifier son login :</label> <input type="text" name="modLogin"/>
   <p class="twosubs"> <input type="hidden" name="whichForm" value="1"/>
    </br> <input class="sub" type="submit" value="Modifier"/>
    <input class="sub" type="reset" value="Annuler"/></p>
</form>
<br/>
<br/>

<form method="post" action="">
    Modifier son mot de passe : <br/>
       <label> Ancien mot de passe : </label><input type="password" name="oldPassword"/><br/>
       <label> Nouveau mot de passe :</label> <input type="password" name="modPassword"/><br/>
       <label> Répéter le nouveau mot de passe :</label><input type="password" name="verifModPassword"/><br/>
<p class="twosubs"> <input type="hidden" name="whichForm" value="2"/>
  </br>  <input class="sub" type="submit" value="Modifier"/>
    <input class="sub" type="reset" value="Annuler"/></p>
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
Modifier son adresse mail : <br/>
    <label>Ancienne adresse mail :</label> <input type="text" name="oldMail"/><br/>
    <label>Nouvelle adresse mail : </label><input type="text" name="modMail"/><br/>
    <label>Répéter la nouvelle adresse mail :</label><input type="text" name="verifModMail"/><br/>
<p class="twosubs"><input type="hidden" name="whichForm" value="3"/>
</br><input class="sub" type="submit" value="Modifier"/>
<input class="sub" type="reset" value="Annuler"/></p>
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
    <label>Modifier son télephone :</label> <input type="text" name="modPhoneNumber" placeholder="01.02.03.04.05"/>
    <p class="twosubs"><input type="hidden" name="whichForm" value="4"/>
    </br><input class="sub" type="submit" value="Modifier"/>
    <input class="sub" type="reset" value="Annuler"/></p>
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
    <label>Modifier sa date de naissance :</label> <input type="text" name="modBirthdate" placeholder="jj/mm/aaaa"/>
   <p class="twosubs"> <input type="hidden" name="whichForm" value="5"/>
    </br> <input class="sub" type="submit" value="Modifier"/>
    <input class="sub" type="reset" value="Annuler"/></p>
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
    <label>Recevoir des mails de la part de Home Switch Home :</label>
    <input type="checkbox" name="askAutoMail" value="0"/> Non
    <input type="checkbox" name="askAutoMail" value="1"/> Oui
   <p class="twosubs"></br> <input class="sub" type="submit" value="Modifier"/>
       <input class="sub" type="reset" value="Annuler"/></p>
</form>
<form method="post" action="">
    <br/>
    <label>Langue/Language :</label>
    <select name="language" > 
        <option value="0"> Fançais
        <option value="1"> Anglais
    </select>
     <?php
    if(isset($end) AND $end==0)
    {
        echo"<br/>Cette langue est déjà celle utilisée par le site.";
    }
    elseif(isset($end) AND $end==1)
    {
        echo"<br/>Veuillez vous déconnecter pour que la modification soit prise en compte.";
    }
    ?>
        <p class="twosubs">
        <input class="sub" type="submit" value="Modifier"/>
        <input class="sub" type="reset" value="Annuler"/>
        </p><br/>
</form>
   
<form method="post" action="">
    Supprimer définitivement votre profil :
    <p class="twosubs">
        <input type="hidden" name="definitiveDelete" value="1"/>
        <input class="sub" type="submit" value="Supprimer"/>
    </p>
</form>

</div>


