<br/>
<br/>
<div class="Profile">
<h2>Fiche profil</h2>
<br/>
<div class="ProfilePic2">
    <?php
    while ($resProfPic = $askProfPic->fetch()) {
        ?>
            <img src="<?php echo$resProfPic['picture']; ?>" alt="photo de profil"/>
        <?php
    }
    ?>
</div>
    Mofifier la photo de profil :
    <br/>
    <form method='post' action='' enctype="multipart/form-data">
        Aperçu de la photo que vous souhaitez ajouter : <br/>
        <img id="uploadPreview" class="previewImg"/>
        <input type='file' name='photo7' id="photo7" onChange='previewImg()'/>
        <input type='hidden' name='modifyProf' value='1'/>
        <input type="hidden" name="form" value="3"/>
        <input type='submit' value='modifier la photo de profil' onclick='javascript:window.close()'/>
        <input type='reset' value='annuler'/>
    </form>
    <script type='text/javascript'>
        function previewImg()
        {
            var ofReader=new FileReader();
            ofReader.readAsDataURL(document.getElementById("photo7").files[0]);
            
            ofReader.onload=function (oFREvent)
            {
                document.getElementById("uploadPreview").src=oFREvent.target.result;
            };
        };
    </script>
    <?php
    if(isset($_POST['form']) AND $_POST['form']==3)
    {
        if($end==0)
        {
            echo$message;
            echo"La modification a été effectuée avec succès.";
        }
        elseif($end==1)
        {
            echo$message;
            echo"Veuillez remplir le champ correctement";
        }
    }
    ?>
    

<div class="login">
    <?php
    while ($resProfLog = $askProfLog->fetch()) {
        ?> <p> Bonjour je suis <?php echo $resProfLog['login']; ?></p><?php
    }
    ?>
</div>
<div class="mbrsince">
<?php
while ($resProfDate = $askProfDate->fetch()) {
    ?> <p> Membre depuis <?php
        $originalDateC = $resProfDate['date_creation'];
        $arrC = explode('-', $originalDateC);
        switch ($arrC['1']) {
            case 01:
                echo "janvier";
                echo"&nbsp";
                echo $arrC['0'];
                break;
            case 0:
                echo "février";
                echo"&nbsp";
                echo $arrC['0'];
                break;
            case 03:
                echo "mars";
                echo"&nbsp";
                echo $arrC['0'];
                break;
            case 04:
                echo "avril";
                echo"&nbsp";
                echo $arrC['0'];
                break;
            case 05:
                echo "mai";
                echo"&nbsp";
                echo $arrC['0'];
                break;
            case 06:
                echo "juin";
                echo"&nbsp";
                echo $arrC['0'];
                break;
            case 07:
                echo "juillet";
                echo"&nbsp";
                echo $arrC['0'];
                break;
            case 08:
                echo "août";
                echo"&nbsp";
                echo $arrC['0'];
                break;
            case 09:
                echo "septembre";
                echo"&nbsp";
                echo $arrC['0'];
                break;
            case 10:
                echo "octobre";
                echo"&nbsp";
                echo $arrC['0'];
                break;
            case 11:
                echo "novembre";
                echo"&nbsp";
                echo $arrC['0'];
                break;
            case 12:
                echo "décembre";
                echo"&nbsp";
                echo $arrC['0'];
                break;
        }
    }
    ?>
</div>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<div class="desc">
    <h2>A propos de moi :</h2>
        <?php
        while ($resProfDesc = $askProfDesc->fetch()) 
        {
        ?>
            <form method='post' action=''>
                    <textarea name='modDescription'><?php echo $resProfDesc['description']?></textarea>
                    <input type='hidden' name='modifyProf' value='1'/>
                    <input type="hidden" name="form" value="1"/>
                    <input type='submit' value='Modifier la description'/>
                    <input type='reset' value='Annuler'/>
            </form>
        <?php
        }
        if(isset($_POST['form']) AND $_POST['form']==1)
        {
            if($end==0)
            {
                echo"La modification a été effectuée avec succès.";
            }
            elseif($end==1)
            {
                echo"Veuillez remplir le champ correctement";
            }
        }
        ?>
    
</div>
<div class="dest">
    <h2>Les destinations où je souhaiterais me rendre :</h2>
        <?php
        while ($resProfWant = $askProfWant->fetch())
        {
            $dest=$resProfWant['wanted_dest'];
        ?>
            <form method='post' action=''>
                <input type='text' name='modDestination' value='<?php echo $dest ?>'/>
                <input type='hidden' name='modifyProf' value='2'/>
                <input type="hidden" name="form" value="2"/>
                <input type='submit' value='Modifier les destinations souhaitées'/>
                <input type='reset' value='Annuler'/>
            </form>
        <?php
        }
        if(isset($_POST['form']) AND $_POST['form']==2)
        {
            if($end==0)
            {
                echo"La modification a été effectuée avec succès.";
            }
            elseif($end==1)
            {
                echo"Veuillez remplir le champ correctement";
            }
        }
        ?>
</div>
<div class="Rate">
    <h2>Note donnée par les autres utilisateurs</h2>
    <div class="star"><?php
        while ($resProfRate = $askProfRate->fetch()) {
            switch ($resProfRate['rating']) {
                case 0:
                    ?><img src="../view/Rate_Star/rate_0_10.jpg" alt="non noté"/><br/><?php
                    echo"L'utilisateur n'a pas encore été noté.";
                    break;
                case 1:
                    ?><img src="../view/Rate_Star/rate_1_10.jpg" alt="01/10"/><br/><?php
                    echo"01/10";
                    break;
                case 2:
                    ?><img src="../view/Rate_Star/rate_2_10.jpg" alt="02/10"/><br/><?php
                    echo"02/10";
                    break;
                case 3:
                    ?><img src="../view/Rate_Star/rate_3_10.jpg" alt="03/10"/><br/><?php
                    echo"03/10";
                    break;
                case 4:
                    ?><img src="../view/Rate_Star/rate_4_10.jpg" alt="04/10"/><br/><?php
                    echo"04/10";
                    break;
                case 5:
                    ?><img src="../view/Rate_Star/rate_5_10.jpg" alt="05/10"/><br/><?php
                    echo"05/10";
                    break;
                case 6:
                    ?><img src="../view/Rate_Star/rate_6_10.jpg" alt="06/10"/><br/><?php
                    echo"06/10";
                    break;
                case 7:
                    ?><img src="../view/Rate_Star/rate_7_10.jpg" alt="07/10"/><br/><?php
                    echo"07/10";
                    break;
                case 8:
                    ?><img src="../view/Rate_Star/rate_8_10.jpg" alt="08/10"/><br/><?php
                    echo"08/10";
                    break;
                case 9:
                    ?><img src="../view/Rate_Star/rate_9_10.jpg" alt="09/10"/><br/><?php
                    echo"09/10";
                    break;
                case 10:
                    ?><img src="../view/Rate_Star/rate_10_10.jpg" alt="0/10"/><br/><?php
                    echo"10/10";
                    break;
    }
}
        ?>
    </div>
