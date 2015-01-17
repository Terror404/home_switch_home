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
    <div id="houseleft" class="houseleft"> 
        <img class="houseimg" src="<?php echo $resSearch['pictures'] ?>" alt="Photo maison" />
        
         <div id="datesAd" >
             <p>dates de disponibilité:</p>
        <?php echo $resSearch['date_begin']."/".$resSearch['date_end'] ; ?>
       
             <p>note:<?php echo '<br/>'.$resSearch['rating'] ?></p>
    </div>
    </div>
   
    <div id="desc_tilte" class="desc_tilte"> 
        <?php echo $resSearch['description']; ?>
    </div>
    
</div>
    
        

    <?php


}
$askPrioritySearch->closeCursor();
}
