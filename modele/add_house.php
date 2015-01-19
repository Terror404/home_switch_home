<?php
    if(isset($_POST['title']) AND $_POST['title']!=NULL AND $_POST['title']!=""
        AND isset($_POST['description']) AND $_POST['description']!=NULL AND $_POST['description']!=""
        AND isset($_POST['town']) AND $_POST['town']!=NULL AND $_POST['town']!=""
        AND isset($_POST['region']) AND $_POST['region']!=NULL AND $_POST['region']!=""
        AND isset($_POST['address']) AND $_POST['address']!=NULL AND $_POST['address']!=""
        AND isset($_POST['capacity']) AND $_POST['capacity']!=NULL AND $_POST['capacity']!=""
        AND isset($_POST['brnb']) AND $_POST['brnb']!=NULL AND $_POST['brnb']!="")
    {
        $askIdArea=$DB->prepare('SELECT id FROM area WHERE name=:nameArea');
            $askIdArea->execute(array('nameArea'=>$_POST['region']));
        
        while($resIdArea=$askIdArea->fetch())
        {
            $idArea=$resIdArea['id'];
        }
        $town1=str_replace('-', '&nbsp', $_POST['town']);
        $town2=strtolower($town1);


        $askzip=$DB->prepare('SELECT ville_code_postal, ville_code_commune FROM villes_france_free WHERE ville_nom_simple =:nomVille');
            $askzip->execute(array(':nomVille'=>$town2));

        while($reszip=$askzip->fetch())
        {
            $zip=$reszip['ville_code_postal'];
            $zip2=$reszip['ville_code_commune'];
            echo $zip;
        }

        if($zip==$_POST['zipcode'] OR $zip2==$_POST['zipcode'])
        {
            $askIdTown=$DB->prepare("SELECT ville_id FROM villes_france_free WHERE ville_nom_simple=:nomVille");
                $askIdTown->execute(array('nomVille'=>$town2));
            while($resIdTown=$askIdTown->fetch())
            {
                $idTown=$resIdTown['ville_id'];
            }
            include"../modele/upload_photo.php";
            $addH=$DB->prepare("INSERT INTO house(id_user,title,description,id_town,id_area,address,house_type,nbr_people,nbr_room,pictures,picture_1) VALUES(:idUser,:title,:desc,:idTown,:idArea,:address,:houseType,:cap,:brnb,:pictures,:photo1)");
                $addH->execute(array('idUser'=>$_SESSION['userId'],'title'=>$_POST['title'],'desc'=>$_POST['description'],'idTown'=>$idTown,'idArea'=>$idArea,'address'=>$_POST['address'],'houseType'=>$_POST['house_type'],'cap'=>$_POST['capacity'],'brnb'=>$_POST['brnb'],'pictures'=>$p['0'],'photo1'=>$p['1']));
            
            $askAdd=$DB->prepare('SELECT house.id FROM house,user WHERE user.id=house.id_user AND user.id=\''.$_SESSION['userId'].'\' AND house.title=\''.$_POST['title'].'\'');
            $askAdd->execute();
            
            $askCriteriaHouse=$DB->prepare('SELECT * FROM criteria_house');
            $askCriteriaHouse->execute();
            
            while($resAdd=$askAdd->fetch())
            {
            while($resCriteriaHouse=$askCriteriaHouse->fetch())
            {
            
                if(isset($_POST[$resCriteriaHouse['name']]) && $_POST[$resCriteriaHouse['name']]=='on')
                {
                $addCriteria=$DB->prepare('INSERT INTO house_criteria_house(id_house,id_criteria_house) VALUES(\''.$resAdd['id'].'\',\''.$resCriteriaHouse['id'].'\')');
                $addCriteria->execute();
                }
            }
            }
            echo"La maison a bien été enregistrée";
            ?> <input type='button' value='continuer' onclick="self.location.href='../controler/content.php?page=my_houses'"/><?php
        }
        else
        {
            echo"Le code postal ne correspond pas à la ville qui a été entrée.";echo"<br/>";
            echo$town2;
        }
    }
    else
    {
        echo"Vous n'avez pas complété les champs correctement";
        ?>
<input type="button" onclick="self.location.href='../controler/content.php?page=createHouse'" value="Retour"/>
        <?php
    }
?>