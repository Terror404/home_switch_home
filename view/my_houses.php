<?php

while($resHouse=$askHouse->fetch())
{
    ?>
    <div class="BlocHouse">
        <div class="PicBlocHouse">
           <img src="<?php echo$resHouse['pictures'] ?>" alt="photo maison"/>
        </div>
        <div class="BlocTitleHouse">
            <?php echo$resHouse['title']?>
        </div>
    </div>
<?php
}?>
    <div class="BlocLocHouse">
        Région : <?php while($resAreaHouse=$askAreaHouse->fetch())
                            {
                                echo$resAreaHouse['real_name'];
                            }
                ?>
        Ville : <?php while($resTownHouse=$askTownHouse->fetch()) 
                            {
                                echo$resTownHouse['ville_nom_reel'];
                            }
                ?>
    </div>