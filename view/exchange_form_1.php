<!--Ajouter le div partout-->
<!--Convertir la date-->
<br/><br/><br/>
<h1>echo $_SESSION['retMessageri']</h1>
<?php
        if(!isset($_POST['houseChoice']))
        //Choice of the house to exchange
        {
?>          
            <div class='houseChoice'> Quelle maison échanger ?
            <form method='post' action='../controler/content.php?page=exchange'>
            <select name='houseChoice' size='1' class='input'>
                <?php 
                    while($resHouse=$askHouse->fetch())
                    {
                ?>
                        <option value='<?php echo $resHouse['id'] ?>'> <?php echo $resHouse['title'] ?>
                <?php
                    }
                ?>
            </select>
            <input type='submit' value='Choisir cette maison'/>
            </form>
            </div>
    <?php
        }
        else
        {
            //Choice of the ad to exchange
            if(!isset($_POST['adChoice']))
            {
                while($resHChosen=$askHChosen->fetch())
                {
                $houseChoice=$resHChosen['id'];
    ?>
                La maison que vous souhaitez échanger est : <?php echo $resHChosen['title'] ?> qui a l'id n°<?php echo$houseChoice?>
    <?php
                }
    ?>
                    <form method='post' action='../controler/content.php?page=exchange'>
                        <!--Next line required to get the information of the chosen house for the next step-->
                        Choisir l'annonce que vous souhaitez proposer à l'échange :
                        <select name="adChoice" size="1" class="input">
                            <?php
                                while($resAd=$askAd->fetch())
                                {
                            ?>
                            <option value="<?php echo $resAd['id'] ?>"><?php echo $resAd['title']?> --- du <?php echo $resAd['date_begin'] ?> au <?php echo $resAd['date_end'] ?>
                            <?php
                                }
                            ?>
                        </select>
                        <input type='hidden' name='houseChoice' value='<?php echo $houseChoice ?>'/>
                        <input type="submit" value="Choisir cette annonce"/>
                    </form>
    <?php
            }
            else
            {
                //Choice of the user to exchange with 
                if(!isset($_POST['User2']))
                {
                    while($resHChosen=$askHChosen->fetch())
                    {
                        $houseChoice=$resHChosen['id'];
        ?>
                        La maison que vous souhaitez échanger est : <?php echo $resHChosen['title'] ?><br/>
        <?php
                    }
                    while($resAChosen=$askAChosen->fetch())
                    {
                        $adChoice=$resAChosen['id'];
    ?>
                        L'annonce que vous souhaitez proposer à l'échange est : <?php echo $resAChosen['title'] ?> du <?php echo $resAChosen['date_begin']?> au <?php echo $resAChosen['date_end']?><br/>
    <?php
                    }
    ?>
                    Avec quel utilisateur souhaitez vous effectuer cet échange : 
                    <form method="post" action="../controler/content.php?page=exchange">
                    <input type='text' name='User2' placeholder="Login de l'utilisateur"/>
                    <input type='hidden' name='houseChoice' value='<?php echo$houseChoice ?>'/>
                    <input type='hidden' name='adChoice' value='<?php echo$adChoice ?>'/>
                    <input type="submit" name="Choisir cet utilisateur"/>
                    </form>
    <?php
                }
                
                
                else
                { 
                    //Choice of user2's house to exchange with
                    if(!isset($_POST['houseChoiceU2']))
                    {
                        while($resHChosen=$askHChosen->fetch())
                        {
                            $houseChoice=$resHChosen['id'];
        ?>
                            La maison que vous souhaitez échanger est : <?php echo $resHChosen['title'] ?><br/>
        <?php
                        }
                        while($resAChosen=$askAChosen->fetch())
                        {
                            $adChoice=$resAChosen['id'];
        ?>
                            L'annonce que vous souhaitez proposer à l'échange est : <?php echo $resAChosen['title'] ?> du <?php echo $resAChosen['date_begin']?> au <?php echo $resAChosen['date_end']?><br/>
        <?php
                        }
                        while($resUser2=$askUser2->fetch())
                        {
                            $User2=$resUser2['login'];
?>
                            L'utilisateur avec lequel vous souhaitez échanger est : <?php echo $resUser2['login'];?><br/>
        <?php
                        }
        ?>
                        <div class='houseChoice'> Choix de la maison de <?php echo $resUser2['login'];?> :
                        <form method='post' action='../controler/content.php?page=exchange'>
                        <select name='houseChoiceU2' size='1' class='input'>
                            <?php 
                                while($resHouseU2=$askHouseU2->fetch())
                                {
                            ?>
                                    <option value='<?php echo $resHouseU2['id'] ?>'> <?php echo $resHouseU2['title'] ?>
                            <?php
                                }
                            ?>
                        </select>
                        <input type='hidden' name='houseChoice' value='<?php echo$houseChoice ?>'/>
                        <input type='hidden' name='adChoice' value='<?php echo$adChoice ?>'/>
                        <input type="hidden" name="User2" value="<?php echo$User2?>"/>
                        <input type='submit' value='Choisir cette maison'/>
                        </form>
                        </div>
        <?php         
                    }
                    else
                    {
                        //Choice of user2's ad to exchange with
                        if(!isset($_POST['adChoiceU2']))
                        {
                                while($resHChosen=$askHChosen->fetch())
                            {
                                $houseChoice=$resHChosen['id'];
            ?>
                                La maison que vous souhaitez échanger est : <?php echo $resHChosen['title'] ?><br/>
            <?php
                            }
                            while($resAChosen=$askAChosen->fetch())
                            {
                                $adChoice=$resAChosen['id'];
            ?>
                                L'annonce que vous souhaitez proposer à l'échange est : <?php echo $resAChosen['title'] ?> du <?php echo $resAChosen['date_begin']?> au <?php echo $resAChosen['date_end']?><br/>
            <?php
                            }
                            while($resUser2=$askUser2->fetch())
                            {
                                $User2=$resUser2['login'];
            ?>
                                L'utilisateur avec lequel vous souhaitez échanger est : <?php echo $resUser2['login'];?><br/>
            <?php
                            }
                            while($resHChosenU2=$askHChosenU2->fetch())
                            {
                                $houseChoiceU2=$resHChosenU2['id'];
            ?>
                                La maison avec laquelle vous souhaitez échanger est :<?php echo$resHChosenU2['title'];?><br/>
            <?php
                            }
            ?>
                            <div class='houseChoice'> Choisir l'annonce que vous souhaitez proposer à l'échange
                            <form method='post' action='../controler/content.php?page=exchange'>
                            <select name='adChoiceU2' size='1' class='input'>
                                <?php 
                                    while($resAdU2=$askAdU2->fetch())
                                    {
                                ?>
                                        <option value='<?php echo $resAdU2['id'] ?>'> <?php echo $resAdU2['title'] ?> du <?php echo $resAdU2['date_begin'] ?> au <?php echo $resAdU2['date_end'] ?>
                                <?php
                                    }
                                ?>
                            </select>
                            <input type='hidden' name='houseChoice' value='<?php echo$houseChoice ?>'/>
                            <input type='hidden' name='adChoice' value='<?php echo$adChoice ?>'/>
                            <input type="hidden" name="User2" value="<?php echo$User2?>"/>
                            <input type='hidden' name='houseChoiceU2' value='<?php echo$houseChoiceU2?>'/>
                            <input type='submit' value='Choisir cette maison'/>
                            </form>
                            </div>
            <?php
                        }
                        else
                        {
            ?>
                            <h2>Récapitulatif de votre demande d'échange</h2>
            <?php
                            while($resHChosen=$askHChosen->fetch())
                            {
                                $houseChoice=$resHChosen['id'];
            ?>
                                La maison que vous souhaitez échanger est : <?php echo $resHChosen['title'] ?><br/>
            <?php
                            }
                            while($resAChosen=$askAChosen->fetch())
                            {
                                $adChoice=$resAChosen['id'];
            ?>
                                L'annonce que vous souhaitez proposer à l'échange est : <?php echo $resAChosen['title'] ?> du <?php echo $resAChosen['date_begin']?> au <?php echo $resAChosen['date_end']?><br/>
            <?php
                            }
                            while($resUser2=$askUser2->fetch())
                            {
                                $User2=$resUser2['id'];
            ?>
                                L'utilisateur avec lequel vous souhaitez échanger est : <?php echo $resUser2['login'];?><br/>
            <?php
                            }
                            while($resHChosenU2=$askHChosenU2->fetch())
                            {
                                $houseChoiceU2=$resHChosenU2['id'];
            ?>
                                La maison avec laquelle vous souhaitez échanger est : <?php echo$resHChosenU2['title'];?><br/>
            <?php
                            }
                            while($resAChosenU2=$askAChosenU2->fetch())
                            {
                                $adChoiceU2=$resAChosenU2['id'];
            ?>
                                L'annonce que vous souhaitez échanger est : <?php echo$resAChosenU2['title'];?> du <?php echo $resAChosenU2['date_begin']?> au <?php echo $resAChosenU2['date_end']?><br/>
            <?php
                            }
            ?>
                                <form method='post' action='../controler/content.php?page=confirm_exchange'>
                                    <input type='hidden' name='houseChoice' value='<?php echo$houseChoice ?>'/>
                                    <input type='hidden' name='adChoice' value='<?php echo$adChoice ?>'/>
                                    <input type="hidden" name="User2" value="<?php echo$User2?>"/>
                                    <input type='hidden' name='houseChoiceU2' value='<?php echo$houseChoiceU2?>'/>
                                    <input type='hidden' name='adChoiceU2' value='<?php echo$adChoiceU2?>'/>
                                    <input type='submit' value="Envoyer la demande d'échange"/>
                                </form>
            <?php
                        }
                    }
                    
                }
            }              
        }        
        ?>

