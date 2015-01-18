<br/>
<br/>
<div class="box1">
<h2>Vos échanges en attente de commentaires</h2>
<br/><br/>
<?php
if(isset($idHouse1) AND !empty($idHouse1))
{
    $nb2=count($arrayFinalInfU1);
    for($i=0;$i<$nb2;$i++)
    {
        if(($arrayInf[$i][5]==0 AND $arrayInf[$i][6]==0) OR ($arrayInf[$i][5]==1 AND $arrayInf[$i][7]==0))
        {
    ?>
        <div class='blocExchange'>
            <fieldset>
                <legend>Echange n°<?php echo$i+1;?></legend>
            Vous : <?php echo $arrayFinalInfU1[$i][0]?><br/>
            Votre maison que vous avez échangé : <a href='../controler/content.php?page=houseCard&id=<?php echo $idHouse1; ?>' target='_blank'><?php echo $arrayFinalInfU1[$i][1];?></a><br/>
            La personne avec qui vous avez effectué l'échange : <a href='../controler/content.php?page=myProfile&userId=<?php echo $idUser2; ?>' target='_blank'><?php echo $arrayFinalInfU2[$i][0]; ?></a><br/>
            La maison dans laquelle vous vous êtes rendus : <a href='../controler/content.php?page=houseCard&id=<?php echo $idHouse2; ?>' target='_blank'><?php echo $arrayFinalInfU2[$i][1]; ?></a> 
            <br/><br/><div class="">
            
            <form method="post" action="../controler/content.php?page=comment">
                <input type='hidden' name='type' value='<?php echo $arrayInf[$i][5]?>'/>
                <input type='hidden' name='idExch' value='<?php echo$arrayInf[$i][4]?>'/>
                <input type="hidden" name="idUser1" value="<?php echo $idUser1; ?>"/>
                <input type="hidden" name="idUser2" value="<?php echo $idUser2; ?>"/>
                <input type="hidden" name="loginUser1" value="<?php echo $arrayFinalInfU1[$i][0];?>"/>
                <input type="hidden" name="loginUser2" value="<?php echo $arrayFinalInfU2[$i][0]?>"/>
                <input type="hidden" name="idHouse1" value="<?php echo $idHouse1; ?>"/>
                <input type="hidden" name="idHouse2" value="<?php echo $idHouse2; ?>"/>
                <input type="hidden" name="titleHouse2" value="<?php echo $arrayFinalInfU2[$i][1]; ?>"/>
                <input type="hidden" name="titleHouse1" value="<?php echo $arrayFinalInfU1[$i][1];?>"/>
                <input type="submit" value="commenter"/>
            </form>
            </div>
            <br/>
            <?phpecho"idExch".$idExch?>
            </fieldset>
            <br/>
        </div> 
    <?php
        }
        else
        {
            echo"Votre commentaire est en cours de traitement En attente de la réponse de l'autre membre. <br/> <br/>";
        }
    }
}
else
{
    echo" <br/>Il n'y a pas d'échange à commenter pour l'instant <br/><br/>";
}
?>
</div>
<div class="box">
<h2>Vos demandes d'échanges reçues</h2>
<?php
if(isset($idHouse1W2) AND !empty($idHouse1W2))
{
    $nb3=count($arrayFinalInfU1W2);
    for($i=0;$i<$nb3;$i++)
    {
    ?>
        <div class='blocExchange'>
            <fieldset>
                <legend>Echange n°<?php echo$i+1;?></legend>
                La personne qui souhaite éffectuer un échange : <a href='../controler/content.php?page=myProfile&userId=<?php echo $idUser2W2; ?>' target='_blank'><?php echo $arrayFinalInfU2W2[$i][0]; ?></a><br/>
            La maison qu'il souhaite proposer à l'échange : <a href='../controler/content.php?page=houseCard&id=<?php echo $idHouse2W2; ?>' target='_blank'><?php echo $arrayFinalInfU2W2[$i][1]; ?></a> <br/>
            Vous : <?php echo $arrayFinalInfU1W2[$i][0]?><br/>
            Votre maison qu'il souhaite vous échanger : <a href='../controler/content.php?page=houseCard&id=<?php echo $idHouse1W2; ?>' target='_blank'><?php echo $arrayFinalInfU1W2[$i][1];?></a>
            <br/><br/><div class="">
            <form method="post" action="../controler/content.php?page=treatExchange">
                <input type='hidden' name='IdExch' value='<?php echo $idExchW2;?>'/>
                <input type='hidden' name='idUser1' value='<?php echo $idUser2W2;?>'/>
                <input type='hidden' name='idUser2' value='<?php echo $idUser1W2;?>'/>
                <input type="hidden" name="loginUser2" value="<?php echo $arrayFinalInfU2W2[$i][0]; ?>"/>
                <input type="hidden" name="loginUser1" value="<?php echo $arrayFinalInfU1W2[$i][0]?>"/>
                <input type="hidden" name="idHouse2" value="<?php echo $idHouse2W2; ?>"/>
                <input type="hidden" name="idHouse1" value="<?php echo $idHouse1W2; ?>"/>
                <input type="hidden" name="titleHouse2" value="<?php echo $arrayFinalInfU2W2[$i][1]; ?>"/>
                <input type="hidden" name="titleHouse1" value="<?php echo $arrayFinalInfU1W2[$i][1];?>"/>
                <input type="submit" name="submit" value="Accepter la demande"/>
                <input type="submit" name="submit" value="Refuser la demande"/>                
            </form>
            </div>
            <br/>
            </fieldset>
            <br/>
        </div>
    <?php
    }
}
else
{
    echo"<br/> Il n'y a pas de demande d'échange qui vous est destinée pour l'instant <br/><br/>";
}
?>

</div>
<div class="box">
<h2>Vos demandes d'échanges envoyées</h2>
<?php
if(isset($idHouse1W1) AND !empty($idHouse1W1))
{
    $nb4=count($arrayFinalInfU1W1);
    for($i=0;$i<$nb4;$i++)
    {
    ?>
        <div class='blocExchange'>
            <fieldset>
                <legend>Echange n°<?php echo$i+1;?></legend>
            Vous : <?php echo $arrayFinalInfU1W1[$i][0]?><br/>
            Votre maison que vous souhaitez échangé : <a href='../controler/content.php?page=houseCard&id=<?php echo $idHouse1W1; ?>' target='_blank'><?php echo $arrayFinalInfU1W1[$i][1];?></a><br/>
            La personne avec qui vous souhaitez effectuer l'échange : <a href='../controler/content.php?page=myProfile&userId=<?php echo $idUser2W1; ?>' target='_blank'><?php echo $arrayFinalInfU2W1[$i][0]; ?></a><br/>
            La maison dans laquelle vous vous vous rendre : <a href='../controler/content.php?page=houseCard&id=<?php echo $idHouse2W1; ?>' target='_blank'><?php echo $arrayFinalInfU2W1[$i][1]; ?></a> 
            <br/><br/><div class="">
            <form method="post" action="../controler/content.php?page=treatExchange">
                <input type='hidden' name='IdExch' value='<?php echo $idExchW1;?>'/>
                <input type='hidden' name='idUser1' value='<?php echo $idUser1W1;?>'/>
                <input type='hidden' name='idUser2' value='<?php echo $idUser2W1;?>'/>
                <input type="hidden" name="loginUser2" value="<?php echo $arrayFinalInfU2W1[$i][0]; ?>"/>
                <input type="hidden" name="loginUser1" value="<?php echo $arrayFinalInfU1W1[$i][0]?>"/>
                <input type="hidden" name="idHouse2" value="<?php echo $idHouse2W1; ?>"/>
                <input type="hidden" name="idHouse1" value="<?php echo $idHouse1W1; ?>"/>
                <input type="hidden" name="titleHouse2" value="<?php echo $arrayFinalInfU2W1[$i][1]; ?>"/>
                <input type="hidden" name="titleHouse1" value="<?php echo $arrayFinalInfU1W1[$i][1];?>"/>
                <input type="submit" name="submit" value="Annuler la demande"/>
            </form>
            </div>
            <br/>
            </fieldset>
            <br/>
        </div>
<?php
}
}
else
{
    echo"<br/> Vous navez pas de demande d'échange envoyée pour l'instant <br/><br/> ";
}
?>
</div>