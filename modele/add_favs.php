<?php
echo"<br/>";
echo"<br/>";
echo"avant";
echo$_SESSION['userId'];
    $askFavs=$DB->prepare('SELECT * FROM favorites WHERE id_user=:iduser');
        $askFavs->execute(array('iduser'=>$_SESSION['userId']));
    while($resFavs=$askFavs->fetch())
    {
        $arrayFavs=explode('/',$resFavs['id_house']);
    }
    
    if(isset($_POST['favs']) AND $_POST['favs']==1)
    {
        //Update the favs with a new one
        $idHouse=$_POST['houseId'];
        if(in_array($idHouse,$arrayFavs))
        {
            echo"<br/>";
            echo"<br/>";
            echo"<br/>";
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
        }
        else
        {
            array_push($arrayFavs,$idHouse);
            $arrayFavs=array_values($arrayFavs);
            $stringFavs=implode('/',$arrayFavs);
            $addFavs=$DB->prepare('UPDATE favorites SET id_house=:stringFavs WHERE id_user=:iduser');
                $addFavs->execute(array('stringFavs'=>$stringFavs,'iduser'=>$_SESSION['userId']));
            echo"<br/>";
            echo"<br/>";
            echo"<br/>";
            echo"<br/>";
            echo"La maison a bien été ajouté à vos favoris";
            ?><input type="button" onclick="self.location.href='<?php echo $_SERVER["HTTP_REFERER"]; ?>'" value="Retour à la page précédente"/><?php
        }
    }
    
    elseif(isset($_POST['favs']) AND $_POST['favs']==2)
    {
        //Delete the chosen fav and reorder the array before updating the database
        $idHouse=$_POST['houseId'];
        if(in_array($idHouse,$arrayFavs))
        {
            $key_id=array_search($idHouse,$arrayFavs);
            unset($arrayFavs[$key_id]);
            $arrayFavs=array_values(array_filter($arrayFavs));
            $stringFavs=implode('/',$arrayFavs);
            $addFavs=$DB->prepare('UPDATE favorites SET id_house=:stringFavs WHERE id_user=:iduser');
                $addFavs->execute(array('stringFavs'=>$stringFavs,'iduser'=>$_SESSION['userId']));
            echo"<br/>";
            echo"<br/>";
            echo"<br/>";
            echo"La maison a bien été retiré de vos favoris";
            ?> <br/> <input type="button" onclick="self.location.href=' ../controler/content.php?page=home'" value="Retour" /><?php
        }
        else
        {
            echo"<br/>";
            echo"<br/>";
            echo"<br/>";
            echo"Cette maison ne fait pas partie de vos favoris";
        }
    }
