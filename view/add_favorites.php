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
        header ("Refresh: 2;URL=../controler/content.php?page=houseCard&id=$idHouse");
        echo"<br/>";
        echo"<br/>";
        echo"<br/>";
        echo"<br/>";
        echo"La maison a bien été ajouté à vos favoris. Veuillez patienter";
        //Ajouter redirection automatique.
        break;
    
    case 2 :
        header ("Refresh: 2;URL=../controler/content.php?page=houseCard&id=$idHouse");
        echo"<br/>";
        echo"<br/>";
        echo"<br/>";
        echo"La maison a bien été retiré de vos favoris. Veuillez patienter";
        break;
    
    case 3 :
        header ("Refresh: 2;URL=../controler/content.php?page=houseCard&id=$idHouse");
        echo"<br/>";
        echo"<br/>";
        echo"<br/>";
        echo"Cette maison ne fait pas partie de vos favoris. Veuillez patienter";
        break;        
}
    