<h1>Les échanges en attente de commentaires</h1>

<div class='blocExchange'>
    <?php
    while($resExchConf=$askExchConf->fetch())
    {
        if($resExchConf['confirmed']==1)
        {
            if($resExchConf['id_user1']==$_SESSION['userId'])
            {
            ?>
                Vous effectuez cet échange avec <?php echo $resExchConf['id_user2']?>
            <?php
            }
            elseif($resExchConf['id_user_2']==$_SESSION['userId'])
            {
            ?>
                Vous effectuez cet échange avec <?php echo $resExchConf['id_user1']?>
            <?php   
            }
        }
    }
</div>

