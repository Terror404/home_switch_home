<br/><br/><br/><br/>
<?php
switch($end)
{
    case 0 :
        ?>
        Cette maison se trouve déjà dans vos favoris. <br/>
        Pour la retirer de la liste des favoris cliquer ici : 
        <form method='post' action=''>
            <input type='hidden' name='favs' value='2'/>
            <input type='hidden' name='houseId' value=<?php echo $idHouse?> />
            <input type='submit' value='Supprimer de la liste des favoris'/>
        </form>
        Retour à la page précédente : 
        <input type="button" onclick="self.location.href='<?php echo $_SERVER["HTTP_REFERER"]; ?>'" value="Retour"/>
        <?php
        break;
    
    case 1 :
        
        echo"<br/>";
        echo"<br/>";
        echo"<br/>";
        echo"<br/>";
        echo"La maison a bien été ajouté à vos favoris.";
        echo'<br/><input type=button onclick="self.location.href=\'../controler/content.php?page=houseCard&id='.$idHouse.'\'" value="Retour" >';
        //Ajouter redirection automatique.
        break;
    
    case 2 :
        ;
        echo"<br/>";
        echo"<br/>";
        echo"<br/>";
        echo"La maison a bien été retiré de vos favoris.";
        echo"<br/>";
        echo'<input type=button onclick="self.location.href=\'../controler/content.php?page=houseCard&id='.$idHouse.'\'" value="Retour">';
        break;
    
    case 3 :
       
        echo"<br/>";
        echo"<br/>";
        echo"<br/>";
        echo"Cette maison ne fait pas partie de vos favoris.";
        echo'<br/><input type=button onclick="self.location.href=\'../controler/content.php?page=houseCard&id='.$idHouse.'\'" value="Retour">';
        break;        
}
    