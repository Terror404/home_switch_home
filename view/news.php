<div class="lastAds" >
    
    <h1>Nos dernières annonces</h1>
    <br/>
    
    <?php
    $i=0;
    while($resLastAds=$askLastAds->fetch() AND $i<5)
    {
       ?>
    <div class="blockMyHouses" onclick="self.location.href='../controler/content.php?page=houseCard&amp;id=<?php echo $resLastAds['id'];?>'">
    <div id="adTitle"> 
        Titre:<?php echo $resLastAds['title']; ?>
        Dates:  <?php echo 'du'.$resLastAds['date_begin'].' au '.$resLastAds['date_end'];?>
    </div>
    <div class="picMyHouses" style="width:40%;height:50%;margin:auto;"> 
        <a href="../controler/content.php?page=adCard&id=<?php echo $resLastAds['id'] ?>" style="overflow:hidden;"><img src="<?php echo $resLastAds['pictures'] ?>" alt="Photo maison" style="width:100%;height:100%"/></a>
    </div>
        </div>
    <?php
    $i+=1;
    }
    
    ?>
</div>

  
<div class="lastHouses">
    
    <h1>Nos dernières maisons</h1>
    <br/>
    
    <?php
    $i=0;
    while($resLast=$askLast->fetch() AND $i<5)
    {
       ?>
    <div class="blockMyHouses" onclick="self.location.href='../controler/content.php?page=houseCard&amp;id=<?php echo $resLast['id'];?>'">
    <div id="adTitle"> 
        <?php echo $resLast['title']; ?>
        
    </div>
    <div class="picMyHouses" style="width:40%;height:50%;margin:auto;"> 
        <a href="../controler/content.php?page=houseCard&id=<?php echo $resLast['id'] ?>" style="overflow:hidden; background-image: url()"><img src="<?php echo $resLast['pictures'] ?>" alt="Photo maison" style="width:100%;height:100%"/></a>
    </div>
    </div>
    <?php
    $i+=1;
    }
    
    ?>
</div>


<div class="lastHouses" style="width:40%; overflow:hidden; right:5%;top:800px; position:absolute; border-radius:25px;padding:10px;">

    <h1>Meilleure maison</h1>
    <br/>
 <?php
    $i=0;
    while($resBestHouse=$askBestHouse->fetch() AND $i<1)
    {
       ?>
    <div class="blockMyHouses" onclick="self.location.href='../controler/content.php?page=houseCard&amp;id=<?php echo $resBestHouse['id'];?>'">
    <div id="adTitle"> 
        <?php echo $resBestHouse['title']; ?>
        
    </div>
    <div class="picMyHouses" style="width:40%;height:50%;margin:auto;"> 
        <a href="../controler/content.php?page=houseCard&id=<?php echo $resBestHouse['id'] ?>" style="overflow:hidden; background-image: url()"><img src="<?php echo $resBestHouse['pictures'] ?>" alt="Photo maison" style="width:100%;height:100%"/></a>
    </div>
    </div>
    <?php
    $i+=1;
    }
    
    ?>
</div>