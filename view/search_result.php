<?php
while($resSearch=$askPrioritySearch->fetch())
{
 ?>  
<div id="resultSearch">
    <div id="adTitle"> 
        <?php echo $resSearch['title']; ?>
    </div>
    <div id="datesAd">
        <?php echo $resSearch['date_begin']." and the length is".$resSearch['length'] ; ?>
       
        <?php echo '<br/>'.$resSearch['rating'] ?>
    </div>
    <div id="descriptionHouse"> 
        <?php echo $resSearch['description'].$resSearch['priority']; ?>
    </div>
    <div id="pictureAd"> 
        <?php echo $resSearch['pictures'] ?>
    </div>
    
        

    <?php


}
$askPrioritySearch->closeCursor();
