
<?php

if(isset($_POST['idmsg']))
{
    $delmsg=$DB->prepare('DELETE FROM messages WHERE id=:idMsg');
        $delmsg->execute(array('idMsg'=>$_POST['idmsg']));      
}
?>

<?php

if(isset($_POST['idmsg_sent']))
{
    $delmsg_sent=$DB->prepare('DELETE FROM messages WHERE id=:idMsgSent');
        $delmsg_sent->execute(array('idMsgSent'=>$_POST['idmsg_sent']));      
}
?>



