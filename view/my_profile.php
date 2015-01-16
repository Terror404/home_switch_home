<section class="page">

    <div class="top">
<h2 class="head"> <?php if (isset($_SESSION['userLogin']))
                            {
                                echo $_SESSION['monProf']; 
                            }
                            else 
                            {
                                echo 'Mon profil';
                            }
                            ?> 
</h2>
   <div class="modif">
    <?php $userId=$_SESSION['userId'];?>
<?php
if(isset($modify) AND $modify==1)
{
?>
<form method="post" action="../controler/content.php?page=myProfile&id=<?php echo $userId ?>">
<input type='hidden' name='modifyProf' value='1'/>
<input type='submit' class="subtomodif" value ='Modifier votre profil'/>
</form>
<?php
}
?>
   </div>
    </div>
    <div class="login">
    <?php
    while ($resProfLog = $askProfLog->fetch()) {
        ?> <p> Bonjour je suis <?php echo $resProfLog['login']; ?></p><?php
    }
    ?>

</div>
<div class="Profile">
    <div class="userleft">
        </br>
        <?php
        while ($resProfPic = $askProfPic->fetch()) {
            ?>
            <img class="userimg"src="<?php echo$resProfPic['picture']; ?>" alt="photo de profil" width=100 height=100 />
            <?php
        }
        ?>
            </br>
            <div class="test"></div>
        <!-- rating-->
        <p><?php
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
        </p>

    </div>
        <div class="desc_title">
                <h2>A propos de moi :</h2>
                    <?php
                    while ($resProfDesc = $askProfDesc->fetch()) {
                        echo $resProfDesc['description'];
                    }
                    ?>
                </br>
                </br>
                <h2>Les destinations où je souhaiterais me rendre :</h2>
                    <?php
                    while ($resProfWant = $askProfWant->fetch()) {
                        echo $resProfWant['wanted_dest'];
                    }
                    ?>
            
                
            <div class="mbrsince"></br>
            <?php
            while ($resProfDate = $askProfDate->fetch()) {
                ?> <p> <h2>Membre depuis:</h2> <?php
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
        </div>
</div>

<br/>


    <div class="myhouses">
       <div class="test1"></div>
        <h2> Mes Maisons </h2>
        <?php while($resPic=$askProfHouses->fetch())
        {
         
        echo' <p><img class="image" id="house1" src="'.$resPic['pictures'].'" alt= "image1" onclick="self.location.href=\'../controler/content.php?page=houseCard&id='.$resPic['id'].'\'"></p>';
        
        }
    ?>
        
        

<div class="com">
    <div class="test2"></div>
<h2> Les commentaires </h2>
        <?php if($askComNb!=0)
        {
            while($resCom=$askCom->fetch())
            {
            echo '<div class="commentbox">
            <div class="commentauthor">

                    <p> <img class="userimg" src="'.$resCom['picture'].'" alt= "map"/> </p>
                    <p>'.$resCom['login'].'</p>
            </div>

            <div class="comment">
                    <p>'.$resCom['title'].'</p>
                    <p>'.$resCom['text'].'</p>
                    <p>posté le :'.$resCom['date'].'</p>
            </div>    
        </div>';
            }
        }
        else
        {
            echo 'Aucun commentaire disponible';
        }
?>
            
</div>     
    
</div>

</section>
