<?php
while($resSearch=$askPrioritySearch->fetch())
{
    if(count($resSearch)===0 )
    {
        echo 'La recherche n\'a rendu aucun résultat';
    }
 else {
        
    
 ?>  
<div class="blockMyHouses" onclick="self.location.href='../controler/content.php?page=houseCard&amp;id=<?php echo $resSearch['id'];?>'">
    <div id="adTitle"> 
        <?php echo $resSearch['title']; ?>
    </div>
    <div class="picMyHouses"> 
        <a href="../controler/content.php?page=houseCard&id=<?php echo $resSearch['id'] ?>"><img src="<?php echo $resSearch['pictures'] ?>" alt="Photo maison" /></a>
    </div>
    
    
    
    <div class="rateMyHouses">
        <?php
                    switch ($resSearch['rating']) 
                    {
                        case 0:
                            ?><img src="../view/Rate_Star/rate_0_10.jpg" alt="non noté"/><br/><?php
                            echo"Le bien n'a pas encore été noté.";
                            break;
                        case 1:
                            ?><img src="../view/Rate_Star/rate_1_10.jpg" alt="01/10"/><br/><?php
                            echo"01/10";
                            break;
                        case 2:
                            ?><img src="../view/Rate_Star/rate_2_10.jpg" alt="02/10"/><br/><?php
                            echo"02/10";
                            break;
                        case 3:
                            ?><img src="../view/Rate_Star/rate_3_10.jpg" alt="03/10"/><br/><?php
                            echo"03/10";
                            break;
                        case 4:
                            ?><img src="../view/Rate_Star/rate_4_10.jpg" alt="04/10"/><br/><?php
                            echo"04/10";
                            break;
                        case 5:
                            ?><img src="../view/Rate_Star/rate_5_10.jpg" alt="05/10"/><br/><?php
                            echo"05/10";
                            break;
                        case 6:
                            ?><img src="../view/Rate_Star/rate_6_10.jpg" alt="06/10"/><br/><?php
                            echo"06/10";
                            break;
                        case 7:
                            ?><img src="../view/Rate_Star/rate_7_10.jpg" alt="07/10"/><br/><?php
                            echo"07/10";
                            break;
                        case 8:
                            ?><img src="../view/Rate_Star/rate_8_10.jpg" alt="08/10"/><br/><?php
                            echo"08/10";
                            break;
                        case 9:
                            ?><img src="../view/Rate_Star/rate_9_10.jpg" alt="09/10"/><br/><?php
                            echo"09/10";
                            break;
                        case 10:
                            ?><img src="../view/Rate_Star/rate_10_10.jpg" alt="0/10"/><br/><?php
                            echo"10/10";
                            break;
?>
                            }
       
    </div>
    <div id="descriptionMyHouses"> 
        <?php echo $resSearch['description']; ?>
    </div>
    
</div>
    
        

    <?php


}
$askPrioritySearch->closeCursor();
}}
