<?php
while($resSearch=$askPrioritySearch->fetch())
{
    if(count($resSearch)===0 )
    {
        echo 'La recherche n\'a rendu aucun résultat';
    }
 else {
        
    
 ?>  
<div class="resultSearch" onclick="self.location.href='../controler/content.php?page=my_houses&amp;id=<?php echo $resSearch['id'];?>'">
    <div id="adTitle"> 
        <?php echo $resSearch['title']; ?>
    </div>
    <div id="datesAd">
        <?php echo $resSearch['date_begin']."/".$resSearch['date_end'] ; ?>
       
        <?php echo '<br/>'.$resSearch['rating'] ?>
    </div>
    <div id="descriptionHouse"> 
        <?php echo $resSearch['description'].$resSearch['priority']; ?>
    </div>
    <div id="pictureAd"> 
        <?php echo $resSearch['pictures'] ?>
    </div>
</div>
    
        

    <?php


}
$askPrioritySearch->closeCursor();
}
