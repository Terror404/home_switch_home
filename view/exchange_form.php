<br/><br/><br/>
<h1>Formulaire d'échange</h1>
<?php
//Choice of the User to exchange with
if(!isset($_POST['idUser2']))
{
    ?>
    Avec qui souhaitez vous effectuer cet échange ? <br/>
    <form method="post" action="../controler/content.php?page=exchange">
        <input type="text" name="idUser2" placeholder="Login de l'utilisateur"/>
        <input type='submit' name='Suivant'/>
    </form>
    <?php
}
else
{
    if(!isset($_POST['idHouse2']))
    {
        while($resUser2=$askUser2->fetch())
        {
        ?>
            Vous souhaitez effectuer un échange avec : <?php $resUser2['login'] ;?> 
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
        <input type="hidden" name="idUser2" value="<?php echo$_POST['idUser2']?>"/>
        <input type='submit' value='Choisir cette maison'/>
        </form>
        <?php
    }
    else
    {
        while($resUser2=$askUser2->fetch())
        {
        ?>
            Vous souhaitez effectuer un échange avec : <?php $resUser2['login'] ;?> 
        <?php
        }
        while($resHChosenU2=$askHChosenU2->fetch())
        {
        ?>
            La maison de <?php$resUser2['login']?> avec laquelle vous souhaitez échanger est : <?php $resHouse2['title']?>
        <?php
        }
    }
}