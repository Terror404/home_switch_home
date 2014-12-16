

<?php

while($resHouse=$askHouse->fetch())
{
       echo 'titre n°'.$resHouse['id'].':'.$resHouse['title'].'<br/><br/>';
}
?>