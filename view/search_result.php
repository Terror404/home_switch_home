<?php
while($resSearch=$askPrioritySearch->fetch())
{
    if(count($resSearch)===0 )
    {?>
        <p class="alert" ><?php echo 'La recherche n\'a rendu aucun résultat';?></p>
    <?php
    }
    
 else {
        
    
 ?>  
</br>
</br>
</br>
<div class="housebox" onclick="self.location.href='../controler/content.php?page=houseCard&amp;id=<?php echo $resSearch['id'];?>'">
    <div class="title" id="adTitle"> 
        <?php echo $resSearch['title']; ?>
    </div>
    <div id="datesAd" class="desc_tilte">
        <?php echo $resSearch['date_begin']."/".$resSearch['date_end'] ; ?>
       
        <?php echo '<br/>'.$resSearch['rating'] ?>
    </div>
    <div id="desc_tilte"> 
        <?php echo $resSearch['description']; ?>
    </div>
    <div id="houseleft"> 
        <img class="houseimg" src="<?php echo $resSearch['pictures'] ?>" alt="Photo maison" />
    </div>
</div>
    
        

    <?php


}
$askPrioritySearch->closeCursor();
}
