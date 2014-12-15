<h2>Fiche profil</h2>
<div class="ProfilePic">
    <?php 
        while($resProfPic=$askProfPic->fetch())
        {
    ?>
            <img src="<?php echo$resProfPic['picture'];?>" alt="photo de profil"/>
    <?php
        }
    ?>
</div>
<div class="login">
    <?php 
        while($resProfLog=$askProfLog->fetch())
        {
           ?> <p> Bonjour je suis <?php echo $resProfLog['login'];?></p><?php
        }
    ?>
</div>
<div class="mbrsince">
     <?php 
        while($resProfDate=$askProfDate->fetch())
        {
           ?> <p> Membre depuis <?php       $originalDateC = $resProfDate['date_creation'];
                                                $arrC = explode('-', $originalDateC);
                                                switch ($arrC['1'])
                                                {
                                                    case 01:
                                                        echo "janvier";echo"&nbsp"; echo $arrC['0'];
                                                        break;
                                                    case 0:
                                                        echo "février";echo"&nbsp"; echo $arrC['0'];
                                                        break;
                                                    case 03:
                                                        echo "mars";echo"&nbsp"; echo $arrC['0'];
                                                        break;
                                                    case 04:
                                                        echo "avril";echo"&nbsp"; echo $arrC['0'];
                                                        break;
                                                    case 05:
                                                        echo "mai";echo"&nbsp"; echo $arrC['0'];
                                                        break;
                                                    case 06:
                                                        echo "juin";echo"&nbsp"; echo $arrC['0'];
                                                        break;
                                                    case 07:
                                                        echo "juillet";echo"&nbsp"; echo $arrC['0'];
                                                        break;
                                                    case 08:
                                                        echo "août";echo"&nbsp"; echo $arrC['0'];
                                                        break;
                                                    case 09:
                                                        echo "septembre";echo"&nbsp"; echo $arrC['0'];
                                                        break;
                                                    case 10:
                                                        echo "octobre";echo"&nbsp"; echo $arrC['0'];
                                                        break;
                                                    case 11:
                                                        echo "novembre";echo"&nbsp"; echo $arrC['0'];
                                                        break;
                                                    case 12:
                                                        echo "decembre";echo"&nbsp"; echo $arrC['0'];
                                                        break;
                                                }
        }
    ?>
</div>
<div class="desc">
    <h2>A propos de moi :</h2>
    <?php 
        while($resProfDesc=$askProfDesc->fetch())
        {
            echo $resProfDesc['description'];
        }
    ?>
</div>
<div class="dest">
    <h2>Les destinations où je souhaiterais me rendre :</h2>
    <?php
        while($resProfWant=$askProfWant->fetch())
        {
            echo $resProfWant['wanted_dest'];
        }
    ?>
</div>
<div class="Rate">
    
</div>
     
    