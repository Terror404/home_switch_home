<br/>
<br/>
<h3>Vos échanges en attente de commentaires</h3>
<br/><br/>
<?php
if(isset($idHouse1) AND !empty($idHouse1))
{
    $nb2=count($arrayFinalInfU1);
    for($i=0;$i<$nb2;$i++)
    {
    ?>
        <div class='blocExchange'>
            <fieldset>
                <legend>Echange n°<?php echo$i+1;?></legend>
            Vous : <?php echo $arrayFinalInfU1[$i][0]?><br/>
            Votre maison que vous avez échangé : <a href='../controler/content.php?page=houseCard&id="<?php echo $idHouse1; ?>"' target='_blank'><?php echo $arrayFinalInfU1[$i][1];?></a><br/>
            La personne avec qui vous avez effectué l'échange : <?php echo $arrayFinalInfU2[$i][0]; ?><br/>
            La maison dans laquelle vous vous êtes rendus : <a href='../controler/content.php?page=houseCard&id="<?php echo $idHouse2; ?>"' target='_blank'><?php echo $arrayFinalInfU2[$i][1]; ?></a> 
            <br/><div class="">
            <form method="post" action="../controler/content.php?page=comment">
                <input type="hidden" name="loginUser2" value="<?php echo $arrayFinalInfU2[$i][0]; ?>"/>
                <input type="hidden" name="loginUser1" value="<?php echo $arrayFinalInfU1[$i][0]?>"/>
                <input type="hidden" name="idHouse2" value="<?php echo $idHouse2; ?>"/>
                <input type="hidden" name="idHouse1" value="<?php echo $idHouse1; ?>"/>
                <input type="hidden" name="titleHouse2" value="<?php echo $arrayFinalInfU2[$i][1]; ?>"/>
                <input type="hidden" name="titleHouse1" value="<?php echo $arrayFinalInfU1[$i][1];?>"/>
                <input type="submit" value="commenter"/>
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
    echo"<br/><br/> Il n'y a pas d'échange à commenter pour l'instant";
}
?>

<h3>Vos demandes d'échanges reçues</h3>
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
            La personne qui souhaite éffectuer un échange : <?php echo $arrayFinalInfU2W2[$i][0]; ?><br/>
            La maison qu'il souhaite proposer à l'échange : <a href='../controler/content.php?page=houseCard&id="<?php echo $idHouse2W2; ?>"' target='_blank'><?php echo $arrayFinalInfU2W2[$i][1]; ?></a> <br/>
            Vous : <?php echo $arrayFinalInfU1W2[$i][0]?><br/>
            Votre maison qu'il souhaite vous échanger : <a href='../controler/content.php?page=houseCard&id="<?php echo $idHouse1W2; ?>"' target='_blank'><?php echo $arrayFinalInfU1W2[$i][1];?></a>
            <br/><div class="">
            <form method="post" action="../controler/content.php?page=comment">
                <input type="hidden" name="loginUser2" value="<?php echo $arrayFinalInfU2W2[$i][0]; ?>"/>
                <input type="hidden" name="loginUser1" value="<?php echo $arrayFinalInfU1W2[$i][0]?>"/>
                <input type="hidden" name="idHouse2" value="<?php echo $idHouse2W2; ?>"/>
                <input type="hidden" name="idHouse1" value="<?php echo $idHouse1W2; ?>"/>
                <input type="hidden" name="titleHouse2" value="<?php echo $arrayFinalInfU2W2[$i][1]; ?>"/>
                <input type="hidden" name="titleHouse1" value="<?php echo $arrayFinalInfU1W2[$i][1];?>"/>
                <input type="submit" value="Annuler la demande"/>
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
    echo"<br/><br/> Il n'y a pas de demande d'échange qui vous est destinée pour l'instant";
}
?>


<h3>Vos demandes d'échanges envoyées</h3>
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
            Votre maison que vous souhaitez échangé : <a href='../controler/content.php?page=houseCard&id="<?php echo $idHouse1W1; ?>"' target='_blank'><?php echo $arrayFinalInfU1W1[$i][1];?></a><br/>
            La personne avec qui vous souhaitez effectuer l'échange : <?php echo $arrayFinalInfU2W1[$i][0]; ?><br/>
            La maison dans laquelle vous vous vous rendre : <a href='../controler/content.php?page=houseCard&id="<?php echo $idHouse2W1; ?>"' target='_blank'><?php echo $arrayFinalInfU2W1[$i][1]; ?></a> 
            <br/><div class="">
            <form method="post" action="../controler/content.php?page=comment">
                <input type="hidden" name="loginUser2" value="<?php echo $arrayFinalInfU2W1[$i][0]; ?>"/>
                <input type="hidden" name="loginUser1" value="<?php echo $arrayFinalInfU1W1[$i][0]?>"/>
                <input type="hidden" name="idHouse2" value="<?php echo $idHouse2W1; ?>"/>
                <input type="hidden" name="idHouse1" value="<?php echo $idHouse1W1; ?>"/>
                <input type="hidden" name="titleHouse2" value="<?php echo $arrayFinalInfU2W1[$i][1]; ?>"/>
                <input type="hidden" name="titleHouse1" value="<?php echo $arrayFinalInfU1W1[$i][1];?>"/>
                <input type="submit" value="Annuler la demande"/>
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
    echo"<br/><br/> Vous navez pas de demande d'échange envoyée pour l'instant ";
}
?>