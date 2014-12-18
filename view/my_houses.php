

<?php
$i=1;
while($resHouse=$askHouse->fetch())
{
       echo '<div class="myhouseHome">titre n°'.$i.':'.$resHouse['title'].'</div><br/>'.$resHouse['description'].' <br/>';
       $i+=1;
}
?>
