<br/><br/><br/>
<h1 class="top"> <?php echo $_SESSION['formEchang']; ?> </h1>
<div class="box"> <?php
            //Choice of the User to exchange with
            if(!isset($_POST['idUser2']) AND !isset($_POST['logUser2']))
            {
                ?>
                 Avec qui souhaitez-vous effectuer un échange? <br/>
                <form   method="post" action="../controler/content.php?page=exchange">
                    <input type="text" name="logUser2" placeholder="Login de l'utilisateur"/>
                    <input type='submit' class="sub" name='Suivant'/>
                </form>
</div>
    
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
<div class="box">
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
        <input type='submit' class="sub" value='Choisir cette maison'/>
        </form>
</div>
        <?php
    }
    else
    {
        if(!isset($_POST['idAdU2']))
        {
            while($resUser2=$askUser2->fetch())
            {
            ?>
<div class="box">
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
                </br>
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
                <input type='submit' class="sub" value='Choisir cette annonce'/>
            </form>
</div>
            <?php
        }
        else
        {
            if(!isset($_POST['idHouseU1']))
            {
                while($resUser2=$askUser2->fetch())
                {
                ?>
<div class="box">
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
                                    </br>
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
                <input type='submit' class="sub" value='Choisir cette maison'/>
                </form>
</div>
                <?php
            }
            else
            {
                if(!isset($_POST['idAdU1']))
                {
                    while($resUser2=$askUser2->fetch())
                    {
                    ?>
<div class="box">
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
                                        </br>
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
                        <input type='submit' class="sub" value='Choisir cette annonce'/>
</div>
                    </form>
                    <?php
                }
                else
                {
                    ?>
<div class="box">
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
                        <input type='submit' class="sub" value="Envoyer la demande d'échange"/>
                    </form>
<div class="box">
            <?php
                }
            }
        }
    }
}