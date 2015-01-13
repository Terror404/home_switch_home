<br/>
<br/>
<h1>Les échanges en attente de commentaires</h1>
<br/><br/>
<?php
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
