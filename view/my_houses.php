<?php

while($resHouse=$askHouse->fetch())
{
    ?>
        titre n°<?php echo$resHouse['id']?>:<?php echo $resHouse['title'];
}
?>