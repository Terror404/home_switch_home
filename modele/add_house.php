<!--Attention possibilité de faire une requête imbriquée !!!-Pierre-->
<?php
session_start();
    try
        {
            $DB=new PDO ("mysql:host=localhost;dbname=home_switch_home","root","",array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        } 
    catch (Exception $ex) 
        {
            die('Erreur'.$ex->getMessage());
        }
?>

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
        
        $askzip=$DB->prepare('SELECT ville_code_postal FROM villes_france_free WHERE ville_nom_simple =:nomVille');
            $askzip->execute(array('nomVille'=>$_POST['town']));
            
        while($reszip=$askzip->fetch())
        {
            $zip=$reszip['ville_code_postal'];
        }
        
        if($zip==$_POST['zipcode'])
        {
            $askIdTown=$DB->prepare("SELECT ville_id FROM villes_france_free WHERE ville_nom_simple=:nomVille");
                $askIdTown->execute(array('nomVille'=>$_POST['town']));
            while($resIdTown=$askIdTown->fetch())
            {
                $idTown=$resIdTown['ville_id'];
            }
            include"../modele/upload_photo.php";
            $addH=$DB->prepare("INSERT INTO house(id_user,title,description,id_town,id_area,address,house_type,nbr_people,nbr_room,pictures,picture_1) VALUES(:idUser,:title,:desc,:idTown,:idArea,:address,:houseType,:cap,:brnb,:pictures,:photo1)");
                $addH->execute(array('idUser'=>$_SESSION['userId'],'title'=>$_POST['title'],'desc'=>$_POST['description'],'idTown'=>$idTown,'idArea'=>$idArea,'address'=>$_POST['address'],'houseType'=>$_POST['house_type'],'cap'=>$_POST['capacity'],'brnb'=>$_POST['brnb'],'pictures'=>$p['0'],'photo1'=>$p['1']));
            echo"La maison a bien été enregistrée";
            ?> <input type='button' value='continuer' onclick="self.location.href='../controler/content.php?page=my_houses'"/><?php
        }
        else
        {
            echo"Le code postal ne correspond pas à la ville qui a été entrée.";
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