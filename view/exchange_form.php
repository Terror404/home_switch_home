<br/><br/><br/>
<h1>Formulaire d'échange</h1>
<?php
//Choice of the User to exchange with
if(!isset($_POST['idUser2']) AND !isset($_POST['logUser2']))
{
    ?>
    Avec qui souhaitez vous effectuer cet échange ? <br/>
    <form method="post" action="../controler/content.php?page=exchange">
        <input type="text" name="logUser2" placeholder="Login de l'utilisateur"/>
        <input type='submit' name='Suivant'/>
    </form>
    <?php
}
else
{
    //Choice of the house of the other user
    if(!isset($_POST['idHouseU2']))
    {
        while($resUser2=$askUser2->fetch())
        {
            $loginU2=$resUser2['login'];
            $idU2=$resUser2['id']
        ?>
            Vous souhaitez effectuer un échange avec : <?php echo $loginU2 ;?> <br/>
        <?php
        }
        ?>
        Laquelle de ses maisons voulez vous lui échanger ?? <br/>
        <form method='post' action='../controler/content.php?page=exchange'>
        <select name='idHouseU2' size='1' class='input'>
            <?php 
                while($resHouseU2=$askHouseU2->fetch())
                {
            ?>
                    <option value='<?php echo $resHouseU2['id'] ?>'> <?php echo $resHouseU2['title'] ?>
            <?php
                }
            ?>
        </select>
        <input type="hidden" name="idUser2" value="<?php echo $idU2?>"/>
        <input type='submit' value='Choisir cette maison'/>
        </form>
        <?php
    }
    else
    {
        if(!isset($_POST['idAdU2']))
        {
            while($resUser2=$askUser2->fetch())
            {
            ?>
                Vous souhaitez effectuer un échange avec : <?php echo $resUser2['login'] ;?> <br/>
            <?php
            }
            while($resHChosenU2=$askHChosenU2->fetch())
            {
            ?>
                La maison avec laquelle vous souhaitez échanger est : <?php echo $resHChosenU2['title']?> <br/>
            <?php
            }
            ?>
            Choisissez l'annonce correspondant aux dates auxquelles vous voulez échanger la maison :
            <form method='post' action='../controler/content.php?page=exchange'>
                <select name='idAdU2' size='1' class='input'>
                    <?php 
                        while($resAdU2=$askAdU2->fetch())
                        {
                    ?>
                            <option value='<?php echo $resAdU2['id'] ?>'> <?php echo $resAdU2['title'] ?>
                    <?php
                        }
                    ?>
                </select>
                <input type="hidden" name="idUser2" value="<?php echo $_POST['idUser2']?>"/>
                <input type='hidden' name='idHouseU2' value='<?php echo $_POST['idHouseU2'] ?>'/>
                <input type='submit' value='Choisir cette annonce'/>
            </form>
            <?php
        }
        else
        {
            if(!isset($_POST['idHouseU1']))
            {
                while($resUser2=$askUser2->fetch())
                {
                ?>
                    Vous souhaitez effectuer un échange avec : <?php echo $resUser2['login'] ;?> <br/>
                <?php
                }
                while($resHChosenU2=$askHChosenU2->fetch())
                {
                ?>
                    La maison avec laquelle vous souhaitez échanger est : <?php echo $resHChosenU2['title']?> <br/>
                <?php
                }
                while($resAChosenU2=$askAChosenU2->fetch())
                {
                ?>
                    L'annonce avec laquelle vous souhaitez effectuer un échange est : <?php echo$resAChosenU2['title'];?> du <?php echo $resAChosenU2['date_begin']?> au <?php echo $resAChosenU2['date_end']?><br/>
                <?php
                }
                ?>
                Laquelle de vos maison souhaitez vous proposer à l'échange : 
                <form method='post' action='../controler/content.php?page=exchange'>
                <select name='idHouseU1' size='1' class='input'>
                    <?php 
                        while($resHouse=$askHouse->fetch())
                        {
                    ?>
                            <option value='<?php echo $resHouse['id'] ?>'> <?php echo $resHouse['title'] ?>
                    <?php
                        }
                    ?>
                </select>
                <input type="hidden" name="idUser2" value="<?php echo $_POST['idUser2']?>"/>
                <input type='hidden' name='idHouseU2' value='<?php echo $_POST['idHouseU2'] ?>'/>
                <input type='hidden' name='idAdU2' value='<?php echo $_POST['idAdU2'] ?>'/>
                <input type='submit' value='Choisir cette maison'/>
                </form>
                <?php
            }
            else
            {
                if(!isset($_POST['idAdU1']))
                {
                    while($resUser2=$askUser2->fetch())
                    {
                    ?>
                        Vous souhaitez effectuer un échange avec : <?php echo $resUser2['login'] ;?> <br/>
                    <?php
                    }
                    while($resHChosenU2=$askHChosenU2->fetch())
                    {
                    ?>
                        La maison avec laquelle vous souhaitez échanger est : <?php echo $resHChosenU2['title']?> <br/>
                    <?php
                    }
                    while($resAChosenU2=$askAChosenU2->fetch())
                    {
                    ?>
                        L'annonce avec laquelle vous souhaitez effectuer un échange est : <?php echo$resAChosenU2['title'];?> du <?php echo $resAChosenU2['date_begin']?> au <?php echo $resAChosenU2['date_end']?><br/>
                    <?php
                    }
                    while($resHChosenU1=$askHChosenU1->fetch())
                    {
                    ?>
                        La maison que vous proposez à l'échange est : <?php echo $resHChosenU1['title']?><br/>
                    <?php
                    }
                    ?>
                    Choisissez l'annonce correspondant aux dates auxquelles vous voulez échanger votre maison :
                    <form method='post' action='../controler/content.php?page=exchange'>
                        <select name='idAdU1' size='1' class='input'>
                            <?php 
                                while($resAdU1=$askAdU1->fetch())
                                {
                            ?>
                                    <option value='<?php echo $resAdU1['id'] ?>'> <?php echo $resAdU1['title'] ?>
                            <?php
                                }
                            ?>
                        </select>
                        <input type="hidden" name="idUser2" value="<?php echo $_POST['idUser2']?>"/>
                        <input type='hidden' name='idHouseU2' value='<?php echo $_POST['idHouseU2'] ?>'/>
                        <input type='hidden' name='idAdU2' value='<?php echo $_POST['idAdU2'] ?>'/>
                        <input type='hidden' name='idHouseU1' value='<?php echo $_POST['idHouseU1']?>'/>
                        <input type='submit' value='Choisir cette annonce'/>
                    </form>
                    <?php
                }
                else
                {
                    ?>
                    <h2>Récapitulatif de votre demande d'échange</h2>
                    <?php
                    while($resUser2=$askUser2->fetch())
                    {
                                                $user2=$resUser2['id'];
                    ?>
                        Vous souhaitez effectuer un échange avec : <?php echo $resUser2['login'] ;?> <br/>
                    <?php
                    }
                    while($resHChosenU2=$askHChosenU2->fetch())
                    {
                                                $houseU2=$resHChosenU2['id'];
                    ?>
                        La maison avec laquelle vous souhaitez échanger est : <?php echo $resHChosenU2['title']?> <br/>
                    <?php
                    }
                    while($resAChosenU2=$askAChosenU2->fetch())
                    {
                                                $adU2=$resAChosenU2['id'];
                    ?>
                        L'annonce avec laquelle vous souhaitez effectuer un échange est : <?php echo$resAChosenU2['title'];?> du <?php echo $resAChosenU2['date_begin']?> au <?php echo $resAChosenU2['date_end']?><br/>
                    <?php
                    }
                    while($resHChosenU1=$askHChosenU1->fetch())
                    {
                                                $houseU1=$resHChosenU1['id']
                    ?>
                        La maison que vous proposez à l'échange est : <?php echo $resHChosenU1['title']?><br/>
                    <?php
                    }
                    while($resAChosenU1=$askAChosenU1->fetch())
                    {
                                                $adU1=$resAChosenU1['id']
                    ?>
                        L'annonce que vous proposé à l'échange est : <?php echo $resAChosenU1['title']?> du <?php echo $resAChosenU1['date_begin']?> au <?php echo $resAChosenU1['date_end']?><br/>
                    <?php
                    }
           
            ?>
                    <form method='post' action='../controler/content.php?page=confirm_exchange'>
                        <input type='hidden' name='houseChoiceU1' value='<?php echo$houseU1 ?>'/>
                        <input type='hidden' name='adChoiceU1' value='<?php echo$adU1 ?>'/>
                        <input type="hidden" name="User2" value="<?php echo$user2?>"/>
                        <input type='hidden' name='houseChoiceU2' value='<?php echo$houseU2 ?>'/>
                        <input type='hidden' name='adChoiceU2' value='<?php echo$adU2 ?>'/>
                        <input type='submit' value="Envoyer la demande d'échange"/>
                    </form>
            <?php
                }
            }
        }
    }
}