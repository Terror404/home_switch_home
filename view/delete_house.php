<br/>
<br/>
<br/>
<?php

if(isset($_POST['idHouse']))
{
    if(!isset($_POST['confDelHouse']))
    {
       echo$_POST['idHouse'];
       echo"apres";
?>
        Souhaitez-vous vraiment supprimer cette maison de votre profil ?? 
        <br/>
        <form method='post' action='../controler/content.php?page=confirm_delete_house'>
            <input type=hidden name='confDelHouse' value='1'/>
            <input type='hidden' name='idHouse' value="<?php $idHouse?>"/>
            <input type='submit' value ='Oui je souhaite supprimer cette maison'/>
        </form>
        <input type='button' value='Non, retour à la fiche maison' onclick='self.location.href="<?php echo $_SERVER["HTTP_REFERER"]; ?>"'/>
<?php
    }
    else
    {
        $delHouse=$DB->prepare('DELETE FROM house WHERE id=:idhouse');
            $delHouse->execute(array('idhouse'=>$_POST['idHouse']));
        
        $delAdHouse=$DB->prepare('DELETE FROM ad WHERE id_house=:idhouse');
            $delAdHouse->execute(array('idhouse'=>$_POST['idHouse']));
            
        echo"La suppression a été réalisée avec succès.";
        echo$_POST['confDelHouse'];
        echo"id";
        echo$_POST['idHouse'];
        ?> <input type='button' value='Retour' onclick='self.location.href="../controler/content.php?page=my_houses"'/><?php
    }
}
else
{
    echo"<br/>";
    echo"<br/>";
    echo"Vous n'avez pas accès à cette page";
    ?> <input type='button' value="Retour" onclick='self.location.href="../controler/content.php?page=home"'/><?php
}



