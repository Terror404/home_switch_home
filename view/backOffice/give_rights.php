<div> Administrator of the site
    <br/>
<?php 
while($resAccessAdmin=$askAccessAdmin->fetch())
{
    echo $resAccessAdmin['login'].'<br/>';
    echo 'Tel:'.$resAccessAdmin['phone_number'].'<br/>';
    echo 'Mail:'.$resAccessAdmin['mail'];
}
?>